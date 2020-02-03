@extends('layouts.master-sn')

@section('modify_edit_depart')
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
                                 <center><strong>Gestion des Departs</strong></center>
                                </div>

                                <div class="card-body card-block">
                                  <!-- DATA TABLE-->
                                  <div class="table-responsive table m-b-40">
                                      <table class="table table-borderless table-earning">

                                          <tbody>

                                              <tr>
                                                <td>Matricule: {{ $employe->matricule }}</td>

                                                  <td>Nom:  {{ $employe->nom }}</td>

                                                  <td>Prenom: {{ $employe->prenom }}</td>

                                                  <td>Departement: {{ $employe->departement }}</td>

                                                  <td>Categorie: {{ $employe->categorie }}</td>

                                                  <td>Secteur: {{ $employe->secteur }}</td>

                                                  <td>Entite: {{ $employe->entite }}</td>

                                              </tr>
                                          </tbody>
                                      </table>

                                    </div>
                                  </div>

          <div class="card">
            <div class="card-header">
             <strong></strong>
            </div>
                  <div class="card-body card-block">
                    <form name="form1" class="form-horizontal" method="POST" action="{{ route('sn.departs.update',$employe->id)}}">
                      {{ csrf_field() }}
                      <div class="row">
                        <div class="col-3 has-success form-group">
                        <label for="inputIsValid" class=" form-control-label">Date depart</label>
                        @if(!empty($depart))
                        <input type="date" id="inputIsValid" name="date_depart" value="{{ $depart->date_depart }}" class="is-valid form-control-success form-control">
                        <input type="hidden" value="{{ $employe->id }}" name="id_empl"/>
                        @else
                        <input type="date" id="inputIsValid" name="date_depart" class="is-valid form-control-success form-control">
                        <input type="hidden" value="{{ $employe->id }}" name="id_empl"/>
                        @endif
                        </div>
                        @if($errors->has('date_depart'))
                        <p> {{ $errors->first('date_depart') }} </p>
                        @endif

                        <div class="col-3 has-success form-group">
                        <label for="inputIsValid" class=" form-control-label">TYPE DEPART</label>
                        <select name="type_depart" id="selectLg" class="is-valid form-control form-control">
                        @if(!empty($depart))
                        <option value="{{ $depart->type_depart }}">{{ $depart->type_depart }}</option>
                        @else
                        <option></option>
                        @endif
                        <option value="DEMISSION">DEMISSION</option>
                        <option value="AFFECTATION">AFFECTATION</option>
                        <option value="DEPART NEGOCIE">DEPART NEGOCIE</option>
                        <option value="FIN CDD">FIN CDD</option>
                        <option value="FIN STAGE">FIN STAGE</option>
                        <option value="FIN ESSAI">FIN ESSAI</option>
                        <option value="LICENCIEMENT">LICENCIEMENT</option>
                        <option value="RETRAITRE">RETRAITRE</option>
                        <option value="DECES">DECES</option>
                        </select>
                        </div>

                        @if($errors->has('type_depart'))
                        <p> {{ $errors->first('type_depart') }} </p>
                        @endif

                        <div class="col-3 has-success form-group">
                        <label for="inputIsValid" class=" form-control-label">COMMENTAIRE</label>
                        @if(!empty($depart))
                        <textarea class="is-valid form-control-success form-control" name="motif" id="inputIsValid" cols="10">{{ $depart->motif }}</textarea>
                        @else
                        <textarea class="is-valid form-control-success form-control" name="motif" id="inputIsValid" cols="10"></textarea>

                        @endif
                        </div>
                        @if($errors->has('motif'))
                        <p> {{ $errors->first('motif') }} </p>
                        @endif


                      <br /><br /><br />
                    <div class="form-group">
                      <center>
                        <a class="btn btn-xs btn-danger" href="{{ route('sn.departs.index') }}">RETOURNER</a>
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
</div>

@endsection
