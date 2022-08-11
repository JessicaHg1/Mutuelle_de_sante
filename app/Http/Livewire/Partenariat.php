<?php

namespace App\Http\Livewire;

use App\Models\Partenariat as ModelsPartenariat;
use Livewire\Component;
use Illuminate\Support\Facades\DB as FacadesDB;

class Partenariat extends Component
{
    protected $paginationTheme = "bootstrap";

    public $search = "";

    public $prestataire_id = "", $mutuelle_id = "", $date = "";
    public $currentPage = PAGELISTE;

    public $rules = [
        'prestataire_id' => 'required|string',
        'mutuelle_id' => 'required|string',
        'date' => 'required',
    ];
    public function render()
    {
        $searchCriteria = "%" . $this->search . "%";

        $pdo = FacadesDB::connection()->getPdo();

        $prestataires = FacadesDB::select('select id, nom from prestataires');

        $mutuelles = FacadesDB::select('select id, nom from mutuelles');

        $data = [
            "conventions" => ModelsPartenariat::where("date", "like", $searchCriteria)->paginate(5)
        ];

        return view('livewire.conventions.partenariat', $data, compact('prestataires', 'mutuelles'))
            ->extends('master')
            ->section('content');
    }

    public function ajouterConvention()
    {
        $this->currentPage = PAGEAJOUTER;
    }

    public function goToConventionList()
    {
        $this->currentPage = PAGELISTE;
    }

    public function addConvention()
    {
        $this->validate();

        ModelsPartenariat::create([
            'prestataire_id' => $this->prestataire_id,
            'mutuelle_id' => $this->mutuelle_id,
            'date' => $this->date,
        ]);

        $this->prestataire_id = "";
        $this->mutuelle_id = "";
        $this->date = "";

        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Convention ajoutée avec succès !"]);
    }
}
