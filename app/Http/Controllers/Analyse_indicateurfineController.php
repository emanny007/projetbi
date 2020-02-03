<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Charts;
use App\Site;
use App\User;
use App\Employe;
use DB;


class Analyse_indicateurfineController extends Controller
{

  public function indicateur(Request $request)
  {
    $choisir_entite = $request->input('choisir_entite');

    if(!empty($choisir_entite)){


      //REPARTITION PAR GENRE ET PAR CATEGORIE

      $hommes_cadres=DB::select("select count(*) as homme_cadre from employes, contrats where employes.id=contrats.employe_id AND employes.sexe='MASCULIN' AND employes.categorie='CADRE' AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite'");
      $hommes_noncadres=DB::select("select count(*) as homme_non_cadre from employes, contrats where employes.id=contrats.employe_id AND employes.sexe='MASCULIN' AND employes.categorie='NON CADRE' AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite'");
      $femmes_cadres=DB::select("select count(*) as femme_cadre from employes, contrats where employes.id=contrats.employe_id AND employes.sexe='FEMININ' AND employes.categorie='CADRE' AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite'");
      $femmes_noncadres=DB::select("select count(*) as femme_non_cadre from employes, contrats where employes.id=contrats.employe_id AND employes.sexe='FEMININ' AND employes.categorie='NON CADRE' AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite'");

      //REPARTITION  PAR DEPARTEMENT
      $departements=DB::select("select departement, count(*) as NBRE from employes emp, contrats c where emp.id=c.employe_id AND emp.entite='$choisir_entite' group by emp.departement");

      //REPARTITION PAR SEXE
      $employes=DB::select("select count(*) as total_empl from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND entite='$choisir_entite'");
      $hommes=DB::select("select count(*) as total_homme from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.sexe='MASCULIN'");
      $femmes=DB::select("select count(*) as total_femme from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.sexe='FEMININ'");

      //REPARTION PAR CONTRAT
      $nb_empl=DB::select("SELECT distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND entite='$choisir_entite'");
      $nb_cdi=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND contrats.type_contrat='CDI'");
      $nb_cdd=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND contrats.type_contrat='CDD'");
      $nb_stage=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND contrats.type_contrat='STAGE'");
      $nb_prestation=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND contrats.type_contrat='PRESTATION'");
      $employes=DB::select("SELECT distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND entite='$choisir_entite'");

    if($choisir_entite=="ALL STAFF") {

      //REPARTITION PAR GENRE ET PAR CATEGORIE
      $hommes_cadres=DB::select("select count(*) as homme_cadre from employes, contrats where employes.id=contrats.employe_id AND employes.sexe='MASCULIN' AND employes.statut='ACTIVE' AND employes.categorie='CADRE'");
      $hommes_noncadres=DB::select("select count(*) as homme_non_cadre from employes, contrats where employes.id=contrats.employe_id AND employes.sexe='MASCULIN' AND employes.statut='ACTIVE' AND employes.categorie='NON CADRE'");
      $femmes_cadres=DB::select("select count(*) as femme_cadre from employes, contrats where employes.id=contrats.employe_id AND employes.sexe='FEMININ' AND employes.statut='ACTIVE' AND employes.categorie='CADRE'");
      $femmes_noncadres=DB::select("select count(*) as femme_non_cadre from employes, contrats where employes.id=contrats.employe_id AND employes.sexe='FEMININ' AND employes.statut='ACTIVE' AND employes.categorie='NON CADRE'");

      //REPARTITION  PAR DEPARTEMENT
      $departements=DB::select("select departement, count(*) as NBRE from employes emp, contrats c where emp.id=c.employe_id group by emp.departement");

      //REPARTITION PAR SEXE
      $employes=DB::select("select count(*) as total_empl from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE'");
      $hommes=DB::select("select count(*) as total_homme from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.sexe='MASCULIN'");
      $femmes=DB::select("select count(*) as total_femme from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.sexe='FEMININ'");

      //$nb_empl=DB::select("SELECT * FROM employes");
      //REPARTION PAR CONTRAT
      $nb_empl=DB::select("SELECT distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE'");
      $nb_cdi=DB::select("select distinct * from employes,contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND contrats.type_contrat='CDI'");
      $nb_cdd=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND contrats.type_contrat='CDD'");
      $nb_stage=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND contrats.type_contrat='STAGE'");
      $nb_prestation=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND contrats.type_contrat='PRESTATION'");
      //$employes=Employe::orderby('id','desc')->paginate(20);
      $employes=DB::select("SELECT distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE'");

    }
    }else{
      //REPARTITION PAR GENRE ET PAR CATEGORIE
      $hommes_cadres=DB::select("select count(*) as homme_cadre from employes, contrats where employes.id=contrats.employe_id AND employes.sexe='MASCULIN' AND employes.statut='ACTIVE' AND employes.categorie='CADRE'");
      $hommes_noncadres=DB::select("select count(*) as homme_non_cadre from employes, contrats where employes.id=contrats.employe_id AND employes.sexe='MASCULIN' AND employes.statut='ACTIVE' AND employes.categorie='NON CADRE'");
      $femmes_cadres=DB::select("select count(*) as femme_cadre from employes, contrats where employes.id=contrats.employe_id AND employes.sexe='FEMININ' AND employes.statut='ACTIVE' AND employes.categorie='CADRE'");
      $femmes_noncadres=DB::select("select count(*) as femme_non_cadre from employes, contrats where employes.id=contrats.employe_id AND employes.sexe='FEMININ' AND employes.statut='ACTIVE' AND employes.categorie='NON CADRE'");


      //REPARTITION  PAR DEPARTEMENT
      $departements=DB::select("select departement, count(*) as NBRE from employes emp, contrats c where emp.id=c.employe_id group by emp.departement");

      //REPARTITION PAR SEXE
      $employes=DB::select("select count(*) as total_empl from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE'");
      $hommes=DB::select("select count(*) as total_homme from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.sexe='MASCULIN'");
      $femmes=DB::select("select count(*) as total_femme from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.sexe='FEMININ'");

      //$nb_empl=DB::select("SELECT * FROM employes");
      //REPARTION PAR CONTRAT
      $nb_empl=DB::select("SELECT distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE'");
      $nb_cdi=DB::select("select distinct * from employes,contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND contrats.type_contrat='CDI'");
      $nb_cdd=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND contrats.type_contrat='CDD'");
      $nb_stage=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND contrats.type_contrat='STAGE'");
      $nb_prestation=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND contrats.type_contrat='PRESTATION'");
      //$employes=Employe::orderby('id','desc')->paginate(20);
      $employes=DB::select("SELECT distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE'");

    }
       $sites= Site::where('entite','<>','')->get();
       //$resultat_hommes = (($hommes)*100)/floatval($employes));
       //$resultat_femmes = ((floatval($femmes)*100)/floatval($employes));

      return view('/finelle/analyse/indicateur',['employes' => $employes,'sites' => $sites,'choisir_entite' => $choisir_entite,
      //'resultat_hommes'=>$resultat_hommes,
      //'resultat_femmes'=>$resultat_femmes,
    'hommes' => $hommes,
    'departements' => $departements,
    'femmes' => $femmes,
    'nb_empl' => $nb_empl,
    'nb_cdi' => $nb_cdi,
    'nb_cdd' => $nb_cdd,
    'nb_stage' => $nb_stage,
    'nb_prestation' => $nb_prestation,
    'hommes_cadres' => $hommes_cadres,
    'hommes_noncadres' => $hommes_noncadres,
    'femmes_cadres' => $femmes_cadres,
    'femmes_noncadres' => $femmes_noncadres,
 ]);
  }
}
