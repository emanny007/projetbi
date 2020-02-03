@extends('layouts.master-bf')

@section('analyse_entite')
<!-- MAIN CONTENT-->
<div class="uker">
    <div class="section__content section__content--p30">
        <div class="container-fluid"><br /><center><label for="inputIsValid" align="center"><h3 class="title-2 m-b-40">Analyse groupe des staffs par entite</h3></label></center>
          <div class="row m-t-30">
                <div class="col-md-6">
                  <div class="top-campaign">
                      <div class="au-card-inner">
                        <h3 class="title-2 m-b-40">Nombre total de staffs par entite</h3>
                        <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <tr bgcolor="#DCDCDC">
                                  <th>ENTITE</th>
                                  <th> <center>STAFFS </center></th>
                                </tr>
                              </thead>
                                <tbody>
                                  @foreach($employe as $employe)
                                      <tr>
                                          <td>{{ $employe->entite }}</td>
                                          <td align='center'>{{ $employe->NBRE_STAFF}}</td>
                                      </tr>
                                  @endforeach
                                  <tr bgcolor="#DCDCDC">
                                    <th>TOTAL</th>
                                    <th><center>{{ count($total_employes) }} </center></th>
                                  </tr>
                                </tbody>
                            </table>
                        </div>
                      </div>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="top-campaign">
                      <div class="au-card-inner">
                        <h3 class="title-3 m-b-40">Nbre d'hommes / entite</h3>
                        <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <tr bgcolor="#DCDCDC">
                                  <th>ENTITE</th>
                                  <th> <center>STAFFS </center></th>
                                </tr>
                              </thead>
                                <tbody>
                                  @foreach($hommes as $homme)
                                      <tr>
                                          <td>{{ $homme->entite }}</td>
                                          <td align='center'>{{ $homme->NBRE_STAFF}}</td>
                                      </tr>
                                  @endforeach
                                  <tr bgcolor="#DCDCDC">
                                    <th>TOTAL</th>
                                    <th><center>{{ count($total_hommes) }} </center></th>
                                  </tr>
                                </tbody>
                            </table>
                        </div>
                        </div>
                      </div>
                      </div>



                <div class="col-md-3">
                  <div class="top-campaign">
                    <div class="au-card-inner">
                      <h4 class="title-3 m-b-40">Nbre de femmes / entite</h4>

                    <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <tr bgcolor="#DCDCDC">
                                  <th>ENTITE</th>
                                  <th> <center>STAFFS </center></th>
                                </tr>
                              </thead>
                                <tbody>
                                  @foreach($femmes as $femme)
                                      <tr>
                                          <td>{{ $femme->entite }}</td>
                                          <td align='center'>{{ $femme->NBRE_STAFF}}</td>
                                      </tr>
                                  @endforeach
                                  <tr bgcolor="#DCDCDC">
                                    <th>TOTAL</th>
                                    <th><center>{{ count($total_femmes) }} </center></th>
                                  </tr>
                                </tbody>
                            </table>

                        </div>

                      </div>
                  </div>
                </div>


                <div class="col-md-6">
                  <div class="top-campaign">
                      <div class="au-card-inner">
                        <center>
                          <h3 class="title-2 m-b-40">Representation Graphique des staffs par entite</h3>
                        </center>
                           {!! $data->render() !!}

                      </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="top-campaign">
                      <div class="au-card-inner">
                        <center>
                          <h3 class="title-2 m-b-30">Pourcentage des hommes et femmes sur l'ensemble du groupe </h3>
                          {!! $chart->render() !!}
                        </center>
                      </div>
                  </div>
                </div>



                <div class="col-md-12">
                  <div class="top-campaign">
                      <div class="au-card-inner">
                          <h3 class="title-2 m-b-40">Representation graphique des hommes et des femmes par entite</h3>
                          {!! $area->render() !!}
                      </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
          </div>
@endsection
