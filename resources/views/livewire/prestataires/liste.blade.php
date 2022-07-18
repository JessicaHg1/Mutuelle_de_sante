<div class="card">
            
                <div class="card-header bg-secondary d-flex align-items-center">
                    <h3 class="card-title flex-grow-1 text-white">
                    <i class="bi bi-list-stars bi-2x"></i>
                    Liste des prestataires
                    </h3>

                    <div class="card-tools align-items-center">
                        <a class="btn text-white" wire:click.prevent='ajouterPrestataire()'>
                            <i class="bi bi-plus-lg"></i>
                            <span>Ajouter un prestataire</span>
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
                    <th scope="col">Prestataire</th>
                    <th scope="col">Région</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Téléphone</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  
                   @foreach ($prestataires as $prestataire)
                        <tr>
                            <td>{{ $prestataire->id }}</td>
                            <td>{{ $prestataire->nom }}</td>
                            <td>{{ $prestataire->region }}</td>
                            <td>{{ $prestataire->adresse }}</td>
                            <td>{{ $prestataire->tel }}</td>
                            <td class="text-center">
                              <button class="btn btn-link" wire:click='editerPrestataire({{ $prestataire->id }})'><i class="bi bi-pencil-square"></i></button>
                              <button class="btn btn-link" wire:click='confirmDelete("{{ $prestataire->nom }}", {{ $prestataire->id }})'><i class="bi bi-trash-fill"></i></button>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
              </table>
              <!-- End Table with stripped rows -->
            </div> 

            <div  class="card-footer">
                <div  class="float-right">
                    {{ $prestataires->links() }}
                </div> 
            </div>  

</div>
<script>
    window.addEventListener("showConfirmMessage", event => {
        Swal.fire({
          title: event.detail.message.title,
          text: event.detail.message.text,
          icon: event.detail.message.type,
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Supprimer',
          cancelButtonText: 'Annuler',
        }).then((result) => {
          if (result.isConfirmed) {
            @this.delete( event.detail.message.data.prestataire_id)
          }
        })
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

    })
</script>