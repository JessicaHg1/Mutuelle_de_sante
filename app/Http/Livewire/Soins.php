<?php

namespace App\Http\Livewire;

use App\Models\Soins as ModelsSoins;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB as FacadesDB;

class Soins extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $currentPage = PAGELISTE;

    public $search = "";

    public $newSoin = [];

    public $rules = [
        'newSoin.date' => 'required ',
        'newSoin.montant' => 'required ',
        'newSoin.prestataire_id' => 'required ',
        'newSoin.prestation_id' => 'required ',
        'newSoin.beneficiaire_id' => 'required ',
    ];

    public function render()
    {
        $prestataires = FacadesDB::select('select id, nom from prestataires');

        $prestations = FacadesDB::select('select id, nom from prestations');

        $beneficiaires = FacadesDB::select('select id, name from beneficiaires');

        $searchCriteria = "%" . $this->search . "%";

        $data = [
            "soins" => ModelsSoins::where("date", "like", $searchCriteria)->paginate(5)
        ];

        return view('livewire.soins.soins', $data, compact('prestations', 'prestataires', 'beneficiaires'))
            ->extends('master')
            ->section('content');
    }

    public function ajouterSoin()
    {
        $this->currentPage = PAGEAJOUTER;

        $this->newSoin = [];
    }

    public function goToSoinList()
    {
        $this->currentPage = PAGELISTE;
    }

    public function addSoin()
    {
        $validationAttributes = $this->validate();

        ModelsSoins::create($validationAttributes["newSoin"]);

        $this->newSoin = [];

        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Opération effectuée avec succès !"]);
    }
}
