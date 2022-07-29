<div class="row">
      
      <div class="col-lg-12">
                          <div class="card">
                            <div class="card-body">

                            
                              <h5 class="card-title">Formulaire d'adhésion</h5>

                              <!-- General Form Elements -->
                              <form role="form" wire:submit.prevent='addAdherent()' class="row g-3">
                                <div class="col-6">
                                    <label for="inputEmail" class="form-label">Nom et prénoms</label>
                                    <input type="text" class="form-control @error('newAdherent.name') is-invalid 
                                    @enderror" wire:model='newAdherent.name'>
                                    @error('newAdherent.name')
                                      <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                </div>

                                <div class="col-6">
                                  <label class="form-label">Sexe</label>
                                    <select class="form-select @error('newAdherent.sexe') is-invalid 
                                    @enderror" aria-label="Default select example" wire:model='newAdherent.sexe'>
                                      <option selected="">Choisir</option>
                                      <option value="F">Féminin</option>
                                      <option value="M">Masculin</option>
                                    </select>
                                    @error('newAdherent.sexe')
                                      <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                </div>

                                <div class="col-6">
                                  <label for="inputDate" class="form-label">Date de naissance</label>
                                    <input type="date" class="form-control @error('newAdherent.date_naiss') is-invalid 
                                    @enderror" wire:model='newAdherent.date_naiss'>
                                    @error('newAdherent.date_naiss')
                                      <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                </div>

                                <div class="col-6">
                                  <label for="inputtext" class="form-label">Lieu de naissance</label>
                                    <input type="text" class="form-control @error('newAdherent.lieu_naiss') is-invalid 
                                    @enderror" wire:model='newAdherent.lieu_naiss'>
                                    @error('newAdherent.lieu_naiss')
                                      <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                </div>
                              
                                <div class="col-6">
                                  <label for="inputPassword" class="form-label">Nationalité</label>
                                    <input type="text" class="form-control @error('newAdherent.nationalite') is-invalid 
                                    @enderror" wire:model='newAdherent.nationalite'>
                                    @error('newAdherent.nationalite')
                                      <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                </div>

                                <div class="col-6">
                                  <label for="inputtext" class="form-label">Téléphone</label>
                                    <input type="numeric" class="form-control @error('newAdherent.tel') is-invalid 
                                    @enderror" wire:model='newAdherent.tel'>
                                    @error('newAdherent.tel')
                                      <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                </div>

                                <div class="col-6">
                                  <label class="form-label">Situation matrimoniale</label>
                                    <select class="form-select @error('newAdherent.sit_matri') is-invalid 
                                    @enderror" aria-label="Default select example" wire:model='newAdherent.sit_matri'>
                                      <option selected="">Choisir</option>
                                      <option value="Célibataire">Célibataire</option>
                                      <option value="Marié(e)">Marié(e)</option>
                                      <option value="Veuf(ve)">Veuf(ve)</option>
                                    </select>
                                    @error('newAdherent.sit_matri')
                                      <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                </div>

                                <div class="col-6">
                                  <label for="inputtext" class="form-label">Profession</label>
                                    <input type="text" class="form-control @error('newAdherent.profession') is-invalid 
                                    @enderror" wire:model='newAdherent.profession'>
                                    @error('newAdherent.profession')
                                      <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                              </div>

                              <div class="col-6">
                                  <label for="inputtext" class="form-label">Adresse domicile</label>
                                    <input type="text" class="form-control @error('newAdherent.adresse_domicile') is-invalid 
                                    @enderror" wire:model='newAdherent.adresse_domicile'>
                                    @error('newAdherent.adresse_domicile')
                                      <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                              </div>

                              <div class="col-6">
                                  <label for="inputtext" class="form-label">Adresse service</label>
                                    <input type="text" class="form-control @error('newAdherent.adresse_service') is-invalid 
                                    @enderror" wire:model='newAdherent.adresse_service'>
                                    @error('newAdherent.adresse_service')
                                      <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                              </div>

                              <div class="col-6">
                                  <label for="inputText" class="form-label">Code</label>
                                    <input type="text" class="form-control @error('newAdherent.code') is-invalid 
                                    @enderror" wire:model='newAdherent.code'>
                                    @error('newAdherent.code')
                                      <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                              </div>

                              <div class="col-6">
                                  <label class="form-label">Type d'adhésion</label>
                                    <select class="form-select @error('newAdherent.type_adhesion') is-invalid 
                                    @enderror" aria-label="Default select example" wire:model='newAdherent.type_adhesion'>
                                      <option selected="">Choisir</option>
                                      <option value="Individuelle">Individuelle</option>
                                      <option value="Familiale">Familiale</option>
                                      <option value="Groupe">Groupe</option>
                                    </select>
                                    @error('newAdherent.type_adhesion')
                                      <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                              </div>

                              <div class="col-6">
                                  <label for="inputtext" class="form-label">Personne à prévenir</label>
                                    <input type="text" class="form-control @error('newAdherent.personne_a_prevenir') is-invalid 
                                    @enderror" wire:model='newAdherent.personne_a_prevenir'>
                                    @error('newAdherent.personne_a_prevenir')
                                      <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                              </div>

                              <div class="col-6">
                                  <label for="inputDate" class="form-label">Date d'incription</label>
                                    <input type="date" class="form-control @error('newAdherent.date_inscription') is-invalid 
                                    @enderror" wire:model='newAdherent.date_inscription'>
                                    @error('newAdherent.date_inscription')
                                      <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                              </div>
                                

                              <div class="text-center">
                                  <button type="submit" class="btn btn-primary">Enregistrer</button>
                                  <button type="button" class="btn btn-danger" wire:click="goToAdherentList()">Retourner à la liste des adhérents</button>
                              </div>

                              </form><!-- End General Form Elements -->

                            </div>
                          </div>

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
      title: event.detail.message,
      showConfirmButton: false,
      timer: 3000
    })
  })
</script>