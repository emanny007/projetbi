<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Charts;

use App\User;
use App\Employe;

use DB;


class Analyse_entitegnController extends Controller
{

  public function entite(Request $request)
  {
      $employes=DB::select("select entite, count(*) as NBRE_STAFF from employes group by entite");

      $hommes=DB::select("select entite, count(*) as NBRE_STAFF from employes where sexe='MASCULIN' group by entite");
      $femmes=DB::select("select entite, count(*) as NBRE_STAFF from employes where sexe='FEMININ' group by entite");

      $total_employes=Employe::all();
      $total_hommes=Employe::all()->where('sexe','MASCULIN');
      $total_femmes=Employe::all()->where('sexe','FEMININ');


//**************
      $area = Charts::database(Employe::all(), 'bar', 'highcharts')

          ->title("Employes")

          ->elementLabel("EMPLOYES")

          ->dimensions(1000, 500)

          ->responsive(true)

          ->colors(['#00FF00', '#25FDE9', '#8EA2C6','#FF0000','#791CF8','#2C75FF'])

          ->groupBy('entite');


//****************************
          $users = Employe::all();
          $chart = Charts::database($users, 'donut', 'highcharts')

              ->title("Employes")

              ->elementLabel("Repartition par sexe du staff")

              ->dimensions(1000, 500)

              ->colors(['#2C75FF', '#FF0000'])

              ->responsive(true)

              ->groupBy('sexe');

              //*************************************************
              $a=Employe::where('sexe','MASCULIN')->where('entite','CTI')->count();
              $b=Employe::where('sexe','MASCULIN')->where('entite','CSG')->count();
              $c=Employe::where('sexe','MASCULIN')->where('entite','COFINA GN')->count();
              $d=Employe::where('sexe','MASCULIN')->where('entite','COFINA SN')->count();
              $e=Employe::where('sexe','MASCULIN')->where('entite','COFINA ML')->count();
              $f=Employe::where('sexe','MASCULIN')->where('entite','COFINA CG')->count();
              $g=Employe::where('sexe','MASCULIN')->where('entite','CAC')->count();
              $h=Employe::where('sexe','MASCULIN')->where('entite','COFINA BF')->count();
              $v=Employe::where('sexe','MASCULIN')->where('entite','CPS SN')->count();
              $w=Employe::where('sexe','MASCULIN')->where('entite','CPS ML')->count();
              $x=Employe::where('sexe','MASCULIN')->where('entite','CPS CI')->count();
              $y=Employe::where('sexe','MASCULIN')->where('entite','COFINA SERVICE FRANCE')->count();


              $i=Employe::where('sexe','FEMININ')->where('entite','CTI')->count();
              $j=Employe::where('sexe','FEMININ')->where('entite','CSG')->count();
              $k=Employe::where('sexe','FEMININ')->where('entite','COFINA GN')->count();
              $l=Employe::where('sexe','FEMININ')->where('entite','COFINA SN')->count();
              $m=Employe::where('sexe','FEMININ')->where('entite','COFINA ML')->count();
              $n=Employe::where('sexe','FEMININ')->where('entite','COFINA CG')->count();
              $o=Employe::where('sexe','FEMININ')->where('entite','CAC')->count();
              $p=Employe::where('sexe','FEMININ')->where('entite','COFINA BF')->count();
              $q=Employe::where('sexe','FEMININ')->where('entite','CPS SN')->count();
              $r=Employe::where('sexe','FEMININ')->where('entite','CPS ML')->count();
              $s=Employe::where('sexe','FEMININ')->where('entite','CPS CI')->count();
              $t=Employe::where('sexe','FEMININ')->where('entite','COFINA SERVICE FRANCE')->count();



              $data = Charts::multi('bar', 'c3')
              // Setup the chart settings
              ->title("Repartition des staffs par sexe et par entité")
              // A dimension of 0 means it will take 100% of the space
              ->dimensions(0, 400) // Width x Height
              // This defines a preset of colors already done:)
              ->template("c3")
              // You could always set them manually
              //->colors(['#2196F3', '#F44336', '#FFC107'])
              ->colors(['#2C75FF', '#FF0000'])
              // Setup the diferent datasets (this is a multi chart)
              ->dataset('Hommes', [$a,$b,$c,$d,$e,$f,$g,$h,$v,$w,$x,$y])
              ->dataset('Femmes', [$i,$j,$k,$l,$m,$n,$o,$p,$q,$r,$s,$t])
              // Setup what the values mean
              ->labels(['CTI', 'CSG', 'COFINA GN','COFINA SN','COFINA ML','COFINA CG','CAC','COFINA BF','CPS SN','CPS ML','CPS CI','COFINA SERVICE FRANCE']);


//************************************************

      return view('/cofinagn/analyse/entite',['employe' => $employes,'area' => $data,'data' => $area,'femmes' => $femmes,
                  'hommes' => $hommes,
                  'chart' => $chart,
                  'total_employes' =>$total_employes,
                  'total_hommes' => $total_hommes,
                  'total_femmes' => $total_femmes,

                ]);
  }




}
