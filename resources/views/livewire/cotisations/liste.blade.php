<div class="card">
            
                <div class="card-header bg-secondary d-flex align-items-center">
                    <h3 class="card-title flex-grow-1 text-white">
                    <i class="bi bi-list-stars bi-2x"></i>
                    Liste des cotisations
                    </h3>

                    <div class="card-tools align-items-center">
                        <a class="btn text-white" wire:click.prevent='ajouterCotisation()'>
                            <i class="bi bi-plus-lg"></i>
                            <span>Enregistrer une cotisation</span>
                        </a>
                    </div>
                </div>
                
            <div class="card-body table-responsive p-0" style="max-height:300px;">    
              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                   <tr>
                    <th scope="col">#</th>
                    <th scope="col">Bénéficiaire</th>
                    <th scope="col">Date</th>
                    <th scope="col">Montant</th>
                    <th scope="col">Etat</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($cotisations as $cotisation)
                        <tr>
                            <td>{{ $cotisation->id }}</td>
                            <td>{{ !empty($cotisation->adherent) ? $cotisation->adherent->name:'' }}</td>
                            <td>{{ $cotisation->date}}</td>
                            <td>{{ $cotisation->montant }}</td>
                            <td>{{ $cotisation->montant }}</td>
                             <td class="text-center">
                              <button class="btn btn-link" wire:click='reçu()'><i class="bi bi-printer"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
            </div> 

            <div  class="card-footer">
                <div  class="float-right">
                   {{ $cotisations->links() }}
                </div> 
            </div>  

</div>