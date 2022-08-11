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

    public $name;
    public $tel;
    public $email;
    public $password;
    public $mutuelle_id;
    public $sexe;

    public $editUser = [];

    public $rolePermissions = [];

    public $mut;

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
            'name' => 'required',
            'sexe' => 'required',
            'mutuelle_id' => 'required',
            'tel' => 'required | numeric | min:70000000 | max:99999999 | unique:users,tel',
            'email' => 'required | email | unique:users,email',
            'password' => 'string | min:8',
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

        $user_mutuelle = array_filter($data, function ($user) {
            return $user = auth()->user()->mutuelle->id;
        });

        $mut = auth()->user()->mutuelle->id;

        $usersm = ModelsUser::where('mutuelle_id', $mut)->where(function ($query) {
            $query->where("name", "like", "%" . $this->search . "%")
                ->orWhere("sexe", "like", "%" . $this->search . "%");
        })->paginate(5);

        return view('livewire.users.user', $data, compact('mutuelles', 'mut', 'usersm'))
            ->extends('master')
            ->section('content');
    }

    public function ajouterUser()
    {
        $this->currentPage = PAGEAJOUTER;
    }

    public function addUtilisateur()
    {
        $this->validate();

        ModelsUser::create([
            "name" => $this->name,
            "sexe" => $this->sexe,
            "tel" => $this->tel,
            "email" => $this->email,
            "mutuelle_id" => $this->mutuelle_id,
            "password" => Hash::make($this->password = 'password')
        ]);

        $this->name = "";
        $this->sexe = "";
        $this->email = "";
        $this->mutuelle_id = "";
        $this->tel = "";
        $this->password = "";

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
