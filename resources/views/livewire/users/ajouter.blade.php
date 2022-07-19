<div class="card">
    <div class="card-body">
              <h3 class="card-title">Formulaire d'enregistrement d'un utilisateur</h3>

              <!-- General Form Elements -->
              <form role="form" wire:submit.prevent='addUser'>
                
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Nom et prénoms</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" wire:model='newUser.name'>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Sexe</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" wire:model='newUser.sexe'>
                      <option selected="">Choisir</option>
                      <option value="F">Féminin</option>
                      <option value="M">Masculin</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputtext" class="col-sm-2 col-form-label">Téléphone</label>
                  <div class="col-sm-10">
                    <input type="numeric" class="form-control" wire:model='newUser.tel'>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" wire:model='newUser.email'>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Mot de passe</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" wire:model='newUser.password' disabled placeholder='password'>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Mutuelle</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" wire:model='newUser.mutuelle_id'>
                      <option selected>Choisir</option> 
                        @foreach ($mutuelles as $mut)
                          <option value="{{ $mut->id }}">{{ $mut->nom}}</option>
                         @endforeach
                    </select>
                  </div>  
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Enregistrer</button>
                  <button type="button" class="btn btn-danger" wire:click="goToUserList">Retourner à la liste des utilisateurs</button>
                </div>

              </form><!-- End General Form Elements -->

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