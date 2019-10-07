<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Charts;

use App\User;
use App\Employe;
use App\Contrat;

use DB;


class Analyse_contratcsgController extends Controller
{

  public function contrat(Request $request)
  {

//*********CTI *******************************
    $cti_a = DB::table('employes')->join('contrats','employes.id','=','contrats.employe_id')
                    ->select('employes.entite','employes.nom','contrats.type_contrat')
                    ->where('employes.entite','CTI')
                    ->where('contrats.type_contrat','CDD')->count();

    $cti_b = DB::table('employes')->join('contrats','employes.id','=','contrats.employe_id')
                                  ->select('employes.entite','employes.nom','contrats.type_contrat')
                                  ->where('employes.entite','CTI')
                                  ->where('contrats.type_contrat','CDI')->count();

    $cti_c = DB::table('employes')->join('contrats','employes.id','=','contrats.employe_id')
                                  ->select('employes.entite','employes.nom','contrats.type_contrat')
                                  ->where('employes.entite','CTI')
                                  ->where('contrats.type_contrat','PRESTATION')->count();

    $cti_d = DB::table('employes')->join('contrats','employes.id','=','contrats.employe_id')
                        ->select('employes.entite','employes.nom','contrats.type_contrat')
                        ->where('employes.entite','CTI')
                        ->where('contrats.type_contrat','STAGE')->count();

//*********CAC**********************************
                        $cac_a = DB::table('employes')->join('contrats','employes.id','=','contrats.employe_id')
                                        ->select('employes.entite','employes.nom','contrats.type_contrat')
                                        ->where('employes.entite','CAC')
                                        ->where('contrats.type_contrat','CDD')->count();

                        $cac_b = DB::table('employes')->join('contrats','employes.id','=','contrats.employe_id')
                                                      ->select('employes.entite','employes.nom','contrats.type_contrat')
                                                      ->where('employes.entite','CAC')
                                                      ->where('contrats.type_contrat','CDI')->count();

                        $cac_c = DB::table('employes')->join('contrats','employes.id','=','contrats.employe_id')
                                                      ->select('employes.entite','employes.nom','contrats.type_contrat')
                                                      ->where('employes.entite','CAC')
                                                      ->where('contrats.type_contrat','PRESTATION')->count();

                        $cac_d = DB::table('employes')->join('contrats','employes.id','=','contrats.employe_id')
                                            ->select('employes.entite','employes.nom','contrats.type_contrat')
                                            ->where('employes.entite','CAC')
                                            ->where('contrats.type_contrat','STAGE')->count();

//***********COFINA SENEGAL****************************
                        $cofinasn_a = DB::table('employes')->join('contrats','employes.id','=','contrats.employe_id')
                                              ->select('employes.entite','employes.nom','contrats.type_contrat')
                                              ->where('employes.entite','COFINA SN')
                                              ->where('contrats.type_contrat','CDD')->count();

                        $cofinasn_b = DB::table('employes')->join('contrats','employes.id','=','contrats.employe_id')
                                                        ->select('employes.entite','employes.nom','contrats.type_contrat')
                                                        ->where('employes.entite','COFINA SN')
                                                        ->where('contrats.type_contrat','CDI')->count();

                        $cofinasn_c = DB::table('employes')->join('contrats','employes.id','=','contrats.employe_id')
                                                        ->select('employes.entite','employes.nom','contrats.type_contrat')
                                                        ->where('employes.entite','COFINA SN')
                                                        ->where('contrats.type_contrat','PRESTATION')->count();

                       $cofinasn_d = DB::table('employes')->join('contrats','employes.id','=','contrats.employe_id')
                                                        ->select('employes.entite','employes.nom','contrats.type_contrat')
                                                        ->where('employes.entite','COFINA SN')
                                                        ->where('contrats.type_contrat','STAGE')->count();

//***********COFINA GUINEE***********************************************
$cofinagn_a = DB::table('employes')->join('contrats','employes.id','=','contrats.employe_id')
                                  ->select('employes.entite','employes.nom','contrats.type_contrat')
                                  ->where('employes.entite','COFINA GN')
                                  ->where('contrats.type_contrat','CDD')->count();

$cofinagn_b = DB::table('employes')->join('contrats','employes.id','=','contrats.employe_id')
                                  ->select('employes.entite','employes.nom','contrats.type_contrat')
                                  ->where('employes.entite','COFINA GN')
                                  ->where('contrats.type_contrat','CDI')->count();

$cofinagn_c = DB::table('employes')->join('contrats','employes.id','=','contrats.employe_id')
                                  ->select('employes.entite','employes.nom','contrats.type_contrat')
                                  ->where('employes.entite','COFINA GN')
                                  ->where('contrats.type_contrat','PRESTATION')->count();

$cofinagn_d = DB::table('employes')->join('contrats','employes.id','=','contrats.employe_id')
                                   ->select('employes.entite','employes.nom','contrats.type_contrat')
                                   ->where('employes.entite','COFINA GN')
                                   ->where('contrats.type_contrat','STAGE')->count();


 //***********CSG ************************************************
          $csg_a = DB::table('employes')->join('contrats','employes.id','=','contrats.employe_id')
                       ->select('employes.entite','employes.nom','contrats.type_contrat')
                       ->where('employes.entite','CSG')
                       ->where('contrats.type_contrat','CDD')->count();

           $csg_b = DB::table('employes')->join('contrats','employes.id','=','contrats.employe_id')
                       ->select('employes.entite','employes.nom','contrats.type_contrat')
                       ->where('employes.entite','CSG')
                       ->where('contrats.type_contrat','CDI')->count();

           $csg_c = DB::table('employes')->join('contrats','employes.id','=','contrats.employe_id')
                       ->select('employes.entite','employes.nom','contrats.type_contrat')
                       ->where('employes.entite','CSG')
                       ->where('contrats.type_contrat','PRESTATION')->count();

          $csg_d = DB::table('employes')->join('contrats','employes.id','=','contrats.employe_id')
                                            ->select('employes.entite','employes.nom','contrats.type_contrat')
                                            ->where('employes.entite','CSG')
                                            ->where('contrats.type_contrat','STAGE')->count();

//****************COFINA CONGO****************************************
$cofinacg_a = DB::table('employes')->join('contrats','employes.id','=','contrats.employe_id')
                                  ->select('employes.entite','employes.nom','contrats.type_contrat')
                                  ->where('employes.entite','COFINA CG')
                                  ->where('contrats.type_contrat','CDD')->count();

$cofinacg_b = DB::table('employes')->join('contrats','employes.id','=','contrats.employe_id')
                                  ->select('employes.entite','employes.nom','contrats.type_contrat')
                                  ->where('employes.entite','COFINA CG')
                                  ->where('contrats.type_contrat','CDI')->count();

$cofinacg_c = DB::table('employes')->join('contrats','employes.id','=','contrats.employe_id')
                                  ->select('employes.entite','employes.nom','contrats.type_contrat')
                                  ->where('employes.entite','COFINA CG')
                                  ->where('contrats.type_contrat','PRESTATION')->count();

$cofinacg_d = DB::table('employes')->join('contrats','employes.id','=','contrats.employe_id')
                                   ->select('employes.entite','employes.nom','contrats.type_contrat')
                                   ->where('employes.entite','COFINA CG')
                                   ->where('contrats.type_contrat','STAGE')->count();

//****************COFINA MALI****************************************
                                   $cofinaml_a = DB::table('employes')->join('contrats','employes.id','=','contrats.employe_id')
                                                                     ->select('employes.entite','employes.nom','contrats.type_contrat')
                                                                     ->where('employes.entite','COFINA ML')
                                                                     ->where('contrats.type_contrat','CDD')->count();

                                   $cofinaml_b = DB::table('employes')->join('contrats','employes.id','=','contrats.employe_id')
                                                                     ->select('employes.entite','employes.nom','contrats.type_contrat')
                                                                     ->where('employes.entite','COFINA ML')
                                                                     ->where('contrats.type_contrat','CDI')->count();

                                   $cofinaml_c = DB::table('employes')->join('contrats','employes.id','=','contrats.employe_id')
                                                                     ->select('employes.entite','employes.nom','contrats.type_contrat')
                                                                     ->where('employes.entite','COFINA ML')
                                                                     ->where('contrats.type_contrat','PRESTATION')->count();

                                   $cofinaml_d = DB::table('employes')->join('contrats','employes.id','=','contrats.employe_id')
                                                                      ->select('employes.entite','employes.nom','contrats.type_contrat')
                                                                      ->where('employes.entite','COFINA ML')
                                                                      ->where('contrats.type_contrat','STAGE')->count();
//************************************************
//****************FINELLE****************************************
                                   $finelle_a = DB::table('employes')->join('contrats','employes.id','=','contrats.employe_id')
                                                                     ->select('employes.entite','employes.nom','contrats.type_contrat')
                                                                     ->where('employes.entite','FINELLE')
                                                                     ->where('contrats.type_contrat','CDD')->count();

                                   $finelle_b = DB::table('employes')->join('contrats','employes.id','=','contrats.employe_id')
                                                                     ->select('employes.entite','employes.nom','contrats.type_contrat')
                                                                     ->where('employes.entite','FINELLE')
                                                                     ->where('contrats.type_contrat','CDI')->count();

                                   $finelle_c = DB::table('employes')->join('contrats','employes.id','=','contrats.employe_id')
                                                                     ->select('employes.entite','employes.nom','contrats.type_contrat')
                                                                     ->where('employes.entite','FINELLE')
                                                                     ->where('contrats.type_contrat','PRESTATION')->count();

                                   $finelle_d = DB::table('employes')->join('contrats','employes.id','=','contrats.employe_id')
                                                                      ->select('employes.entite','employes.nom','contrats.type_contrat')
                                                                      ->where('employes.entite','FINELLE')
                                                                      ->where('contrats.type_contrat','STAGE')->count();
//****************COFINA BURKINA FASO****************************************
$cofinabf_a = DB::table('employes')->join('contrats','employes.id','=','contrats.employe_id')
->select('employes.entite','employes.nom','contrats.type_contrat')
->where('employes.entite','COFINA BF')
->where('contrats.type_contrat','CDD')->count();

$cofinabf_b = DB::table('employes')->join('contrats','employes.id','=','contrats.employe_id')
->select('employes.entite','employes.nom','contrats.type_contrat')
->where('employes.entite','COFINA BF')
->where('contrats.type_contrat','CDI')->count();

$cofinabf_c = DB::table('employes')->join('contrats','employes.id','=','contrats.employe_id')
->select('employes.entite','employes.nom','contrats.type_contrat')
->where('employes.entite','COFINA BF')
->where('contrats.type_contrat','PRESTATION')->count();

$cofinabf_d = DB::table('employes')->join('contrats','employes.id','=','contrats.employe_id')
->select('employes.entite','employes.nom','contrats.type_contrat')
->where('employes.entite','COFINA BF')
->where('contrats.type_contrat','STAGE')->count();

//****************CPS SN****************************************
$cpssn_a = DB::table('employes')->join('contrats','employes.id','=','contrats.employe_id')
->select('employes.entite','employes.nom','contrats.type_contrat')
->where('employes.entite','CPS SN')
->where('contrats.type_contrat','CDD')->count();

$cpssn_b = DB::table('employes')->join('contrats','employes.id','=','contrats.employe_id')
->select('employes.entite','employes.nom','contrats.type_contrat')
->where('employes.entite','CPS SN')
->where('contrats.type_contrat','CDI')->count();

$cpssn_c = DB::table('employes')->join('contrats','employes.id','=','contrats.employe_id')
->select('employes.entite','employes.nom','contrats.type_contrat')
->where('employes.entite','CPS SN')
->where('contrats.type_contrat','PRESTATION')->count();

$cpssn_d = DB::table('employes')->join('contrats','employes.id','=','contrats.employe_id')
->select('employes.entite','employes.nom','contrats.type_contrat')
->where('employes.entite','CPS SN')
->where('contrats.type_contrat','STAGE')->count();

//****************CPS ML****************************************
$cpsml_a = DB::table('employes')->join('contrats','employes.id','=','contrats.employe_id')
                              ->select('employes.entite','employes.nom','contrats.type_contrat')
                              ->where('employes.entite','CPS ML')
                              ->where('contrats.type_contrat','CDD')->count();

$cpsml_b = DB::table('employes')->join('contrats','employes.id','=','contrats.employe_id')
                               ->select('employes.entite','employes.nom','contrats.type_contrat')
                               ->where('employes.entite','CPS ML')
                               ->where('contrats.type_contrat','CDI')->count();

$cpsml_c = DB::table('employes')->join('contrats','employes.id','=','contrats.employe_id')
                               ->select('employes.entite','employes.nom','contrats.type_contrat')
                               ->where('employes.entite','CPS ML')
                               ->where('contrats.type_contrat','PRESTATION')->count();

$cpsml_d = DB::table('employes')->join('contrats','employes.id','=','contrats.employe_id')
                               ->select('employes.entite','employes.nom','contrats.type_contrat')
                               ->where('employes.entite','CPS ML')
                               ->where('contrats.type_contrat','STAGE')->count();


//****************CPS CI****************************************
$cpsci_a = DB::table('employes')->join('contrats','employes.id','=','contrats.employe_id')
->select('employes.entite','employes.nom','contrats.type_contrat')
->where('employes.entite','CPS CI')
->where('contrats.type_contrat','CDD')->count();

$cpsci_b = DB::table('employes')->join('contrats','employes.id','=','contrats.employe_id')
->select('employes.entite','employes.nom','contrats.type_contrat')
->where('employes.entite','CPS CI')
->where('contrats.type_contrat','CDI')->count();

$cpsci_c = DB::table('employes')->join('contrats','employes.id','=','contrats.employe_id')
->select('employes.entite','employes.nom','contrats.type_contrat')
->where('employes.entite','CPS CI')
->where('contrats.type_contrat','PRESTATION')->count();

$cpsci_d = DB::table('employes')->join('contrats','employes.id','=','contrats.employe_id')
->select('employes.entite','employes.nom','contrats.type_contrat')
->where('employes.entite','CPS CI')
->where('contrats.type_contrat','STAGE')->count();

//****************COFINA SERVICE FRANCE****************************************
$cofinasf_a = DB::table('employes')->join('contrats','employes.id','=','contrats.employe_id')
->select('employes.entite','employes.nom','contrats.type_contrat')
->where('employes.entite','COFINA SERVICES FRANCE')
->where('contrats.type_contrat','CDD')->count();

$cofinasf_b = DB::table('employes')->join('contrats','employes.id','=','contrats.employe_id')
->select('employes.entite','employes.nom','contrats.type_contrat')
->where('employes.entite','COFINA SERVICES FRANCE')
->where('contrats.type_contrat','CDI')->count();

$cofinasf_c = DB::table('employes')->join('contrats','employes.id','=','contrats.employe_id')
->select('employes.entite','employes.nom','contrats.type_contrat')
->where('employes.entite','COFINA SERVICES FRANCE')
->where('contrats.type_contrat','PRESTATION')->count();

$cofinasf_d = DB::table('employes')->join('contrats','employes.id','=','contrats.employe_id')
->select('employes.entite','employes.nom','contrats.type_contrat')
->where('employes.entite','COFINA SERVICES FRANCE')
->where('contrats.type_contrat','STAGE')->count();


//************************************************
$data = Charts::multi('bar', 'google')
// Setup the chart settings
->title("Analyse éffectuée par type de contrats et par entite")
// A dimension of 0 means it will take 100% of the space
->dimensions(0, 400) // Width x Height
// This defines a preset of colors already done:)
->template("material")
->colors(['#FFFF00','#00FF00','#FF0000','#808080'])
//->colors(['#2196F3', '#F44336', '#FFC107'])
// Setup the diferent datasets (this is a multi chart)
->dataset('CDD', [$cti_a,$cac_a,$cofinasn_a,$cofinagn_a,$csg_a,$cofinacg_a,$cofinaml_a,$cofinabf_a,$finelle_a,$cpssn_a,$cpsml_a,$cpsci_a,$cofinasf_a])
->dataset('CDI', [$cti_b,$cac_b,$cofinasn_b,$cofinagn_b,$csg_b,$cofinacg_b,$cofinaml_b,$cofinabf_b,$finelle_b,$cpssn_b,$cpsml_b,$cpsci_b,$cofinasf_b])
->dataset('PRESTATION', [$cti_c,$cac_c,$cofinasn_c,$cofinagn_c,$csg_c,$cofinacg_c,$cofinaml_c,$cofinabf_c,$finelle_c,$cpssn_c,$cpsml_c,$cpsci_c,$cofinasf_c])
->dataset('STAGE', [$cti_d,$cac_d,$cofinasn_d,$cofinagn_d,$csg_d,$cofinacg_d,$cofinaml_d,$cofinabf_d,$finelle_d,$cpssn_d,$cpsml_d,$cpsci_d,$cofinasf_d])
// Setup what the values mean
->labels(['CTI','CAC','COFINA SN','COFINA GN','CSG','COFINA CG','COFINA ML','COFINA BF','FINELLE','CPS SN','CPS ML','CPS CI','COFINA SF']);

//**********************************************************************
      $cdd=Contrat::where('type_contrat','CDD')->count();
      $cdi=Contrat::where('type_contrat','CDI')->count();
      $stage=Contrat::where('type_contrat','STAGE')->count();
      $prestation=Contrat::where('type_contrat','PRESTATION')->count();

      $dodo = Charts::create('pie', 'highcharts')
          ->title('CONTRATS')
          ->labels(['CDD','CDI','STAGE','PRESTATION'])
          ->values([$cdd,$cdi,$stage,$prestation])
          ->colors(['#FFFF00','#00FF00','#808080','#FF0000'])
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
                  ->title('My')
                  ->labels(['First', 'Second', 'Third'])
                  ->values([5,10,20])
                  ->dimensions(0,500);

        return view('/csg/analyse/contrat',['dodo' => $dodo,'contratmois' => $contratmois,
        'contratjours' => $contratjours,
        'opport' => $opport,
        'chart' => $chart,
        'data' => $data,
      ]);

  }



}
