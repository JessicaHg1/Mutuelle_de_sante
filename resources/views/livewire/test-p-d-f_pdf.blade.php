@extends('master')

@section('content')
<!Doctype html>
<html> 
    <head> 
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">  
        <title></title>
    </head> 
   

        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Bordered Table</h5>
              <p>Add <code>.table-bordered</code> for borders on all sides of the table and cells.</p>

              <!-- Primary Color Bordered Table -->
              <table class="table table-bordered border-primary">
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
              <!-- End Primary Color Bordered Table -->

            </div>
        </div>
   
</html> 

@endsection