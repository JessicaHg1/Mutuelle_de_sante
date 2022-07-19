<div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Formulaire d'enregistrement d'une mutuelle de santé</h5>

              <!-- General Form Elements -->
              <form role="form" wire:submit.prevent='addMutuelle'>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-4 col-form-label">Nom</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" wire:model='newMutuelle.nom'>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-4 col-form-label">Région</label>
                  <div class="col-sm-8">
                    <select class="form-select" aria-label="Default select example" wire:model='newMutuelle.region'>
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
                    <input type="text" class="form-control" wire:model='newMutuelle.adresse'>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-4 col-form-label">Email</label>
                  <div class="col-sm-8">
                    <input type="email" class="form-control" wire:model='newMutuelle.email'>
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-4 col-form-label">Téléphone</label>
                  <div class="col-sm-8">
                    <input type="numeric" class="form-control" wire:model='newMutuelle.tel'>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-4 col-form-label">Logo</label>
                  <div class="col-sm-8">
                    <input class="form-control" type="file" wire:model='addLogo'>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-4 col-form-label">Date de création</label>
                  <div class="col-sm-8">
                    <input type="date" class="form-control" wire:model='newMutuelle.date_creation'>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-4 col-form-label">Nombre de personnes à charge admis</label>
                  <div class="col-sm-8">
                    <input type="muneric" class="form-control" wire:model='newMutuelle.nb_pers_a_charge_admis'>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-4 col-form-label">Montant d'adhésion</label>
                  <div class="col-sm-8">
                    <input type="muneric" class="form-control" wire:model='newMutuelle.montant_adhesion'>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-4 col-form-label">Montant de la cotisation</label>
                  <div class="col-sm-8">
                    <input type="muneric" class="form-control" wire:model='newMutuelle.montant_cotisation'>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-4 col-form-label">Période d'observation</label>
                  <div class="col-sm-6">
                    <input type="muneric" class="form-control" wire:model='newMutuelle.periode_observation'>
                  </div>
                  <div class="col-sm-2">
                    <label for="inputText" class="col-sm-4 col-form-label">(Mois)</label>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-4 col-form-label">Périodicité de cotisation</label>
                  <div class="col-sm-6">
                    <input type="muneric" class="form-control" wire:model='newMutuelle.periodicite_cotisation'>
                  </div>
                  <div class="col-sm-2">
                    <label for="inputText" class="col-sm-4 col-form-label">(Mois)</label>
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
      title: event.detail.message || "Opération effectuée avec succès !",
      showConfirmButton: false,
      timer: 3000
    })
  })
</script>