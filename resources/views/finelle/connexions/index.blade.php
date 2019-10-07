@extends('layouts.login')

@section('authentification')
  <!-- MAIN CONTENT-->
  <div class="page-wrapper">
          <div class="page-content--bge5" style="background-image:url(/images/icon/authentification.png)">
              <div class="container">
                  <div class="login-wrap">
                      <div class="login-content">
                          <div class="login-logo">
                              <a href="#">
                                  <img src="{{ url('images/icon/logo.jpg') }}" alt="Groupe Cofina">
                              </a>
                          </div>
                          <div class="login-form">
                      <form class="form-horizontal" method="Post" action="{{ route('authentification') }}">
                      {{ csrf_field() }}

                      <div class="has-success form-group">
                        <label for="inputIsValid" class=" form-control-label">EMAIL</label>
                        <input type="email" id="inputIsValid" name="email" value="{{ old('email') }}" class="form-control">
                      </div>
                      @if($errors->has('email'))
                      <p> {{ $errors->first('email') }} </p>
                      @endif

                      <div class="has-success form-group">
                         <label for="inputIsValid" class=" form-control-label">MOT DE PASSE</label>
                         <input type="password" id="inputIsValid" name="password" class="form-control">
                      </div>
                      @if($errors->has('password'))
                      <p> {{ $errors->first('password') }} </p>
                      @endif
                      <div class="has-success form-group">
                        <label for="inputIsValid" class=" form-control-label">FILIALE
                          <select name="entite" id="selectLg" class="form-control">
                            <option></option>
                            @foreach($sites as $site)
                            <option value="{{$site->entite}}">{{ $site->entite }}</option>
                            @endforeach
                          </select>
                          </label>
                      </div>
                      @if($errors->has('entite'))
                      <p> {{ $errors->first('entite') }} </p>
                      @endif

                      <div class="login-checkbox">
                          <label>
                              <input type="checkbox" name="remember">Se souvenir de moi
                          </label>
                          <label>
                              <a href="#">Mot de passe oublié</a>
                          </label>
                      </div>
                      <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">VALIDER</button>

                    </form>
                    <div class="register-link">
                      <!--p>
                          Don't you have account?
                          <a href="#">Sign Up Here</a>
                      </p-->
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>

              </div>
           </div>
        </div>
      </div>



    </div>

@endsection
