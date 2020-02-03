<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Charts;

use App\User;
use App\Employe;

use DB;


class Analyse_entitebfController extends Controller
{

  public function entite(Request $request)
  {
    $employes=DB::select("select entite, count(*) as NBRE_STAFF from employes where statut='ACTIVE' group by entite");

    $hommes=DB::select("select entite, count(*) as NBRE_STAFF from employes where sexe='MASCULIN' and statut='ACTIVE' group by entite");
    $femmes=DB::select("select entite, count(*) as NBRE_STAFF from employes where sexe='FEMININ' and statut='ACTIVE' group by entite");

    $total_employes=Employe::all()->where('statut','ACTIVE');
    $total_hommes=Employe::all()->where('sexe','MASCULIN')->where('statut','ACTIVE');
    $total_femmes=Employe::all()->where('sexe','FEMININ')->where('statut','ACTIVE');


//**************
    $area = Charts::database(Employe::all()->where('statut','ACTIVE'), 'bar', 'highcharts')

        ->title("Employes")

        ->elementLabel("EMPLOYES")

        ->dimensions(1000, 500)

        ->responsive(true)

        ->colors(['#00FF00', '#25FDE9', '#8EA2C6','#FF0000','#791CF8','#2C75FF','#009999','#000080','#FF00FF','#800000'])

        ->groupBy('entite');


//****************************
        $users = Employe::all()->where('statut','ACTIVE');
        $chart = Charts::database($users, 'donut', 'highcharts')

            ->title("Employes")

            ->elementLabel("Repartition par sexe du staff")

            ->dimensions(1000, 500)

            ->colors(['#2C75FF', '#FF0000'])

            ->responsive(true)

            ->groupBy('sexe');

            //*************************************************
            $a=Employe::where('sexe','MASCULIN')->where('entite','CTI')->where('statut','ACTIVE')->count();
            $b=Employe::where('sexe','MASCULIN')->where('entite','CSG')->where('statut','ACTIVE')->count();
            $c=Employe::where('sexe','MASCULIN')->where('entite','COFINA GN')->where('statut','ACTIVE')->count();
            $d=Employe::where('sexe','MASCULIN')->where('entite','COFINA SN')->where('statut','ACTIVE')->count();
            $e=Employe::where('sexe','MASCULIN')->where('entite','COFINA ML')->where('statut','ACTIVE')->count();
            $f=Employe::where('sexe','MASCULIN')->where('entite','COFINA CG')->where('statut','ACTIVE')->count();
            $g=Employe::where('sexe','MASCULIN')->where('entite','CAC')->where('statut','ACTIVE')->count();
            $h=Employe::where('sexe','MASCULIN')->where('entite','COFINA BF')->where('statut','ACTIVE')->count();
            $v=Employe::where('sexe','MASCULIN')->where('entite','CPS SN')->where('statut','ACTIVE')->count();
            $w=Employe::where('sexe','MASCULIN')->where('entite','CPS ML')->where('statut','ACTIVE')->count();
            $x=Employe::where('sexe','MASCULIN')->where('entite','CPS CI')->where('statut','ACTIVE')->count();
            $y=Employe::where('sexe','MASCULIN')->where('entite','COFINA SERVICES FRANCE')->where('statut','ACTIVE')->count();


            $i=Employe::where('sexe','FEMININ')->where('entite','CTI')->where('statut','ACTIVE')->count();
            $j=Employe::where('sexe','FEMININ')->where('entite','CSG')->where('statut','ACTIVE')->count();
            $k=Employe::where('sexe','FEMININ')->where('entite','COFINA GN')->where('statut','ACTIVE')->count();
            $l=Employe::where('sexe','FEMININ')->where('entite','COFINA SN')->where('statut','ACTIVE')->count();
            $m=Employe::where('sexe','FEMININ')->where('entite','COFINA ML')->where('statut','ACTIVE')->count();
            $n=Employe::where('sexe','FEMININ')->where('entite','COFINA CG')->where('statut','ACTIVE')->count();
            $o=Employe::where('sexe','FEMININ')->where('entite','CAC')->where('statut','ACTIVE')->count();
            $p=Employe::where('sexe','FEMININ')->where('entite','COFINA BF')->where('statut','ACTIVE')->count();
            $q=Employe::where('sexe','FEMININ')->where('entite','CPS SN')->where('statut','ACTIVE')->count();
            $r=Employe::where('sexe','FEMININ')->where('entite','CPS ML')->where('statut','ACTIVE')->count();
            $s=Employe::where('sexe','FEMININ')->where('entite','CPS CI')->where('statut','ACTIVE')->count();
            $t=Employe::where('sexe','FEMININ')->where('entite','COFINA SERVICES FRANCE')->where('statut','ACTIVE')->count();



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
            ->labels(['CTI', 'CSG', 'COFINA GN','COFINA SN','COFINA ML','COFINA CG','CAC','COFINA BF','CPS SN','CPS ML','CPS CI','COFINA SERVICES FRANCE']);

//************************************************
      return view('/cofinabf/analyse/entite',['employe' => $employes,'area' => $data,'data' => $area,'femmes' => $femmes,
                  'hommes' => $hommes,
                  'chart' => $chart,
                  'total_employes' =>$total_employes,
                  'total_hommes' => $total_hommes,
                  'total_femmes' => $total_femmes,

                ]);
  }




}
