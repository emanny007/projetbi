<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Charts;
use App\Site;
use App\Employe;
use DB;


class ComptectiController extends Controller
{



public function accueil_liste_entite(Request $request)
{

  $geo = Charts::create('geo', 'highcharts')

          ->title('GROUPE COFINA')

          ->elementLabel('COFINA')

          ->labels(['SN', 'CI', 'CG', 'GN', 'ML','GA','BF'])
          //->labels(['CI'])
          ->colors(['#DA1124', '#985689'])

          ->values([500,300,75,100,100,100,100,30])

          ->dimensions(500,500)

          ->responsive(true);


          $choisir_entite = $request->input('choisir_entite');

  if(!empty($choisir_entite)){
    $nb_empl=DB::select("SELECT distinct * from employes, contrats where employes.id=contrats.employe_id AND entite='$choisir_entite' AND employes.statut='ACTIVE'");
    $nb_cdi=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.entite='$choisir_entite' AND contrats.type_contrat='CDI' AND employes.statut='ACTIVE'");
    $nb_cdd=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.entite='$choisir_entite' AND contrats.type_contrat='CDD' AND employes.statut='ACTIVE'");
    $nb_stage=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.entite='$choisir_entite' AND contrats.type_contrat='STAGE' AND employes.statut='ACTIVE'");
    $nb_prestation=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.entite='$choisir_entite' AND contrats.type_contrat='PRESTATION' AND employes.statut='ACTIVE'");
    $employes=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.entite='$choisir_entite' AND employes.statut='ACTIVE' ORDER BY employes.id DESC LIMIT 20");


    if($choisir_entite=="ALL STAFF"){

         $nb_empl=DB::select("SELECT distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE'");
         $nb_cdi=DB::select("select distinct * from employes,contrats where employes.id=contrats.employe_id AND contrats.type_contrat='CDI' AND employes.statut='ACTIVE'");
         $nb_cdd=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND contrats.type_contrat='CDD' AND employes.statut='ACTIVE'");
         $nb_stage=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND contrats.type_contrat='STAGE' AND employes.statut='ACTIVE'");
         $nb_prestation=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND contrats.type_contrat='PRESTATION' AND employes.statut='ACTIVE'");
         $employes=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' ORDER BY employes.id DESC LIMIT 20");

    }

  }else{

    $nb_empl=DB::select("SELECT distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE'");
    $nb_cdi=DB::select("select distinct * from employes,contrats where employes.id=contrats.employe_id AND contrats.type_contrat='CDI' AND employes.statut='ACTIVE'");
    $nb_cdd=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND contrats.type_contrat='CDD' AND employes.statut='ACTIVE'");
    $nb_stage=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND contrats.type_contrat='STAGE' AND employes.statut='ACTIVE'");
    $nb_prestation=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND contrats.type_contrat='PRESTATION' AND employes.statut='ACTIVE'");
    $employes=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' ORDER BY employes.id DESC LIMIT 20");

  }

  $sites= Site::where('entite','<>','')->get();
  flash("Bienvenue dans votre plateforme d'analyse decisionnelle: cofiquick!!")->success();
     return view('/cti-maker/accueil',['sites' => $sites,
            'employes' => $employes,
            'geo' => $geo,
            'nb_empl' => $nb_empl,
            'nb_cdi' => $nb_cdi,
            'nb_cdd' => $nb_cdd,
            'nb_stage' => $nb_stage,
            'nb_prestation' => $nb_prestation,
   ]);
}



public function accueil_maker(Request $request)
{
  $geo = Charts::create('geo', 'highcharts')

          ->title('GROUPE COFINA')

          ->elementLabel('COFINA')

          ->labels(['SN', 'CI', 'CG', 'GN', 'ML','GA','BF'])
          //->labels(['CI'])
          ->colors(['#DA1124', '#985689'])

          ->values([500,300,75,100,100,100,100,30])

          ->dimensions(500,500)

          ->responsive(true);


          $choisir_entite = $request->input('choisir_entite');

if(!empty($choisir_entite)){
 //$employes=DB::table('employes')->where('entite', '=',choisir_entite)->get();
    //$nb_empl=DB::select("SELECT * FROM employes WHERE entite='$choisir_entite'");
    $nb_empl=DB::select("SELECT distinct * from employes, contrats where employes.id=contrats.employe_id AND entite='$choisir_entite' AND employes.statut='ACTIVE'");
    $nb_cdi=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.entite='$choisir_entite' AND contrats.type_contrat='CDI' AND employes.statut='ACTIVE'");
    $nb_cdd=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.entite='$choisir_entite' AND contrats.type_contrat='CDD' AND employes.statut='ACTIVE'");
    $nb_stage=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.entite='$choisir_entite' AND contrats.type_contrat='STAGE' AND employes.statut='ACTIVE'");
    $nb_prestation=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.entite='$choisir_entite' AND contrats.type_contrat='PRESTATION' AND employes.statut='ACTIVE'");
    $employes=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.entite='$choisir_entite' AND employes.statut='ACTIVE' ORDER BY employes.id DESC LIMIT 20");


    if($choisir_entite=="ALL STAFF"){

         $nb_empl=DB::select("SELECT distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE'");
         $nb_cdi=DB::select("select distinct * from employes,contrats where employes.id=contrats.employe_id AND contrats.type_contrat='CDI' AND employes.statut='ACTIVE'");
         $nb_cdd=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND contrats.type_contrat='CDD' AND employes.statut='ACTIVE'");
         $nb_stage=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND contrats.type_contrat='STAGE' AND employes.statut='ACTIVE'");
         $nb_prestation=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND contrats.type_contrat='PRESTATION' AND employes.statut='ACTIVE'");
         $employes=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' ORDER BY employes.id DESC LIMIT 20");

    }

}else{
    //$nb_empl=DB::select("SELECT * FROM employes");
    $nb_empl=DB::select("SELECT distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE'");
    $nb_cdi=DB::select("select distinct * from employes,contrats where employes.id=contrats.employe_id AND contrats.type_contrat='CDI' AND employes.statut='ACTIVE'");
    $nb_cdd=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND contrats.type_contrat='CDD' AND employes.statut='ACTIVE'");
    $nb_stage=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND contrats.type_contrat='STAGE' AND employes.statut='ACTIVE'");
    $nb_prestation=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND contrats.type_contrat='PRESTATION' AND employes.statut='ACTIVE'");
    $employes=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' ORDER BY employes.id DESC LIMIT 20");

}
  //$sites=Site::all();
  $sites= Site::where('entite','<>','')->get();
  flash("Bienvenue dans votre plateforme d'analyse decisionnelle: cofiquick!!")->success();
     return view('/cti-maker/accueil',['sites' => $sites,
            'employes' => $employes,
            'geo' => $geo,
            'nb_empl' => $nb_empl,
            'nb_cdi' => $nb_cdi,
            'nb_cdd' => $nb_cdd,
            'nb_stage' => $nb_stage,
            'nb_prestation' => $nb_prestation,
   ]);
  }



  public function deconnexion()
  {
    auth()->logout();
  //  flash("Merci d'avoir visité votre BI!")->success();
    return redirect('/connexions/index');
  }


    public function sessionuser(Request $request)
    {

      $user = Employe::where('email', $request->get('email'))->first();

      return view('/includes/headerdesktop-maker-cti',['users' => $user]);
    }





}
