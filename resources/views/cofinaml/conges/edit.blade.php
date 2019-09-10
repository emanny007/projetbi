@extends('layouts.master-ml')

@section('modify_edit_conge')
  <!-- MAIN CONTENT-->
  <div class="uker">
      <div class="section__content section__content--p30">
          <div class="container-fluid">
            <br />
            <div class="col-sm-6 col-lg-12">

              @include('includes.sous-menu-ml')

          </div>
                        <div class="row well m-t-30">
                              <div class="col-md-12">
                                <div class="card">
                                  <div class="card-header">
                                   <center><strong>Gestion des conges</strong></center>
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

                                                @foreach ($conge as $conge)
                                                <tr>
                                                    <td>Date Demande:  {{ date('d-m-Y', strtotime($conge->date_demande)) }}</td>
                                                    <td>Type De Conge: {{ $conge->type_conge }}</td>
                                                    <td>Date Depart: {{ date('d-m-Y', strtotime($conge->date_depart)) }}</td>
                                                    <td>Date Retour: {{ date('d-m-Y', strtotime($conge->date_retour)) }}</td>
                                                    <td>Commentaire: {{ $conge->commentaire }}</td>
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
                      <form name="form1" class="form-horizontal" method="POST" action="{{ route('ml.conges.store',$employe->id)}}">
                        {{ csrf_field() }}
                        <div class="row">
                          <div class="col-2 has-success form-group">
                          <label for="inputIsValid" class=" form-control-label">DATE DE LA DEMANDE</label>
                          <input type="date" id="inputIsValid" name="date_demande" class="is-valid form-control-success form-control">
                          <input type="hidden" value="{{ $employe->id }}" name="id_empl"/>
                          </div>
                          @if($errors->has('date_demande'))
                          <p> {{ $errors->first('date_demande') }} </p>
                          @endif

                          <div class="col-2 has-success form-group">
                              <label for="inputIsValid" class=" form-control-label">TYPE DE CONGE</label>
                              <select name="type_conge" id="selectLg" class="is-valid form-control-success form-control">
                                <option></option>
                                <option value="CONGE PAYE">CONGE PAYE</option>
                                <option value="CONGE MALADIE">CONGE MALADIE</option>
                                <option value="CONGE PARENTAL">CONGE PARENTAL</option>
                              </select>
                          </div>
                              @if($errors->has('type_conge'))
                              <p> {{ $errors->first('type_conge') }} </p>
                              @endif

                        <div class="col-2 has-success form-group">
                        <label for="inputIsValid" class=" form-control-label">DATE DEPART</label>
                        <input type="date" id="inputIsValid" name="date_depart" class="is-valid form-control-success form-control">
                        </div>
                        @if($errors->has('date_depart'))
                        <p> {{ $errors->first('date_depart') }} </p>
                        @endif
                        <div class="col-2 has-success form-group">
                        <label id="autre" class=" form-control-label">DATE RETOUR</label>
                        <input type="date" id="date_fin" name="date_retour"  class="is-valid form-control-success form-control">
                        </div>
                        @if($errors->has('date_retour'))
                        <p> {{ $errors->first('date_retour') }} </p>
                        @endif

                        <div class="col-4 has-success form-group">
                        <label for="inputIsValid" class=" form-control-label">COMMENTAIRE</label>
                        <textarea class="is-valid form-control-success form-control" name="commentaire" id="inputIsValid" rows="2"></textarea>
                        </div>
                        @if($errors->has('commentaire'))
                        <p> {{ $errors->first('commentaire') }} </p>
                        @endif

                        </div>
                        <br />
                      <div class="form-group"> <center>
                        <a class="btn btn-xs btn-danger" href="{{ route('ml.conges.index') }}">RETOURNER</a>
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
