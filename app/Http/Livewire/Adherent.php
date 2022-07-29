<?php

namespace App\Http\Livewire;

use App\Models\Adherent as ModelsAdherent;
use Livewire\Component;
use Illuminate\Validation\Rule as ValidationRule;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB as FacadesDB;

class Adherent extends Component
{
    use WithPagination;

    use WithFileUploads;

    protected $paginationTheme = "bootstrap";

    public $search = "";

    public $currentPage = PAGELISTE;

    public $newAdherent = [];

    public $addPhoto = null;

    public $editAdherent = [];

    public function rules()
    {
        if ($this->currentPage == PAGEEDIT) {
            return [
                'editAdherent.name' => 'required',
                'editAdherent.type_adhesion' => 'required',
                'editAdherent.code' => ['required', ValidationRule::unique("adherents", "code")->ignore($this->editAdherent['id'])],
                'editAdherent.tel' => ['required', ValidationRule::unique("adherents", "tel")->ignore($this->editAdherent['id'])],
                'editAdherent.sexe' => 'required',
                'editAdherent.date_naiss' => 'required',
                'editAdherent.lieu_naiss' => 'required',
                'editAdherent.nationalite' => 'required',
                'editAdherent.date_inscription' => 'required',
                'editAdherent.sit_matri' => 'required',
                'editAdherent.profession' => 'required',
                'editAdherent.adresse_domicile' => 'required',
                'editAdherent.personne_a_prevenir' => 'required',
                'editAdherent.mutuelle_id' => 'required',
                'editAdherent.date_depart' => 'date',
            ];
        }

        return [
            'newAdherent.name' => 'required',
            'newAdherent.type_adhesion' => 'required',
            'newAdherent.tel' => 'required | min:8| max:13 | unique:adherents,tel',
            'newAdherent.code' => 'required | unique:adherents,code',
            'newAdherent.sexe' => 'required',
            'newAdherent.date_naiss' => 'required | date | after: 01/01/1950',
            'newAdherent.lieu_naiss' => 'required',
            'newAdherent.date_inscription' => 'required | date | after: 01/01/2000',
            'newAdherent.sit_matri' => 'required',
            'newAdherent.profession' => 'required',
            'newAdherent.adresse_domicile' => 'required',
            'newAdherent.adresse_service' => 'string',
            'newAdherent.personne_a_prevenir' => 'required',
            'newAdherent.nationalite' => 'required',
        ];
    }

    public function render()
    {
        $pdo = FacadesDB::connection()->getPdo();

        $mutuelles = FacadesDB::select('select id, nom from mutuelles');

        $searchCriteria = "%" . $this->search . "%";

        $data = [
            "adherents" => ModelsAdherent::where("name", "like", $searchCriteria)
                ->orWhere("sexe", "like", $searchCriteria)->paginate(5)
        ];

        return view('livewire.adherents.adherent', $data, compact('mutuelles'))
            ->extends('master')
            ->section('content');
    }

    public function ajouterAdherent()
    {
        $this->currentPage = PAGEAJOUTER;
    }

    public function goToAdherentList()
    {
        $this->currentPage = PAGELISTE;

        $this->newAdherent = [];
    }

    public function addAdherent()
    {
        $validationAttributes = $this->validate();

        ModelsAdherent::create($validationAttributes["newAdherent"]);

        $this->newAdherent = [];

        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Adhérent ajouté avec succès !"]);
    }

    public function goToEdit($id)
    {
        $this->editAdherent = ModelsAdherent::find($id)->toArray();

        $this->currentPage = PAGEEDIT;
    }

    public function updateAdherent()
    {
        $validationAttributes = $this->validate();

        ModelsAdherent::find($this->editAdherent["id"])->update($validationAttributes["editAdherent"]);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Adhérent modifié avec succès !"]);
    }

    public function confirmDelete($name, $id)
    {
        $this->dispatchBrowserEvent("showConfirmMessage", ["message" => [
            "text" => "Voulez-vous vraiment supprimer $name de la liste des adhérents ?",
            "title" => "Etes-vous sûr de continuer ?",
            "type" => "warning",
            "data"  => [
                "adherent_id" => $id
            ]
        ]]);
    }

    public function delete($id)
    {
        if ($id) {
            ModelsAdherent::destroy($id);

            $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Adhérent supprimé avec succès !"]);
        }
    }
}
