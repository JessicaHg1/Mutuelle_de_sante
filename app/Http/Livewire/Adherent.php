<?php

namespace App\Http\Livewire;

use App\Models\Adherent as ModelsAdherent;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Validation\Rule as ValidationRule;
use Illuminate\Support\Facades\DB as FacadesDB;

class Adherent extends Component
{
    use WithPagination;

    use WithFileUploads;

    protected $paginationTheme = "bootstrap";

    public $search = "";

    public $currentPage = PAGELISTE;

    public $code = "";
    public $name = "";
    public $date_naiss = "";
    public $lieu_naiss = "";
    public $date_inscription = "";
    public $profession = "";
    public $nationalite = "";
    public $sexe = "";
    public $sit_matri = "";
    public $adresse_domicile = "";
    public $adresse_service = "";
    public $personne_a_prevenir = "";
    public $type_adhesion = "";
    public $tel = "";

    public $mut;

    public $addPhoto = null;

    public $editAdherent = [];

    public function rules()
    {
        if ($this->currentPage == PAGEEDIT) {
            return [
                'editAdherent.name' => 'required',
                'editAdherent.type_adhesion' => 'required',
                'editAdherent.code' => ['required', ValidationRule::unique("adherents", "code")->ignore($this->editAdherent['id'])],
                'editAdherent.tel' => ['required', ValidationRule::unique("adherents", "tel")->ignore($this->editAdherent['id'])],
                'editAdherent.sexe' => 'required',
                'editAdherent.date_naiss' => 'required',
                'editAdherent.lieu_naiss' => 'required',
                'editAdherent.nationalite' => 'required',
                'editAdherent.date_inscription' => 'required',
                'editAdherent.sit_matri' => 'required',
                'editAdherent.profession' => 'required',
                'editAdherent.adresse_domicile' => 'required',
                'editAdherent.personne_a_prevenir' => 'required',
                'editAdherent.mutuelle_id' => 'required',
            ];
        }

        return [
            'name' => 'required',
            'type_adhesion' => 'required',
            'tel' => 'required | unique:adherents,tel',
            'code' => 'required | unique:adherents,code',
            'sexe' => 'required',
            'date_naiss' => 'required',
            'lieu_naiss' => 'required',
            'date_inscription' => 'required',
            'sit_matri' => 'required',
            'profession' => 'required',
            'adresse_domicile' => 'required',
            'adresse_service' => 'string',
            'personne_a_prevenir' => 'required',
            'nationalite' => 'required',

        ];
    }

    public function render()
    {
        $pdo = FacadesDB::connection()->getPdo();

        $mutuelles = FacadesDB::select('select id, nom from mutuelles');

        $searchCriteria = "%" . $this->search . "%";

        $mut = auth()->user()->mutuelle->id;

        $data = [
            "adherents" => ModelsAdherent::where("mutuelle_id", $mut)->where("name", "like", $searchCriteria)->paginate(5)
        ];
        return view('livewire.adherents.adherent', $data, compact('mutuelles'))
            ->extends('master')
            ->section('content');
    }

    public function ajouterAdherent()
    {
        $this->currentPage = PAGEAJOUTER;
    }

    public function goToAdherentList()
    {
        $this->currentPage = PAGELISTE;

        $this->name = "";
        $this->sexe = "";
        $this->code = "";
        $this->tel = "";
        $this->date_naiss = "";
        $this->lieu_naiss = "";
        $this->date_inscription = "";
        $this->profession = "";
        $this->nationalite = "";
        $this->adresse_domicile = "";
        $this->adresse_service = "";
        $this->personne_a_prevenir = "";
        $this->type_adhesion = "";
        $this->sit_matri = "";
    }

    public function addAdherent()
    {
        $this->validate();

        ModelsAdherent::create([
            "name" => $this->name,
            "sexe" => $this->sexe,
            "tel" => $this->tel,
            "code" => $this->code,
            "date_naiss" => $this->date_naiss,
            "lieu_naiss" => $this->lieu_naiss,
            "date_inscription" => $this->date_inscription,
            "profession" => $this->profession,
            "nationalite" => $this->nationalite,
            "adresse_domicile" => $this->adresse_domicile,
            "adresse_service" => $this->adresse_service,
            "personne_a_prevenir" => $this->personne_a_prevenir,
            "type_adhesion" => $this->type_adhesion,
            "sit_matri" => $this->sit_matri,
            "mutuelle_id" => ($this->mutuelle_id = auth()->user()->mutuelle->id)
        ]);

        $this->name = "";
        $this->sexe = "";
        $this->code = "";
        $this->tel = "";
        $this->date_naiss = "";
        $this->lieu_naiss = "";
        $this->date_inscription = "";
        $this->profession = "";
        $this->nationalite = "";
        $this->adresse_domicile = "";
        $this->adresse_service = "";
        $this->personne_a_prevenir = "";
        $this->type_adhesion = "";
        $this->sit_matri = "";


        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Adhérent ajouté avec succès !"]);
    }
}
