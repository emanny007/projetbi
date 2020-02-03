@extends('layouts.master-sn')

@section('modify_edit_sanction')
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
                                   <center><strong>Gestion des sanctions</strong></center>
                                  </div>

                                  <div class="card-body card-block">
                                    <!-- DATA TABLE-->
                                    <div class="table-responsive table m-b-40">
                                        <table  class="table table-borderless table-earning">
                                            <tbody>
                                                <tr>
                                                    <td> <strong>Nom:  {{ $employe->nom }} </strong></td>

                                                    <td><strong>Prenom: {{ $employe->prenom }}</strong></td>

                                                    <td><strong>Email: {{ $employe->email }}</strong></td>

                                                    <td><strong>Entite: {{ $employe->entite }}</strong></td>

                                                    <td><strong>ACTION</strong></td>

                                                </tr>

                                                @foreach ($sanctions as $sanctions)
                                                <tr>
                                                    <td>Date sanction:  {{ date('d-m-Y', strtotime($sanctions->date_sanction)) }}</td>
                                                    <td>Type sanction: {{ $sanctions->type_sanction }}</td>
                                                    <td colspan="2">{{ $sanctions->commentaire }}</td>

                                                    <td><form action="{{ route('sn.sanctions.destroy', $sanctions->id) }}" method="post" onsubmit = 'ConfirmDelete()'><button class="btn btn-danger" type="submit">
                                                        <span class="fas fa-archive"></span></button>@csrf @method('DELETE')</form></td>
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
                      <form name="form1" class="form-horizontal" method="POST" action="{{ route('sn.sanctions.store',$employe->id)}}">
                        {{ csrf_field() }}
                        <div class="row">
                          <div class="col-2 has-success form-group">
                          <label for="inputIsValid" class=" form-control-label">DATE SANCTION</label>
                          <input type="date" id="inputIsValid" name="date_sanction" class="is-valid form-control-success form-control" required>
                          <input type="hidden" value="{{ $employe->id }}" name="id_empl"/>
                          </div>
                          @if($errors->has('date_sanction'))
                          <p> {{ $errors->first('date_sanction') }} </p>
                          @endif

                          <div class="col-2 has-success form-group">
                              <label for="inputIsValid" class=" form-control-label">TYPE DE SANCTION</label>
                              <select name="type_sanction" id="selectLg" class="is-valid form-control-success form-control">
                                <option></option>
                                <option value="AVERTISSEMENT">AVERTISSEMENT</option>
                                <option value="BLAME">BLAME</option>
                                <option value="MISE A PIED">MISE A PIED</option>
                                <option value="LICENCIEMENT">LICENCIEMENT</option>
                                <!--option value="AUTRES">AUTRES</option-->
                              </select>
                          </div>
                              @if($errors->has('type_sanction'))
                              <p> {{ $errors->first('type_sanction') }} </p>
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
                        <a class="btn btn-xs btn-danger" href="{{ route('sn.sanctions.index') }}">RETOURNER</a>
                    <button type="submit"  class="btn btn-success">AJOUTER</button>
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
