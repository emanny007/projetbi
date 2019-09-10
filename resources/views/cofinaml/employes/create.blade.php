@extends('layouts.master-ml')

@section('creation_employe')
  <!-- MAIN CONTENT-->
  <div class="uker">
      <div class="section__content section__content--p30">
          <div class="container-fluid">

            <div class="row m-t-30">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                       <center><strong>NOUVEL EMPLOYE</strong></center>
                      </div>
                      <div class="card-body card-block">
                      <form enctype="multipart/form-data" class="form-horizontal" method="POST" action="{{ route('ml.store') }}">
                        {{ csrf_field() }}
                        <div class="row">
                        <div class="col-6 has-success form-group">
                          <label for="inputIsValid" class=" form-control-label">MATRICULE</label>
                          <input type="text" id="inputIsValid" name="matricule"  value="{{ old('matricule') }}" class="is-valid form-control-success form-control">
                        @if($errors->has('matricule'))
                        <p> {{ $errors->first('matricule') }} </p>
                        @endif
                        </div>
                        <div class="col-6 has-success form-group">
                          <label for="inputIsValid" class=" form-control-label">NUMERO SECURITE SOCIALE</label>
                          <input type="text" id="inputIsValid" name="numero_sss" value="{{ old('numero_sss') }}" class="is-valid form-control-success form-control">
                        </div>
                        @if($errors->has('numero_sss'))
                        <p> {{ $errors->first('numero_sss') }} </p>
                        @endif
                        </div>
                        <div class="row">
                        <div class="col-6 has-success form-group">
                          <label for="inputIsValid" class=" form-control-label">NOM</label>
                          <input type="text" id="inputIsValid" name="nom" value="{{ old('nom') }}"class="is-valid form-control-success form-control" required>
                        </div>
                        @if($errors->has('nom'))
                        <p> {{ $errors->first('nom') }} </p>
                        @endif
                        <div class="col-6 has-success form-group">
                           <label for="inputIsValid" class=" form-control-label">PRENOM</label>
                           <input type="text" id="inputIsValid" name="prenom" value="{{ old('prenom') }}" class="is-valid form-control-success form-control" required>
                        </div>
                        @if($errors->has('prenom'))
                        <p> {{ $errors->first('prenom') }} </p>
                        @endif
                        </div>
                        <div class="row">
                          <div class="col-6 has-success form-group">
                            <label for="inputIsValid" class=" form-control-label">EMAIL PROFESSIONNEL</label>
                            <input type="email" id="inputIsValid" name="email" value="{{ old('email') }}" class="is-valid form-control-success form-control" required>
                          </div>
                          @if($errors->has('email'))
                          <p> {{ $errors->first('email') }} </p>
                          @endif
                        <!--div class="col-6 has-success form-group">
                           <label for="inputIsValid" class=" form-control-label">MOT DE PASSE</label>
                           <input type="password" id="inputIsValid" name="password" value="" class="is-valid form-control-success form-control">
                        </div-->

                         <div class="col-6 has-success form-group">
                          <label for="inputIsValid" class=" form-control-label">DATE DE NAISSANCE</label>
                          <input type="date" id="inputIsValid" name="date_naissance" value="{{ old('date_naissance') }}" class="is-valid form-control-success form-control">
                        </div>
                        @if($errors->has('date_naissance'))
                        <p> {{ $errors->first('date_naissance') }} </p>
                        @endif
                        </div>
                        <div class="row">
                        <div class="col-6 has-success form-group">
                          <label for="inputIsValid" class=" form-control-label">EMAIL PERSONNEL</label>
                          <input type="email" id="inputIsValid" name="mail_perso" value="{{ old('mail_perso') }}" class="is-valid form-control-success form-control">
                        </div>
                        @if($errors->has('mail_perso'))
                        <p> {{ $errors->first('mail_perso') }} </p>
                        @endif
                        <div class="col-6 has-success form-group">
                          <label for="inputIsValid" class=" form-control-label">TELEPHONE PROFESSIONNEL</label>
                          <input type="text" id="inputIsValid" name="tel_pro" value="{{ old('tel_pro') }}" class="is-valid form-control-success form-control">
                        </div>
                        @if($errors->has('tel_pro'))
                        <p> {{ $errors->first('tel_pro') }} </p>
                        @endif
                        </div>
                        <div class="row">
                        <div class="col-6 has-success form-group">
                          <label for="inputIsValid" class=" form-control-label">TELEPHONE PERSONNEL</label>
                          <input type="text" id="inputIsValid" name="tel_perso" value="{{ old('tel_perso') }}"class="is-valid form-control-success form-control">
                        </div>
                        @if($errors->has('tel_perso'))
                        <p> {{ $errors->first('tel_perso') }} </p>
                        @endif
                        <div class="col-6 has-success form-group">
                          <label for="inputIsValid" class=" form-control-label">CONTACT URGENT</label>
                          <input type="text" id="inputIsValid" name="contact_urgent" value="{{ old('contact_urgent') }}" class="is-valid form-control-success form-control" required>
                        </div>
                        @if($errors->has('contact_urgent'))
                        <p> {{ $errors->first('contact_urgent') }} </p>
                        @endif
                        </div>
                        <div class="row">
                        <div class="col-6 has-success form-group">
                          <label for="inputIsValid" class=" form-control-label">ENTITE</label>
                            <select name="entite" id="selectLg" value="{{ old('entite') }}" class="is-valid form-control-success form-control">
                              <option></option>
                              @foreach($sites as $site)
                              <option value="{{$site->entite}}">{{ $site->entite }}</option>
                              @endforeach
                            </select>
                        </div>
                        @if($errors->has('entite'))
                        <p> {{ $errors->first('entite') }} </p>
                        @endif
                        <div class="col-6 has-success form-group">
                          <label for="inputIsValid" class="form-control-label">SEXE</label>
                            <select name="sexe" id="selectLg" value="{{ old('sexe') }}" class="is-valid form-control-success form-control">
                              <option></option>
                              <option value="MASCULIN">MASCULIN</option>
                              <option value="FEMININ">FEMININ</option>
                            </select>
                        </div>
                        @if($errors->has('sexe'))
                        <p> {{ $errors->first('sexe') }} </p>
                        @endif
                        </div>
                        <div class="row">
                        <div class="col-6 has-success form-group">
                          <label for="inputIsValid" class="form-control-label">CIVILITE</label>
                            <select name="civilite" id="selectLg" class="is-valid form-control-success form-control">
                              <option></option>
                              <option value="MONSIEUR">Monsieur</option>
                              <option value="MADAME">Madame</option>
                              <option value="MADEMOISELLE">Mademoiselle</option>
                            </select>
                        </div>
                        @if($errors->has('civilite'))
                        <p> {{ $errors->first('civilite') }} </p>
                        @endif
                        <div class="col-6 has-success form-group">
                          <label for="inputIsValid" class="form-control-label">SITUATION MATRIMONIALE</label>
                            <select name="situation_matrimoniale" id="selectLg" class="is-valid form-control-success form-control">
                              <option></option>
                              <option value="CELIBATAIRE">CELIBATAIRE</option>
                              <option value="MARIEE">MARIEE</option>
                              <option value="DIVORCEE">DIVORCEE</option>
                              <option value="VEUVE">VEUVE</option>
                            </select>
                        </div>
                        @if($errors->has('situation_matrimoniale'))
                        <p> {{ $errors->first('situation_matrimoniale') }} </p>
                        @endif
                        </div>
                        <div class="row">
                        <div class="col-6 has-success form-group">
                          <label for="inputIsValid" class="form-control-label">JOINDRE UNE PHOTO</label>
                          <input type="file" id="inputIsValid" name="photo" value="{{ old('photo') }}" class="is-valid form-control-success form-control">
                        </div>
                        @if($errors->has('photo'))
                        <p> {{ $errors->first('photo') }} </p>
                        @endif

                        <div class="col-6 has-success form-group">
                          <label for="inputIsValid" class="form-control-label">NOMBRE D'ENFANTS</label>
                          <input type="text" id="inputIsValid" name="nbre_enfant" value="{{ old('nbre_enfant') }}" class="is-valid form-control-success form-control">
                        </div>
                        @if($errors->has('nbre_enfant'))
                        <p> {{ $errors->first('nbre_enfant') }} </p>
                        @endif
                        </div>
                        <div class="row">
                        <div class="col-6 has-success form-group">
                          <label for="inputIsValid" class=" form-control-label">NATIONNALITE</label>
                            <select name="nationnalite" id="selectLg" class="is-valid form-control-success form-control">
                              <option></option>
                              @foreach($sites as $site)
                              <option value="{{$site->nationnalite}}">{{$site->nationnalite}}</option>
                              @endforeach
                            </select>
                        </div>
                        @if($errors->has('nationnalite'))
                        <p> {{ $errors->first('nationnalite') }} </p>
                        @endif

                        <div class="col-6 has-success form-group">
                        <label for="inputIsValid" class="form-control-label">PAYS</label>
                        <select name="pays" id="selectLg" class="form-control is-valid form-control-success form-control">
                          <option></option>
                          @foreach($sites as $site)
                          <option value="{{$site->pays}}">{{$site->pays}}</option>
                          @endforeach
                        </select>
                        </div>
                        @if($errors->has('pays'))
                        <p> {{ $errors->first('pays') }} </p>
                        @endif

                        </div>
                        <div class="row">
                        <div class="col-6 has-success form-group">
                        <label for="inputIsValid" class=" form-control-label">DEPARTEMENT</label>
                          <select name="departement" id="selectLg" class="is-valid form-control-success form-control">
                            <option></option>
                            @foreach($departements as $departement)
                            <option value="{{$departement->libelle}}">{{$departement->libelle}}</option>
                            @endforeach
                          </select>
                        </div>
                        @if($errors->has('departement'))
                        <p> {{ $errors->first('departement') }} </p>
                        @endif
                        <div class="col-6 has-success form-group">
                        <label for="inputIsValid" class=" form-control-label">SECTEUR</label>
                          <select name="secteur" id="selectLg" class="is-valid form-control-success form-control">
                            <option></option>
                            <option value="SALES">SALES</option>
                            <option value="NON SALES">NON SALES</option>
                          </select>
                        </div>
                        @if($errors->has('secteur'))
                        <p> {{ $errors->first('secteur') }} </p>
                        @endif
                        </div>

                        <div class="row">
                        <!--div class="col-6 has-success form-group">
                        <label for="inputIsValid" class=" form-control-label">ORIGINE</label>
                        <select name="origine" id="selectLg" class="form-control is-valid form-control-success form-control">
                          <option></option>
                          @foreach($sites as $site)
                          <option value="{{$site->pays}}">{{$site->pays}}</option>
                          @endforeach
                        </select>
                        </div>
                        @if($errors->has('origine'))
                        <p> {{ $errors->first('origine') }} </p>
                        @endif
                        -->
                        <div class="col-6 has-success form-group">
                        <label for="inputIsValid" class=" form-control-label">CATEGORIE</label>
                        <select name="categorie" id="selectLg" class="is-valid form-control-success form-control">
                          <option></option>
                          <option value="CADRE">CADRE</option>
                          <option value="NON CADRE">NON CADRE</option>
                        </select>
                        </div>
                        @if($errors->has('categorie'))
                        <p> {{ $errors->first('categorie') }} </p>
                        @endif


                        <div class="col-6 has-success form-group">
                        <label for="inputIsValid" class=" form-control-label">TYPE DE CONTRAT</label>
                          <select name="type_contrat" id="selectLg"  onChange="afficherAutre()" class="is-valid form-control-success form-control" required>
                            <option></option>
                            <option value="STAGE">STAGE</option>
                            <option value="PRESTATION">PRESTATION</option>
                            <option value="CDD">CDD</option>
                            <option value="CDI">CDI</option>
                          </select>
                        </div>
                        @if($errors->has('type_contrat'))
                        <p> {{ $errors->first('type_contrat') }} </p>
                        @endif
                        </div>
                        <div class="row">
                        <div class="col-6 has-success form-group">
                          <label for="inputIsValid" class=" form-control-label">DEBUT CONTRAT</label>
                          <input type="date" id="inputIsValid" name="date_debut" value="{{ old('date_debut') }}" class="is-valid form-control-success form-control" required>
                        </div>
                        @if($errors->has('date_debut'))
                        <p> {{ $errors->first('date_debut') }} </p>
                        @endif
                        <div class="col-6 has-success form-group">
                        <label id="autre" class=" form-control-label">FIN CONTRAT</label>
                        @if(empty($contrat))
                        <input type="date" id="date_fin" name="date_fin" value="{{ old('date_fin') }}"class="is-valid form-control-success form-control">
                        @else
                        <input type="date" id="date_fin" name="date_fin" class="is-valid form-control-success form-control">
                        @endif
                        </div>
                        @if($errors->has('date_fin'))
                        <p> {{ $errors->first('date_fin') }} </p>
                        @endif
                        </div>
                        <br /><br />
                        <div class="form-group">
                         <center>

                      <a class="btn btn-xs btn-danger" href="{{ route('ml.main') }}">RETOURNER</a>
                      <button type="submit"  class="btn btn-success">VALIDER </button>

                      </center>
                </div>
              </form>
            </div>
            <div class="card-header">
             <center><strong></strong></center>
            </div>

          </div>

              </div>
           </div>
        </div>
      </div>
    </div>

@endsection
