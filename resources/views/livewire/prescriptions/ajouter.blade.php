<div class="card">
            <div class="card-body">
              <h5 class="card-title">Ajouter une prescription</h5>

              <!-- General Form Elements -->
              <form role="form" wire:submit.prevent='addPrescription'>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Bénéficiaire</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" wire:model='newPrescription.benef'>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Prescription</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" wire:model='newPrescription.prescription'>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Prestataire</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" wire:model='newPrescription.prestataire_id'>
                        <option selected>Choisir</option> 
                            @foreach ($prestataires as $prestataire)
                                <option value="{{ $prestataire->id }}">{{ $prestataire->nom}}</option>
                            @endforeach
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Date</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" wire:model='newPrescription.date'>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Montant</label>
                  <div class="col-sm-10">
                    <input type="numeric" class="form-control" wire:model='newPrescription.montant'>
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Enregistrer</button>
                  <button type="button" class="btn btn-danger" wire:click="goToPrescriptionList()">Retourner à la liste des prescriptions</button>
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