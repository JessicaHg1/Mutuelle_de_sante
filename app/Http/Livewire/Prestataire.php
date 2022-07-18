<?php

namespace App\Http\Livewire;

use App\Models\Prestataire as ModelsPrestataire;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\Rule as ValidationRule;

class Prestataire extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $currentPage = PAGELISTE;

    public $search = "";

    public $newPrestataire = [];

    public $editPrestataire = [];

    public function rules()
    {
        if ($this->currentPage == PAGEEDIT) {
            return [
                'editPrestataire.nom' => ['required', ValidationRule::unique("prestataires", "nom")->ignore($this->editPrestataire['id'])],
                'editPrestataire.tel' => ['required', ValidationRule::unique("prestataires", "tel")->ignore($this->editPrestataire['id'])],
                'editPrestataire.region' => 'required',
                'editPrestataire.adresse' => 'required',
            ];
        }
        return [
            'newPrestataire.nom' => 'required | unique:prestataires,nom',
            'newPrestataire.tel' => 'required | unique:prestataires,tel',
            'newPrestataire.region' => 'required',
            'newPrestataire.adresse' => 'required'
        ];
    }

    public function render()
    {
        $searchCriteria = "%" . $this->search . "%";

        $data = [
            "prestataires" => ModelsPrestataire::where("nom", "like", $searchCriteria)
                ->orWhere("region", "like", $searchCriteria)->paginate(5)
        ];

        return view('livewire.prestataires.prestataire', $data)
            ->extends('master')
            ->section('content');
    }

    public function ajouterPrestataire()
    {
        $this->currentPage = PAGEAJOUTER;

        $this->newPrestataire = [];
    }

    public function editerPrestataire($id)
    {
        $this->editPrestataire = ModelsPrestataire::find($id)->toArray();

        $this->currentPage = PAGEEDIT;
    }

    public function updatePrestataire()
    {
        $validationAttributes = $this->validate();

        ModelsPrestataire::find($this->editPrestataire["id"])->update($validationAttributes["editPrestataire"]);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Prestataire modifié avec succès !"]);
    }

    public function goToPrestataireList()
    {
        $this->currentPage = PAGELISTE;
    }

    public function addPrestataire()
    {
        $validationAttributes = $this->validate();

        ModelsPrestataire::create($validationAttributes["newPrestataire"]);

        $this->newPrestataire = [];

        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Prestataire ajouté avec succès !"]);
    }

    public function confirmDelete($name, $id)
    {
        $this->dispatchBrowserEvent("showConfirmMessage", ["message" => [
            "text" => "Voulez-vous vraiment supprimer le prestataire $name de la liste des prestataires ?",
            "title" => "Etes-vous sûr de continuer ?",
            "type" => "warning",
            "data"  => [
                "prestataire_id" => $id
            ]
        ]]);
    }

    public function delete($id)
    {
        if ($id) {
            ModelsPrestataire::destroy($id);

            $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Prestataire supprimé avec succès !"]);
        }
    }
}
