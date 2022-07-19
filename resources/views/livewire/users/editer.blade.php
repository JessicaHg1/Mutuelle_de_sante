<div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body"> 

              <h3 class="card-title">Formulaire d'édition d'un utilisateur</h3>

                <!-- General Form Elements -->
                <form role="form" wire:submit.prevent='updateUser()'>
                  
                  <div class="row mb-5">
                    <label for="inputText" class="col-sm-4 col-form-label">Nom et prénoms</label>
                    <div class="col-sm-8">
                      <input type="text" wire:model='editUser.name' class="form-control">
                    </div>
                  </div>

                  <div class="row mb-5">
                    <label class="col-sm-4 col-form-label">Sexe</label>
                    <div class="col-sm-8">
                      <select class="form-select" wire:model='editUser.sexe' aria-label="Default select example">
                        <option selected="">Choisir</option>
                        <option value="F">Féminin</option>
                        <option value="M">Masculin</option>
                      </select>
                    </div>
                  </div>

                  <div class="row mb-5">
                    <label for="inputtext" class="col-sm-4 col-form-label">Téléphone</label>
                    <div class="col-sm-8">
                      <input type="numeric" wire:model='editUser.tel' class="form-control">
                    </div>
                  </div>

                  <div class="row mb-5">
                    <label for="inputEmail" class="col-sm-4 col-form-label">Email</label>
                    <div class="col-sm-8">
                      <input type="email" wire:model='editUser.email' class="form-control" >
                    </div>
                  </div>

                <div class="row mb-5">
                  <label class="col-sm-4 col-form-label">Mutuelle</label>
                  <div class="col-sm-8">
                    <select class="form-select" wire:model='editUser.mutuelle_id' aria-label="Default select example" >
                      <option selected>Choisir</option> 
                        @foreach ($mutuelles as $mut)
                          <option value="{{ $mut->id }}">{{ $mut->nom}}</option>
                         @endforeach
                    </select>
                  </div>  
                </div>

                  <div class="center">
                    <button type="submit" class="btn btn-primary">Modifier</button>
                    <button type="button" class="btn btn-danger" wire:click="goToUserList">Retourner à la liste des utilisateurs</button>
                  </div>

                </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>

        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Rôles et permissions</h4>
                  <div class="p-3">
                    <table class="table">
                      <thead>
                        <th>Rôles<th>
                      </thead>
                      <tbody>
                      @foreach ($rolePermissions["roles"] as $role)
                        <tr>
                          <td>{{ $role["role_nom"] }}</td>
                          <td class="center">
                            <div class="form-check form-switch">
                              <input class="form-check-input" type="checkbox" wire:model.lazy='rolePermissions.roles.{{ $loop->index }}.active'
                              id="flexSwitchCheckDefault{{ $role['role_id'] }}"
                              @if ($role["active"])
                                checked
                              @endif>
                              <label class="form-check-label" for="flexSwitchCheckDefault{{ $role['role_id'] }}">{{ $role["active"]? "Activé" : "Désactivé" }}</label>  
                            </div>
                          </td>
                        </tr>
                      @endforeach  
                      </tbody>
                    </table>
                  </div>

                  <div class="p-3">
                    <table class="table">
                      <thead>
                        <th>Permissions<th>
                      </thead>
                      <tbody>
                      @foreach ($rolePermissions["permissions"] as $permission) 
                        <tr>
                          <td>{{ $permission["permission_nom"] }}</td>
                          <td class="center">
                            <div class="form-check form-switch">
                              <input class="form-check-input" type="checkbox" wire:model.lazy='rolePermissions.permissions.{{ $loop->index }}.active'
                              id="flexSwitchCheckDefault{{ $permission['permission_id'] }}"
                              @if ($permission["active"])
                                checked
                              @endif>
                              <label class="form-check-label" for="flexSwitchCheckDefault{{ $permission['permission_id'] }}">{{ $permission["active"]? "Activé" : "Désactivé" }}</label>  
                            </div>
                          </td>
                        </tr>
                      @endforeach  
                      </tbody>
                    </table>
                  </div>
                  <button type="submit" class="btn btn-success" wire:click='updateRolePermission'>Appliquer les modifications</button>

            </div>
          </div>
        </div>
</div>


<script>
    window.addEventListener("showSuccessMessage", event =>{
     Swal.fire({
      position: 'top-end',
      icon: 'success',
      toast:'true',
      title: event.detail.message || "Opération effectuée avec succès !",
      showConfirmButton: false,
      timer: 3000
    })
  })
</script>