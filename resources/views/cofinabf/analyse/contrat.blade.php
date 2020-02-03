@extends('layouts.master-bf')

@section('analyse_contrat')
<!-- MAIN CONTENT-->
<div class="uker">
    <div class="section__content section__content--p30">
        <div class="container-fluid"><br /><center><label for="inputIsValid" align="center"><h3 class="title-2 m-b-40">Analyse groupe des contrats</h3></label></center>
          <div class="row m-t-30">
                <div class="col-md-6">
                  <div class="top-campaign">
                      <div class="au-card-inner">
                        <center>
                          <h3 class="title-2 m-b-40">Repartition Graphique des contrats Groupes</h3>
                        </center>
                           {!! $dodo->render() !!}
                      </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="top-campaign">
                      <div class="au-card-inner">
                        <center>
                          <h3 class="title-2 m-b-30">Repartition des contrats par filiale</h3>
                          {!! $chart->render() !!}
                        </center>
                      </div>
                  </div>
                </div>

              <div class="col-md-12">
                  <div class="top-campaign">
                      <div class="au-card-inner">
                          <h3 class="title-2 m-b-40">Volume total de contrats par entité</h3>
                          {!! $data->render() !!}
                      </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="top-campaign">
                      <div class="au-card-inner">
                        <center>
                          <h3 class="title-2 m-b-30">Volume total de contrats dans l'année</h3>
                          {!! $contratmois->render() !!}
                        </center>
                      </div>
                  </div>

                </div>

                <div class="col-md-6">
                  <div class="top-campaign">
                      <div class="au-card-inner">
                          <h3 class="title-2 m-b-40">Volume total de contrats du mois</h3>
                          {!! $contratjours->render() !!}
                      </div>
                  </div>
                </div>



              </div>
            </div>
          </div>
          </div>
@endsection
