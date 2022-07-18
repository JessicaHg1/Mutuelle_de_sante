<div class="card">
            <div class="card-body">
              <h5 class="card-title">Modifier un prestataire</h5>

              <!-- General Form Elements -->
              <form role="form" wire:submit.prevent='updatePrestataire'>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-4 col-form-label">Nom</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" wire:model='editPrestataire.nom'>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-4 col-form-label">Région</label>
                  <div class="col-sm-8">
                    <select class="form-select" aria-label="Default select example" wire:model='editPrestataire.region'>
                      <option selected="">Choisir</option>
                      <option value="Maritime">Maritime</option>
                      <option value="Plateaux">Plateaux</option>
                      <option value="Centrale">Centrale</option>
                      <option value="Kara">Kara</option>
                      <option value="Savanes">Savanes</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-4 col-form-label">Adresse</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" wire:model='editPrestataire.adresse'>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-4 col-form-label">Téléphone</label>
                  <div class="col-sm-8">
                    <input type="numeric" class="form-control" wire:model='editPrestataire.tel'>
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Modifier</button>
                  <button type="button" class="btn btn-danger" wire:click="goToPrestataireList()">Retourner à la liste des prestataires</button>
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
      title: event.detail.message,
      showConfirmButton: false,
      timer: 3000
    })
  })
</script>