<div class="card">
            
                <div class="card-header bg-secondary d-flex align-items-center">
                    <h3 class="card-title flex-grow-1 text-white">
                    <i class="bi bi-list-stars bi-2x"></i>
                    Liste des prestations
                    </h3>

                    <div class="card-tools align-items-center">
                        <a class="btn text-white" wire:click.prevent='ajouterPrestation()'>
                            <i class="bi bi-plus-lg"></i>
                            <span>Ajouter une prestation</span>
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
                    <th scope="col">Prestation</th>
                    <th scope="col">Description</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  
                   @foreach ($prestations as $prestation)
                        <tr>
                            <td>{{ $prestation->id }}</td>
                            <td>{{ $prestation->nom }}</td>
                            <td>{{ $prestation->description }}</td>
                            <td class="text-center">
                              <button class="btn btn-link" wire:click='editerPrestation({{ $prestation->id }})'><i class="bi bi-pencil-square"></i></button>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
              </table>
              <!-- End Table with stripped rows -->
            </div> 

            <div  class="card-footer">
                <div  class="float-right">
                    {{ $prestations->links() }}
                </div> 
            </div>   

</div>
