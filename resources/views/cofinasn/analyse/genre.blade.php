@extends('layouts.master-sn')

@section('analyse_ge')
<!-- MAIN CONTENT-->
<div class="uker">
    <div class="section__content section__content--p30">
        <div class="container-fluid"><br /><center><label for="inputIsValid" align="center"><h3 class="title-2 m-b-40">Analyse generale des staffs par departement</h3></label></center>
          <div class="row m-t-30">
                <div class="col-md-6">
                  <div class="au-card au-card--bg-blue au-card-top-countries m-b-40">
                      <div class="au-card-inner">
                        <h3 class="title-2 m-b-40">Tableau de Repartition des staffs par Departement</h3>
                        <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>DEPARTEMENT </th>
                                  <th> <center>NBRE DE STAFFS </center></th>
                                </tr>
                              </thead>
                                <tbody>
                                  @foreach ($employe as $employe)
                                      <tr>
                                          <td>{{ $employe->departement}}</td>
                                          <td align='center'>{{ $employe->NBRE_STAFF}}</td>
                                      </tr>
                                      @endforeach
                                </tbody>
                            </table>
                        </div>
                      </div>
                      <br /><br />
                  </div>
                </div>

                <!--div class="col-md-6">
                  <div class="au-card m-b-30">
                      <div class="au-card-inner">
                          <h3 class="title-2 m-b-40">Repartition des staffs par sexe</h3>

                      </div>
                  </div>
                </div-->

                <div class="col-md-6">
                  <div class="au-card au-card--bg-blue au-card-top-countries m-b-40">
                      <div class="au-card-inner">
                        <center>
                          <h3 class="title-2 m-b-40">Repartition Graphique des staffs par departement</h3>
                        </center>
                          {!! $area->render() !!}

                      </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="au-card au-card--bg-blue au-card-top-countries m-b-40">
                      <div class="au-card-inner">
                        <center>
                          <h3 class="title-2 m-b-30">Repartition des staffs par sexe</h3>
                          {!! $chart->render() !!}
                        </center>
                      </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="au-card au-card--bg-blue au-card-top-countries m-b-40">
                      <div class="au-card-inner">
                        <center>
                          <h3 class="title-2 m-b-30">Volume de staffs arrivés dans le mois</h3>
                          {!! $lala->render() !!}
                        </center>
                      </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="au-card au-card--bg-blue au-card-top-countries m-b-40">
                      <div class="au-card-inner">
                        <center>
                          <h3 class="title-2 m-b-40">Repartition des hommes et femmes par departement</h3>
                          {!! $data->render() !!}
                        </center>
                      </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
          </div>
@endsection
