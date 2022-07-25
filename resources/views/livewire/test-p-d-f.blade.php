<div class="card">
            
                <div class="card-header bg-secondary d-flex align-items-center">
                    <h3 class="card-title flex-grow-1 text-white">
                    <i class="bi bi-list-stars bi-2x"></i>
                    Liste des prestataires
                    </h3>

                    <div class="card-tools align-items-center">
                        <a class="btn text-white" href="/test-p-d-f_pdf/pdf">
                            <span>Exporter en PDF</span>
                        </a>
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
                  </tr>
                </thead>
                <tbody>
                  
                   @foreach ($data as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->nom }}</td>
                            <td>{{ $data->region }}</td>
                            <td>{{ $data->adresse }}</td>
                            <td>{{ $data->tel }}</td>
                        </tr>
                    @endforeach

                </tbody>
              </table>
              <!-- End Table with stripped rows -->
            </div> 

             

</div>