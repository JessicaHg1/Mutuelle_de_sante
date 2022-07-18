<div class="card">
            <div class="card-body">
              <h5 class="card-title">Modifier une prestation</h5>

              <!-- General Form Elements -->
              <form role="form" wire:submit.prevent='updatePrestation'>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Prestation</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" wire:model='editPrestation.nom'>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Description</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" style="height: 100px" wire:model='editPrestation.description'></textarea>
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Modifier</button>
                  <button type="button" class="btn btn-danger" wire:click="goToPrestationList">Retourner à la liste des prestations</button>
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