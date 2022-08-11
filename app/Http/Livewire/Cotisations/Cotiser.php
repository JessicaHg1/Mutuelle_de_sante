<?php

namespace App\Http\Livewire\Cotisations;


use session;
use Livewire\Component;
use App\Models\Cotiser as ModelsCotiser;

class Cotiser extends Component
{
    public $nom, $prenom, $date, $montant, $adherent_id;


    public $rules = [
        'nom' => 'required',
        'prenom' => 'required',
        'date' => 'required',
        'montant' => 'required | numeric'
    ];

    public function render()
    {
        return view('livewire.cotisations.cotiser');
    }

    public function addPayement()
    {


        ModelsCotiser::create([
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'date' => $this->date,
            'montant' => $this->montant
        ]);

        $this->nom = "";
        $this->prenom = "";
        $this->date = "";
        $this->montant = "";
    }

    public function validePayement()
    {
        $this->validate($this->rules);

        $cotisation = [
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'date' => $this->date,
            'montant' => $this->montant
        ];
        session([
            "cotisation" => $cotisation
        ]);

        $this->reset();
    }
}
