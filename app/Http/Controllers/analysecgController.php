<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Charts;

use App\User;
use App\Employe;

use DB;


class analysecgController extends Controller
{
  public function index(Request $request)
  {
    $a=Employe::where('sexe','MASCULIN')->where('departement','INFORMATIQUE')->count();
    $b=Employe::where('sexe','MASCULIN')->where('departement','FINANCE')->count();
    $c=Employe::where('sexe','MASCULIN')->where('departement','CREDIT')->count();
    $d=Employe::where('sexe','MASCULIN')->where('departement','RESSOURCES HUMAINES')->count();
    $e=Employe::where('sexe','MASCULIN')->where('departement','DMCC')->count();
    $f=Employe::where('sexe','MASCULIN')->where('departement','CONTROLE INTERNE')->count();
    $g=Employe::where('sexe','MASCULIN')->where('departement','DIRECTION GENERALE')->count();
    $h=Employe::where('sexe','MASCULIN')->where('departement','FACILITIES')->count();
    $u=Employe::where('sexe','MASCULIN')->where('departement','RETAIL')->count();
    $v=Employe::where('sexe','MASCULIN')->where('departement','AUDIT')->count();


    $i=Employe::where('sexe','FEMININ')->where('departement','INFORMATIQUE')->count();
    $j=Employe::where('sexe','FEMININ')->where('departement','FINANCE')->count();
    $k=Employe::where('sexe','FEMININ')->where('departement','CREDIT')->count();
    $l=Employe::where('sexe','FEMININ')->where('departement','RESSOURCES HUMAINES')->count();
    $m=Employe::where('sexe','FEMININ')->where('departement','DMCC')->count();
    $n=Employe::where('sexe','FEMININ')->where('departement','CONTROLE INTERNE')->count();
    $o=Employe::where('sexe','FEMININ')->where('departement','DIRECTION GENERALE')->count();
    $p=Employe::where('sexe','FEMININ')->where('departement','FACILITIES')->count();
    $r=Employe::where('sexe','FEMININ')->where('departement','RETAIL')->count();
    $s=Employe::where('sexe','FEMININ')->where('departement','AUDIT')->count();


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
    ->dataset('Hommes', [$a,$b,$c,$d,$e,$f,$g,$h,$u,$v])
    ->dataset('Femmes', [$i,$j,$k,$l,$m,$n,$o,$p,$r,$s])
    // Setup what the values mean
    ->labels(['INFORMATIQUE', 'FINANCE', 'CREDIT','RESSOURCES HUMAINES','DMCC','CONTROL INTERNE','DIRECTION GENERALE','FACILITIES','RETAIL','AUDIT']);

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
$lala = Charts::database(Employe::all(), 'bar', 'highcharts')
    ->elementLabel("Nombre d'employes")
    ->dimensions(1000, 500)
    ->responsive(true)
    ->groupByMonth();

//********************************************************************
            $users = Employe::all();
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

$usr = DB::table('employes')->select('employes.id','employes.nom','contrats.type_contrat')->join('contrats','employes.id','=','contrats.id')->where(['sexe'=>'MASCULIN'])->get();
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


$employe=DB::select("select departement, count(*) as NBRE_STAFF from employes group by departement");
//$employe=Employe::all()->groupBy('departement')->first();

            return view('/cofinacg/analyse/index',[
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
