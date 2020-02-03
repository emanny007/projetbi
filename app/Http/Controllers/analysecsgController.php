<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Charts;

use App\User;
use App\Employe;

use DB;


class analysecsgController extends Controller
{
  public function index(Request $request)
  {

        $a=Employe::where('sexe','MASCULIN')->where('departement','INFORMATIQUE')->where('statut','ACTIVE')->count();
        $b=Employe::where('sexe','MASCULIN')->where('departement','FINANCE')->where('statut','ACTIVE')->count();
        $c=Employe::where('sexe','MASCULIN')->where('departement','CREDIT')->where('statut','ACTIVE')->count();
        $d=Employe::where('sexe','MASCULIN')->where('departement','RESSOURCES HUMAINES')->where('statut','ACTIVE')->count();
        $e=Employe::where('sexe','MASCULIN')->where('departement','DMCC')->where('statut','ACTIVE')->count();
        $f=Employe::where('sexe','MASCULIN')->where('departement','CONTROLE INTERNE')->where('statut','ACTIVE')->count();
        $g=Employe::where('sexe','MASCULIN')->where('departement','DIRECTION GENERALE')->where('statut','ACTIVE')->count();
        $h=Employe::where('sexe','MASCULIN')->where('departement','FACILITIES')->where('statut','ACTIVE')->count();
        $u=Employe::where('sexe','MASCULIN')->where('departement','RETAIL')->where('statut','ACTIVE')->count();
        $v=Employe::where('sexe','MASCULIN')->where('departement','AUDIT')->where('statut','ACTIVE')->count();
        $w=Employe::where('sexe','MASCULIN')->where('departement','PHOENIX')->where('statut','ACTIVE')->count();
        $x=Employe::where('sexe','MASCULIN')->where('departement','OPERATIONS')->where('statut','ACTIVE')->count();
        $y=Employe::where('sexe','MASCULIN')->where('departement','EXPLOITATION')->where('statut','ACTIVE')->count();
        $z=Employe::where('sexe','MASCULIN')->where('departement','LEGAL')->where('statut','ACTIVE')->count();


        $i=Employe::where('sexe','FEMININ')->where('departement','INFORMATIQUE')->where('statut','ACTIVE')->count();
        $j=Employe::where('sexe','FEMININ')->where('departement','FINANCE')->where('statut','ACTIVE')->count();
        $k=Employe::where('sexe','FEMININ')->where('departement','CREDIT')->where('statut','ACTIVE')->count();
        $l=Employe::where('sexe','FEMININ')->where('departement','RESSOURCES HUMAINES')->where('statut','ACTIVE')->count();
        $m=Employe::where('sexe','FEMININ')->where('departement','DMCC')->where('statut','ACTIVE')->count();
        $n=Employe::where('sexe','FEMININ')->where('departement','CONTROLE INTERNE')->where('statut','ACTIVE')->count();
        $o=Employe::where('sexe','FEMININ')->where('departement','DIRECTION GENERALE')->where('statut','ACTIVE')->count();
        $p=Employe::where('sexe','FEMININ')->where('departement','FACILITIES')->where('statut','ACTIVE')->count();
        $r=Employe::where('sexe','FEMININ')->where('departement','RETAIL')->where('statut','ACTIVE')->count();
        $s=Employe::where('sexe','FEMININ')->where('departement','AUDIT')->where('statut','ACTIVE')->count();
        $t1=Employe::where('sexe','FEMININ')->where('departement','PHOENIX')->where('statut','ACTIVE')->count();
        $t2=Employe::where('sexe','FEMININ')->where('departement','OPERATIONS')->where('statut','ACTIVE')->count();
        $t3=Employe::where('sexe','FEMININ')->where('departement','EXPLOITATION')->where('statut','ACTIVE')->count();
        $t4=Employe::where('sexe','FEMININ')->where('departement','LEGAL')->where('statut','ACTIVE')->count();



        $data = Charts::multi('bar', 'c3')
        // Setup the chart settings
        ->title("Repartition par sexe et par departement des staffs")
        // A dimension of 0 means it will take 100% of the space
        ->dimensions(0, 400) // Width x Height
        // This defines a preset of colors already done:)
        ->template("c3")
        // You could always set them manually
        //->colors(['#2196F3', '#F44336', '#FFC107'])
        // Setup the diferent datasets (this is a multi chart)
        ->dataset('Hommes', [$a,$b,$c,$d,$e,$f,$g,$h,$u,$v,$w,$x,$y,$z])
        ->dataset('Femmes', [$i,$j,$k,$l,$m,$n,$o,$p,$r,$s,$t1,$t2,$t3,$t4])
        // Setup what the values mean
        ->labels(['INFORMATIQUE', 'FINANCE', 'CREDIT','RESSOURCES HUMAINES','DMCC','CONTROL INTERNE','DIRECTION GENERALE','FACILITIES','RETAIL','AUDIT','PHOENIX','OPERATIONS','EXPLOITATION','LEGAL']);

    /*
        $dot = User::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))->get();
        $data = Charts::database($dot, 'bar', 'highcharts')

            ->title("Employes")

            ->elementLabel("Repartition par sexe du staff")

            ->dimensions(1000, 500)

            ->responsive(true)

            ->groupByDay();
       */
    //*****************************************************************
    $lala = Charts::database(Employe::where('statut','ACTIVE')->get(), 'bar', 'highcharts')
        ->elementLabel("Nombre d'employes")
        ->dimensions(1000, 500)
        ->responsive(true)
        ->groupByMonth();

    //********************************************************************
                $users = Employe::where('statut','ACTIVE')->get();
                //$users=DB::select("SELECT * FROM employes");
                $chart = Charts::database($users, 'donut', 'highcharts')

        			      ->title("Employes")

        			      ->elementLabel("Repartition par sexe du staff")

        			      ->dimensions(1000, 500)

        			      ->responsive(true)

        			      ->groupBy('sexe');
    //*****************************************************************************
                    $area = Charts::database($users, 'bar', 'highcharts')

                        ->title("Employes")

                        ->elementLabel("EMPLOYES")

                        ->dimensions(1000, 500)

                        ->responsive(true)

                        ->groupBy('departement');
    //**************************************************************************
      $donut = Charts::database($users, 'donut', 'highcharts')

        ->title("Employes")

        ->elementLabel("Staff par departement")

        ->dimensions(1000, 500)

        ->responsive(true)

        ->groupByDay();
    //********************************************************

    $usr = DB::table('employes')->select('employes.id','employes.nom','contrats.type_contrat')->join('contrats','employes.id','=','contrats.id')->where(['sexe'=>'MASCULIN'])->where(['statut'=>'ACTIVE'])->get();
    $dodo = Charts::database($usr, 'bar', 'highcharts')

        ->title("Employes")

        ->elementLabel("Repartition par sexe du staff")

        ->dimensions(1000, 500)

        ->responsive(true);
        //->groupBy('departement');

      /*
        $a=3;$b=8;$c=2;$d=5;
        $dodo = Charts::create('pie', 'highcharts')
            ->title('CONTRATS')
            ->labels(['CDD', 'PRESTATION', 'CDI','STAGE'])
            ->values([$a,$b,$c,$d])
            ->colors(['#2196F3', '#F44336', '#FFC107','#DA1124'])
            //->colors(['#DA1124', '#985689'])
            ->dimensions(1000,500)
            ->responsive(true);
    */

    // This  $data array will be passed to our PDF blade

    $employe=DB::select("select departement, count(*) as NBRE_STAFF from employes where statut='ACTIVE' group by departement");

            return view('/csg/analyse/index',[
              'chart' => $chart,
              'area'  => $area,
              'donut' => $donut,
              'dodo' => $dodo,
              'data' => $data,
              'lala' => $lala,
              'employe'=>$employe,
              'users'=>$users,
            ]);


  /*          $chart = Charts::create('line', 'highcharts')
             ->title("Users")
             ->Labels("ES","FR","RU")
             ->Values([100,50,25])
             ->ElementLabel("Total Users")
             ->Dimensions(500,200)
             ->Responsive(false);

             return view('/analyse/index',['chart' =>$chart]);
*/
  }




}
