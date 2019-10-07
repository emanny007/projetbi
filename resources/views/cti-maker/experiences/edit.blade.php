@extends('layouts.maker-cti')

@section('modify_experience_maker')
  <!-- MAIN CONTENT-->
  <div class="uker">
      <div class="section__content section__content--p30">
          <div class="container-fluid">
            <br />
            @include('includes.sous-menu-cti-maker')

                        <div class="row well m-t-30">
                              <div class="col-md-12">
                                <div class="card">
                                  <div class="card-header">
                                   <center><strong>EXPERIENCE PROFESSIONNELLE</strong></center>
                                  </div>

                                  <div class="card-body card-block">
                                    <!-- DATA TABLE-->
                                    <div class="table-responsive table m-b-40">
                                        <table class="table table-borderless table-earning">

                                            <tbody>

                                                <tr>
                                                  <td>Matricule:  {{ $employe->matricule }}</td>

                                                    <td>Nom:  {{ $employe->nom }}</td>

                                                    <td>Prenom: {{ $employe->prenom }}</td>

                                                    <td>Sexe: {{ $employe->sexe }}</td>

                                                    <td>Entite: {{ $employe->departement }}</td>
                                                    <td>Entite: {{ $employe->entite }}</td>

                                                </tr>


                                                @foreach ($experience as $experience)
                                                <tr>
                                                    <td>Entreprise: {{ $experience->entreprise }}</td>
                                                    <td>Poste: {{ $experience->poste }}</td>
                                                    <td>Niveau: {{ $experience->niveau_etude }}</td>
                                                    <td>Experience: {{ $experience->nbre_annee_exp }}</td>
                                                    <td>Debut: {{ date('d/m/Y', strtotime($experience->date_debut)) }} </td>
                                                    <td>Fin: {{ date('d/m/Y', strtotime($experience->date_fin)) }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

              </div>
            </div>

            <div class="card">
              <div class="card-header">
               <strong></strong>
              </div>
                    <div class="card-body card-block">
                      <form name="form1" class="form-horizontal" method="POST" action="{{ route('cti.experiences.store',$employe->id)}}">
                        {{ csrf_field() }}
                        <div class="row">
                          <div class="col-4 has-success form-group">
                          <label for="inputIsValid" class=" form-control-label">ENTREPRISE</label>
                          <input type="text" id="inputIsValid" name="entreprise" class="is-valid form-control-success form-control">
                          <input type="hidden" value="{{ $employe->id }}" name="id_empl"/>
                          </div>
                          @if($errors->has('entreprise'))
                          <p> {{ $errors->first('entreprise') }} </p>
                          @endif

                          <div class="col-4 has-success form-group">
                          <label for="inputIsValid" class=" form-control-label">POSTE OCCUPE</label>
                          <input type="text" id="inputIsValid" name="poste" class="is-valid form-control-success form-control">
                          </div>
                          @if($errors->has('poste'))
                          <p> {{ $errors->first('poste') }} </p>
                          @endif

                          <div class="col-4 has-success form-group">
                          <label for="inputIsValid" class=" form-control-label">NIVEAU D'ETUDE</label>
                          <select name="niveau_etude" id="selectLg" class="is-valid form-control-success form-control">
                          <!--input type="text" id="inputIsValid" name="niveau_etude" class="is-valid form-control-success form-control"-->
                          <option></option>
                          <option value="BAC +5">BAC +5</option>
                          <option value="BAC +4">BAC +4</option>
                          <option value="BAC +3">BAC +3</option>
                          <option value="BAC +2">BAC +2</option>
                          <option value="BAC +1">BAC +1</option>
                          <option value="BAC">BAC</option>
                          <option value="AUTRE">AUTRE</option>
                        </select>
                          </div>
                          @if($errors->has('niveau_etude'))
                          <p> {{ $errors->first('niveau_etude') }} </p>
                          @endif
                        </div>
                          <div class="row">
                          <div class="col-4 has-success form-group">
                          <label for="inputIsValid" class=" form-control-label">NOMBRE D'ANNEE D'EXPERIENCE</label>
                          <select name="nbre_annee_exp" id="selectLg" class="is-valid form-control form-control">
                          <option></option>
                          <option value="-1"> -1 AN</option>
                          <option value="1">1 AN</option>
                          <option value="2">2 ANS</option>
                          <option value="3">3 ANS</option>
                          <option value="4">4 ANS</option>
                          <option value="5">5 ANS</option>
                          <option value="6">6 ANS</option>
                          <option value="7">7 ANS</option>
                          <option value="8">8 ANS</option>
                          <option value="9">9 ANS</option>
                          <option value="10">10 ANS</option>
                          <option value="11">11 ANS</option>
                          <option value="12">12 ANS</option>
                          <option value="13">13 ANS</option>
                          <option value="14">14 ANS</option>
                          <option value="15">15 ANS</option>
                          <option value="AUTRE"> >15 ANS</option>
                          </select>

                          </div>
                          @if($errors->has('nbre_annee_exp'))
                          <p> {{ $errors->first('nbre_annee_exp') }} </p>
                          @endif

                        <div class="col-4 has-success form-group">
                        <label for="inputIsValid" class=" form-control-label">DATE DEBUT</label>
                        <input type="date" id="inputIsValid" name="date_debut" class="is-valid form-control-success form-control">
                        </div>
                        @if($errors->has('date_debut'))
                        <p> {{ $errors->first('date_debut') }} </p>
                        @endif
                        <div class="col-4 has-success form-group">
                        <label id="autre" class=" form-control-label">DATE FIN</label>
                        <input type="date" id="date_fin" name="date_fin"  class="is-valid form-control-success form-control">
                        </div>
                        @if($errors->has('date_fin'))
                        <p> {{ $errors->first('date_fin') }} </p>
                        @endif
                        </div>
                        <br />
                      <div class="form-group"> <center>
                        <a class="btn btn-xs btn-danger" href="{{ route('cti.index-employe') }}">RETOURNER</a>
                    <button type="submit"  class="btn btn-success">VALIDER</button>
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
  </div>

@endsection
