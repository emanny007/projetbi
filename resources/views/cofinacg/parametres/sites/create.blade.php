@extends('layouts.master')

@section('creation_site')
  <!-- MAIN CONTENT-->
  <div class="uker">
      <div class="section__content section__content--p30">
          <div class="container-fluid">

            <div class="row m-t-30">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                       <center><strong>Ajouter une entite </strong></center>
                      </div>
                      <div class="card-body card-block">
                      <form enctype="multipart/form-data" class="form-horizontal" method="POST" action="{{ route('sites.store') }}">
                      {{ csrf_field() }}
                      <div class="row">
                      <div class="col-6 has-success form-group">
                        <label for="inputIsValid" class=" form-control-label">PAYS</label>
                        <input type="text" id="inputIsValid" name="pays"  value="{{ old('pays') }}" class="is-valid form-control-success form-control"  required>
                      @if($errors->has('pays'))
                      <p> {{ $errors->first('pays') }} </p>
                      @endif
                      </div>
                      <div class="col-6 has-success form-group">
                        <label for="inputIsValid" class=" form-control-label">ENTITE</label>
                        <input type="text" id="inputIsValid" name="entite" value="{{ old('entite') }}" class="is-valid form-control-success form-control">
                      </div>
                      @if($errors->has('entite'))
                      <p> {{ $errors->first('entite') }} </p>
                      @endif
                    </div>
                    <div class="row">
                      <div class="col-6 has-success form-group">
                        <label for="inputIsValid" class=" form-control-label">NATIONNALITE</label>
                        <input type="text" id="inputIsValid" name="nationnalite" value="{{ old('nationnalite') }}"class="is-valid form-control-success form-control" required>
                      </div>
                      @if($errors->has('nationnalite'))
                      <p> {{ $errors->first('nationnalite') }} </p>
                      @endif
                      <div class="col-6 has-success form-group">
                        <label for="inputIsValid" class=" form-control-label">JOINDRE LE DRAPEAU DU PAYS</label>
                        <input type="file" id="inputIsValid" name="photo" class="is-valid form-control-success form-control"  required>
                      </div>
                      @if($errors->has('photo'))
                      <p> {{ $errors->first('photo') }} </p>
                      @endif
                      </div>

                    <br /><br />
                    <div class="form-group">
                       <center>

                      <a class="btn btn-xs btn-danger" href="{{ route('sites.index') }}">RETOURNER</a>
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
