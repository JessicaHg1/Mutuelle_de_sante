<?php

namespace App\Http\Livewire;

use App\Models\Prescription as ModelsPrescription;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB as FacadesDB;

class Prescription extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $currentPage = PAGELISTE;

    public $search = "";

    public $newPrescription = [];

    public $rules = [
        'newPrescription.date' => 'required ',
        'newPrescription.montant' => 'required ',
        'newPrescription.prestataire_id' => 'required ',
        'newPrescription.prestation_id' => 'string ',
        'newPrescription.benef' => 'required ',
        'newPrescription.prescription' => 'required ',
    ];

    public function render()
    {
        $prestataires = FacadesDB::select('select id, nom from prestataires');

        $prestations = FacadesDB::select('select id, nom from prestations');

        $searchCriteria = "%" . $this->search . "%";

        $data = [
            "presciptions" => ModelsPrescription::where("benef", "like", $searchCriteria)
                ->orWhere("date", "like", $searchCriteria)->paginate(5)
        ];

        return view('livewire.prescriptions.prescription', $data, compact('prestations', 'prestataires'))
            ->extends('master')
            ->section('content');
    }

    public function ajouterPrescription()
    {
        $this->currentPage = PAGEAJOUTER;

        $this->newPrescription = [];
    }

    public function goToPrescriptionList()
    {
        $this->currentPage = PAGELISTE;
    }

    public function addPrescription()
    {
        $validationAttributes = $this->validate();

        ModelsPrescription::create($validationAttributes["newPrescription"]);

        $this->newPrescription = [];

        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Opération effectuée avec succès !"]);
    }
}
