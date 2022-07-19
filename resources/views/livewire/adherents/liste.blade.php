<div class="card">
            
                <div class="card-header bg-secondary d-flex align-items-center">
                    <h3 class="card-title flex-grow-1 text-white">
                    <i class="bi bi-list-stars bi-2x"></i>
                    Liste des adhérents
                    </h3>

                    <div class="card-tools align-items-center">
                        <a class="btn text-white" wire:click.prevent='ajouterAdherent()'>
                            <i class="bi bi-person-plus-fill"></i>
                            <span>Nouvel adhérent</span>
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
                    <th class="text-center" scope="col">Sexe</th>
                    <th scope="col">Profession</th>
                    <th scope="col">Date d'inscrition</th>
                    <th scope="col">Adresse</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                 
                  @foreach ($adherents as $ad)
                        <tr>
                            <td>
                              @if ($ad->photo != "" || $ad->photo !=null)
                                <img src="{{ asset('storage/'.$ad->photo) }}" style="height: 60px; width: 60px;">
                              @else
                                <img src="{{ asset('img/famille.jfif') }}" style="height: 60px; width: 60px;">
                              @endif
                            </td>
                            <td>{{ $ad->name }}</td>
                            <td class="text-center">{{ $ad->sexe }}</td>
                            <td>{{ $ad->profession }}</td>
                            <td>{{ $ad->date_inscription }}</td>
                            <td>{{ $ad->adresse_domicile }}</td>
                            <td class="text-center">
                              <button class="btn btn-link" wire:click='goToEdit({{ $ad->id }})'><i class="bi bi-pencil-square">
                                </i></button>
                              <button class="btn btn-link" wire:click='confirmDelete("{{ $ad->name }}", {{ $ad->id }})'>
                                <i class="bi bi-trash-fill"></i></button>
                              <button class="btn btn-link" wire:click.prevent='ajouterBeneficiaire({{ $ad->id }})'>
                                <i class="bi bi-person-plus-fill"></i></button>
                                
                              <button type="button" data-bs-toggle="modal" data-bs-target="#detailAdherentModal" 
                                class="btn btn-primary rounded-pill">Détail</button>    
                            </td>
                        </tr>
                    @endforeach

                    <!-- Modal -->
                    <div class="modal fade" id="detailAdherentModal" tabindex="-1" 
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Détails sur l'adhérent</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                              <div class="row">
                                 <div class="col">
                                  <div class="col-sm-12 mb-3">Nom et prénoms</div>
                                  <div class="col-sm-12 mb-3">Code d'adhérent</div>
                                  <div class="col-sm-12 mb-3">Date de naissance</div>
                                  <div class="col-sm-12 mb-3">Lieu de naissance</div>
                                  <div class="col-sm-12 mb-3">Nationalité</div>
                                  <div class="col-sm-12 mb-3">Téléphone</div>
                                  <div class="col-sm-12 mb-3">Adresse</div>
                                  <div class="col-sm-12 mb-3">Situation matrimoniale</div>
                                  <div class="col-sm-12 mb-3">Date d'inscription</div>
                                  <div class="col-sm-12 mb-3">Personne à prévenir</div>
                                  <div class="col-sm-12 mb-3">Nombre de personnes à charge</div>
                                </div>
                                <div class="col">
                                  <div class="col-sm-12 mb-3">apple</div>
                                  <div class="col-sm-12 mb-3">85/52/2004</div>
                                  <div class="col-sm-12 mb-3">85/52/2004</div>
                                  <div class="col-sm-12 mb-3">ejkbglnh</div>
                                  <div class="col-sm-12 mb-3">85/52/2004</div>
                                  <div class="col-sm-12 mb-3">98989898</div>
                                  <div class="col-sm-12 mb-3">ertyu</div>
                                  <div class="col-sm-12 mb-3">85/52/2004</div>
                                  <div class="col-sm-12 mb-3">1150 F cfa / Par jours</div>
                                  <div class="col-sm-12 mb-3">85/52/2004</div>
                                  <div class="col-sm-12 mb-3">6</div>
                                </div>
                              </div>

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                          </div>
                        </div>
                      </div>
                    </div>

                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div> 

            <div  class="card-footer">
                <div  class="float-right">
                    {{ $adherents->links() }}
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
            @this.delete( event.detail.message.data.adherent_id)
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