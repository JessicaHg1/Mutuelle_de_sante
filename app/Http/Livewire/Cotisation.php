<?php

namespace App\Http\Livewire;

use App\Models\Adherent;
use PDF;
use App\Models\Cotisation as ModelsCotisation;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB as FacadesDB;
use Codedge\Fpdf\Fpdf\Fpdf;

class Cotisation extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $currentPage = PAGELISTE;

    public $newCotisation = [];

    public $benef;

    public $mutualistes = null;

    public $rules = [
        'newCotisation.adherent_id' => 'required',
        'newCotisation.beneficiaire_id' => 'required',
        'newCotisation.date' => 'required',
        'newCotisation.montant' => 'required | numeric'
    ];

    public function render()
    {
        $pdo = FacadesDB::connection()->getPdo();

        $beneficiaires = FacadesDB::select('select id, name from adherents');

        $data = [
            "cotisations" => ModelsCotisation::paginate(3)
        ];

        return view('livewire.cotisations.cotisation', $data, compact('beneficiaires'))
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

    public function updated($property)
    {
        if ($property == "newCotisation.adherent_id") {
            $this->mutualistes = Adherent::find($this->newCotisation["adherent_id"])->beneficiaires;
        }
    }

    public function addCotisation()
    {

        $validationAttributes = $this->validate();


        ModelsCotisation::create($validationAttributes['newCotisation']);

        $this->newCotisation = [];

        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Cotisation enregistrée avec succès !"]);
    }

    public function payerCotisation()
    {
        return view('livewire.cotisations.cotiser')
            ->extends('master')
            ->section('content');
    }

    public $fpdf;

    public function __construct()
    {
    }

    public function createPDF()
    {
        $this->fpdf = new Fpdf();
        $this->fpdf->AddPage();
        $this->fpdf->SetFont('Arial', 'B', 18);
        $this->fpdf->Cell(0, 10, "Recu de payement de cotisation", 'TB', 1, 'C');
        $this->fpdf->Cell(0, 10, "Recu N", 0, 1, 'C');
        $this->fpdf->Cell(0, 20, "De");

        $this->fpdf->Ln(15);
        $this->fpdf->SetFont('Arial', 'B', 12);
        $h = 5;

        $this->fpdf->Write($h, "Adresse :\n");
        $this->fpdf->Write($h, "Telephone :\n");
        $this->fpdf->Write($h, "Email :");


        $header = array('Nom et prénom', 'Nombre de bénéficiaires', 'Prix Unitaire', 'Prix total');



        $this->fpdf->Output();
        exit;
    }

    public function rendu()
    {
        return view('livewire.cotisations.reçu');
    }

    public function reçu()
    {
        $mutuelle = FacadesDB::select('select mutuelles.nom, mutuelles.adresse, mutuelles.tel, mutuelles.email
                                        from mutuelles join adherents 
                                        on mutuelles.id = adherents.mutuelle_id');

        $adherent = FacadesDB::select('select adherents.name, adherents.tel, count(beneficiaires.id) 
        from adherents join beneficiaires on beneficiaires.adherent_id = adherents.id
        group by adherents.name, adherents.tel');

        view()->share('mutuelle', 'adherent', $adherent, $mutuelle);

        $pdf = PDF::loadView('livewire.cotisations.reçu', compact('mutuelle', 'adherent'));

        return $pdf->download('reçu.pdf');
    }
}
