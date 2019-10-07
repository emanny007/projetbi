@extends('layouts.master')

@section('modify_users')
  <!-- MAIN CONTENT-->
  <div class="uker">
      <div class="section__content section__content--p30">
          <div class="container-fluid"><br />
            <div class="col-sm-6 col-lg-12">

            <div class="row well m-t-30">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                       <strong>Modification du user</strong>
                      </div>

                      <div class="card-body card-block">
                      <form  enctype="multipart/form-data" class="form-horizontal" method="POST" action="{{ route('users.update',$employe->id)}}">

                      {{ csrf_field() }}
                      <input type="hidden" id="inputIsValid" name="_method" value="PUT">
                      <div class="row">

                      <div class="col-3 has-success form-group">
                        <label for="inputIsValid" class=" form-control-label">NOM</label>
                        <input type="text" id="inputIsValid" name="nom" value="{{ $employe->nom }}"class="is-valid form-control-success form-control" readonly>
                      </div>
                      @if($errors->has('nom'))
                      <p> {{ $errors->first('nom') }} </p>
                      @endif
                      <div class="col-3 has-success form-group">
                         <label for="inputIsValid" class=" form-control-label">PRENOM</label>
                         <input type="text" id="inputIsValid" name="prenom" value="{{ $employe->prenom }}" class="is-valid form-control-success form-control" readonly>
                      </div>
                      @if($errors->has('prenom'))
                      <p> {{ $errors->first('prenom') }} </p>
                      @endif


                      <div class="col-3 has-success form-group">
                      <label for="inputIsValid" class=" form-control-label">TELEPHONE PROFESSIONNEL</label>
                      <input type="text" id="inputIsValid" name="tel_pro" value="{{ $employe->tel_pro }}" class="is-valid form-control-success form-control" readonly>
                      </div>
                        @if($errors->has('tel_pro'))
                        <p> {{ $errors->first('tel_pro') }} </p>
                      @endif

                      <div class="col-3 has-success form-group">
                      <label for="inputIsValid" class=" form-control-label">TELEPHONE PERSONNEL</label>
                      <input type="text" id="inputIsValid" name="tel_perso" value="{{ $employe->tel_perso }}" class="is-valid form-control-success form-control" readonly>
                      </div>
                      @if($errors->has('tel_perso'))
                      <p> {{ $errors->first('tel_perso') }} </p>
                      @endif
                    </div>
                    <div class="row">
                      <div class="col-3 has-success form-group">
                         <label for="inputIsValid" class=" form-control-label">MOT DE PASSE</label>
                         <input type="password" id="inputIsValid" name="mot_pass" value="{{ $employe->mot_pass }}" placeholder=" ******************** "class="is-valid form-control-success form-control">
                      </div>
                      @if($errors->has('mot_pass'))
                      <p> {{ $errors->first('mot_pass') }} </p>
                      @endif

                        <div class="col-3 has-success form-group">
                        <label for="inputIsValid" class=" form-control-label">EMAIL PROFESSIONNEL</label>
                        <input type="email" id="inputIsValid" name="email" value="{{ $employe->email }}" class="is-valid form-control-success form-control">
                      </div>
                      @if($errors->has('mail_pro'))
                      <p> {{ $errors->first('mail_pro') }} </p>
                      @endif

                      <div class="col-3 has-success form-group">
                        <label for="inputIsValid" class=" form-control-label">ROLE</label>
                          <select name="role" id="selectLg" class="form-control is-valid form-control-success form-control">
                            <option value="{{ $employe->role }}">{{ $employe->role }}</option>
                            @foreach($groupes as $groupe)
                            <option value="{{$groupe->nom_groupe}}">{{$groupe->nom_groupe}}</option>
                            @endforeach
                          </select>
                      </div>
                      @if($errors->has('role'))
                      <p> {{ $errors->first('role') }} </p>
                      @endif

                      <div class="col-3 has-success form-group">
                        <label for="inputIsValid" class=" form-control-label">STATUT</label>
                        <select name="statut" id="selectLg" class="form-control is-valid form-control-success form-control">
                          <option value="{{ $employe->statut }}">{{ $employe->statut }}</option>
                          <option value="ACTIVE">ACTIVE</option>
                          <option value="DESACTIVE">DESACTIVE</option>

                        </select>
                      </div>
                      @if($errors->has('statut'))
                        <p> {{ $errors->first('statut') }} </p>
                      @endif


                    </div>
                    <div class="row">
                      <div class="col-3 has-success form-group">
                      <label for="inputIsValid" class=" form-control-label">ENTITE</label>
                        <select name="entite" id="selectLg" class="form-control is-valid form-control-success form-control">
                          <option value="{{ $employe->entite }}">{{ $employe->entite }}</option>
                          @foreach($sites as $site)
                          <option value="{{ $site->entite }}">{{ $site->entite }}</option>
                          @endforeach
                        </select>
                    </div>
                    @if($errors->has('entite'))
                    <p> {{ $errors->first('entite') }} </p>
                    @endif



                      <div class="col-3 has-success form-group">
                        <label for="inputIsValid" class=" form-control-label">SEXE</label>
                        <input type="sexe" id="inputIsValid" name="sexe" value="{{ $employe->sexe }}" class="is-valid form-control-success form-control" readonly>
                      </div>
                      @if($errors->has('sexe'))
                      <p> {{ $errors->first('sexe') }} </p>
                      @endif
                    
                    <div class="col-3 has-success form-group">
                      <label for="inputIsValid" class=" form-control-label">DEPARTEMENT</label>
                    <input type="departement" id="inputIsValid" name="sexe" value="{{ $employe->departement }}" class="is-valid form-control-success form-control" readonly>

                    </div>
                      @if($errors->has('departement'))
                      <p> {{ $errors->first('departement') }} </p>
                      @endif

                      <div class="col-3 has-success form-group">
                       <label for="inputIsValid" class=" form-control-label">PAYS</label>
                      <input type="pays" id="inputIsValid" name="sexe" value="{{ $employe->pays }}" class="is-valid form-control-success form-control" readonly>
                      </div>
                      @if($errors->has('pays'))
                      <p> {{ $errors->first('pays') }} </p>
                        @endif
                      </div>
                    </div>

                      <br />
                    <div class="form-group"> <center>
                      <a class="btn btn-xs btn-danger" href="{{ route('users.index') }}">RETOURNER</a>
                  <button type="submit"  class="btn btn-success">MODIFIER</button>
                </center>
                </div>
              </form>
            </div>

          </div>

              </div>
           </div>
        </div>
      </div>
    </div>

@endsection
