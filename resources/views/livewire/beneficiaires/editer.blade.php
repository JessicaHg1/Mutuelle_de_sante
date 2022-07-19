<div class="row">
      
      <div class="col-lg-12">
                          <div class="card">
                            <div class="card-body">

                              <h5 class="card-title">Formulaire de modification d'une personne à charge</h5>

                              <!-- General Form Elements -->
                              <form role="form" wire:submit.prevent='updateBeneficiaire()' class="row g-3">
                                
                                <div class="col-6">
                                    <label for="inputEmail" class="form-label">Nom et prénoms</label>
                                    <input type="text" class="form-control" wire:model='editBenef.name'>
                                </div>

                                <div class="col-6">
                                  <label class="form-label">Sexe</label>
                                    <select class="form-select" aria-label="Default select example" wire:model='editBenef.sexe'>
                                      <option selected="">Choisir</option>
                                      <option value="F">Féminin</option>
                                      <option value="M">Masculin</option>
                                    </select>
                                </div>

                                <div class="col-6">
                                  <label for="inputDate" class="form-label">Date de naissance</label>
                                    <input type="date" class="form-control" wire:model='editBenef.date_naiss'>
                                </div>

                                <div class="col-6">
                                  <label for="inputtext" class="form-label">Lieu de naissance</label>
                                    <input type="text" class="form-control" wire:model='editBenef.lieu_naiss'>
                                </div>
                              
                                <div class="col-6">
                                  <label for="inputPassword" class="form-label">Nationalité</label>
                                    <input type="text" class="form-control" wire:model='editBenef.nationalite'>
                                </div>

                              <div class="col-6">
                                      <label class="form-label">Adhérent</label>
                                        <select class="form-select" wire:model='editBenef.adherent_id' aria-label="Default select example">
                                          <option selected>Choisir</option> 
                                            @foreach ($adherents as $ad)
                                                <option value="{{ $ad->id }}">{{ $ad->name}}</option>
                                            @endforeach
                                        </select>
                              </div>

                              <div class="col-6">
                                  <label for="inputDate" class="form-label">Date d'incription</label>
                                    <input type="date" class="form-control" wire:model='editBenef.date_inscription'>
                              </div>

                              <div class="col-6">
                                  <label for="inputText" class="form-label">Code</label>
                                    <input type="text" class="form-control" wire:model='editBenef.code'>
                              </div>

                              <div class="col-6">
                                  <label for="inputDate" class="form-label">Date de départ</label>
                                    <input type="date" class="form-control" wire:model='editBenef.date_depart'>
                              </div>

                              <div class="text-center">
                                  <button type="submit" class="btn btn-primary">Modifier</button>
                                  <button type="button" class="btn btn-danger" wire:click="goToBeneficiaireList">Retourner à la liste des personnes à charge</button>
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