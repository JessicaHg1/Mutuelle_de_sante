<div class="card">
            
                <div class="card-header bg-secondary d-flex align-items-center">
                    <h3 class="card-title flex-grow-1 text-white">
                    <i class="bi bi-list-stars bi-2x"></i>
                    Liste des utilisateurs
                    </h3>

                    <!--<div class="card-tools align-items-center">
                        <a class="btn text-white" wire:click.prevent='ajouterUser()'>
                            <i class="bi bi-person-plus-fill"></i>
                            <span>Ajouter un utilisateur</span>
                        </a>
                    </div>-->

                    <div class="search-bar">
                        <form class="search-form d-flex align-items-center" method="" action="#">
                            <input type="text" name="query"  wire:model.debounce.250ms='search' placeholder="Recherche" title="Enter search keyword">
                            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                        </form>
                    </div>
                </div>
                
            <div class="card-body table-responsive p-0" style="max-height:300px;">
              <!-- Table with stripped rows -->
              <table class="table table-head-fixed table-striped">
                <thead>
                   <tr>
                    <th scope="col">#</th>
                    <th scope="col">Utilisateurs</th>
                    <th scope="col">sexe</th>
                    <th scope="col">Rôles</th>
                    
                    <th scope="col">Téléphone</th>
                    
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->sexe }}</td>
                            <td>
                                @foreach ($user->role as $role)
                                    {{ $role->nom }} |
                                    
                                @endforeach
                            </td>
                            
                            <td>{{ $user->tel }}</td>
                            <td class="text-center">
                              <button class="btn btn-link" wire:click='editerUser({{ $user->id }})'><i class="bi bi-pencil-square"></i></button>
                              <button class="btn btn-link" wire:click='confirmDelete("{{ $user->name }}", {{ $user->id }})'><i class="bi bi-trash-fill"></i></button>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
              </table>
              <!-- End Table with stripped rows -->
            </div> 

            <div  class="card-footer">
                <div  class="float-right">
                    {{ $users->links() }}
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
            @this.delete( event.detail.message.data.user_id)
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