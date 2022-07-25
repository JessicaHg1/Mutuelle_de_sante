<?php

namespace App\Http\Livewire;

use App\Models\Cotisation as ModelsCotisation;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB as FacadesDB;

class Cotisation extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $currentPage = PAGELISTE;

    public $newCotisation = [];

    public $rules = [
        'newCotisation.adherent_id' => 'required',
        'newCotisation.beneficiaire_id' => 'required',
        'newCotisation.date' => 'required',
        'newCotisation.montant' => 'required | numeric'
    ];

    public function render()
    {
        $pdo = FacadesDB::connection()->getPdo();

        $adherents = FacadesDB::select('select id, name from adherents');

        $beneficiaires = FacadesDB::select('select id, name from beneficiaires');

        $data = [
            "cotisations" => ModelsCotisation::paginate(3)
        ];

        return view('livewire.cotisations.cotisation', $data, compact('adherents', 'beneficiaires'))
            ->extends('master')
            ->section('content');
    }

    public function ajouterCotisation()
    {
        $this->currentPage = PAGEAJOUTER;
    }

    public function goToCotisationList()
    {
        $this->currentPage = PAGELISTE;
    }

    public function addCotisation()
    {
        $validationAttributes = $this->validate();

        ModelsCotisation::create($validationAttributes['newCotisation']);

        $this->newCotisation = [];

        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Cotisation enregistrée avec succès !"]);
    }
}
