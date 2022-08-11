<?php

namespace App\Http\Livewire;

use App\Models\Mutuelle as ModelsMutuelle;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Validation\Rule as ValidationRule;
use Illuminate\Support\Facades\DB as FacadesDB;

class Mutuelle extends Component
{
    use WithPagination;

    use WithFileUploads;

    protected $paginationTheme = "bootstrap";

    public $currentPage = PAGELISTE;

    public $search = "";

    public $newMutuelle = [];

    public $addLogo = null;

    public $editMutuelle = [];

    public function rules()
    {
        if ($this->currentPage == PAGEEDIT) {
            return [
                'editMutuelle.nom' => ['required', ValidationRule::unique("mutuelles", "nom")->ignore($this->editMutuelle['id'])],
                'editMutuelle.adresse' => 'required',
                'editMutuelle.region' => 'string',
                'editMutuelle.pays_id' => 'required',
                'editMutuelle.email' =>  ['required', ValidationRule::unique("mutuelles", "email")->ignore($this->editMutuelle['id'])],
                'editMutuelle.montant_cotisation' => 'required',
                'editMutuelle.date_creation' => 'required',
                'editMutuelle.nb_pers_a_charge' => 'required',
                'editMutuelle.montant_adhesion' => 'required',
                'editMutuelle.periode_observation' => 'required',
                'editMutuelle.periodicite_cotisation' => 'required',
                'editMutuelle.tel' => ['required', 'numeric', ValidationRule::unique("mutuelles", "tel")->ignore($this->editMutuelle['id'])],
            ];
        }

        return [
            'newMutuelle.nom' => 'required | unique:mutuelles,nom',
            'newMutuelle.region' => 'string',
            'newMutuelle.pays_id' => 'required',
            'newMutuelle.adresse' => 'required | string',
            'newMutuelle.email' => 'required | unique:mutuelles,email, | max:200',
            'newMutuelle.montant_cotisation' => 'required | numeric',
            'newMutuelle.tel' => 'required | numeric |min:70000000| max:99999999 | unique:mutuelles,tel',
            'newMutuelle.date_creation' => 'required | after: 01/01/1990 ',
            'newMutuelle.nb_pers_a_charge_admis' => 'required | numeric',
            'newMutuelle.montant_adhesion' => 'required | numeric',
            'newMutuelle.periode_observation' => 'required | numeric',
            'newMutuelle.periodicite_cotisation' => 'required | numeric',

        ];
    }

    protected $messages = [
        'newMutuelle.nom.required' => "Le nom de la mutuelle est requis",
        'newMutuelle.pays_id.required' => "Le pays de la mutuelle est requise",
        'newMutuelle.adresse.required' => "L'adresse de la mutuelle est requise",
        'newMutuelle.email.required' => "Le mail la mutuelle est requis",
        'newMutuelle.montant_cotisation.required' => "Le montant de la cotisation de la mutuelle est requis",
        'newMutuelle.tel.required' => "Le numéro de téléphone de la mutuelle est requis",
        'newMutuelle.date_creation.required' => "La date de création de la mutuelle est requise",
        'newMutuelle.nb_pers_a_charge_admis.required' => "Le nombre de personnes à charge admis de la mutuelle est requis",
        'newMutuelle.montant_adhesion.required' => "Le montant d'adhésion de la mutuelle est requis",
        'newMutuelle.periode_observation.required' => "La période d'observation de la mutuelle est requise",
        'newMutuelle.periodicite_cotisation.required' => "La périodicité de cotisation de la mutuelle est requise",
    ];


    public function render()
    {
        $searchCriteria = "%" . $this->search . "%";

        $pdo = FacadesDB::connection()->getPdo();

        $pays = FacadesDB::select('select id, nom from pays');

        $data = [
            "mutuelles" => ModelsMutuelle::where("nom", "like", $searchCriteria)
                ->orWhere("region", "like", $searchCriteria)->paginate(3)
        ];

        return view('livewire.mutuelles.mutuelle', $data, compact('pays'))
            ->extends('master')
            ->section('content');
    }

    public function ajouterMutuelle()
    {
        $this->currentPage = PAGEAJOUTER;
    }

    public function editerMutuelle($id)
    {
        $this->editMutuelle = ModelsMutuelle::find($id)->toArray();

        $this->currentPage = PAGEEDIT;
    }

    public function updateMutuelle()
    {
        $validationAttributes = $this->validate();

        ModelsMutuelle::find($this->editMutuelle["id"])->update($validationAttributes["editMutuelle"]);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Mutuelle modifiée avec succès !"]);
    }

    public function goToMutuelleList()
    {
        $this->currentPage = PAGELISTE;
        $this->newMutuelle = [];
    }

    public function addMutuelle()
    {
        $validationAttributes = $this->validate();

        ModelsMutuelle::create($validationAttributes["newMutuelle"]);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Mutuelle ajoutée avec succès !"]);

        $this->newMutuelle = [];
    }

    public function confirmDelete($name, $id)
    {
        $this->dispatchBrowserEvent("showConfirmMessage", ["message" => [
            "text" => "Voulez-vous vraiment supprimer la $name de la liste des mutuelles ?",
            "title" => "Etes-vous sûr de continuer ?",
            "type" => "warning",
            "data"  => [
                "mutuelle_id" => $id
            ]
        ]]);
    }

    public function delete($id)
    {
        if ($id) {
            ModelsMutuelle::destroy($id);

            $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Mutuelle supprimée avec succès !"]);
        }
    }
}
