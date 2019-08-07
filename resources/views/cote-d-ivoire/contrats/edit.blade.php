@extends('layouts.checker')

@section('modify_contrat')
  <!-- MAIN CONTENT-->
  <div class="uker">
      <div class="section__content section__content--p30">
          <div class="container-fluid">
            <br />

            <center>
              <a class="btn btn-xs btn-primary" href="{{ route('index-employe') }}"><span class="fas fa-user"></span> Employes &nbsp;</a>
              <a class="btn btn-xs btn-primary" href="{{ route('show-employe',$employe->id) }}"><span class="fas fa-info"></span> Afficher &nbsp;</a>
              <a class="btn btn-xs btn-primary" href="{{ route('edit-employe',$employe->id) }}"><span class="fas fa-user"></span> Modifier &nbsp;</a>
              <a class="btn btn-xs btn-primary" href="{{ route('ci.contrats.edit',$employe->id) }}"><span class="fas fa-edit"></span> Contrat &nbsp;</a>
              <a class="btn btn-xs btn-primary" href="{{ route('ci.postes.edit',$employe->id) }}"><span class="fas fa-male"></span> Poste &nbsp;</a>
              <a class="btn btn-xs btn-primary" href="{{ route('ci.formations.edit',$employe->id) }}"><span class="fas fa-suitcase"></span> Formation &nbsp;</a>
              <a class="btn btn-xs btn-primary" href="{{ route('ci.experiences.edit',$employe->id) }}"><span class="fas fa-tasks"></span> Experience &nbsp;</a>
              <a class="btn btn-xs btn-primary" href="{{ route('ci.conges.edit',$employe->id) }}"><span class="fas fa-table"></span> Conge &nbsp;</a>
          </center>
                        <div class="row well m-t-30">
                              <div class="col-md-12">
                                <div class="card">
                                  <div class="card-header">
                                   <center><strong>Gestion de contrats</strong></center>
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

                                                </tr>

                                                <tr>
                                                    <td>Tel pro:  {{ $employe->tel_pro }}</td>

                                                    <td>Tel personel:  {{ $employe->tel_perso }}</td>

                                                    <td>Sexe: {{ $employe->sexe }}</td>

                                                    <td>Entite: {{ $employe->entite }}</td>

                                                </tr>
                                                    <td align='center'>{{ $employe->type_contrat }}</td>
                                                    <td>{{ $employe->date_debut }}</td>
                                                    <td>{{ $employe->date_fin }}</td>

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
                      <form name="form1" class="form-horizontal" method="POST" action="{{ route('ci.contrats.update',$employe->id)}}">
                        {{ csrf_field() }}
                        <div class="row">
                        <div class="col-4 has-success form-group">
                            <label for="inputIsValid" class=" form-control-label">TYPE DE CONTRAT</label>
                              <select name="type_contrat" id="selectLg" onChange="afficherAutre()" class="is-valid form-control-success form-control">

                                @if(!empty($contrat))
                                  <option value="{{ $contrat->type_contrat }}">{{ $contrat->type_contrat }}</option>
                                @else
                                  <option></option>
                                @endif
                                  <option value="STAGE">STAGE</option>
                                  <option value="PRESTATION">PRESTATION</option>
                                  <option value="CDD">CDD</option>
                                  <option value="CDI">CDI</option>

                              </select>
                              <input type="hidden" value="{{ $employe->id }}" name="id_empl"/>
                        </div>
                            @if($errors->has('type_contrat'))
                            <p> {{ $errors->first('type_contrat') }} </p>
                            @endif

                        <div class="col-4 has-success form-group">
                        <label for="inputIsValid" class=" form-control-label">DATE DEBUT</label>
                        @if(!empty($contrat))
                        <input type="date" id="inputIsValid" name="date_debut" value="{{ $contrat->date_debut }}" class="is-valid form-control-success form-control">
                        @else
                        <input type="date" id="inputIsValid" name="date_debut" class="is-valid form-control-success form-control">
                        @endif
                        </div>
                        @if($errors->has('date_debut'))
                        <p> {{ $errors->first('date_debut') }} </p>
                        @endif

                        <div class="col-4 has-success form-group">
                        <label id="autre" class=" form-control-label">DATE FIN</label>
                        @if(!empty($contrat))
                        <input type="date" id="date_fin" name="date_fin" value="{{ $contrat->date_fin }}" class="is-valid form-control-success form-control">
                        @else
                        <input type="date" id="date_fin" name="date_fin" class="is-valid form-control-success form-control">
                        @endif
                        </div>
                        @if($errors->has('date_fin'))
                        <p> {{ $errors->first('date_fin') }} </p>
                        @endif
                        </div>
                        <br />
                      <div class="form-group"> <center>
                        <a class="btn btn-xs btn-danger" href="{{ route('index-employe') }}">RETOURNER</a>
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
