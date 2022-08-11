<?php

namespace App\Http\Livewire;

use App\Models\Beneficiaire as ModelsBeneficiaire;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Validation\Rule as ValidationRule;

class Beneficiaire extends Component
{
    use WithPagination;

    use WithFileUploads;

    protected $paginationTheme = "bootstrap";

    public $search = "";

    public $currentPage = PAGELISTE;

    public $code = "";
    public $name = "";
    public $date_naiss = "";
    public $lieu_naiss = "";
    public $date_inscription = "";
    public $nationalite = "";
    public $sexe = "";
    public $adherent_id = "";

    public $editBenef = [];

    public $addPhoto = null;

    public function rules()
    {
        if ($this->currentPage == PAGEEDIT) {
            return [
                'editBenef.code' => ['required', ValidationRule::unique("beneficiaires", "code")->ignore($this->editBenef['id'])],
                'editBenef.name' => 'required',
                'editBenef.date_naiss' => 'required',
                'editBenef.lieu_naiss' => 'required',
                'editBenef.date_inscription' => 'required',
                'editBenef.adherent_id' => 'required',
                'editBenef.nationalite' => 'required',
                'editBenef.sexe' => 'required',

            ];
        }
        return [
            'name' => 'required',
            'code' => 'required | unique:beneficiaires,code',
            'sexe' => 'required',
            'date_naiss' => 'required',
            'lieu_naiss' => 'required',
            'date_inscription' => 'required',
            'adherent_id' => 'integer',
            'nationalite' => 'required',
        ];
    }

    public function render()
    {
        $pdo = FacadesDB::connection()->getPdo();

        $adherents = FacadesDB::select('select id, name from adherents');

        $searchCriteria = "%" . $this->search . "%";

        $mut = auth()->user()->mutuelle->id;

        $ad = FacadesDB::select('select adherents.mutuelle_id from mutuelles 
        join users on mutuelles.id = users.mutuelle_id 
        join adherents on adherents.mutuelle_id = mutuelles.id 
        join beneficiaires on beneficiaires.adherent_id = adherents.id WHERE users.mutuelle_id = adherents.mutuelle_id 
        group by beneficiaires.id');

        $data = [
            "beneficiaires" => ModelsBeneficiaire::where("adherent_id", $mut)->where("name", "like", $searchCriteria)->paginate(5)
        ];

        return view('livewire.beneficiaires.beneficiaire', $data, compact('adherents'))
            ->extends('master')
            ->section('content');
    }

    public function ajouterBeneficiaire()
    {
        $this->currentPage = PAGEAJOUTER;
    }

    public function goToBeneficiaireList()
    {
        $this->currentPage = PAGELISTE;

        $this->name = "";
        $this->sexe = "";
        $this->code = "";
        $this->adherent_id = "";
        $this->date_naiss = "";
        $this->lieu_naiss = "";
        $this->date_inscription = "";
        $this->nationalite = "";
    }


    public function addBeneficiaire()
    {
        $this->validate();

        ModelsBeneficiaire::create([
            "name" => $this->name,
            "sexe" => $this->sexe,
            "code" => $this->code,
            "date_naiss" => $this->date_naiss,
            "lieu_naiss" => $this->lieu_naiss,
            "date_inscription" => $this->date_inscription,
            "nationalite" => $this->nationalite,
            "adherent_id" => $this->adherent_id,

        ]);

        $this->name = "";
        $this->sexe = "";
        $this->code = "";
        $this->adherent_id = "";
        $this->date_naiss = "";
        $this->lieu_naiss = "";
        $this->date_inscription = "";
        $this->nationalite = "";

        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Personne à charge ajoutée avec succès !"]);
    }

    public function editerBeneficiaire($id)
    {
        $this->editBenef = ModelsBeneficiaire::find($id)->toArray();

        $this->currentPage = PAGEEDIT;
    }

    public function updateBeneficiaire()
    {
        $validationAttributes = $this->validate();

        ModelsBeneficiaire::find($this->editBenef["id"])->update($validationAttributes["editBenef"]);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Personne à charge modifiée avec succès !"]);
    }


    public function confirmDelete($name, $id)
    {
        $this->dispatchBrowserEvent("showConfirmMessage", ["message" => [
            "text" => "Voulez-vous vraiment supprimer $name de la liste des persones à charge ?",
            "title" => "Etes-vous sûr de continuer ?",
            "type" => "warning",
            "data"  => [
                "beneficiaire_id" => $id
            ]
        ]]);
    }

    public function delete($id)
    {
        if ($id) {
            ModelsBeneficiaire::destroy($id);

            $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Personne à charge supprimée avec succès !"]);
        }
    }
}
