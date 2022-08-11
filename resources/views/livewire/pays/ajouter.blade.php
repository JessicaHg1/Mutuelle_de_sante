<div class="card">
            <div class="card-body">
              <h5 class="card-title">Ajouter un pays</h5>

              <!-- General Form Elements -->
              <form role="form" wire:submit.prevent='addPays'>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Pays</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" wire:model='nom'>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Sous-région</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" wire:model='sous_region'>
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Enregistrer</button>
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
