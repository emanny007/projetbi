@extends('layouts.master')

@section('reporting_excel')
  <!-- MAIN CONTENT-->
  <div class="uker">
      <div class="section__content section__content--p30">
          <div class="container-fluid">
            <div class="row m-t-30">
              <div class="col-md-12">
                    <!--div>
                      <br />
                      <center>
                        <a  href="{{ route('reportings.export') }}" class="btn btn-lg btn-success">
                            <i class="fa fa-download fa-lg"></i>&nbsp;
                            <span id="payment-button-amount">Export Excel Data</span>
                        </a>
                      </center>
                    </div-->

    <div class="card">
    <div class="card-header"></div>
    <div class="card-body">
        <div class="card-title">
            <h3 class="text-center title-2">Reporting Excel</h3>
        </div>
        <hr>
        <form action="{{ route('reportings.index') }}" method="post" enctype="multipart/form-data">
          {{csrf_field()}}
          <!--div class="row">
              <div class="col-6">
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
          </div-->
                  <center><div class="col col-4">Choisir le type de filtre :&nbsp
                       <div class="form-check-inline form-check">
                           <label for="inline-radio1" class="form-check-label">
                               <input type="radio" id="inline-radio1" name="type_filtre" value="Volume" class="form-check-input">Volume &nbsp
                           </label>
                           <label for="inline-radio2" class="form-check-label">
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
            <div class="col-3 has-success form-group">
              <label for="inputIsValid" class=" form-control-label">ENTITE</label>
                <select name="entite" id="selectLg" class="is-invalid form-control form-control">
                  <option></option>
                  @foreach($sites as $site)
                  <option value="{{ $site->entite }}">{{ $site->entite }}</option>
                  @endforeach
                </select>
            </div>
            @if($errors->has('entite'))
            <p> {{ $errors->first('entite') }} </p>
            @endif

            <div class="col-3 has-warning form-group">
              <label for="inputIsValid" class=" form-control-label">DEPARTEMENT</label>
                <select name="departement" id="selectLg" class="is-invalid form-control form-control">
                  <option></option>
                  @foreach($departements as $departement)
                  <option value="{{$departement->libelle}}">{{ $departement->libelle }}</option>
                  @endforeach
                </select>
            </div>
            @if($errors->has('departement'))
            <p> {{ $errors->first('departement') }} </p>
            @endif

                  <div class="col-3 has-success form-group">
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

                  <div class="col-3 has-warning form-group">
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
                  <div class="col-3 has-warning form-group">
                  <label for="inputIsValid" class=" form-control-label">CATEGORIE</label>
                  <select name="categorie" id="selectLg" class="is-invalid form-control form-control">
                    <option></option>
                    <option value="CADRE">CADRE</option>
                    <option value="NON CADRE">NON CADRE</option>
                  </select>
                </div>
                @if($errors->has('categorie'))
                <p> {{ $errors->first('categorie') }} </p>
                @endif

                <div class="col-3 has-warning form-group">
                  <label for="inputIsValid" class=" form-control-label">SECTEUR</label>
                    <select name="secteur" id="selectLg" class="is-invalid form-control form-control">
                      <option></option>
                      <option value="SALES">SALES</option>
                      <option value="MIDDLES SALES">MIDDLES SALES</option>
                      <option value="NON SALES">NON SALES</option>
                    </select>
                </div>
                @if($errors->has('secteur'))
                <p> {{ $errors->first('secteur') }} </p>
                @endif

                <div class="col-3 has-warning form-group">
                  <label for="inputIsValid" class=" form-control-label">TYPE DE CONTRAT</label>
                    <select name="type_contrat" id="selectLg" class="is-invalid form-control form-control">
                      <option></option>
                      <option>STAGE</option>
                      <option>PRESTATION</option>
                      <option>CDD</option>
                      <option>CDI</option>
                    </select>
                </div>
                @if($errors->has('type_contrat'))
                <p> {{ $errors->first('type_contrat') }} </p>
                @endif

                <div class="col-3 has-success form-group">
                  <label for="inputIsValid" class=" form-control-label">PAYS</label>
                    <select name="pays" id="selectLg" class="is-invalid form-control form-control">
                      <option></option>
                      @foreach($sites as $site)
                      <option value="{{$site->pays}}">{{ $site->pays }}</option>
                      @endforeach
                    </select>
                </div>
                @if($errors->has('pays'))
                <p> {{ $errors->first('pays') }} </p>
                @endif


                </div>

                <div class="row">
                <div class="col-3 has-success form-group">
                    <label for="inputIsValid" class=" form-control-label">CONGE</label>
                    <select name="conge" id="selectLg" class="is-invalid form-control form-control">
                      <option></option>
                      <option value="CONGES ANNUELS">CONGES ANNUELS</option>
                      <option value="CONGES MALADIES">CONGES MALADIES</option>
                      <option value="CONGES DE MATERNITE">CONGES DE MATERNITE</option>
                      <option value="TRAVAIL A DISTANCE">TRAVAIL A DISTANCE</option>
                      <option value="AUTRES">AUTRES</option>
                    </select>
                </div>
                    @if($errors->has('conge'))
                    <p> {{ $errors->first('conge') }} </p>
                    @endif

            <div class="col-3 has-success form-group">
              <label for="inputIsValid" class=" form-control-label">ETABLISSEMENT</label>
                <select name="etablissement" id="selectLg" class="is-invalid form-control form-control">
                  <option></option>
                  @foreach($formations as $formations)
                  <option value="{{ $formations->nbre_heure }}">{{ $formations->nbre_heure }}</option>
                  @endforeach
                </select>
            </div>
            @if($errors->has('formations'))
            <p> {{ $errors->first('formations') }} </p>
            @endif

              <div class="col-3 has-warning form-group">
              <label for="inputIsValid" class=" form-control-label">NIVEAU D'ETUDE</label>
              <select name="niveau_etude" id="selectLg" class="is-invalid form-control form-control">
              <option></option>
              <option value="BAC +5">BAC +5</option>
              <option value="BAC +4">BAC +4</option>
              <option value="BAC +3">BAC +3</option>
              <option value="BAC +2">BAC +2</option>
              <option value="BAC +1">BAC +1</option>
              <option value="BAC">BAC</option>
              <option value="SANS BAC">SANS BAC</option>
              <option value="AUTRE">AUTRE</option>
              </select>
              </div>
              @if($errors->has('niveau_etude'))
              <p> {{ $errors->first('niveau_etude') }} </p>
              @endif

              <div class="col-3 has-warning form-group">
              <label for="inputIsValid" class=" form-control-label">EXPERIENCE</label>
              <select name="experience" id="selectLg" class="is-invalid form-control form-control">
              <option></option>
              <option value="MOINS 1 AN">MOINS 1 AN</option>
              <option value="1">1 AN</option>
              <option value="2">2 ANS</option>
              <option value="3">3 ANS</option>
              <option value="4">4 ANS</option>
              <option value="5">5 ANS</option>
              <option value="6">6 ANS</option>
              <option value="7">7 ANS</option>
              <option value="8">8 ANS</option>
              <option value="9">9 ANS</option>
              <option value="10">10 ANS</option>
              <option value="11">11 ANS</option>
              <option value="12">12 ANS</option>
              <option value="13">13 ANS</option>
              <option value="14">14 ANS</option>
              <option value="15">15 ANS</option>
              <option value="16">16 ANS</option>
              <option value="17">17 ANS</option>
              <option value="18">18 ANS</option>
              <option value="19">19 ANS</option>
              <option value="20">20 ANS</option>
              <option value="PLUS 20 ANS"> > 20 ANS</option>
              </select>
              </div>
              @if($errors->has('experience'))
              <p> {{ $errors->first('experience') }} </p>
              @endif
            </div>

            <div class="row">
              <div class="col-3 has-warning form-group">
                <label for="inputIsValid" class=" form-control-label">STATUT</label>
                  <select name="statut" id="selectLg" class="is-invalid form-control form-control">
                    <option></option>
                    <option value="ACTIVE">ACTIVE</option>
                    <option value="DESACTIVE">DESACTIVE</option>
                  </select>
              </div>
              @if($errors->has('statut'))
              <p> {{ $errors->first('statut') }} </p>
              @endif

                  <div class="col-3 has-success form-group">
                      <label for="inputIsValid" class=" form-control-label">AGE</label>
                      <select name="age" id="selectLg" class="is-invalid form-control form-control">
                        <option></option>
                        <option value="15">15 ANS</option>
                        <option value="16">16 ANS</option>
                        <option value="17">17 ANS</option>
                        <option value="18">18 ANS</option>
                        <option value="19">19 ANS</option>
                        <option value="20">20 ANS</option>
                        <option value="21">21 ANS</option>
                        <option value="22">22 ANS</option>
                        <option value="23">23 ANS</option>
                        <option value="24">24 ANS</option>
                        <option value="25">25 ANS</option>
                        <option value="26">26 ANS</option>
                        <option value="27">27 ANS</option>
                        <option value="28">28 ANS</option>
                        <option value="29">29 ANS</option>
                        <option value="30">30 ANS</option>
                        <option value="31">31 ANS</option>
                        <option value="32">32 ANS</option>
                        <option value="33">33 ANS</option>
                        <option value="34">34 ANS</option>
                        <option value="35">35 ANS</option>
                        <option value="36">36 ANS</option>
                        <option value="37">37 ANS</option>
                        <option value="38">38 ANS</option>
                        <option value="39">39 ANS</option>
                        <option value="40">40 ANS</option>
                        <option value="41">41 ANS</option>
                        <option value="42">42 ANS</option>
                        <option value="43">43 ANS</option>
                        <option value="44">44 ANS</option>
                        <option value="45">45 ANS</option>
                        <option value="46">46 ANS</option>
                        <option value="47">47 ANS</option>
                        <option value="48">48 ANS</option>
                        <option value="49">49 ANS</option>
                        <option value="50">50 ANS</option>
                        <option value="51">51 ANS</option>
                        <option value="52">52 ANS</option>
                        <option value="53">53 ANS</option>
                        <option value="54">54 ANS</option>
                        <option value="55">55 ANS</option>
                        <option value="56">56 ANS</option>
                        <option value="57">57 ANS</option>
                        <option value="58">58 ANS</option>
                        <option value="59">59 ANS</option>
                        <option value="60">60 ANS</option>
                        <option value="61">61 ANS</option>
                        <option value="62">62 ANS</option>
                        <option value="63">63 ANS</option>
                        <option value="64">64 ANS</option>
                        <option value="65">65 ANS</option>

                      </select>
                  </div>
                      @if($errors->has('age'))
                      <p> {{ $errors->first('age') }} </p>
                      @endif
                      <div class="col-3">
                          <div class="form-group">
                              <label class="control-label mb-1">DATE DEBUT</label>
                              <input name="date_debut" type="date" class="is-invalid form-control form-control">
                          </div>
                      </div>
                    <div class="col-3">
                          <label class="control-label mb-1">DATE FIN</label>
                          <div class="input-group">
                              <input name="date_fin" type="date" class="is-invalid form-control form-control">
                          </div>
                      </div>
              </div>

          <br /><br />
          <div class="row">
            <div class="col-4 has-warning form-group"></div>
            <div class="col-4 has-warning form-group">
              <br />
              <input type="submit" name="exporter" value="Exporter" class="btn btn-lg btn-success"/>

                <!--button id="payment-button" name="exporter" type="submit" class="btn btn-lg btn-danger">
                    <i class="fa fa-download fa-lg"></i>&nbsp;
                    <span id="payment-button-amount">Exporter</span>
                </button-->
            </div>



        <div class="col-4 has-warning form-group">
          <br />

          <input type="submit" name="preview" value="Preview" class="btn btn-lg btn-danger"/>
        <!--a href="#" type="button" class="btn btn-primary btn-lg" role="button"><span class="fas fa-eye"></span> Preview</a><br /-->
        <!--button id="payment-button" type="submit"  name="preview" class="btn btn-lg btn-success">
            <i class="fa fa-download fa-lg"></i>&nbsp;
            <span id="payment-button-amount">Preview</span>
        </button-->

        </div>

        </form>
  </div>
  <br />  <br />


          <div class="card">
            <div class="card-header">
             <center><strong></strong></center>
            </div>

            <div class="card-body card-block">
