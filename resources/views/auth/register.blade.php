@extends('layouts.register')

@section('content')
<div class="card-body" style="width:500px;">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Enregistrement</h5>
                    <p class="text-center small">Entrer vos informations personnelles pour créer un compte</p>
                  </div>

                  <form class="row g-3 needs-validation" novalidate method="POST" action="{{ route('register') }}">
                     @csrf
                    <div class="col-12">
                      <label for="yourName" class="form-label">Nom et Prénoms</label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror

                    </div>

                    <div class="col-12">
                      <label for="sexe" class="form-label">Sexe</label>
                      <select class="form-select" aria-label="Default select example"  class="form-control @error('sexe') is-invalid @enderror" name="sexe" value="{{ old('sexe') }}" required autocomplete="sexe">
                        <option selected="">Choisir</option>
                        <option value="F">Féminin</option>
                        <option value="M">Masculin</option>
                      </select>
                         @error('sexe')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                          @enderror
    
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Téléphone</label>
                      <input type="numeric" class="form-control @error('tel') is-invalid @enderror" name="tel" value="{{ old('tel') }}" required autocomplete="email">

                                @error('tel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
    
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Email</label>
                      <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
    
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Mot de passe</label>
                      <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Confirmer le mot de passe</label>
                      <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required autocomplete="new-password">
                      
                    </div>

                    <div class="col-12 text-center">
                      <button class="btn btn-primary w-50" type="submit">S'enregistrer</button>
                    </div>
                  </form>

</div>
@endsection
