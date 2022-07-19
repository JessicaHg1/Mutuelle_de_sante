<div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Formulaire de modification d'une mutuelle de santé</h5>

              <!-- General Form Elements -->
              <form role="form" wire:submit.prevent='updateMutuelle()'>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-4 col-form-label">Nom</label>
                  <div class="col-sm-8">
                    <input type="text" wire:model='editMutuelle.nom' class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-4 col-form-label">Région</label>
                  <div class="col-sm-8">
                    <select class="form-select" wire:model='editMutuelle.region' aria-label="Default select example">
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
                    <input type="text" wire:model='editMutuelle.adresse' class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-4 col-form-label">Email</label>
                  <div class="col-sm-8">
                    <input type="email" wire:model='editMutuelle.email' class="form-control">
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-4 col-form-label">Téléphone</label>
                  <div class="col-sm-8">
                    <input type="numeric" wire:model='editMutuelle.tel' class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-4 col-form-label">Date de création</label>
                  <div class="col-sm-8">
                    <input type="date" wire:model='editMutuelle.date_creation' class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-4 col-form-label">Nombre de personnes à charge admis</label>
                  <div class="col-sm-8">
                    <input type="nuneric" wire:model='editMutuelle.nb_pers_a_charge_admis' class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-4 col-form-label">Montant d'adhésion</label>
                  <div class="col-sm-8">
                    <input type="nuneric" wire:model='editMutuelle.montant_adhesion' class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-4 col-form-label">Montant de la cotisation</label>
                  <div class="col-sm-8">
                    <input type="nuneric" wire:model='editMutuelle.montant_cotisation' class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-4 col-form-label">Période d'observation</label>
                  <div class="col-sm-6">
                    <input type="nuneric" wire:model='editMutuelle.periode_observation' class="form-control">
                  </div>
                  <div class="col-sm-2">
                    <label for="inputText" class="col-sm-4 col-form-label">(Mois)</label>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-4 col-form-label">Périodicité de cotisation</label>
                  <div class="col-sm-6">
                    <input type="nuneric" wire:model='editMutuelle.periodicite_cotisation' class="form-control">
                  </div>
                  <div class="col-sm-2">
                    <label for="inputText" class="col-sm-4 col-form-label">(Mois)</label>
                  </div>
                </div>

               <div class="text-center">
                  <button type="submit" class="btn btn-primary">Modifier</button>
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