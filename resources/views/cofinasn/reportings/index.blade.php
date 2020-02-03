@extends('layouts.master-sn')

@section('reporting_excel')
  <!-- MAIN CONTENT-->
  <div class="uker">
      <div class="section__content section__content--p30">
          <div class="container-fluid">

            <div class="row m-t-30">
                  <div class="col-md-12">


    <div class="card">
    <div class="card-header"></div>
    <div class="card-body">
        <div class="card-title">
            <h3 class="text-center title-2">Reporting Excel</h3>
        </div>
        <hr>
        <form action="{{ route('sn.reportings.export') }}" method="post" enctype="multipart/form-data">
          {{csrf_field()}}

                  <center><div class="col col-6">Choisir le type de filtre :&nbsp
                       <div class="form-check-inline form-check">
                           <label for="inline-radio1" class="form-check-label ">
                               <input type="radio" id="inline-radio1" name="type_filtre" value="Volume" class="form-check-input">Volume &nbsp
                           </label>
                           <label for="inline-radio2" class="form-check-label ">
                               <input type="radio" id="inline-radio2" name="type_filtre" checked value="Liste" class="form-check-input">Liste
                           </label>
                       </div>
                   </div></center><br /><br />

          <!--div class="row form-group">
              <div class="col col-md-3">
                <label class=" form-control-label">Choisir un filtre</label>
              </div>
          </div-->
          <div class="row">
          <div class="col-6 has-success form-group">
            <label for="inputIsValid" class=" form-control-label">NATIONNALITE</label>
              <select name="nationnalite" id="selectLg" class="is-invalid form-control form-control">
                <option></option>
                @foreach($nationnalites as $nationnalite)
                <option value="{{$nationnalite->nationnalite}}">{{$nationnalite->nationnalite}}</option>
                @endforeach
              </select>
          </div>
          @if($errors->has('nationnalite'))
          <p> {{ $errors->first('nationnalite') }} </p>
          @endif

          <div class="col-6 has-success form-group">
            <label for="inputIsValid" class=" form-control-label">ENTITE</label>
              <select name="entite" id="selectLg" class="is-invalid form-control form-control">
                <option></option>
                @foreach($sites as $site)
                <option value="{{$site->entite}}">{{ $site->entite }}</option>
                @endforeach
              </select>
          </div>
          @if($errors->has('entite'))
          <p> {{ $errors->first('entite') }} </p>
          @endif
        </div>

                  <div class="row">
                  <div class="col-6 has-success form-group">
                    <label for="inputIsValid" class=" form-control-label">SEXE</label>
                      <select name="sexe" id="selectLg" class="is-invalid form-control form-control">
                        <option></option>
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
                        <option></option>
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


                <div class="row">
                <div class="col-6 has-warning form-group">
                  <label for="inputIsValid" class=" form-control-label">DEPARTEMENT</label>
                    <select name="departement" id="selectLg" class="is-invalid form-control form-control">
                      <option></option>
                      @foreach($departements as $departement)
                      <option value="{{$departement->libelle}}">{{ $departement->libelle }}</option>
                      @endforeach
                    </select>
                </div>

                <div class="col-6 has-warning form-group">
                  <label for="inputIsValid" class=" form-control-label">SECTEUR</label>
                    <select name="secteur" id="selectLg" class="is-invalid form-control form-control">
                      <option></option>
                      <option value="SALES">SALES</option>
                      <option value="NON SALES">NON SALES</option>
                    </select>
                </div>
                </div>

                <div class="row">
                <div class="col-6 has-warning form-group">
                  <label for="inputIsValid" class=" form-control-label">TYPE DE CONTRAT</label>
                    <select name="type_contrat" id="selectLg" class="is-invalid form-control form-control">
                      <option></option>
                      <option>STAGE</option>
                      <option>PRESTATION</option>
                      <option>CDD</option>
                      <option>CDI</option>
                    </select>
                </div>

                <div class="col-6 has-warning form-group">
                  <label for="inputIsValid" class=" form-control-label">CATEGORIE</label>
                    <select name="categorie" id="selectLg" class="is-invalid form-control form-control">
                      <option></option>
                      <option value="CADRE">CADRE</option>
                      <option value="NON CADRE">NON CADRE</option>
                    </select>
                </div>
              </div>

              <!--div class="row">
              <div class="col-6 has-warning form-group">
              <label for="inputIsValid" class=" form-control-label">NIVEAU D'ETUDE</label>
              <select name="niveau_etude" id="selectLg" class="is-invalid form-control form-control">

              <option></option>
              <option value="BAC +5">BAC +5</option>
              <option value="BAC +4">BAC +4</option>
              <option value="BAC +3">BAC +3</option>
              <option value="BAC +2">BAC +2</option>
              <option value="BAC +1">BAC +1</option>
              <option value="BAC">BAC</option>
              <option value="AUTRE">AUTRE</option>
              </select>
              </div>

              <div class="col-6 has-warning form-group">
              <label for="inputIsValid" class=" form-control-label">EXPERIENCE</label>
              <select name="experience" id="selectLg" class="is-invalid form-control form-control">
              <option></option>
              <option value="1 AN">1 AN</option>
              <option value="2 ANS">2 ANS</option>
              <option value="3 ANS">3 ANS</option>
              <option value="4 ANS">4 ANS</option>
              <option value="5 ANS">5 ANS</option>
              <option value="6 ANS">6 ANS</option>
              <option value="7 ANS">7 ANS</option>
              <option value="8 ANS">8 ANS</option>
              <option value="9 ANS">9 ANS</option>
              <option value="10 ANS">10 ANS</option>
              <option value="11 ANS">11 ANS</option>
              <option value="12 ANS">12 ANS</option>
              <option value="13 ANS">13 ANS</option>
              <option value="14 ANS">14 ANS</option>
              <option value="15 ANS">15 ANS</option>
              <option value="AUTRE"> > 15 ANS</option>
              </select>
              </div>

            </div-->

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
