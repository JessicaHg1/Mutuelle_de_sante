<?php

namespace App\Http\Livewire;

use App\Models\Pays as ModelsPays;
use Livewire\Component;
use Livewire\WithPagination;

class Pays extends Component
{
    use WithPagination;

    public $nom;

    public $sous_region;

    public $currentPage = PAGEAJOUTER;

    public $rules = [
        'nom' => 'required|string',
        'sous_region' => 'required|string',
    ];

    public function render()
    {
        return view('livewire.pays.pays')
            ->extends('master')
            ->section('content');
    }

    public function ajouterPays()
    {
        $this->currentPage = PAGEAJOUTER;
    }

    public function goToPaysList()
    {
        $this->currentPage = PAGELISTE;
    }

    public function addPays()
    {
        $this->validate();

        ModelsPays::create([
            'nom' => $this->nom,
            'sous_region' => $this->sous_region,
        ]);

        $this->nom = "";
        $this->sous_region = "";

        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Pays ajouté avec succès !"]);
    }
}
