<div class="card">
            <div class="card-body">
              <h5 class="card-title">Enregistrer une cotisation</h5>

              <!-- General Form Elements -->
              <form role="form" wire:submit.prevent='addCotisation'>
                <div class="row mb-3">
                      <label class="col-sm-2 col-form-label">Adhérent</label>
                      <div class="col-sm-10">
                        <select class="form-select" aria-label="Default select example" wire:model='newCotisation.adherent_id'>
                          <option selected>Choisir</option> 
                           @foreach ($adherents as $ad)
                                <option value="{{ $ad->id }}">{{ $ad->name}}</option>
                            @endforeach
                        </select>
                      </div>
                </div>

                <div class="row mb-3">
                      <label class="col-sm-2 col-form-label">Personne à charge</label>
                      <div class="col-sm-10">
                        <select class="form-select" aria-label="Default select example" wire:model='newCotisation.beneficiaire_id'>
                          <option selected>Choisir</option> 
                            @foreach ($beneficiaires as $benef)
                                    <option value="{{ $benef->id }}">{{ $benef->name}}</option>
                            @endforeach
                        </select>
                      </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Date</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" wire:model='newCotisation.date'>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Montant</label>
                  <div class="col-sm-10">
                    <input type="numeric" class="form-control" wire:model='newCotisation.montant'>
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Enregistrer</button>
                  <button type="button" class="btn btn-danger" wire:click='goToCotisationList()'>Retourner à la liste des cotisations</button>
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