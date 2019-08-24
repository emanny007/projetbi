@extends('layouts.master')

@section('reporting_excel')
  <!-- MAIN CONTENT-->
  <div class="main-content">
      <div class="section__content section__content--p30">
          <div class="container-fluid">

            <div class="row m-t-30">
                  <div class="col-md-12">
                    <div>
                      <br />
                      <center>
                        <a  href="{{ route('reportings.export') }}" class="btn btn-lg btn-success">
                            <i class="fa fa-download fa-lg"></i>&nbsp;
                            <span id="payment-button-amount">Export Excel Data</span>
                        </a>
                      </center>
                    </div>

    <div class="card">
    <div class="card-header"></div>
    <div class="card-body">
        <div class="card-title">
            <h3 class="text-center title-2">Reporting </h3>
        </div>
        <hr>
        <form action="{{ route('reportings.export') }}" method="post" enctype="multipart/form-data">
          <div class="row">
              <div class="col-6">
                {{csrf_field()}}
                  <div class="form-group">
                      <label class="control-label mb-1">DATE DEBUT</label>
                      <input name="date_debut" type="date" class="is-invalid form-control form-control">
                  </div>
              </div>
              <div class="col-6">
                  <label class="control-label mb-1">DATE FIN</label>
                  <div class="input-group">
                      <input name="date_fin" type="date" class="is-invalid form-control form-control">
                  </div>
              </div>
          </div>
          <div class="row form-group">
              <div class="col col-md-3">
                <label class=" form-control-label">Choisir un filtre</label>
              </div>
          </div>
          <div class="row">
          <div class="col-6 has-success form-group">
            <label for="inputIsValid" class=" form-control-label">NATIONNALITE</label>
              <select name="nationnalite" id="selectLg" class="is-invalid form-control form-control">
                <option>ALL</option>
                @foreach($sites as $site)
                <option value="{{$site->nationnalite}}">{{$site->nationnalite}}</option>
                @endforeach
              </select>
          </div>
          @if($errors->has('nationnalite'))
          <p> {{ $errors->first('nationnalite') }} </p>
          @endif

          <div class="col-6 has-success form-group">
            <label for="inputIsValid" class=" form-control-label">PAYS</label>
              <select name="pays" id="selectLg" class="is-invalid form-control form-control">
                <option>ALL</option>
                @foreach($sites as $site)
                <option value="{{$site->entite}}">{{ $site->entite }}</option>
                @endforeach
              </select>
          </div>
          @if($errors->has('pays'))
          <p> {{ $errors->first('pays') }} </p>
          @endif
        </div>

                  <div class="row">
                  <div class="col-6 has-success form-group">
                    <label for="inputIsValid" class=" form-control-label">SEXE</label>
                      <select name="sexe" id="selectLg" class="is-invalid form-control form-control">
                        <option>ALL</option>
                        <option>MASCULIN</option>
                        <option>FEMININ</option>
                      </select>
                  </div>
                  @if($errors->has('sexe'))
                  <p> {{ $errors->first('sexe') }} </p>
                  @endif

                  <div class="col-6 has-warning form-group">
                    <label for="inputIsValid" class=" form-control-label">SITUATION MATRIMONIALE</label>
                      <select name="situation_matrimoniale" id="selectLg" class="is-invalid form-control form-control">
                        <option>ALL</option>
                        <option value="CELIBATAIRE">CELIBATAIRE</option>
                        <option value="MARIEE">MARIEE</option>
                        <option value="DIVORCEE">DIVORCEE</option>
                        <option value="VEUVE">VEUVE</option>
                     </select>
                  </div>
                  @if($errors->has('situation_matrimoniale'))
                  <p> {{ $errors->first('situation_matrimoniale') }} </p>
                  @endif
                </div>

            <div>
              <br />
              <center>
                <button id="payment-button" type="submit" class="btn btn-lg btn-danger">
                    <i class="fa fa-download fa-lg"></i>&nbsp;
                    <span id="payment-button-amount">Exporter</span>
                </button>
              </center>
            </div>
          </form>


          <br />
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
