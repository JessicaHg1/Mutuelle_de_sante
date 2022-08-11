<div>
@if(session()->has('cotisation'))
  <h4>
                            Votre cotisation a été enrégistrée. Veuillez cliquer sur
                            le boutton en bas pour confirmer le paiement et
                            valider la cotisation.
                        </h4>
                        <br />

                        <form action="{{ route('payer_cotisation') }}" method="POST">
                            <script
                                src="https://cdn.fedapay.com/checkout.js?v=1.1.7"
                                data-public-key="pk_sandbox_fB4LNlGerL7qf7vLqni6vvHW"
                                data-button-text="Paiement des {{ session('cotisation')['montant'] }} FCFA"
                                data-button-class="btn btn-primary"
                                data-transaction-amount="{{ session('cotisation')['montant'] }}"
                                data-transaction-description="Dépôt de {{ session('cotisation')['nom'] }}"
                                data-currency-iso="XOF"
                                data-customer-email="email@gmail.com"
                                data-customer-firstname="{{ session('cotisation')['nom'] }}"
                                data-customer-lastname="{{ session('cotisation')['prenom'] }}"
                            ></script>
                        </form>
@else
 <div class="card">
            <div class="card-body">
              <!-- General Form Elements -->
              <form role="form" wire:submit.prevent = "validePayement()">

                <div class="row mb-3">
                      <label class="col-sm-2 col-form-label">Nom</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" wire:model='nom'>
                      </div>
                </div>

                <div class="row mb-3">
                      <label class="col-sm-2 col-form-label">Prénom</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" wire:model='prenom'>
                      </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Date</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" wire:model='date'>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Montant</label>
                  <div class="col-sm-10">
                    <input type="numeric" class="form-control" wire:model='montant'>
                  </div>
                </div>

                <button type="submit" class="btn btn-secondary">Enregistrer</button>

                

              </form><!-- End General Form Elements -->

            </div>
    </div>
@endif
   


</div>
