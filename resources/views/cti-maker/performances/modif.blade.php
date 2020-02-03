@extends('layouts.maker-cti')

@section('performance_staff')
  <!-- MAIN CONTENT-->
  <div class="uker">
      <div class="section__content section__content--p30">
          <div class="container-fluid"><br />
            <div class="col-sm-6 col-lg-12">

            <div class="row well m-t-30">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                       <strong>Modification des performances du staff</strong>
                      </div>

                      <div class="card-body card-block">
                      <form  enctype="multipart/form-data" class="form-horizontal" method="POST" action="{{ route('cti.performances.update',$employe->id)}}">

                      {{ csrf_field() }}
                      <input type="hidden" id="inputIsValid" name="_method" value="PUT">
                      <div class="row">

                      <div class="col-2 has-success form-group">
                        <label for="inputIsValid" class=" form-control-label">ANNEE</label>
                        <input type="text" name="annee_eval" value="{{ $performance->libelle }}" class="is-valid form-control-success form-control">
                      </div>
                      @if($errors->has('annee_eval'))
                      <p> {{ $errors->first('annee_eval') }} </p>
                      @endif
                      <div class="col-3 has-success form-group">
                         <label for="inputIsValid" class=" form-control-label">POSITION EVAL. FINALE</label>
                         <select name="position_ef" id="selectLg" class="is-valid form-control form-control">
                         <option value="{{ $performance->position_ef }}">{{ $performance->position_ef }}</option>
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

                      <div class="col-1 has-success form-group">
                      <label for="inputIsValid" class=" form-control-label">NOTE MP </label>
                      <input type="text" name="note_mp" value="{{ $performance->note_mp }}" class="is-valid form-control-success form-control">
                      </div>
                        @if($errors->has('note_mp'))
                        <p> {{ $errors->first('note_mp') }} </p>
                      @endif

                      <div class="col-1 has-success form-group">
                      <label for="inputIsValid" class=" form-control-label">NOTE MDV MP </label>
                      <input type="text" name="note_mdv_mp" value="{{ $performance->note_mdv_mp }}" class="is-valid form-control-success form-control">
                      </div>
                      @if($errors->has('note_mdv_mp'))
                      <p> {{ $errors->first('note_mdv_mp') }} </p>
                      @endif

                      <div class="col-1 has-success form-group">
                         <label for="inputIsValid" class=" form-control-label">NOTE EF</label>
                         <input type="text" name="note_ef" value="{{ $performance->note_ef }}" class="is-valid form-control-success form-control">
                      </div>
                      @if($errors->has('note_ef'))
                      <p> {{ $errors->first('note_ef') }} </p>
                      @endif

                        <div class="col-1 has-success form-group">
                        <label for="inputIsValid" class=" form-control-label">NOTE MDV</label>
                        <input type="text" name="note_mdv" value="{{ $performance->note_mdv }}" class="is-valid form-control-success form-control">
                      </div>
                      @if($errors->has('note_mdv'))
                      <p> {{ $errors->first('note_mdv') }} </p>
                      @endif

                      </div>
                      <br />
                    <div class="form-group"> <center>
                      <a class="btn btn-xs btn-danger" href="{{ route('cti.performances.edit',$employe->id) }}">RETOURNER</a>
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
