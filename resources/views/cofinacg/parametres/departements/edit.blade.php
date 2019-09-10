@extends('layouts.master')

@section('modify_departement')
  <!-- MAIN CONTENT-->
  <div class="uker">
      <div class="section__content section__content--p30">
          <div class="container-fluid">

            <div class="row m-t-30">
                  <div class="col-md-12">
                    <div class="card"> <center>
                      <div class="card-header">
                       <strong>INTITULE DU DEPARTEMENT</strong>
                      </div>
                      <div class="row">
                      <div class="card-body">
                      <form class="form-horizontal" method="POST" action="{{ route('departements.update',$departements->id) }}">
                      {{ csrf_field() }}
                      <input type="hidden" id="inputIsValid" name="_method" value="PUT">
                        <div class="col-6 has-success form-group">
                        <input type="text" id="inputIsValid" name="departement"   value="{{ $departements->libelle }}" class="is-valid form-control-success form-control">
                        @if($errors->has('departement'))
                        <p> {{ $errors->first('departement') }} </p>
                        @endif
                        </div>
                        <div class="col-4 has-success form-group">
                        <button type="submit"  class="btn btn-success">MODIFIER</button>
                        <a class="btn btn-xs btn-danger" href="{{ route('departements.index') }}">RETOURNER</a>
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
