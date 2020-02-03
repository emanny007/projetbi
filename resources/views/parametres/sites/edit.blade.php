@extends('layouts.master')

@section('modify_site')
  <!-- MAIN CONTENT-->
  <div class="uker">
      <div class="section__content section__content--p30">
          <div class="container-fluid">

            <div class="row m-t-30">
                  <div class="col-md-12">
                    <div class="card"> <center>
                      <div class="card-header">
                       <strong>MODIFIER UNE ENTITE</strong>
                      </div>
                      <div class="row">
                      <div class="card-body">
                      <form enctype="multipart/form-data" class="form-horizontal" method="POST" action="{{ route('sites.update',$sites->id) }}">
                      {{ csrf_field() }}
                      <input type="hidden" id="inputIsValid" name="_method" value="PUT">
                      <div class="row">
                      <div class="col-6 has-success form-group">
                        <label for="inputIsValid" class=" form-control-label">PAYS</label>
                        <input type="text" id="inputIsValid" name="pays"  value="{{ $sites->pays }}" class="is-valid form-control-success form-control">
                      @if($errors->has('pays'))
                      <p> {{ $errors->first('pays') }} </p>
                      @endif
                      </div>
                      <div class="col-6 has-success form-group">
                        <label for="inputIsValid" class=" form-control-label">ENTITE</label>
                        <input type="text" id="inputIsValid" name="entite"  value="{{ $sites->entite }}" class="is-valid form-control-success form-control">
                      </div>
                      @if($errors->has('entite'))
                      <p> {{ $errors->first('entite') }} </p>
                      @endif
                    </div>
                    <div class="row">
                      <div class="col-6 has-success form-group">
                        <label for="inputIsValid" class=" form-control-label">NATIONALITE</label>
                        <input type="text" id="inputIsValid" name="nationnalite"  value="{{ $sites->nationnalite }}" class="is-valid form-control-success form-control">
                      </div>
                      @if($errors->has('nationnalite'))
                      <p> {{ $errors->first('nationnalite') }} </p>
                      @endif
                      <div class="col-6 has-success form-group">
                        <label for="inputIsValid" class=" form-control-label">JOINDRE LE DRAPEAU DU PAYS</label>
                        <input type="file" id="inputIsValid" name="drapeau"  value="/images/drapeau{{ $sites->lien }}" class="is-valid form-control-success form-control">
                      </div>
                      @if($errors->has('photo'))
                      <p> {{ $errors->first('photo') }} </p>
                      @endif
                      </div>

                    <br /><br />
                      <div class="col-4 has-success form-group">
                        <button type="submit"  class="btn btn-success">MODIFIER</button>
                        <a class="btn btn-xs btn-danger" href="{{ route('sites.index') }}">RETOURNER</a>
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
