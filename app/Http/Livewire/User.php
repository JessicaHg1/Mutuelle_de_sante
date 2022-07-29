<?php

namespace App\Http\Livewire;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User as ModelsUser;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\Rule as ValidationRule;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Hash;

class User extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $currentPage = PAGELISTE;

    public $search = "";

    public $newUser = [];

    public $editUser = [];

    public $rolePermissions = [];

    public function rules()
    {
        if ($this->currentPage == PAGEEDIT) {
            return [
                'editUser.name' => 'required',
                'editUser.sexe' => 'required',
                'editUser.mutuelle_id' => 'required',
                'editUser.tel' => ['required', 'numeric', 'min:8', 'max:15', ValidationRule::unique("users", "tel")->ignore($this->editUser['id'])],
                'editUser.email' => ['required', 'email', ValidationRule::unique("users", "email")->ignore($this->editUser['id'])],
            ];
        }
        return [
            'newUser.name' => ['required'],
            'newUser.sexe' => ['required'],
            'newUser.mutuelle_id' => ['required'],
            'newUser.tel' => ['required', 'numeric', 'min:8', 'max:15', 'unique:users,tel'],
            'newUser.email' => ['required', 'email',  'unique:users,email'],
            'newUser.password' => ['string', 'min:8'],
        ];
    }

    public function render()
    {
        $searchCriteria = "%" . $this->search . "%";

        $mutuelles = FacadesDB::select('select id, nom from mutuelles');

        $data = [
            "users" => ModelsUser::where("name", "like", $searchCriteria)
                ->orWhere("sexe", "like", $searchCriteria)->paginate(5)
        ];

        return view('livewire.users.user', $data, compact('mutuelles'))
            ->extends('master')
            ->section('content');
    }

    public function ajouterUser()
    {
        $this->currentPage = PAGEAJOUTER;
    }

    public function addUser()
    {
        $validationAttributes = $this->validate();

        ModelsUser::create([
            "name" => $validationAttributes["newUser"]["name"],
            "sexe" => $validationAttributes["newUser"]["sexe"],
            "tel" => $validationAttributes["newUser"]["tel"],
            "email" => $validationAttributes["newUser"]["email"],
            "mutuelle_id" => $validationAttributes["newUser"]["mutuelle_id"],
            "password" => Hash::make($validationAttributes["newUser"]["password"] = 'password')
        ]);

        $this->newUser = [];

        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Utilisateur ajouté avec succès !"]);
    }

    public function editerUser($id)
    {
        $this->editUser = ModelsUser::find($id)->toArray();

        $this->currentPage = PAGEEDIT;

        $this->populateRolePermissions();
    }

    public function populateRolePermissions()
    {
        $this->rolePermissions["roles"] = [];
        $this->rolePermissions["permissions"] = [];

        $mapForCB = function ($value) {
            return $value["id"];
        };

        $roles = array_map($mapForCB, ModelsUser::find($this->editUser["id"])->role->toArray());
        $permissions = array_map($mapForCB, ModelsUser::find($this->editUser["id"])->permission->toArray());

        foreach (Role::all() as $role) {
            if (in_array($role->id, $roles)) {
                array_push($this->rolePermissions["roles"], ["role_id" => $role->id, "role_nom" => $role->nom, "active" => true]);
            } else {
                array_push($this->rolePermissions["roles"], ["role_id" => $role->id, "role_nom" => $role->nom, "active" => false]);
            }
        }

        foreach (Permission::all() as $permission) {
            if (in_array($permission->id, $permissions)) {
                array_push($this->rolePermissions["permissions"], ["permission_id" => $permission->id, "permission_nom" => $permission->nom, "active" => true]);
            } else {
                array_push($this->rolePermissions["permissions"], ["permission_id" => $permission->id, "permission_nom" => $permission->nom, "active" => false]);
            }
        }
    }

    public function updateRolePermission()
    {
        FacadesDB::table("user_role")->where("user_id", $this->editUser["id"])->delete();
        FacadesDB::table("user_permission")->where("user_id", $this->editUser["id"])->delete();

        foreach ($this->rolePermissions["roles"] as $role) {
            if ($role["active"]) {
                ModelsUser::find($this->editUser["id"])->role()->attach($role["role_id"]);
            }
        }

        foreach ($this->rolePermissions["permissions"] as $permission) {
            if ($permission["active"]) {
                ModelsUser::find($this->editUser["id"])->permission()->attach($permission["permission_id"]);
            }
        }

        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Rôle et permission mis à jour avec succès !"]);
    }

    public function updateUser()
    {
        $validationAttributes = $this->validate();

        ModelsUser::find($this->editUser["id"])->update($validationAttributes["editUser"]);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Utilisateur modifié avec succès !"]);
    }

    public function goToUserList()
    {
        $this->currentPage = PAGELISTE;
        $this->editUser = [];
    }

    public function confirmDelete($name, $id)
    {
        $this->dispatchBrowserEvent("showConfirmMessage", ["message" => [
            "text" => "Voulez-vous vraiment supprimer $name de la liste des utilisaturs ?",
            "title" => "Etes-vous sûr de continuer ?",
            "type" => "warning",
            "data"  => [
                "user_id" => $id
            ]
        ]]);
    }

    public function delete($id)
    {
        if ($id) {
            ModelsUser::destroy($id);

            $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Utilisateur supprimé avec succès !"]);
        }
    }
}
