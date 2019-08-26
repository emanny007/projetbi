@extends('layouts.master-gn')

@section('modify_experience')
  <!-- MAIN CONTENT-->
  <div class="uker">
      <div class="section__content section__content--p30">
          <div class="container-fluid">
            <br />
            <div class="col-sm-6 col-lg-12">
              <center>
                <a class="btn btn-xs btn-primary" href="{{ route('gn.main') }}"><span class="fas fa-user"></span> Employes &nbsp;</a>
                <a class="btn btn-xs btn-primary" href="{{ route('gn.show',$employe->id) }}"><span class="fas fa-info"></span> Afficher &nbsp;</a>
                <a class="btn btn-xs btn-primary" href="{{ route('gn.edit',$employe->id) }}"><span class="fas fa-user"></span> Modifier &nbsp;</a>
                <a class="btn btn-xs btn-primary" href="{{ route('gn.contrats.edit',$employe->id) }}"><span class="fas fa-edit"></span> Contrat &nbsp;</a>
                <a class="btn btn-xs btn-primary" href="{{ route('gn.postes.edit',$employe->id) }}"><span class="fas fa-male"></span> Poste &nbsp;</a>
                <a class="btn btn-xs btn-primary" href="{{ route('gn.formations.edit',$employe->id) }}"><span class="fas fa-suitcase"></span> Formation &nbsp;</a>
                <a class="btn btn-xs btn-primary" href="{{ route('gn.experiences.edit',$employe->id) }}"><span class="fas fa-tasks"></span> Experience &nbsp;</a>
                <a class="btn btn-xs btn-primary" href="{{ route('gn.conges.edit',$employe->id) }}"><span class="fas fa-table"></span>Conge &nbsp;</a>
              </center>
          </div>

                        <div class="row well m-t-30">
                              <div class="col-md-12">
                                <div class="card">
                                  <div class="card-header">
                                   <center><strong>Experiences Professionnelles</strong></center>
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
                                                    <td>Date Debut: {{ $experience->date_debut }}</td>
                                                    <td>Date Fin: {{ $experience->date_fin }}</td>
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
                      <form name="form1" class="form-horizontal" method="POST" action="{{ route('gn.experiences.store',$employe->id)}}">
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
                          <input type="text" id="inputIsValid" name="niveau_etude" class="is-valid form-control-success form-control">
                          </div>
                          @if($errors->has('niveau_etude'))
                          <p> {{ $errors->first('niveau_etude') }} </p>
                          @endif
                        </div>
                          <div class="row">
                          <div class="col-4 has-success form-group">
                          <label for="inputIsValid" class=" form-control-label">NOMBRE D'ANNEE D'EXPERIENCE</label>
                          <input type="text" id="inputIsValid" name="nbre_annee_exp" class="is-valid form-control-success form-control">
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
                        <a class="btn btn-xs btn-danger" href="{{ route('gn.main') }}">RETOURNER</a>
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
