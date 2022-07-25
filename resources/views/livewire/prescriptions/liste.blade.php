<div class="card">
            
                <div class="card-header bg-secondary d-flex align-items-center">
                    <h3 class="card-title flex-grow-1 text-white">
                    <i class="bi bi-list-stars bi-2x"></i>
                    Liste des prescriptions
                    </h3>

                    <div class="card-tools align-items-center">
                        <a class="btn text-white" wire:click.prevent='ajouterPrescription()'>
                            <i class="bi bi-plus-lg"></i>
                            <span>Ajouter une prescription</span>
                        </a>
                    </div>

                    <div class="search-bar">
                        <form class="search-form d-flex align-items-center" method="" action="#">
                            <input type="text" name="query"  wire:model.debounce.250ms='search' placeholder="Recherche" title="Enter search keyword">
                            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                        </form>
                    </div>
                    
                </div>
                
            <div class="card-body table-responsive p-0" style="max-height:300px;">
              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                   <tr>
                    <th scope="col">#</th>
                    <th scope="col">Bénéficiaire</th>
                    <th scope="col">Prestataire</th>
                    <th scope="col">Prescription</th>
                    <th scope="col">Date</th>
                    <th scope="col">Montant</th>
                  </tr>
                </thead>
                <tbody>
                  
                  @foreach ($presciptions as $prescription)
                        <tr>
                            <td>{{ $prescription->id }}</td>
                            <td>{{ $prescription->benef}}</td>
                            <td>{{ $prescription->prestataire->nom }}</td>
                            <td>{{ $prescription->prescription }}</td>
                            <td>{{ $prescription->date }}</td>
                            <td>{{ $prescription->montant }}</td>
                            
                        </tr>
                    @endforeach  

                </tbody>
              </table>
              <!-- End Table with stripped rows -->
            </div> 

            <div  class="card-footer">
                <div  class="float-right">
                    {{ $presciptions->links() }}
                </div> 
            </div>   

</div>
