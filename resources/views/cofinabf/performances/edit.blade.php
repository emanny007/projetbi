@extends('layouts.master-bf')

@section('modify_performance')
  <!-- MAIN CONTENT-->
  <div class="uker">
      <div class="section__content section__content--p30">
          <div class="container-fluid">
            <br />
            <div class="col-sm-6 col-lg-12">
                @include('includes.sous-menu-bf')
          </div>

                        <div class="row well m-t-30">
                              <div class="col-md-12">
                                <div class="card">
                                  <div class="card-header">
                                   <center><strong>Gestion de la performance du staff</strong></center>
                                  </div>

                                  <div class="card-body card-block">
                                    <!-- DATA TABLE-->
                                    <div class="table-responsive table m-b-40">
                                        <table border="1" class="table table-borderless table-earning">

                                            <tbody>

                                                <tr>
                                                    <td>Nom:  {{ $employe->matricule }}</td>

                                                    <td>Nom:  {{ $employe->nom }}</td>

                                                    <td>Prenom: {{ $employe->prenom }}</td>

                                                    <td>DEPTMT: {{ $employe->departement }}</td>

                                                    <td>Entite: {{ $employe->entite }}</td>

                                                    <td>Sexe: {{ $employe->sexe }}</td>

                                                    <td>Action</td>

                                                </tr>



                                                <input type="hidden" id="inputIsValid" name="_method" value="PUT">
                                                @foreach ($performance as $performance)
                                                <tr>
                                                    <td>ANNEE : <span class="badge badge-warning">{{ $performance->libelle }}</span><!--input type="text" name="annee_eval" value="{{ $performance->libelle }}" class="is-valid form-control-success form-control" readonly--></td>
                                                    <td>POSITION EF : <span class="badge badge-warning">{{ $performance->position_ef }}</span><!--input type="text" name="position_ef" value="{{ $performance->position_ef }}" class="is-valid form-control-success form-control" readonly--></td>
                                                    <td>NOTE MP : <span class="badge badge-warning">{{ $performance->note_mp }}</span> <!--input type="text" name="note_mp" value="{{ $performance->note_mp }}" class="is-valid form-control-success form-control" readonly--></td>
                                                    <td>NOTE MDV MP : <span class="badge badge-warning">{{ $performance->note_mdv_mp }}</span> <!--input type="text" name="note_mdv_mp" value="{{ $performance->note_mdv_mp }}" class="is-valid form-control-success form-control" readonly--> </td>
                                                    <td>NOTE EF : <span class="badge badge-warning">{{ $performance->note_ef }}</span> <!--input type="text" name="note_ef" value="{{ $performance->note_ef }}" class="is-valid form-control-success form-control" readonly--></td>
                                                    <td>NOTE MDV: <span class="badge badge-warning">{{ $performance->note_mdv }}</span> <!--input type="text" name="note_mdv" value="{{ $performance->note_mdv }}" class="is-valid form-control-success form-control" readonly--></td>
                                                    <td>
                                                      <!--a class="btn btn-primary" href="{{ route('sn.performances.modif',$employe->id) }}"><span class="fas fa-edit"></span></a-->
                                                      <form action="{{ route('bf.performances.destroy', $performance->id) }}" method="post" onsubmit = 'ConfirmDelete()'><button class="btn btn-danger" type="submit">
                                                          <span class="fas fa-archive"></span></button>@csrf @method('DELETE')
                                                      </form>
                                                     </td>
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
                      <form name="form1" class="form-horizontal" method="POST" action="{{ route('bf.performances.store',$employe->id)}}">
                        {{ csrf_field() }}
                        <div class="row">
                          <div class="col-2 has-success form-group">
                          <label for="inputIsValid" class=" form-control-label">ANNEE D'EVALUATION</label>
                          <input type="text" id="inputIsValid" name="annee_eval" class="is-valid form-control-success form-control" required>
                          <input type="hidden" value="{{ $employe->id }}" name="id_empl"/>
                          </div>
                          @if($errors->has('annee_eval'))
                          <p> {{ $errors->first('annee_eval') }} </p>
                          @endif

                          <div class="col-2 has-success form-group">
                          <label for="inputIsValid" class=" form-control-label">NOTE MI-PARCOURS</label>
                          <input type="text" id="inputIsValid" name="note_mp" class="is-valid form-control-success form-control">
                          </div>
                          @if($errors->has('note_mp'))
                          <p> {{ $errors->first('note_mp') }} </p>
                          @endif

                          <div class="col-2 has-success form-group">
                          <label for="inputIsValid" class=" form-control-label">NOTE MDV MI-PARCOURS</label>
                          <input type="text" id="inputIsValid" name="note_mdv_mp" class="is-valid form-control-success form-control">
                          </div>
                          @if($errors->has('note_mdv_mp'))
                          <p> {{ $errors->first('note_mdv_mp') }} </p>
                          @endif

                            <div class="col-2 has-success form-group">
                            <label for="inputIsValid" class=" form-control-label">NOTE FINALE</label>
                            <input type="text" id="inputIsValid" name="note_ef" class="is-valid form-control-success form-control">
                            </div>
                            @if($errors->has('note_ef'))
                            <p> {{ $errors->first('note_ef') }} </p>
                            @endif

                            <div class="col-2 has-success form-group">
                            <label for="inputIsValid" class=" form-control-label">NOTE MDV FINALE</label>
                            <input type="text" id="inputIsValid" name="note_mdv" class="is-valid form-control-success form-control">
                            </div>
                            @if($errors->has('note_mdv'))
                            <p> {{ $errors->first('note_mdv') }} </p>
                            @endif

                          <div class="col-2 has-success form-group">
                          <label for="inputIsValid" class=" form-control-label">POSITION EVAL. FINALE</label>
                          <select name="position_ef" id="selectLg" class="is-valid form-control form-control">
                            <option></option>
                            <option value="TALENT">TALENT</option>
                            <option value="POTENTIEL">POTENTIEL</option>
                            <option value="PILIER +">PILIER + </option>
                            <option value="PILIER -">PILIER - </option>
                            <option value="RESERVE +">RESERVE +</option>
                            <option value="RESERVE -">RESERVE -</option>
                            <option value="FREINS">FREINS</option>
                          </select>
                          </div>
                          @if($errors->has('position_ef'))
                          <p> {{ $errors->first('position_ef') }} </p>
                          @endif
                        </div>
                        <br />
                      <div class="form-group"> <center>
                        <a class="btn btn-xs btn-danger" href="{{ route('bf.performances.index') }}">RETOURNER</a>
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
