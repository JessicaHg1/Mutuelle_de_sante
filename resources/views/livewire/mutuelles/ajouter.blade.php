<div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Formulaire d'enregistrement d'une mutuelle de santé</h5>

              <!-- General Form Elements -->
              <form role="form" wire:submit.prevent='addMutuelle()'>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-4 col-form-label">Nom</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control @error('newMutuelle.nom') is-invalid 
                      @enderror" wire:model='newMutuelle.nom'>
                    @error('newMutuelle.nom')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-4 col-form-label">Pays</label>
                  <div class="col-sm-8">
                    <select class="form-select @error('newMutuelle.pays_id') is-invalid 
                        @enderror" wire:model='newMutuelle.pays_id' aria-label="Default select example">
                      <option selected>Choisir</option> 
                        @foreach ($pays as $pays)
                          <option value="{{ $pays->id }}">{{ $pays->nom}}</option>
                        @endforeach
                        @error('newMutuelle.pays_id')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </select>  
                  </div>    
                </div>

                <div class="row mb-3">
                  <label class="col-sm-4 col-form-label">Région</label>
                  <div class="col-sm-8">
                    <select class="form-select @error('newMutuelle.region') is-invalid 
                      @enderror" aria-label="Default select example" wire:model='newMutuelle.region'>
                      <option selected="">Choisir</option>
                      <option value="Maritime">Maritime</option>
                      <option value="Plateaux">Plateaux</option>
                      <option value="Centrale">Centrale</option>
                      <option value="Kara">Kara</option>
                      <option value="Savanes">Savanes</option>
                    </select>
                    @error('newMutuelle.region')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-4 col-form-label">Adresse</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control @error('newMutuelle.adresse') is-invalid 
                      @enderror" wire:model='newMutuelle.adresse'>
                      @error('newMutuelle.adresse')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-4 col-form-label">Email</label>
                  <div class="col-sm-8">
                    <input type="email" class="form-control @error('newMutuelle.email') is-invalid 
                      @enderror" wire:model='newMutuelle.email'>
                      @error('newMutuelle.email')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-4 col-form-label">Téléphone</label>
                  <div class="col-sm-8">
                    <input type="numeric" class="form-control @error('newMutuelle.tel') is-invalid 
                      @enderror" wire:model='newMutuelle.tel'>
                    @error('newMutuelle.tel')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                    @enderror  
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-4 col-form-label">Logo</label>
                  <div class="col-sm-8">
                    <input class="form-control" type="file">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-4 col-form-label">Date de création</label>
                  <div class="col-sm-8">
                    <input type="date" class="form-control @error('newMutuelle.date_creation') is-invalid 
                      @enderror" wire:model='newMutuelle.date_creation'>
                      @error('newMutuelle.date_creation')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-4 col-form-label">Nombre de personnes à charge admis</label>
                  <div class="col-sm-8">
                    <input type="muneric" class="form-control @error('newMutuelle.nb_pers_a_charge_admis') is-invalid 
                      @enderror" wire:model='newMutuelle.nb_pers_a_charge_admis'>
                      @error('newMutuelle.nb_pers_a_charge_admis')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-4 col-form-label">Montant d'adhésion</label>
                  <div class="col-sm-8">
                    <div class="input-group">
                      <span class="input-group-text">FCFA</span>
                      <input type="numeric" class="form-control @error('newMutuelle.montant_adhesion') is-invalid 
                      @enderror" wire:model='newMutuelle.montant_adhesion'>
                      @error('newMutuelle.montant_adhesion')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-4 col-form-label">Montant de la cotisation</label>
                  <div class="col-sm-8">
                    <div class="input-group">
                      <span class="input-group-text">FCFA</span>
                      <input type="numeric" class="form-control @error('newMutuelle.montant_cotisation') is-invalid 
                      @enderror" wire:model='newMutuelle.montant_cotisation'>
                      @error('newMutuelle.montant_cotisation')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>  
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-4 col-form-label">Période d'observation</label>
                  <div class="col-sm-8">
                    <div class="input-group">
                      <span class="input-group-text">Mois</span>
                      <input type="numeric" class="form-control @error('newMutuelle.periode_observation') is-invalid 
                      @enderror" wire:model='newMutuelle.periode_observation'>
                      @error('newMutuelle.periode_observation')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div> 
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-4 col-form-label">Périodicité de cotisation</label>
                  <div class="col-sm-8">
                    <div class="input-group">
                      <span class="input-group-text">Mois</span>
                      <input type="numeric" class="form-control @error('newMutuelle.periodicite_cotisation') is-invalid 
                      @enderror" wire:model='newMutuelle.periodicite_cotisation'>
                      @error('newMutuelle.periodicite_cotisation')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>
                </div>

               <div class="text-center">
                  <button type="submit" class="btn btn-primary">Enregistrer</button>
                  <button type="button" class="btn btn-danger" wire:click="goToMutuelleList">Retourner à la liste des mutuelles</button>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

</div>

<script>
    window.addEventListener("showSuccessMessage", event =>{
     Swal.fire({
      position: 'top-end',
      icon: 'success',
      toast:'true',
      title: event.detail.message,
      showConfirmButton: false,
      timer: 3000
    })
  })
</script>