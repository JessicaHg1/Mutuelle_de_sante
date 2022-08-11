<div class="card">
            
                <div class="card-header bg-secondary d-flex align-items-center">
                    <h3 class="card-title flex-grow-1 text-white">
                    <i class="bi bi-list-stars bi-2x"></i>
                    Liste des bénéficiaires
                    </h3>

                    <div class="card-tools align-items-center">
                        <a class="btn text-white" wire:click.prevent='ajouterBeneficiaire()'>
                            <i class="bi bi-person-plus-fill"></i>
                            <span>Nouvelle personne à charge</span>
                        </a>
                    </div>

                    <div class="search-bar">
                        <form class="search-form d-flex align-items-center" method="" action="#">
                            <input type="text" name="query" wire:model.debounce.250ms='search' placeholder="Recherche" title="Enter search keyword">
                            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                        </form>
                    </div>
                    
                </div>
                
            <div class="card-body table-responsive p-0" style="max-height:300px;">
              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Nom et prénoms</th>
                    <th scope="col">Sexe</th>
                    <th scope="col">Date d'inscrition</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                 
                  @foreach ($beneficiaires as $benef)
                        <tr>
                            <td>
                              @if ($benef->photo != "" || $benef->photo !=null)
                                <img src="{{ asset('storage/'.$benef->photo) }}" style="height: 60px; width: 60px;">
                              @else
                                <img src="{{ asset('img/famille.jfif') }}" style="height: 60px; width: 60px;">
                              @endif 
                            </td>
                            <td>{{ $benef->name }}</td>
                            <td>{{ $benef->sexe }}</td>
                            <td>{{ $benef->date_inscription }}</td>
                            <td class="text-center">
                              <button class="btn btn-link" wire:click='editerBeneficiaire({{ $benef->id }})'><i class="bi bi-pencil-square"></i></button>
                              <button class="btn btn-link" wire:click='confirmDelete("{{ $benef->name }}", {{ $benef->id }})'><i class="bi bi-trash-fill"></i></button>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div> 

            <div  class="card-footer">
                <div  class="float-right">
                    {{ $beneficiaires->links() }}
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
            @this.delete( event.detail.message.data.beneficiaire_id)
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