<div class="table-responsive table m-b-40">
<table border="1" style="width:100%">
          <tbody>
            @if(!empty($preview))
            @foreach ($preview as $preview)
              <tr>
                <td>{{ $preview->IDENTIFIANT }}</td>
                  <td>{{ $preview->MATRICULE }}</td>
                  <td>{{ $preview->NUM_SECU_SOCIAL }}</td>
                  <td>{{ $preview->NOM }}</td>
                  <td>{{ $preview->PRENOMS}}</td>
                  <td>{{ $preview->EMAIL_PROFFESSIONNEL }}</td>
                  <td>{{ $preview->MAIL_PERSONNEL }}</td>
                  <td>{{ $preview->TEL_PROFESSIONNEL }}</td>
                  <td>{{ $preview->TEL_PERSONNEL }}</td>
                  <td>{{ $preview->CONTACT_URGENT }}</td>
                  <td>{{ $preview->ENTITE }}</td>
                  <td>{{ $preview->PAYS }}</td>
                  <td>{{ $preview->SEXE }}</td>
                  <td>{{ $preview->CIVILITE}}</td>
                  <td>{{ $preview->SITUATION_MATRIMONIALE }}</td>
                  <td>{{ $preview->NBRE_ENFANT }}</td>
                  <td>{{ $preview->NATIONNALITE }}</td>
                  <td>{{ $preview->ORIGINE }}</td>
                  <td>{{ $preview->SECTEUR }}</td>
                  <td>{{ $preview->CATEGORIE }}</td>
                  <td>{{ $preview->DEPARTEMENT }}</td>
                  <td>{{ $preview->TYPE_DE_CONTRAT }}</td>
                  <td>{{ $preview->DEBUT_CONTRAT }}</td>
                  <td>{{ $preview->FIN_CONTRAT }}</td>
              </tr>
            @endforeach
            @endif
          </tbody>
</table>

</div>
</div>
</div>


      <br />



        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
