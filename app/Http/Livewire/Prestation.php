<?php

namespace App\Http\Livewire;

use App\Models\Prestation as ModelsPrestation;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\Rule as ValidationRule;

class Prestation extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $currentPage = PAGELISTE;

    public $search = "";

    public $newPrestation = [];

    public $editPrestation = [];

    public function rules()
    {
        if ($this->currentPage == PAGEEDIT) {
            return [
                'editPrestation.nom' => ['required', ValidationRule::unique("prestations", "nom")->ignore($this->editPrestation['id'])],
                'editPrestation.description' => 'required',
            ];
        }
        return [
            'newPrestation.nom' => 'required | unique:prestations,nom',
            'newPrestation.description' => 'required'
        ];
    }

    public function render()
    {
        $searchCriteria = "%" . $this->search . "%";

        $data = [
            "prestations" => ModelsPrestation::where("nom", "like", $searchCriteria)
                ->orWhere("description", "like", $searchCriteria)->paginate(5)
        ];

        return view('livewire.prestations.prestation', $data)
            ->extends('master')
            ->section('content');
    }

    public function ajouterPrestation()
    {
        $this->currentPage = PAGEAJOUTER;

        $this->newPrestation = [];
    }

    public function editerPrestation($id)
    {
        $this->editPrestation = ModelsPrestation::find($id)->toArray();

        $this->currentPage = PAGEEDIT;
    }

    public function updatePrestation()
    {
        $validationAttributes = $this->validate();

        ModelsPrestation::find($this->editPrestation["id"])->update($validationAttributes["editPrestation"]);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Prestation modifiée avec succès !"]);
    }

    public function goToPrestationList()
    {
        $this->currentPage = PAGELISTE;
    }

    public function addPrestation()
    {
        $validationAttributes = $this->validate();

        ModelsPrestation::create($validationAttributes["newPrestation"]);

        $this->newPrestation = [];

        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Prestation ajoutée avec succès !"]);
    }
}
