@extends('layouts.login')

@section('form')
<div class="card mb-3">

                <div class="card-body" style="width:500px;">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Authentification</h5>
                    <p class="text-center small">Entrer votre email et votre mot de passe pour vous connecter</p>
                  </div>

                  <form class="row g-3 needs-validation" novalidate method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Email</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Mot de passe</label>
                      <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password" required>
                       @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="col-12 text-center">
                      <button class="btn btn-primary w-50" type="submit">Se connecter</button>

                    </div>

                    <div class="col-12 text-center">
                        @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Mot de passe oublié ?') }}
                                    </a>
                        @endif
                    </div>
                    
                  </form>

                </div>
</div>
@endsection
