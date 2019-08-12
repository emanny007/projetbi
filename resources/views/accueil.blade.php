@extends('layouts.master')

@section('accueil_admin')
<!-- MAIN CONTENT--><br />
<div class="uker">
  <div class="section__content section__content--p30">
  <!--div class="row m-t-30">
        <h2 class="title-1">TABLEAU DE BOARD</h2>
  </div  onchange="form.submit()"-->
      <div class="container-fluid"><center>
        <div class="col-sm-3 col-lg-3">
        <form class="form-horizontal" method="Post" action="{{ route('accueil') }}">
        {{ csrf_field() }}
        <div class="has-success form-group">
          <label for="inputIsValid"><strong>CHOISIR UNE FILIALE</strong></label>
            <select name="choisir_entite" id="selectLg" onChange="this.form.submit();"  class="form-control is-valid form-control-success form-control">
              <option></option>
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

    <div class="row m-t-25">
        <div class="col-sm-6 col-lg-3">
            <div class="overview-item overview-item--c1">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon">
                            <i class="zmdi zmdi-male-female"></i>
                        </div>
                        <div class="text">
                            <h1>{{count($nb_empl)}}</h1>
                            <h4>EMPLOYES</h4>
                        </div>
                    </div>
                    <div class="overview-chart">
                        <canvas id="widgetChart1"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-2">
            <div class="overview-item overview-item--c2">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon">
                            <i class="zmdi zmdi-group-work"></i>
                        </div>
                        <div class="text">
                            <h1>{{count($nb_cdi)}}</h1>
                            <h4>CDI</h4>
                        </div>
                    </div>
                    <div class="overview-chart">
                        <canvas id="widgetChart2"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-2">
            <div class="overview-item overview-item--c3">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon">
                            <i class="zmdi zmdi-view-dashboard"></i>
                        </div>
                        <div class="text">
                            <h1>{{count($nb_cdd)}}</h1>
                            <h4>CDD</h4>
                        </div>
                    </div>
                    <div class="overview-chart">
                        <canvas id="widgetChart3"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-2">
            <div class="overview-item overview-item--c4">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon">
                            <i class="zmdi zmdi-layers"></i>
                        </div>
                        <div class="text">
                            <h1>{{count($nb_stage)}}</h1>
                            <h4>STAGES</h4>
                        </div>
                    </div>
                    <div class="overview-chart">
                        <canvas id="widgetChart4"></canvas>
                    </div>
                </div>
            </div>
        </div>

    <div class="col-sm-6 col-lg-3">
        <div class="overview-item overview-item--c1">
            <div class="overview__inner">
                <div class="overview-box clearfix">
                    <div class="icon">
                      <i class="zmdi zmdi-account-o"></i>
                    </div>
                    <div class="text">
                        <h1>{{count($nb_prestation)}}</h1>
                        <h4>PRESTATIONS</h4>
                    </div>
                </div>
                <div class="overview-chart">
                    <canvas id="widgetChart1"></canvas>
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
                                <td>{{ $employe->created_at }}</td>
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

<div class="row m-t-25">
    <div class="col-lg-6">
          <div class="au-card m-b-30">
            <div class="au-card-inner">
                <h3 class="title-2 m-b-40">FILIALES </h3>
                {!! $geo->render() !!}
            </div>
        </div>
  </div>



  <div class="col-lg-6">
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
    </div>



@endsection
