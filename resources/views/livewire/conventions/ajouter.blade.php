<div class="card">
            <div class="card-body">
              <h5 class="card-title">Ajouter un pays</h5>

              <!-- General Form Elements -->
              <form role="form" wire:submit.prevent='addConvention()'>

                <div class="row mb-3">
                    <label  class="col-sm-2 col-form-label">Prestataire</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example" wire:model='prestataire_id'>
                                <option selected>Choisir</option> 
                                @foreach ($prestataires as $prestataire)
                                    <option value="{{ $prestataire->id }}">{{ $prestataire->nom}}</option>
                                @endforeach
                            </select>
                        </div>
                </div>

                <div class="row mb-3">
                    <label  class="col-sm-2 col-form-label">Mutuelle</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example" wire:model='mutuelle_id'>
                                <option selected>Choisir</option> 
                                @foreach ($mutuelles as $mutuelle)
                                    <option value="{{ $mutuelle->id }}">{{ $mutuelle->nom}}</option>
                                @endforeach
                            </select>
                        </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Date</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" wire:model='date'>
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Enregistrer</button>
                   <button type="button" class="btn btn-danger" wire:click="goToConventionList">Retourner à la liste des conventions</button>
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
