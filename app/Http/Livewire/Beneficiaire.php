<?php

namespace App\Http\Livewire;

use App\Models\Beneficiaire as ModelsBeneficiaire;
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

    public $newBenef = [];

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
                'editBenef.date_depart' => 'date',
            ];
        }
        return [
            'newBenef.name' => 'required',
            'newBenef.code' => 'required | unique:adherents,code',
            'newBenef.sexe' => 'required',
            'newBenef.date_naiss' => 'required',
            'newBenef.lieu_naiss' => 'required',
            'newBenef.date_inscription' => 'required',
            'newBenef.adherent_id' => 'required',
            'newBenef.nationalite' => 'required',
        ];
    }

    public function render()
    {
        $pdo = FacadesDB::connection()->getPdo();

        $adherents = FacadesDB::select('select id, name from adherents');

        $searchCriteria = "%" . $this->search . "%";

        $data = [
            "beneficiaires" => ModelsBeneficiaire::where("name", "like", $searchCriteria)
                ->orWhere("sexe", "like", $searchCriteria)->paginate(5)
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

        $this->newBenef = [];
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

    public function addBeneficiaire()
    {
        $validationAttributes = $this->validate();

        ModelsBeneficiaire::create($validationAttributes["newBenef"]);

        $this->newBenef = [];

        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Personne à charge ajoutée avec succès !"]);
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
