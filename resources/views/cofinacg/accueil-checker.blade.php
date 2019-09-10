@extends('layouts.checker')
@section('accueil_checker_groupe')
<!-- MAIN CONTENT--><br />
<div class="uker">
  <div class="section__content section__content--p30">
  <!--div class="row m-t-30">
        <h2 class="title-1">TABLEAU DE BOARD</h2>
  </div  onchange="form.submit()"-->
      <div class="container-fluid">

    <div class="row m-t-25">
        <div class="col-sm-6 col-lg-3">
            <div class="overview-item overview-item--c1">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon">
                            <i class="zmdi zmdi-male-female"></i>
                        </div>
                        <div class="text">

                            <h2>{{count($nb_empl)}}</h2>

                            <span>EMPLOYES</span>
                        </div>
                    </div>
                    <div class="overview-chart">
                        <canvas id="widgetChart1"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="overview-item overview-item--c2">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon">
                            <i class="zmdi zmdi-group-work"></i>
                        </div>
                        <div class="text">
                            <h2>{{count($nb_cdi)}}</h2>
                            <span>CDI</span>
                        </div>
                    </div>
                    <div class="overview-chart">
                        <canvas id="widgetChart2"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="overview-item overview-item--c3">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon">
                            <i class="zmdi zmdi-view-dashboard"></i>
                        </div>
                        <div class="text">
                            <h2>{{count($nb_cdd)}}</h2>
                            <span>CDD</span>
                        </div>
                    </div>
                    <div class="overview-chart">
                        <canvas id="widgetChart3"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="overview-item overview-item--c4">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon">
                            <i class="zmdi zmdi-layers"></i>
                        </div>
                        <div class="text">
                            <h2>{{count($nb_stage)}}</h2>
                            <span>STAGE</span>
                        </div>
                    </div>
                    <div class="overview-chart">
                        <canvas id="widgetChart4"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-lg-12">
        <h2 class="title-2 m-b-25">Listes des 20 dernieres recruts</h2>
        <div class="au-card au-card--bg-blue au-card-top-countries m-b-40">
            <div class="au-card-inner">
                <div class="table-responsive">
                    <table class="table table-top-countries">
                        <tbody>
                            @foreach ($employes as $employe)
                              <tr>
                                  <td>{{ $employe->matricule }}</td>
                                  <td>{{ $employe->nom }}</td>
                                  <td>{{ $employe->prenom }}</td>
                                  <td>{{ $employe->email }}</td>

                                  <td>{{ $employe->sexe }}</td>
                                  <td>{{ $employe->departement }}</td>
                                  <td class="text-right">{{ $employe->entite }}</td>
                              </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
          <div class="au-card m-b-30">
            <div class="au-card-inner">
                <h3 class="title-2 m-b-40">FILIALES </h3>
                {!! $geo->render() !!}
            </div>
        </div>



            </div>


</div>












        </div>
    </div>



@endsection
