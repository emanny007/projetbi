@extends('layouts.master-sn')

@section('modify_formation')
  <!-- MAIN CONTENT-->
  <div class="uker">
      <div class="section__content section__content--p30">
          <div class="container-fluid">
            <br />
            <div class="col-sm-6 col-lg-12">
                  @include('includes.sous-menu-sn')

          </div>

                        <div class="row well m-t-30">
                              <div class="col-md-12">
                                <div class="card">
                                  <div class="card-header">
                                   <center><strong>Gestion de la formation</strong></center>
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

                                                    <td>Email: {{ $employe->email }}</td>

                                                    <td>Entite: {{ $employe->entite }}</td>

                                                </tr>

                                                @foreach ($formation as $formation)
                                                <tr>
                                                    <td>Formation: {{ $formation->libelle }}</td>
                                                    <td>Ets: {{ $formation->nbre_heure }}</td>
                                                    <td>Cout: {{ $formation->cout }}</td>
                                                    <td>Debut: {{ $formation->date_debut }}</td>
                                                    <td>Fin: {{ $formation->date_fin }}</td>
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
                      <form name="form1" class="form-horizontal" method="POST" action="{{ route('sn.formations.store',$employe->id)}}">
                        {{ csrf_field() }}
                        <div class="row">
                          <div class="col-3 has-success form-group">
                          <label for="inputIsValid" class=" form-control-label">INTITULE DE LA FORMATION</label>
                          <input type="text" id="inputIsValid" name="libelle" class="is-valid form-control-success form-control" required>
                          <input type="hidden" value="{{ $employe->id }}" name="id_empl"/>
                          </div>
                          @if($errors->has('libelle'))
                          <p> {{ $errors->first('libelle') }} </p>
                          @endif

                          <div class="col-3 has-success form-group">
                          <label for="inputIsValid" class=" form-control-label">ETABLISSEMENT</label>
                          <input type="text" id="inputIsValid" name="nbre_heure" class="is-valid form-control-success form-control" required>
                          </div>
                          @if($errors->has('nbre_heure'))
                          <p> {{ $errors->first('nbre_heure') }} </p>
                          @endif

                          <div class="col-2 has-success form-group">
                          <label for="inputIsValid" class=" form-control-label">COUT</label>
                          <input type="text" id="inputIsValid" name="cout" class="is-valid form-control-success form-control" required>
                          </div>
                          @if($errors->has('cout'))
                          <p> {{ $errors->first('cout') }} </p>
                          @endif

                        <div class="col-2 has-success form-group">
                        <label for="inputIsValid" class=" form-control-label">DATE DEBUT</label>
                        <input type="date" id="inputIsValid" name="date_debut" class="is-valid form-control-success form-control" required>
                        </div>
                        @if($errors->has('date_debut'))
                        <p> {{ $errors->first('date_debut') }} </p>
                        @endif
                        <div class="col-2 has-success form-group">
                        <label id="autre" class=" form-control-label">DATE FIN</label>
                        <input type="date" id="date_fin" name="date_fin"  class="is-valid form-control-success form-control" required>
                        </div>
                        @if($errors->has('date_fin'))
                        <p> {{ $errors->first('date_fin') }} </p>
                        @endif
                        </div>
                        <br />
                      <div class="form-group"> <center>
                        <a class="btn btn-xs btn-danger" href="{{ route('sn.main') }}">RETOURNER</a>
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
