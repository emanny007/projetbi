@extends('layouts.master')

@section('creation_etablissement')
  <!-- MAIN CONTENT-->
  <div class="uker">
      <div class="section__content section__content--p30">
          <div class="container-fluid">

            <div class="row m-t-30">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                       <center><strong>Ajouter un etablissement </strong></center>
                      </div>
                      <div class="card-body card-block">
                      <form enctype="multipart/form-data" class="form-horizontal" method="POST" action="{{ route('etablissements.store') }}">
                      {{ csrf_field() }}
                      <div class="row">
                      <div class="col-3 has-success form-group">
                        <label for="inputIsValid" class=" form-control-label">ETABLISSEMENT</label>
                        <input type="text" id="inputIsValid" name="etablissement"  value="{{ old('etablissement') }}" class="is-valid form-control-success form-control" required>
                      @if($errors->has('etablissement'))
                      <p> {{ $errors->first('etablissement') }} </p>
                      @endif
                      </div>
                      <div class="col-3 has-success form-group">
                        <label for="inputIsValid" class=" form-control-label">SIGLE</label>
                        <input type="text" id="inputIsValid" name="sigle" value="{{ old('sigle') }}" class="is-valid form-control-success form-control" required>
                      </div>
                      @if($errors->has('sigle'))
                      <p> {{ $errors->first('sigle') }} </p>
                      @endif
                      <div class="col-3 has-success form-group">
                        <label for="inputIsValid" class=" form-control-label">ADRESSE</label>
                        <input type="text" id="inputIsValid" name="adresse" value="{{ old('adresse') }}" class="is-valid form-control-success form-control">
                      </div>
                      @if($errors->has('adresse'))
                      <p> {{ $errors->first('adresse') }} </p>
                      @endif
                      <div class="col-3 has-success form-group">
                        <label for="inputIsValid" class=" form-control-label">TELEPHONE</label>
                        <input type="text" id="inputIsValid" name="telephone" value="{{ old('telephone') }}"class="is-valid form-control-success form-control">
                      </div>
                      @if($errors->has('telephone'))
                      <p> {{ $errors->first('telephone') }} </p>
                      @endif
                    </div>
                    <div class="row">
                      <div class="col-3 has-success form-group">
                        <label for="inputIsValid" class=" form-control-label">SITE WEB</label>
                        <input type="text" id="inputIsValid" name="siteweb" value="{{ old('siteweb') }}"class="is-valid form-control-success form-control">
                      </div>
                      @if($errors->has('siteweb'))
                      <p> {{ $errors->first('siteweb') }} </p>
                      @endif
                      <div class="col-3 has-success form-group">
                      <label for="inputIsValid" class=" form-control-label">BOITE POSTALE</label>
                      <input type="text" id="inputIsValid" name="boitepostale" value="{{ old('boitepostale') }}"class="is-valid form-control-success form-control">
                      </div>
                    @if($errors->has('boitepostale'))
                    <p> {{ $errors->first('boitepostale') }} </p>
                    @endif
                    <div class="col-3 has-success form-group">
                      <label for="inputIsValid" class=" form-control-label">VILLE</label>
                      <input type="text" id="inputIsValid" name="ville" value="{{ old('ville') }}"class="is-valid form-control-success form-control">
                    </div>
                    @if($errors->has('ville'))
                    <p> {{ $errors->first('ville') }} </p>
                    @endif
                    <div class="col-3 has-success form-group">
                      <label for="inputIsValid" class=" form-control-label">PAYS</label required>
                      <input type="text" id="inputIsValid" name="pays" value="{{ old('pays') }}"class="is-valid form-control-success form-control">
                    </div>
                    @if($errors->has('pays'))
                    <p> {{ $errors->first('pays') }} </p>
                    @endif
                  </div>

                    <br /><br />
                    <div class="form-group">
                       <center>

                      <a class="btn btn-xs btn-danger" href="{{ route('etablissements.index') }}">RETOURNER</a>
                      <button type="submit"  class="btn btn-success">VALIDER </button>

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
