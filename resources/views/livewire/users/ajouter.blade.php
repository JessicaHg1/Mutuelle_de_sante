<div class="card">
    <div class="card-body">
              <h3 class="card-title">Formulaire d'enregistrement d'un utilisateur</h3>

              <!-- General Form Elements -->
              <form role="form" wire:submit.prevent='addUser()'>
                
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Nom et prénoms</label>
                  <div class="col-sm-10">
                    <input type="text" wire:model='newUser.name' class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Sexe</label>
                  <div class="col-sm-10">
                    <select class="form-select" wire:model='newUser.sexe' aria-label="Default select example">
                      <option selected="">Choisir</option>
                      <option value="F">Féminin</option>
                      <option value="M">Masculin</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputtext" class="col-sm-2 col-form-label">Téléphone</label>
                  <div class="col-sm-10">
                    <input type="numeric" wire:model='newUser.tel' class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" wire:model='newUser.email' class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Mot de passe</label>
                  <div class="col-sm-10">
                    <input type="password" wire:model='newUser.password' class="form-control" placeholder='password' disabled>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Mutuelle</label>
                  <div class="col-sm-10">
                    <select class="form-select" wire:model='newUser.mutuelle_id' aria-label="Default select example">
                      <option selected>Choisir</option> 
                        @foreach ($mutuelles as $mut)
                          <option value="{{ $mut->id }}">{{ $mut->nom}}</option>
                         @endforeach
                    </select>
                  </div>  
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Enregistrer</button>
                  <button type="button" class="btn btn-danger" wire:click="goToUserList()">Retourner à la liste des utilisateurs</button>
                </div>

              </form><!-- End General Form Elements -->

    </div>
</div>
