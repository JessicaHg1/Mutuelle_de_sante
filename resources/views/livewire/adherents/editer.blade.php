<div class="row">
      
      <div class="col-lg-12">
                          <div class="card">
                            <div class="card-body">

                            
                              <h5 class="card-title">Formulaire d'adhésion</h5>

                              <!-- General Form Elements -->
                              <form role="form" wire:submit.prevent='updateAdherent()' class="row g-3">
                                
                                
                                
                                <div class="col-6">
                                    <label for="inputEmail" class="form-label">Nom et prénoms</label>
                                    <input type="text" class="form-control" wire:model='editAdherent.name'>
                                </div>

                                <div class="col-6">
                                  <label class="form-label">Sexe</label>
                                    <select class="form-select" aria-label="Default select example" wire:model='editAdherent.sexe'>
                                      <option selected="">Choisir</option>
                                      <option value="F">Féminin</option>
                                      <option value="M">Masculin</option>
                                    </select>
                                </div>

                                <div class="col-6">
                                  <label for="inputDate" class="form-label">Date de naissance</label>
                                    <input type="date" class="form-control" wire:model='editAdherent.date_naiss'>
                                </div>

                                <div class="col-6">
                                  <label for="inputtext" class="form-label">Lieu de naissance</label>
                                    <input type="text" class="form-control" wire:model='editAdherent.lieu_naiss'>
                                </div>
                              
                                <div class="col-6">
                                  <label for="inputPassword" class="form-label">Nationalité</label>
                                    <input type="text" class="form-control" wire:model='editAdherent.nationalite'>
                                </div>

                                <div class="col-6">
                                  <label for="inputtext" class="form-label">Téléphone</label>
                                    <input type="numeric" class="form-control" wire:model='editAdherent.tel'>
                                </div>

                                <div class="col-6">
                                  <label class="form-label">Situation matrimoniale</label>
                                    <select class="form-select" aria-label="Default select example" wire:model='editAdherent.sit_matri'>
                                      <option selected="">Choisir</option>
                                      <option value="Célibataire">Célibataire</option>
                                      <option value="Marié(e)">Marié(e)</option>
                                      <option value="Veuf(ve)">Veuf(ve)</option>
                                    </select>
                                </div>

                                <div class="col-6">
                                  <label for="inputtext" class="form-label">Profession</label>
                                    <input type="text" class="form-control" wire:model='editAdherent.profession'>
                              </div>

                              <div class="col-6">
                                  <label for="inputtext" class="form-label">Adresse domicile</label>
                                    <input type="text" class="form-control" wire:model='editAdherent.adresse_domicile'>
                              </div>

                              <div class="col-6">
                                  <label for="inputtext" class="form-label">Adresse service</label>
                                    <input type="text" class="form-control" wire:model='editAdherent.adresse_service'>
                              </div>

                              <div class="col-6">
                                      <label class="form-label">Mutuelle</label>
                                        <select class="form-select" wire:model="editAdherent.mutuelle_id" aria-label="Default select example">
                                          <option selected>Choisir</option> 
                                            @foreach ($mutuelles as $mut)
                                                <option value="{{ $mut->id }}">{{ $mut->nom}}</option>
                                            @endforeach
                                        </select>
                              </div>

                              <div class="col-6">
                                  <label for="inputText" class="form-label">Code</label>
                                    <input type="text" class="form-control" wire:model='editAdherent.code'>
                              </div>

                              <div class="col-6">
                                  <label class="form-label">Type d'adhésion</label>
                                    <select class="form-select" aria-label="Default select example" wire:model='editAdherent.type_adhesion'>
                                      <option selected="">Choisir</option>
                                      <option value="Individuelle">Individuelle</option>
                                      <option value="Familiale">Familiale</option>
                                      <option value="Groupe">Groupe</option>
                                    </select>
                              </div>

                              <div class="col-6">
                                  <label for="inputtext" class="form-label">Personne à prévenir</label>
                                    <input type="text" class="form-control" wire:model='editAdherent.personne_a_prevenir'>
                              </div>

                              <div class="col-6">
                                  <label for="inputDate" class="form-label">Date d'incription</label>
                                    <input type="date" class="form-control" wire:model='editAdherent.date_inscription'>
                              </div>

                              <div class="col-6">
                                  <label for="inputDate" class="form-label">Date de départ</label>
                                    <input type="date" class="form-control" wire:model='editAdherent.date_depart'>
                              </div>
                                

                              <div class="text-center">
                                  <button type="submit" class="btn btn-primary">Modifier</button>
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