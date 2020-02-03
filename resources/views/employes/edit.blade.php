@extends('layouts.master')

@section('modify_employe')
  <!-- MAIN CONTENT-->
  <div class="uker">
      <div class="section__content section__content--p30">
          <div class="container-fluid"><br />
            <div class="col-sm-6 col-lg-12">
              @include('includes.sous-menu-cti-checker')
            <div class="row well m-t-30">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                       <strong>Modification un employe</strong>
                      </div>

                      <div class="card-body card-block">
                      <form  enctype="multipart/form-data" class="form-horizontal" method="POST" action="{{ route('update',$employe->id) }}">

                      {{ csrf_field() }}
                      <input type="hidden" id="inputIsValid" name="_method" value="PUT">
                      <div class="row">
                      <div class="col-3 has-success form-group">
                        <label for="inputIsValid" class=" form-control-label">MATRICULE</label>
                        <input type="text" id="inputIsValid" name="matricule"  value="{{ $employe->matricule }}" class="is-valid form-control-success form-control">
                      @if($errors->has('matricule'))
                      <p> {{ $errors->first('matricule') }} </p>
                      @endif
                      </div>
                      <div class="col-3 has-success form-group">
                        <label for="inputIsValid" class=" form-control-label">NUMERO SECURITE SOCIALE</label>
                        <input type="text" id="inputIsValid" name="numero_sss" value="{{ $employe->numero_sss }}" class="is-valid form-control-success form-control">
                      </div>
                      @if($errors->has('numero_sss'))
                      <p> {{ $errors->first('numero_sss') }} </p>
                      @endif

                      <div class="col-3 has-success form-group">
                        <label for="inputIsValid" class=" form-control-label">NOM</label>
                        <input type="text" id="inputIsValid" name="nom" value="{{ $employe->nom }}"class="is-valid form-control-success form-control">
                      </div>
                      @if($errors->has('nom'))
                      <p> {{ $errors->first('nom') }} </p>
                      @endif
                      <div class="col-3 has-success form-group">
                         <label for="inputIsValid" class=" form-control-label">PRENOM</label>
                         <input type="text" id="inputIsValid" name="prenom" value="{{ $employe->prenom }}" class="is-valid form-control-success form-control">
                      </div>
                      @if($errors->has('prenom'))
                      <p> {{ $errors->first('prenom') }} </p>
                      @endif
                    </div>
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
                        <label for="inputIsValid" class=" form-control-label">DATE DE NAISSANCE</label>
                        <input type="date" id="inputIsValid" name="date_naissance" value="{{ $employe->date_naissance }}" class="is-valid form-control-success form-control">
                      </div>
                      @if($errors->has('date_naissance'))
                      <p> {{ $errors->first('date_naissance') }} </p>
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
                    </div>
                      <div class="row">
                        <div class="col-3 has-success form-group">
                        <label for="inputIsValid" class=" form-control-label">EMAIL PERSONNEL</label>
                        <input type="email" id="inputIsValid" name="mail_perso" value="{{ $employe->mail_perso }}" class="is-valid form-control-success form-control">
                      </div>
                      @if($errors->has('mail_perso'))
                      <p> {{ $errors->first('mail_perso') }} </p>
                      @endif
                      <div class="col-3 has-success form-group">
                        <label for="inputIsValid" class=" form-control-label">TELEPHONE PROFESSIONNEL</label>
                        <input type="text" id="inputIsValid" name="tel_pro" value="{{ $employe->tel_pro }}" class="is-valid form-control-success form-control">
                      </div>
                      @if($errors->has('tel_pro'))
                      <p> {{ $errors->first('tel_pro') }} </p>
                      @endif

                        <div class="col-3 has-success form-group">
                        <label for="inputIsValid" class=" form-control-label">TELEPHONE PERSONNEL</label>
                        <input type="text" id="inputIsValid" name="tel_perso" value="{{ $employe->tel_perso }}" class="is-valid form-control-success form-control">
                      </div>
                      @if($errors->has('tel_perso'))
                      <p> {{ $errors->first('tel_perso') }} </p>
                      @endif
                      <div class="col-3 has-success form-group">
                        <label for="inputIsValid" class=" form-control-label">CONTACT URGENT</label>
                        <input type="text" id="inputIsValid" name="contact_urgent" value="{{ $employe->contact_urgent }}" class="is-valid form-control-success form-control">
                      </div>
                      @if($errors->has('contact_urgent'))
                      <p> {{ $errors->first('contact_urgent') }} </p>
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
                          <select name="sexe" id="selectLg" class="form-control is-valid form-control-success form-control">
                            <option value="{{ $employe->sexe }}">{{ $employe->sexe }}</option>
                            <option value="MASCULIN">MASCULIN</option>
                            <option value="FEMININ">FEMININ</option>
                          </select>
                      </div>
                      @if($errors->has('sexe'))
                      <p> {{ $errors->first('sexe') }} </p>
                      @endif

                        <div class="col-3 has-success form-group">
                          <label for="inputIsValid" class=" form-control-label">CIVILITE</label>
                          <select name="civilite" id="selectLg" class="form-control is-valid form-control-success form-control">
                            <option value="{{ $employe->civilite }}">{{ $employe->civilite }}</option>
                            <option value="Monsieur">Monsieur</option>
                            <option value="Madame">Madame</option>
                          </select>
                      </div>
                      @if($errors->has('civilite'))
                      <p> {{ $errors->first('civilite') }} </p>
                      @endif
                      <div class="col-3 has-success form-group">
                        <label for="inputIsValid" class=" form-control-label">SITUATION MATRIMONIALE</label>
                          <select name="situation_matrimoniale" id="selectLg" class="form-control is-valid form-control-success form-control">
                            <option value="{{ $employe->situation_matrimoniale }}">{{ $employe->situation_matrimoniale }}</option>
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
                        <div class="col-3 has-success form-group">
                        <label for="inputIsValid" class=" form-control-label">JOINDRE UNE PHOTO</label>
                        <input type="file" id="inputIsValid" name="photo" value="/images/{{ $employe->photo }}" class="is-valid form-control-success form-control">
                      </div>
                      @if($errors->has('photo'))
                      <p> {{ $errors->first('photo') }} </p>
                      @endif

                    <div class="col-3 has-success form-group">
                      <label for="inputIsValid" class=" form-control-label">NOMBRE D'ENFANTS</label>
                      <select name="nbre_enfant" id="selectLg" class="is-valid form-control-success form-control">
                      <option value="{{ $employe->nbre_enfant }}">{{ $employe->nbre_enfant }}</option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                      </select>
                      </div>

                      @if($errors->has('nbre_enfant'))
                      <p> {{ $errors->first('nbre_enfant') }} </p>
                      @endif

                        <div class="col-3 has-success form-group">
                          <label for="inputIsValid" class=" form-control-label">NATIONALITE</label>
                          <select name="nationnalite" id="selectLg" class="form-control is-valid form-control-success form-control">
                            <option value="{{ $employe->nationnalite }}">{{ $employe->nationnalite }}</option>
                            @foreach($nationnalite as $nationnalites)
                            <option value="{{$nationnalites->nationnalite}}">{{$nationnalites->nationnalite}}</option>
                            @endforeach
                          </select>
                      </div>
                      @if($errors->has('nationnalite'))
                      <p> {{ $errors->first('nationnalite') }} </p>
                      @endif


                      <div class="col-3 has-success form-group">
                        <label for="inputIsValid" class=" form-control-label">STATUT</label>
                        <select name="statut" id="selectLg" class="form-control is-valid form-control-success form-control">
                          <option value="{{ $employe->statut }}">{{ $employe->statut }}</option>
                          <option value="ACTIVE">ACTIVE</option>
                          <option value="DESACTIVE">DESACTIVE</option>

                        </select>
                      </div>
                      @if($errors->has('origine'))
                        <p> {{ $errors->first('origine') }} </p>
                      @endif
                      </div>
                                    <div class="row">
                                    <div class="col-3 has-success form-group">
                                      <label for="inputIsValid" class=" form-control-label">SECTEUR</label>
                                        <select name="secteur" id="selectLg" class="is-valid form-control-success form-control">
                                          <option value="{{ $employe->secteur }}">{{ $employe->secteur }}</option>
                                          <option value="SALES">SALES</option>
                                          <option value="MIDDLES SALES">MIDDLES SALES</option>
                                          <option value="NON SALES">NON SALES</option>
                                        </select>
                                    </div>
                                    @if($errors->has('secteur'))
                                    <p> {{ $errors->first('secteur') }} </p>
                                    @endif

                                    <div class="col-3 has-success form-group">
                                      <label for="inputIsValid" class=" form-control-label">CATEGORIE</label>
                                        <select name="categorie" id="selectLg" class="is-valid form-control-success form-control">
                                          <option value="{{ $employe->categorie }}">{{ $employe->categorie }}</option>
                                          <option value="CADRE">CADRE</option>
                                          <option value="NON CADRE">NON CADRE</option>
                                        </select>
                                    </div>
                                    @if($errors->has('categorie'))
                                    <p> {{ $errors->first('categorie') }} </p>
                                    @endif
                                    <div class="col-3 has-success form-group">
                                      <label for="inputIsValid" class=" form-control-label">DEPARTEMENT</label>
                                        <select name="departement" id="selectLg" class="is-valid form-control-success form-control">
                                          <option value="{{ $employe->departement }}">{{ $employe->departement }}</option>
                                          @foreach($departements as $departement)
                                          <option value="{{$departement->libelle}}">{{$departement->libelle}}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                    @if($errors->has('departement'))
                                    <p> {{ $errors->first('departement') }} </p>
                                    @endif

                                    <div class="col-3 has-success form-group">
                                      <label for="inputIsValid" class=" form-control-label">PAYS</label>
                                        <select name="pays" id="selectLg" class="is-valid form-control-success form-control">
                                          <option value="{{ $employe->pays }}">{{ $employe->pays }}</option>
                                          @foreach($pays as $pays)
                                          <option value="{{$pays->pays}}">{{$pays->pays}}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                    @if($errors->has('pays'))
                                    <p> {{ $errors->first('pays') }} </p>
                                    @endif

                                  </div>

                                    <div class="row">
                                      <div class="col-3 has-success form-group">
                                      <label for="inputIsValid" class=" form-control-label">AGE</label>
                                      <input type="text" id="inputIsValid" name="age" value="{{ $employe->age }}" class="is-valid form-control-success form-control" readonly>
                                    </div>
                                    @if($errors->has('age'))
                                    <p> {{ $errors->first('age') }} </p>
                                    @endif

                                  </div>


                      <!--div class="card-header">
                       <strong>GESTION DU CONTRAT</strong>
                      </div>
                      <div class="row">
                      <div class="col-3 has-success form-group">
                                            <label for="inputIsValid" class=" form-control-label">TYPE DE CONTRAT</label>
                                              <select name="type_contrat" id="selectLg" class="is-valid form-control-success form-control">

                                                <option value="$contrat->type_contrat ">$contrat->type_contrat </option>

                                                <option value="STAGE">STAGE</option>
                                                <option value="PRESTATION">PRESTATION</option>
                                                <option value="CDD">CDD</option>
                                                <option value="CDI">CDI</option>
                                              </select>
                                              <input type="hidden" value="{{ $employe->id }}" name="id_empl" />
                                          </div>
                                          @if($errors->has('type_contrat'))
                                          <p> {{ $errors->first('type_contrat') }} </p>
                                          @endif

                                            <div class="col-3 has-success form-group">
                                              <label for="inputIsValid" class=" form-control-label">DATE DEBUT</label>
                                              <input type="date" id="inputIsValid" name="date_debut" value=" $contrat->date_debut " class="is-valid form-control-success form-control">
                                            </div>
                                            @if($errors->has('date_debut'))
                                            <p> {{ $errors->first('date_debut') }} </p>
                                            @endif
                                          <div class="col-3 has-success form-group">
                                            <label for="inputIsValid" class=" form-control-label">DATE FIN</label>
                                            <input type="date" id="inputIsValid" name="date_fin" value="$contrat->date_fin " class="is-valid form-control-success form-control">
                                          </div>
                                          @if($errors->has('date_fin'))
                                          <p> {{ $errors->first('date_fin') }} </p>
                                          @endif
                                        </div-->
                                          </div>

                      <br />
                    <div class="form-group"> <center>
                      <a class="btn btn-xs btn-danger" href="{{ route('main') }}">RETOURNER</a>
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
