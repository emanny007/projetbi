@extends('layouts.master')

@section('analyse_indicateur-new-rapport')
<!-- MAIN CONTENT-->
<div class="uker">
    <div class="section__content section__content--p30">
        <div class="container-fluid">

          <center>
            <div class="col-sm-3 col-lg-3">
            <form class="form-horizontal" method="Post" action="{{ route('analyse.indicateur') }}">
            {{ csrf_field() }}
            <div class="has-success form-group">
              <label for="inputIsValid"><strong>CHOISIR UNE FILIALE</strong></label>
                <select name="choisir_entite" id="selectLg" onChange="this.form.submit();" class="form-control is-valid form-control-success form-control">
                  <option></option>
                  <option>ALL STAFF</option>
                  @foreach($sites as $site)
                  <option value="{{ $site->entite }}">{{ $site->entite }}</option>
                  @endforeach
                </select>
            </div>
            @if($errors->has('choisir_entite'))
            <p> {{ $errors->first('choisir_entite') }} </p>
            @endif
          </form>
          </div>
          </center>

          <div class="row m-t-30">
                <div class="col-md-12">
                  <div class="top-campaign">
                      <div class="au-card-inner">
                        <!--h3 class="title-2 m-b-40">Nombre total de staffs par entite</h3-->
                        <div class="table-responsive">
                            <table  width=70% border ="1"class="table">

                              <thead>
                                <tr >
                                  <th> <center>LIBELLE-KPIS</center></th>
                                  <th> <center>CTI</center></th>
                                  <th> <center>CAC</center></th>
                                  <th> <center>COFINA SN</center></th>
                                  <th> <center>CSG</center></th>
                                  <th> <center>COFINA ML</center></th>
                                  <th> <center>COFINA CG</center></th>
                                  <th colspan="2"> <center>COFINA GN</center></th>
                                  <th colspan="2"> <center>COFINA BF</center></th>
                                  <th colspan="2"> <center>CSF</center></th>
                                  <th colspan="2"> <center>FINELLE</center></th>
                                  <th colspan="2"> <center>CPS SN</center></th>
                                  <th colspan="2"> <center>CPS CI</center></th>
                                  <th colspan="2"> <center>CPS ML</center></th>

                                </tr>
                                <tr bgcolor="#DCDCDC">
                                  <th>Distribution effectif par Genre </th>
                                  <th> <center>NBRE</center></th>
                                  <th> <center>(%)</center></th>
                                  <th> <center>NBRE</center></th>
                                  <th> <center>(%)</center></th>
                                  <th> <center>NBRE</center></th>
                                  <th> <center>(%)</center></th>
                                  <th> <center>NBRE</center></th>
                                  <th> <center>(%)</center></th>
                                  <th> <center>NBRE</center></th>
                                  <th> <center>(%)</center></th>
                                  <th> <center>NBRE</center></th>
                                  <th> <center>(%)</center></th>
                                  <th> <center>NBRE</center></th>
                                  <th> <center>(%)</center></th>
                                  <th> <center>NBRE</center></th>
                                  <th> <center>(%)</center></th>
                                  <th> <center>NBRE</center></th>
                                  <th> <center>(%)</center></th>
                                  <th> <center>NBRE</center></th>
                                  <th> <center>(%)</center></th>
                                  <th> <center>NBRE</center></th>
                                  <th> <center>(%)</center></th>
                                  <th> <center>NBRE</center></th>
                                  <th> <center>(%)</center></th>
                                  <th> <center>NBRE</center></th>
                                  <th> <center>(%)</center></th>
                                </tr>

                              </thead>
                                <tbody>
                                  <tr>

                                      <td>HOMMES</td>
                                      <td align='center'>{{ count($hommes) }}</td>
                                      <td align='center'>resultat_hommes</td>

                                  </tr>
                                  <tr>

                                      <td>FEMMES</td>
                                      <td align='center'> {{ count($femmes) }} </td>
                                      <!--td align='center'> </td-->

                                  </tr>
                                  <tr>

                                      <td>TOTAL</td>
                                      <td align='center'>{{ count($employes) }}</td>
                                      <!--td align='center'>100</td-->

                                  </tr>
                                  <tr bgcolor="#DCDCDC">
                                    <th colspan="2">Distribution effectif par type de Contrat </th>
                                  </tr>
                                  <tr>
                                      <td>CDI</td>
                                      <td align='center'> {{count($nb_cdi) }} </td>
                                      <!--td align='center'> </td-->

                                  </tr>
                                  <tr>
                                      <td>CDD</td>
                                      <td align='center'> {{ count($nb_cdd) }} </td>
                                      <!--td align='center'> </td-->

                                  </tr>
                                  <tr>
                                      <td>STAGE</td>
                                      <td align='center'> {{ count($nb_stage) }} </td>
                                      <!--td align='center'> </td-->

                                  </tr>
                                  <tr>
                                      <td>PRESTATAIRE</td>
                                      <td align='center'> {{ count($nb_prestation) }} </td>
                                      <!--td align='center'> </td-->
                                  </tr>
                                  <tr>
                                      <td>TOTAL</td>
                                      <td align='center'>{{count($employes)}}</td>
                                      <!--td align='center'>100</td-->
                                  </tr>
                                  <tr bgcolor="#DCDCDC">
                                    <th colspan="3">Distribution effectif par Departement </th>
                                </tr>
                                @foreach($departements as $departement)
                                <tr>
                                    <td> {{ $departement->departement  }} </td>
                                    <td align='center'> {{ $departement->NBRE  }}</td>
                                    <!--td align='center'></td-->
                                </tr>
                                @endforeach
                                <tr bgcolor="#DCDCDC">
                                  <th colspan="3">Distribution effectif par Genre et par Categorie </th>
                                </tr>
                                <tr>
                                  @foreach($hommes_cadres as $hommes_cadre)
                                    <td>HOMMES CADRES</td>
                                    <td align='center'> {{ $hommes_cadre->homme_cadre }} </td>
                                    <!--td align='center'> </td-->
                                  @endforeach
                                </tr>
                                <tr>
                                  @foreach($hommes_noncadres as $hommes_noncadres)
                                    <td>HOMMES NON CADRES</td>
                                    <td align='center'> {{ $hommes_noncadres->homme_non_cadre }} </td>
                                    <!--td align='center'> </td-->
                                  @endforeach
                                </tr>
                                <tr>
                                  @foreach($femmes_cadres as $femmes_cadre)
                                    <td>FEMMMES CADRES</td>
                                    <td align='center'> {{ $femmes_cadre->femme_cadre }} </td>
                                    <!--td align='center'> </td -->
                                  @endforeach
                                </tr>
                                <tr>
                                  @foreach($femmes_noncadres as $femmes_noncadre)
                                    <td>FEMMES NON CADRES</td>
                                    <td align='center'> {{ $femmes_noncadre->femme_non_cadre }} </td>
                                    <!--td align='center'> </td-->
                                  @endforeach
                                </tr>
                                </tbody>
                            </table>
                        </div>
                      </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
          </div>
@endsection
