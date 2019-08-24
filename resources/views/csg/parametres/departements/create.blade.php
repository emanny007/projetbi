@extends('layouts.master')

@section('creation_departement')
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
                      <br />
                      <div class="row">
                      <div class="card-body">
                      <form enctype="multipart/form-data" class="form-horizontal" method="POST" action="{{ route('departements.store') }}">
                      {{ csrf_field() }}

                        <div class="col-6 has-success form-group">
                        <input type="text" id="inputIsValid" name="departement"  value="{{ old('departement') }}" class="is-valid form-control-success form-control">
                        @if($errors->has('departement'))
                        <p> {{ $errors->first('departement') }} </p>
                        @endif
                        </div>
                        <div class="col-4 has-success form-group">
                        <button type="submit"  class="btn btn-success">CREER </button>
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
