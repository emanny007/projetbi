<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Charts;

use App\User;
use App\Employe;
use App\Contrat;

use DB;


class Analyse_contratController extends Controller
{

  public function contrat(Request $request)
  {

      $cdd=Contrat::where('type_contrat','CDD')->count();
      $cdi=Contrat::where('type_contrat','CDI')->count();
      $stage=Contrat::where('type_contrat','STAGE')->count();
      $prestation=Contrat::where('type_contrat','PRESTATION')->count();

      $dodo = Charts::create('pie', 'highcharts')
          ->title('CONTRATS')
          ->labels(['CDD', 'PRESTATION', 'CDI','STAGE'])
          ->values([$cdd,$cdi,$stage,$prestation])
          ->colors(['#FFFF00', '#00FF00', '#FF0000','#808080'])
          //->colors(['#DA1124', '#985689'])
          ->dimensions(1000,500)
          ->responsive(true);

          //*****************************************************************
          $contratmois = Charts::database(Contrat::all(), 'bar', 'fusioncharts')
              ->title('CONTRATS ANNUELS')
              ->elementLabel("Nombre d'employes")
              ->dimensions(1000, 500)
              ->colors(['#FF0000'])
              ->responsive(true)
              ->groupByMonth();

          $contratjours = Charts::database(Contrat::all(), 'bar', 'fusioncharts')
                  ->elementLabel("Nombre d'employes")
                  ->title('CONTRATS MENSUELS')
                  ->dimensions(1000, 500)
                  ->colors(['#FF0000'])
                  ->responsive(true)
                  ->groupByDay();


                  //********************************************************************
                              $users = DB::table('employes')->join('contrats','employes.id','=','contrats.employe_id')
                                              ->select('employes.entite','employes.nom','contrats.type_contrat')->get();
                                              //->groupBy('contrats.type_contrat')->get();
                              $chart = Charts::database($users, 'donut', 'highcharts')

                      			      ->title("Employes")

                                  ->colors(['#800080', '#FF00FF', '#008080','#008000','#800000','#808080','#808000','#CD5C5C'])

                      			      ->elementLabel("Repartition par sexe du staff")

                      			      ->dimensions(1000, 500)

                      			      ->responsive(true)

                      			      ->groupBy('entite');





          $opport = Charts::create('line', 'morris')
    ->title('My nice chart')
    ->labels(['First', 'Second', 'Third'])
    ->values([5,10,20])
    ->dimensions(0,500);

          return view('/analyse/contrat',['dodo' => $dodo,'contratmois' => $contratmois,
        'contratjours' => $contratjours,
        'opport' => $opport,
        'chart' => $chart,
      ]);

  }



}
