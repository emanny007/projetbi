<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Elibyy\TCPDF\Facades\TCPDF;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use PDF;
use Charts;
use App\Site;
use App\User;
use App\Employe;
use DB;


class Analyse_indicateurController extends Controller
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

      return view('/analyse/indicateur',['employes' => $employes,'sites' => $sites,'choisir_entite' => $choisir_entite,
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

  public function indicateur_new (Request $request)
  {
    //$choisir_entite = $request->input('choisir_entite');

      $choisir_entite ="CTI";
      //REPARTITION PAR GENRE ET PAR CATEGORIE

      $hommes_cadres=DB::select("select distinct *  from employes, contrats where employes.id=contrats.employe_id AND employes.sexe='MASCULIN' AND employes.categorie='CADRE' AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite'");
      $hommes_noncadres=DB::select("select distinct *  from employes, contrats where employes.id=contrats.employe_id AND employes.sexe='MASCULIN' AND employes.categorie='NON CADRE' AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite'");
      $femmes_cadres=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.sexe='FEMININ' AND employes.categorie='CADRE' AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite'");
      $femmes_noncadres=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.sexe='FEMININ' AND employes.categorie='NON CADRE' AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite'");

      //REPARTITION  PAR DEPARTEMENT
      $dpt_rh=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.entite='$choisir_entite' AND employes.statut='ACTIVE' AND employes.departement='RESSOURCES HUMAINES'");
      $dpt_dmcc=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.entite='$choisir_entite' AND employes.statut='ACTIVE' AND employes.departement='DMCC'");
      $dpt_finance=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.entite='$choisir_entite' AND employes.statut='ACTIVE' AND employes.departement='FINANCE'");
      $dpt_informatique=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.entite='$choisir_entite' AND employes.statut='ACTIVE' AND employes.departement='INFORMATIQUE'");
      $dpt_expl=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.entite='$choisir_entite' AND employes.statut='ACTIVE' AND employes.departement='EXPLOITATION'");
      $dpt_credit=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.entite='$choisir_entite' AND employes.statut='ACTIVE' AND employes.departement='CREDIT'");
      $dpt_audit=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.entite='$choisir_entite' AND employes.statut='ACTIVE'AND employes.departement='AUDIT'");
      $dpt_ci=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.entite='$choisir_entite' AND employes.statut='ACTIVE' AND employes.departement='CONTROLE INTERNE'");
      $dpt_dg=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.entite='$choisir_entite' AND employes.statut='ACTIVE' AND employes.departement='DIRECTION GENERALE'");
      $dpt_d=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.entite='$choisir_entite' AND employes.statut='ACTIVE' AND employes.departement='DIRECTION'");
      $dpt_retail=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.entite='$choisir_entite' AND employes.statut='ACTIVE' AND employes.departement='RETAIL'");
      $dpt_legal=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.entite='$choisir_entite' AND employes.statut='ACTIVE' AND employes.departement='LEGAL'");
      $dpt_facilitie=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.entite='$choisir_entite' AND employes.statut='ACTIVE' AND employes.departement='FACILITIES'");
      $dpt_ops=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.entite='$choisir_entite' AND employes.statut='ACTIVE' AND employes.departement='OPERATIONS'");
      $dpt_phoenix=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.entite='$choisir_entite' AND employes.statut='ACTIVE' AND employes.departement='PHOENIX'");

      //AGE MOYEN DES STAFFS PAR FILIALE
      $age_employes=DB::select("select avg(age) as age_moyen from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND entite='$choisir_entite'");

      //REPARTITION PAR SEXE
      $employes=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND entite='$choisir_entite'");
      $hommes=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.sexe='MASCULIN'");
      $femmes=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.sexe='FEMININ'");

      //REPARTION PAR CONTRAT
      $nb_empl=DB::select("SELECT distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND entite='$choisir_entite'");
      $nb_cdi=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND contrats.type_contrat='CDI'");
      $nb_cdd=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND contrats.type_contrat='CDD'");
      $nb_stage=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND contrats.type_contrat='STAGE'");
      $nb_prestation=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND contrats.type_contrat='PRESTATION'");
      $employes=DB::select("SELECT distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND entite='$choisir_entite'");


      //REPARTITION  DES DEPARTS
      $depart_demission=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='DEMISSION'");
      $depart_negocie=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='DEPART NEGOCIE'");
      $depart_fincdd=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='FIN CDD'");
      $depart_finstage=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='FIN STAGE'");
      $depart_licenciement=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='LICENCIEMENT'");
      $depart_retraite=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='RETRAITRE'");


      //REPARTITION  DES SANCTIONS
      $sanction_avert=DB::select("select distinct * from employes, sanctions where employes.id=sanctions.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND sanctions.type_sanction='AVERTISSEMENT'");
      $sanction_blame=DB::select("select distinct * from employes, sanctions where employes.id=sanctions.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND sanctions.type_sanction='BLAME'");
      $sanction_map=DB::select("select distinct * from employes, sanctions where employes.id=sanctions.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND sanctions.type_sanction='MISE A PIED'");
      $sanction_licenciement=DB::select("select distinct * from employes, sanctions where employes.id=sanctions.employe_id AND employes.entite='$choisir_entite' AND sanctions.type_sanction='LICENCIEMENT'");




   //dd($age_employes);
  /*  if($choisir_entite=="ALL STAFF") {

      //REPARTITION PAR GENRE ET PAR CATEGORIE
      $hommes_cadres=DB::select("select count(*) as homme_cadre from employes, contrats where employes.id=contrats.employe_id AND employes.sexe='MASCULIN' AND employes.categorie='CADRE'");
      $hommes_noncadres=DB::select("select count(*) as homme_non_cadre from employes, contrats where employes.id=contrats.employe_id AND employes.sexe='MASCULIN' AND employes.categorie='NON CADRE'");
      $femmes_cadres=DB::select("select count(*) as femme_cadre from employes, contrats where employes.id=contrats.employe_id AND employes.sexe='FEMININ' AND employes.categorie='CADRE'");
      $femmes_noncadres=DB::select("select count(*) as femme_non_cadre from employes, contrats where employes.id=contrats.employe_id AND employes.sexe='FEMININ' AND employes.categorie='NON CADRE'");

      //REPARTITION  PAR DEPARTEMENT
      $departements=DB::select("select departement, count(*) as NBRE from employes emp, contrats c where emp.id=c.employe_id group by emp.departement");

      //REPARTITION PAR SEXE
      $employes=DB::select("select count(*) as total_empl from employes, contrats where employes.id=contrats.employe_id");
      $hommes=DB::select("select count(*) as total_homme from employes, contrats where employes.id=contrats.employe_id AND employes.sexe='MASCULIN'");
      $femmes=DB::select("select count(*) as total_femme from employes, contrats where employes.id=contrats.employe_id AND employes.sexe='FEMININ'");

      //$nb_empl=DB::select("SELECT * FROM employes");
      //REPARTION PAR CONTRAT
      $nb_empl=DB::select("SELECT distinct * from employes, contrats where employes.id=contrats.employe_id");
      $nb_cdi=DB::select("select distinct * from employes,contrats where employes.id=contrats.employe_id AND contrats.type_contrat='CDI'");
      $nb_cdd=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND contrats.type_contrat='CDD'");
      $nb_stage=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND contrats.type_contrat='STAGE'");
      $nb_prestation=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND contrats.type_contrat='PRESTATION'");
      //$employes=Employe::orderby('id','desc')->paginate(20);
      $employes=DB::select("SELECT distinct * from employes, contrats where employes.id=contrats.employe_id");

    } */
  //}

      //REPARTITION PAR GENRE ET PAR CATEGORIE
      $hommes_cadres_tot=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.sexe='MASCULIN' AND employes.categorie='CADRE'");
      $hommes_noncadres_tot=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.sexe='MASCULIN' AND employes.categorie='NON CADRE'");
      $femmes_cadres_tot=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.sexe='FEMININ' AND employes.categorie='CADRE'");
      $femmes_noncadres_tot=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.sexe='FEMININ' AND employes.categorie='NON CADRE'");


      //REPARTITION  PAR DEPARTEMENT
      $dpt_rh_tot=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.departement='RESSOURCES HUMAINES'");
      $dpt_dmcc_tot=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.departement='DMCC'");
      $dpt_finance_tot=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.departement='FINANCE'");
      $dpt_informatique_tot=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.departement='INFORMATIQUE'");
      $dpt_expl_tot=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.departement='EXPLOITATION'");
      $dpt_credit_tot=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.departement='CREDIT'");
      $dpt_audit_tot=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.departement='AUDIT'");
      $dpt_ci_tot=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.departement='CONTROLE INTERNE'");
      $dpt_dg_tot=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.departement='DIRECTION GENERALE'");
      $dpt_d_tot=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.departement='DIRECTION'");
      $dpt_retail_tot=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.departement='RETAIL'");
      $dpt_legal_tot=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.departement='LEGAL'");
      $dpt_facilitie_tot=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.departement='FACILITIES'");
      $dpt_ops_tot=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.departement='OPERATIONS'");
      $dpt_phoenix_tot=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.departement='PHOENIX'");


      //REPARTITION  DES DEPARTS
      $depart_demission_tot=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='DEMISSION'");
      $depart_negocie_tot=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='DEPART NEGOCIE'");
      $depart_fincdd_tot=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='FIN CDD'");
      $depart_finstage_tot=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='FIN STAGE'");
      $depart_licenciement_tot=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='LICENCIEMENT'");
      $depart_retraite_tot=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='RETRAITRE'");


      //REPARTITION  DES SANCTIONS
      $sanction_avert_tot=DB::select("select distinct * from employes, sanctions where employes.id=sanctions.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND sanctions.type_sanction='AVERTISSEMENT'");
      $sanction_blame_tot=DB::select("select distinct * from employes, sanctions where employes.id=sanctions.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND sanctions.type_sanction='BLAME'");
      $sanction_map_tot=DB::select("select distinct * from employes, sanctions where employes.id=sanctions.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND sanctions.type_sanction='MISE A PIED'");
      $sanction_licenciement_tot=DB::select("select distinct * from employes, sanctions where employes.id=sanctions.employe_id AND employes.entite='$choisir_entite' AND sanctions.type_sanction='LICENCIEMENT'");

      //AGE MOYEN DES STAFFS PAR FILIALE
      $age_employes_tot=DB::select("select avg(age) as age_moyen from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE'");


      //REPARTITION PAR SEXE
      $employes_tot=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE'");
      $hommes_tot=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.sexe='MASCULIN'");
      $femmes_tot=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.sexe='FEMININ'");

      //$nb_empl=DB::select("SELECT * FROM employes");
      //REPARTION PAR CONTRAT
      $nb_empl_tot=DB::select("SELECT distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE'");
      $nb_cdi_tot=DB::select("select distinct * from employes,contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND contrats.type_contrat='CDI'");
      $nb_cdd_tot=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND contrats.type_contrat='CDD'");
      $nb_stage_tot=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND contrats.type_contrat='STAGE'");
      $nb_prestation_tot=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND contrats.type_contrat='PRESTATION'");
      //$employes=Employe::orderby('id','desc')->paginate(20);
      $employes_tot=DB::select("SELECT distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE'");



      $choisir_entite ="CAC";
      //REPARTITION PAR GENRE ET PAR CATEGORIE

      $hommes_cadres_cac=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.sexe='MASCULIN' AND employes.categorie='CADRE' AND employes.entite='$choisir_entite'");
      $hommes_noncadres_cac=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.sexe='MASCULIN' AND employes.categorie='NON CADRE' AND employes.entite='$choisir_entite'");
      $femmes_cadres_cac=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.sexe='FEMININ' AND employes.categorie='CADRE' AND employes.entite='$choisir_entite'");
      $femmes_noncadres_cac=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.sexe='FEMININ' AND employes.categorie='NON CADRE' AND employes.entite='$choisir_entite'");

      //REPARTITION  PAR DEPARTEMENT
      $dpt_rh_cac=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='RESSOURCES HUMAINES'");
      $dpt_dmcc_cac=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='DMCC'");
      $dpt_finance_cac=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='FINANCE'");
      $dpt_informatique_cac=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='INFORMATIQUE'");
      $dpt_expl_cac=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='EXPLOITATION'");
      $dpt_credit_cac=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='CREDIT'");
      $dpt_audit_cac=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='AUDIT'");
      $dpt_ci_cac=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='CONTROLE INTERNE'");
      $dpt_dg_cac=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='DIRECTION GENERALE'");
      $dpt_d_cac=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='DIRECTION'");
      $dpt_retail_cac=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='RETAIL'");
      $dpt_legal_cac=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='LEGAL'");
      $dpt_facilitie_cac=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='FACILITIES'");
      $dpt_ops_cac=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='OPERATIONS'");
      $dpt_phoenix_cac=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='PHOENIX'");


      //REPARTITION  DES DEPARTS
      $depart_demission_cac=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='DEMISSION'");
      $depart_negocie_cac=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='DEPART NEGOCIE'");
      $depart_fincdd_cac=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='FIN CDD'");
      $depart_finstage_cac=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='FIN STAGE'");
      $depart_licenciement_cac=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='LICENCIEMENT'");
      $depart_retraite_cac=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='RETRAITRE'");

      //REPARTITION  DES SANCTIONS
      $sanction_avert_cac=DB::select("select distinct * from employes, sanctions where employes.id=sanctions.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND sanctions.type_sanction='AVERTISSEMENT'");
      $sanction_blame_cac=DB::select("select distinct * from employes, sanctions where employes.id=sanctions.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND sanctions.type_sanction='BLAME'");
      $sanction_map_cac=DB::select("select distinct * from employes, sanctions where employes.id=sanctions.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND sanctions.type_sanction='MISE A PIED'");
      $sanction_licenciement_cac=DB::select("select distinct * from employes, sanctions where employes.id=sanctions.employe_id AND employes.entite='$choisir_entite' AND sanctions.type_sanction='LICENCIEMENT'");


      //AGE MOYEN DES STAFFS PAR FILIALE
      $age_employes_cac=DB::select("select avg(age) as age_moyen from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND entite='$choisir_entite'");
      //REPARTITION PAR SEXE
      $employes_cac=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND entite='$choisir_entite'");
      $hommes_cac=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.sexe='MASCULIN'");
      $femmes_cac=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.sexe='FEMININ'");

      //REPARTION PAR CONTRAT
      $nb_empl_cac=DB::select("SELECT distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND entite='$choisir_entite'");
      $nb_cdi_cac=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND contrats.type_contrat='CDI'");
      $nb_cdd_cac=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND contrats.type_contrat='CDD'");
      $nb_stage_cac=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND contrats.type_contrat='STAGE'");
      $nb_prestation_cac=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND contrats.type_contrat='PRESTATION'");
      $employes_cac=DB::select("SELECT distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND entite='$choisir_entite'");


      $choisir_entite ="COFINA SN";
      //REPARTITION PAR GENRE ET PAR CATEGORIE

      $hommes_cadres_cfnsn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.sexe='MASCULIN' AND employes.categorie='CADRE' AND employes.entite='$choisir_entite'");
      $hommes_noncadres_cfnsn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.sexe='MASCULIN' AND employes.categorie='NON CADRE' AND employes.entite='$choisir_entite'");
      $femmes_cadres_cfnsn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.sexe='FEMININ' AND employes.categorie='CADRE' AND employes.entite='$choisir_entite'");
      $femmes_noncadres_cfnsn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.sexe='FEMININ' AND employes.categorie='NON CADRE' AND employes.entite='$choisir_entite'");

      //REPARTITION  PAR DEPARTEMENT
      $dpt_rh_cfnsn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='RESSOURCES HUMAINES'");
      $dpt_dmcc_cfnsn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='DMCC'");
      $dpt_finance_cfnsn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='FINANCE'");
      $dpt_informatique_cfnsn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='INFORMATIQUE'");
      $dpt_expl_cfnsn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='EXPLOITATION'");
      $dpt_credit_cfnsn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='CREDIT'");
      $dpt_audit_cfnsn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='AUDIT'");
      $dpt_ci_cfnsn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='CONTROLE INTERNE'");
      $dpt_dg_cfnsn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='DIRECTION GENERALE'");
      $dpt_d_cfnsn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='DIRECTION'");
      $dpt_retail_cfnsn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='RETAIL'");
      $dpt_legal_cfnsn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='LEGAL'");
      $dpt_facilitie_cfnsn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='FACILITIES'");
      $dpt_ops_cfnsn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='OPERATIONS'");
      $dpt_phoenix_cfnsn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='PHOENIX'");


      //REPARTITION  DES DEPARTS
      $depart_demission_cfnsn=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='DEMISSION'");
      $depart_negocie_cfnsn=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='DEPART NEGOCIE'");
      $depart_fincdd_cfnsn=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='FIN CDD'");
      $depart_finstage_cfnsn=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='FIN STAGE'");
      $depart_licenciement_cfnsn=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='LICENCIEMENT'");
      $depart_retraite_cfnsn=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='RETRAITRE'");

      //REPARTITION  DES SANCTIONS
      $sanction_avert_cfnsn=DB::select("select distinct * from employes, sanctions where employes.id=sanctions.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND sanctions.type_sanction='AVERTISSEMENT'");
      $sanction_blame_cfnsn=DB::select("select distinct * from employes, sanctions where employes.id=sanctions.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND sanctions.type_sanction='BLAME'");
      $sanction_map_cfnsn=DB::select("select distinct * from employes, sanctions where employes.id=sanctions.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND sanctions.type_sanction='MISE A PIED'");
      $sanction_licenciement_cfnsn=DB::select("select distinct * from employes, sanctions where employes.id=sanctions.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND sanctions.type_sanction='LICENCIEMENT'");

      //AGE MOYEN DES STAFFS PAR FILIALE
      $age_employes_cfnsn=DB::select("select avg(age) as age_moyen from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND entite='$choisir_entite'");

      //REPARTITION PAR SEXE
      $employes_cfnsn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND entite='$choisir_entite'");
      $hommes_cfnsn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.sexe='MASCULIN'");
      $femmes_cfnsn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.sexe='FEMININ'");

      //REPARTION PAR CONTRAT
      $nb_empl_cfnsn=DB::select("SELECT distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND entite='$choisir_entite'");
      $nb_cdi_cfnsn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND contrats.type_contrat='CDI'");
      $nb_cdd_cfnsn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND contrats.type_contrat='CDD'");
      $nb_stage_cfnsn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND contrats.type_contrat='STAGE'");
      $nb_prestation_cfnsn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND contrats.type_contrat='PRESTATION'");
      $employes_cfnsn=DB::select("SELECT distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND entite='$choisir_entite'");

      //************************************************************************************************************************************
      $choisir_entite ="CSG";
      //REPARTITION PAR GENRE ET PAR CATEGORIE

      $hommes_cadres_csg=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.sexe='MASCULIN' AND employes.categorie='CADRE' AND employes.entite='$choisir_entite'");
      $hommes_noncadres_csg=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.sexe='MASCULIN' AND employes.categorie='NON CADRE' AND employes.entite='$choisir_entite'");
      $femmes_cadres_csg=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.sexe='FEMININ' AND employes.categorie='CADRE' AND employes.entite='$choisir_entite'");
      $femmes_noncadres_csg=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.sexe='FEMININ' AND employes.categorie='NON CADRE' AND employes.entite='$choisir_entite'");

      //REPARTITION  PAR DEPARTEMENT
      $dpt_rh_csg=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='RESSOURCES HUMAINES'");
      $dpt_dmcc_csg=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='DMCC'");
      $dpt_finance_csg=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='FINANCE'");
      $dpt_informatique_csg=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='INFORMATIQUE'");
      $dpt_expl_csg=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='EXPLOITATION'");
      $dpt_credit_csg=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='CREDIT'");
      $dpt_audit_csg=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='AUDIT'");
      $dpt_ci_csg=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='CONTROLE INTERNE'");
      $dpt_dg_csg=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='DIRECTION GENERALE'");
      $dpt_d_csg=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='DIRECTION'");
      $dpt_retail_csg=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='RETAIL'");
      $dpt_legal_csg=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='LEGAL'");
      $dpt_facilitie_csg=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='FACILITIES'");
      $dpt_ops_csg=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='OPERATIONS'");
      $dpt_phoenix_csg=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='PHOENIX'");

      //REPARTITION  DES DEPARTS
      $depart_demission_csg=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='DEMISSION'");
      $depart_negocie_csg=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='DEPART NEGOCIE'");
      $depart_fincdd_csg=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='FIN CDD'");
      $depart_finstage_csg=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='FIN STAGE'");
      $depart_licenciement_csg=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='LICENCIEMENT'");
      $depart_retraite_csg=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='RETRAITRE'");

      //REPARTITION  DES SANCTIONS
      $sanction_avert_csg=DB::select("select distinct * from employes, sanctions where employes.id=sanctions.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND sanctions.type_sanction='AVERTISSEMENT'");
      $sanction_blame_csg=DB::select("select distinct * from employes, sanctions where employes.id=sanctions.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND sanctions.type_sanction='BLAME'");
      $sanction_map_csg=DB::select("select distinct * from employes, sanctions where employes.id=sanctions.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND sanctions.type_sanction='MISE A PIED'");
      $sanction_licenciement_csg=DB::select("select distinct * from employes, sanctions where employes.id=sanctions.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND sanctions.type_sanction='LICENCIEMENT'");

      //AGE MOYEN DES STAFFS PAR FILIALE
      $age_employes_csg=DB::select("select avg(age) as age_moyen from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND entite='$choisir_entite'");

      //REPARTITION PAR SEXE
      $employes_csg=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND entite='$choisir_entite'");
      $hommes_csg=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.sexe='MASCULIN'");
      $femmes_csg=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.sexe='FEMININ'");

      //REPARTION PAR CONTRAT
      $nb_empl_csg=DB::select("SELECT distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND entite='$choisir_entite'");
      $nb_cdi_csg=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND contrats.type_contrat='CDI'");
      $nb_cdd_csg=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND contrats.type_contrat='CDD'");
      $nb_stage_csg=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND contrats.type_contrat='STAGE'");
      $nb_prestation_csg=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND contrats.type_contrat='PRESTATION'");
      $employes_csg=DB::select("SELECT distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND entite='$choisir_entite'");

      //************************************************************************************************************************************
      $choisir_entite ="COFINA ML";
      //REPARTITION PAR GENRE ET PAR CATEGORIE

      $hommes_cadres_cfml=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.sexe='MASCULIN' AND employes.categorie='CADRE' AND employes.entite='$choisir_entite'");
      $hommes_noncadres_cfml=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.sexe='MASCULIN' AND employes.categorie='NON CADRE' AND employes.entite='$choisir_entite'");
      $femmes_cadres_cfml=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.sexe='FEMININ' AND employes.categorie='CADRE' AND employes.entite='$choisir_entite'");
      $femmes_noncadres_cfml=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.sexe='FEMININ' AND employes.categorie='NON CADRE' AND employes.entite='$choisir_entite'");

      //REPARTITION  PAR DEPARTEMENT
      $dpt_rh_cfml=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='RESSOURCES HUMAINES'");
      $dpt_dmcc_cfml=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='DMCC'");
      $dpt_finance_cfml=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='FINANCE'");
      $dpt_informatique_cfml=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='INFORMATIQUE'");
      $dpt_expl_cfml=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='EXPLOITATION'");
      $dpt_credit_cfml=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='CREDIT'");
      $dpt_audit_cfml=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='AUDIT'");
      $dpt_ci_cfml=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='CONTROLE INTERNE'");
      $dpt_dg_cfml=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='DIRECTION GENERALE'");
      $dpt_d_cfml=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='DIRECTION'");
      $dpt_retail_cfml=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='RETAIL'");
      $dpt_legal_cfml=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='LEGAL'");
      $dpt_facilitie_cfml=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='FACILITIES'");
      $dpt_ops_cfml=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='OPERATIONS'");
      $dpt_phoenix_cfml=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='PHOENIX'");

      //REPARTITION  DES DEPARTS
      $depart_demission_cfml=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='DEMISSION'");
      $depart_negocie_cfml=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='DEPART NEGOCIE'");
      $depart_fincdd_cfml=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='FIN CDD'");
      $depart_finstage_cfml=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='FIN STAGE'");
      $depart_licenciement_cfml=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='LICENCIEMENT'");
      $depart_retraite_cfml=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='RETRAITRE'");

      //REPARTITION  DES SANCTIONS
      $sanction_avert_cfml=DB::select("select distinct * from employes, sanctions where employes.id=sanctions.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND sanctions.type_sanction='AVERTISSEMENT'");
      $sanction_blame_cfml=DB::select("select distinct * from employes, sanctions where employes.id=sanctions.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND sanctions.type_sanction='BLAME'");
      $sanction_map_cfml=DB::select("select distinct * from employes, sanctions where employes.id=sanctions.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND sanctions.type_sanction='MISE A PIED'");
      $sanction_licenciement_cfml=DB::select("select distinct * from employes, sanctions where employes.id=sanctions.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND sanctions.type_sanction='LICENCIEMENT'");

      //AGE MOYEN DES STAFFS PAR FILIALE
      $age_employes_cfml=DB::select("select avg(age) as age_moyen from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND entite='$choisir_entite'");

      //REPARTITION PAR SEXE
      $employes_cfml=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND entite='$choisir_entite'");
      $hommes_cfml=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.sexe='MASCULIN'");
      $femmes_cfml=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.sexe='FEMININ'");

      //REPARTION PAR CONTRAT
      $nb_empl_cfml=DB::select("SELECT distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND entite='$choisir_entite'");
      $nb_cdi_cfml=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND contrats.type_contrat='CDI'");
      $nb_cdd_cfml=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND contrats.type_contrat='CDD'");
      $nb_stage_cfml=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND contrats.type_contrat='STAGE'");
      $nb_prestation_cfml=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND contrats.type_contrat='PRESTATION'");
      $employes_cfml=DB::select("SELECT distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND entite='$choisir_entite'");

      //************************************************************************************************************************************
      $choisir_entite ="COFINA CG";
      //REPARTITION PAR GENRE ET PAR CATEGORIE

      $hommes_cadres_cg=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.sexe='MASCULIN' AND employes.categorie='CADRE' AND employes.entite='$choisir_entite'");
      $hommes_noncadres_cg=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.sexe='MASCULIN' AND employes.categorie='NON CADRE' AND employes.entite='$choisir_entite'");
      $femmes_cadres_cg=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.sexe='FEMININ' AND employes.categorie='CADRE' AND employes.entite='$choisir_entite'");
      $femmes_noncadres_cg=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.sexe='FEMININ' AND employes.categorie='NON CADRE' AND employes.entite='$choisir_entite'");

      //REPARTITION  PAR DEPARTEMENT
      $dpt_rh_cg=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='RESSOURCES HUMAINES'");
      $dpt_dmcc_cg=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='DMCC'");
      $dpt_finance_cg=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='FINANCE'");
      $dpt_informatique_cg=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='INFORMATIQUE'");
      $dpt_expl_cg=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='EXPLOITATION'");
      $dpt_credit_cg=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='CREDIT'");
      $dpt_audit_cg=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='AUDIT'");
      $dpt_ci_cg=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='CONTROLE INTERNE'");
      $dpt_dg_cg=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='DIRECTION GENERALE'");
      $dpt_d_cg=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='DIRECTION'");
      $dpt_retail_cg=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='RETAIL'");
      $dpt_legal_cg=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='LEGAL'");
      $dpt_facilitie_cg=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='FACILITIES'");
      $dpt_ops_cg=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='OPERATIONS'");
      $dpt_phoenix_cg=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='PHOENIX'");


      //REPARTITION  DES DEPARTS
      $depart_demission_cg=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='DEMISSION'");
      $depart_negocie_cg=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='DEPART NEGOCIE'");
      $depart_fincdd_cg=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='FIN CDD'");
      $depart_finstage_cg=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='FIN STAGE'");
      $depart_licenciement_cg=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='LICENCIEMENT'");
      $depart_retraite_cg=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='RETRAITRE'");

      //REPARTITION  DES SANCTIONS
      $sanction_avert_cg=DB::select("select distinct * from employes, sanctions where employes.id=sanctions.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND sanctions.type_sanction='AVERTISSEMENT'");
      $sanction_blame_cg=DB::select("select distinct * from employes, sanctions where employes.id=sanctions.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND sanctions.type_sanction='BLAME'");
      $sanction_map_cg=DB::select("select distinct * from employes, sanctions where employes.id=sanctions.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND sanctions.type_sanction='MISE A PIED'");
      $sanction_licenciement_cg=DB::select("select distinct * from employes, sanctions where employes.id=sanctions.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND sanctions.type_sanction='LICENCIEMENT'");

      //AGE MOYEN DES STAFFS PAR FILIALE
      $age_employes_cg=DB::select("select avg(age) as age_moyen from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND entite='$choisir_entite'");

      //REPARTITION PAR SEXE
      $employes_cg=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND entite='$choisir_entite'");
      $hommes_cg=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.sexe='MASCULIN'");
      $femmes_cg=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.sexe='FEMININ'");

      //REPARTION PAR CONTRAT
      $nb_empl_cg=DB::select("SELECT distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND entite='$choisir_entite'");
      $nb_cdi_cg=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND contrats.type_contrat='CDI'");
      $nb_cdd_cg=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND contrats.type_contrat='CDD'");
      $nb_stage_cg=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND contrats.type_contrat='STAGE'");
      $nb_prestation_cg=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND contrats.type_contrat='PRESTATION'");
      $employes_cg=DB::select("SELECT distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND entite='$choisir_entite'");

      //************************************************************************************************************************************
      $choisir_entite ="COFINA GN";
      //REPARTITION PAR GENRE ET PAR CATEGORIE

      $hommes_cadres_gn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.sexe='MASCULIN' AND employes.categorie='CADRE' AND employes.entite='$choisir_entite'");
      $hommes_noncadres_gn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.sexe='MASCULIN' AND employes.categorie='NON CADRE' AND employes.entite='$choisir_entite'");
      $femmes_cadres_gn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.sexe='FEMININ' AND employes.categorie='CADRE' AND employes.entite='$choisir_entite'");
      $femmes_noncadres_gn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.sexe='FEMININ' AND employes.categorie='NON CADRE' AND employes.entite='$choisir_entite'");

      //REPARTITION  PAR DEPARTEMENT
      $dpt_rh_gn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='RESSOURCES HUMAINES'");
      $dpt_dmcc_gn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='DMCC'");
      $dpt_finance_gn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='FINANCE'");
      $dpt_informatique_gn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='INFORMATIQUE'");
      $dpt_expl_gn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='EXPLOITATION'");
      $dpt_credit_gn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='CREDIT'");
      $dpt_audit_gn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='AUDIT'");
      $dpt_ci_gn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='CONTROLE INTERNE'");
      $dpt_dg_gn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='DIRECTION GENERALE'");
      $dpt_d_gn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='DIRECTION'");
      $dpt_retail_gn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='RETAIL'");
      $dpt_legal_gn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='LEGAL'");
      $dpt_facilitie_gn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='FACILITIES'");
      $dpt_ops_gn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='OPERATIONS'");
      $dpt_phoenix_gn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='PHOENIX'");

      //REPARTITION  DES DEPARTS
      $depart_demission_gn=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='DEMISSION'");
      $depart_negocie_gn=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='DEPART NEGOCIE'");
      $depart_fincdd_gn=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='FIN CDD'");
      $depart_finstage_gn=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='FIN STAGE'");
      $depart_licenciement_gn=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='LICENCIEMENT'");
      $depart_retraite_gn=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='RETRAITRE'");

      //REPARTITION  DES SANCTIONS
      $sanction_avert_gn=DB::select("select distinct * from employes, sanctions where employes.id=sanctions.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND sanctions.type_sanction='AVERTISSEMENT'");
      $sanction_blame_gn=DB::select("select distinct * from employes, sanctions where employes.id=sanctions.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND sanctions.type_sanction='BLAME'");
      $sanction_map_gn=DB::select("select distinct * from employes, sanctions where employes.id=sanctions.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND sanctions.type_sanction='MISE A PIED'");
      $sanction_licenciement_gn=DB::select("select distinct * from employes, sanctions where employes.id=sanctions.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND sanctions.type_sanction='LICENCIEMENT'");

      //AGE MOYEN DES STAFFS PAR FILIALE
      $age_employes_gn=DB::select("select avg(age) as age_moyen from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND entite='$choisir_entite'");

      //REPARTITION PAR SEXE
      $employes_gn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND entite='$choisir_entite'");
      $hommes_gn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.sexe='MASCULIN'");
      $femmes_gn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.sexe='FEMININ'");

      //REPARTION PAR CONTRAT
      $nb_empl_gn=DB::select("SELECT distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND entite='$choisir_entite'");
      $nb_cdi_gn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND contrats.type_contrat='CDI'");
      $nb_cdd_gn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND contrats.type_contrat='CDD'");
      $nb_stage_gn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND contrats.type_contrat='STAGE'");
      $nb_prestation_gn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND contrats.type_contrat='PRESTATION'");
      $employes_gn=DB::select("SELECT distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND entite='$choisir_entite'");


      //************************************************************************************************************************************
      $choisir_entite ="COFINA BF";
      //REPARTITION PAR GENRE ET PAR CATEGORIE

      $hommes_cadres_bf=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.sexe='MASCULIN' AND employes.categorie='CADRE' AND employes.entite='$choisir_entite'");
      $hommes_noncadres_bf=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.sexe='MASCULIN' AND employes.categorie='NON CADRE' AND employes.entite='$choisir_entite'");
      $femmes_cadres_bf=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.sexe='FEMININ' AND employes.categorie='CADRE' AND employes.entite='$choisir_entite'");
      $femmes_noncadres_bf=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id  AND employes.statut='ACTIVE' AND employes.sexe='FEMININ' AND employes.categorie='NON CADRE' AND employes.entite='$choisir_entite'");

      //REPARTITION  PAR DEPARTEMENT
      $dpt_rh_bf=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='RESSOURCES HUMAINES'");
      $dpt_dmcc_bf=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='DMCC'");
      $dpt_finance_bf=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='FINANCE'");
      $dpt_informatique_bf=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='INFORMATIQUE'");
      $dpt_expl_bf=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='EXPLOITATION'");
      $dpt_credit_bf=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='CREDIT'");
      $dpt_audit_bf=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='AUDIT'");
      $dpt_ci_bf=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='CONTROLE INTERNE'");
      $dpt_dg_bf=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='DIRECTION GENERALE'");
      $dpt_d_bf=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='DIRECTION'");
      $dpt_retail_bf=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='RETAIL'");
      $dpt_legal_bf=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='LEGAL'");
      $dpt_facilitie_bf=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='FACILITIES'");
      $dpt_ops_bf=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='OPERATIONS'");
      $dpt_phoenix_bf=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='PHOENIX'");

      //REPARTITION  DES DEPARTS
      $depart_demission_bf=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='DEMISSION'");
      $depart_negocie_bf=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='DEPART NEGOCIE'");
      $depart_fincdd_bf=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='FIN CDD'");
      $depart_finstage_bf=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='FIN STAGE'");
      $depart_licenciement_bf=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='LICENCIEMENT'");
      $depart_retraite_bf=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='RETRAITRE'");

      //REPARTITION  DES SANCTIONS
      $sanction_avert_bf=DB::select("select distinct * from employes, sanctions where employes.id=sanctions.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND sanctions.type_sanction='AVERTISSEMENT'");
      $sanction_blame_bf=DB::select("select distinct * from employes, sanctions where employes.id=sanctions.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND sanctions.type_sanction='BLAME'");
      $sanction_map_bf=DB::select("select distinct * from employes, sanctions where employes.id=sanctions.employe_id AND employes.statut='ACTIVE'  AND employes.entite='$choisir_entite' AND sanctions.type_sanction='MISE A PIED'");
      $sanction_licenciement_bf=DB::select("select distinct * from employes, sanctions where employes.id=sanctions.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND sanctions.type_sanction='LICENCIEMENT'");

      //AGE MOYEN DES STAFFS PAR FILIALE
      $age_employes_bf=DB::select("select avg(age) as age_moyen from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND entite='$choisir_entite'");

      //REPARTITION PAR SEXE
      $employes_bf=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND entite='$choisir_entite'");
      $hommes_bf=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.sexe='MASCULIN'");
      $femmes_bf=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.sexe='FEMININ'");

      //REPARTION PAR CONTRAT
      $nb_empl_bf=DB::select("SELECT distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND entite='$choisir_entite'");
      $nb_cdi_bf=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE'  AND employes.entite='$choisir_entite' AND contrats.type_contrat='CDI'");
      $nb_cdd_bf=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND contrats.type_contrat='CDD'");
      $nb_stage_bf=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND contrats.type_contrat='STAGE'");
      $nb_prestation_bf=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND contrats.type_contrat='PRESTATION'");
      $employes_bf=DB::select("SELECT distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND entite='$choisir_entite'");

      //************************************************************************************************************************************
      $choisir_entite ="COFINA SERVICES FRANCE";
      //REPARTITION PAR GENRE ET PAR CATEGORIE

      $hommes_cadres_csf=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.sexe='MASCULIN' AND employes.categorie='CADRE' AND employes.entite='$choisir_entite'");
      $hommes_noncadres_csf=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.sexe='MASCULIN' AND employes.categorie='NON CADRE' AND employes.entite='$choisir_entite'");
      $femmes_cadres_csf=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.sexe='FEMININ' AND employes.categorie='CADRE' AND employes.entite='$choisir_entite'");
      $femmes_noncadres_csf=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.sexe='FEMININ' AND employes.categorie='NON CADRE' AND employes.entite='$choisir_entite'");

      //REPARTITION  PAR DEPARTEMENT
      $dpt_rh_csf=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='RESSOURCES HUMAINES'");
      $dpt_dmcc_csf=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='DMCC'");
      $dpt_finance_csf=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='FINANCE'");
      $dpt_informatique_csf=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='INFORMATIQUE'");
      $dpt_expl_csf=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='EXPLOITATION'");
      $dpt_credit_csf=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='CREDIT'");
      $dpt_audit_csf=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='AUDIT'");
      $dpt_ci_csf=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='CONTROLE INTERNE'");
      $dpt_dg_csf=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='DIRECTION GENERALE'");
      $dpt_d_csf=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='DIRECTION'");
      $dpt_retail_csf=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='RETAIL'");
      $dpt_legal_csf=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='LEGAL'");
      $dpt_facilitie_csf=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='FACILITIES'");
      $dpt_ops_csf=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='OPERATIONS'");
      $dpt_phoenix_csf=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='PHOENIX'");


      //REPARTITION  DES DEPARTS
      $depart_demission_csf=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='DEMISSION'");
      $depart_negocie_csf=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='DEPART NEGOCIE'");
      $depart_fincdd_csf=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='FIN CDD'");
      $depart_finstage_csf=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='FIN STAGE'");
      $depart_licenciement_csf=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='LICENCIEMENT'");
      $depart_retraite_csf=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='RETRAITRE'");

      //REPARTITION  DES SANCTIONS
      $sanction_avert_csf=DB::select("select distinct * from employes, sanctions where employes.id=sanctions.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND sanctions.type_sanction='AVERTISSEMENT'");
      $sanction_blame_csf=DB::select("select distinct * from employes, sanctions where employes.id=sanctions.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND sanctions.type_sanction='BLAME'");
      $sanction_map_csf=DB::select("select distinct * from employes, sanctions where employes.id=sanctions.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND sanctions.type_sanction='MISE A PIED'");
      $sanction_licenciement_csf=DB::select("select distinct * from employes, sanctions where employes.id=sanctions.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND sanctions.type_sanction='LICENCIEMENT'");

      //AGE MOYEN DES STAFFS PAR FILIALE
      $age_employes_csf=DB::select("select avg(age) as age_moyen from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND entite='$choisir_entite'");

      //REPARTITION PAR SEXE
      $employes_csf=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND entite='$choisir_entite'");
      $hommes_csf=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.sexe='MASCULIN'");
      $femmes_csf=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.sexe='FEMININ'");

      //REPARTION PAR CONTRAT
      $nb_empl_csf=DB::select("SELECT distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND entite='$choisir_entite'");
      $nb_cdi_csf=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND contrats.type_contrat='CDI'");
      $nb_cdd_csf=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND contrats.type_contrat='CDD'");
      $nb_stage_csf=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND contrats.type_contrat='STAGE'");
      $nb_prestation_csf=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND contrats.type_contrat='PRESTATION'");
      $employes_csf=DB::select("SELECT distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND entite='$choisir_entite'");

      //************************************************************************************************************************************
      $choisir_entite ="FINELLE";
      //REPARTITION PAR GENRE ET PAR CATEGORIE

      $hommes_cadres_fnl=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.sexe='MASCULIN' AND employes.categorie='CADRE' AND employes.entite='$choisir_entite'");
      $hommes_noncadres_fnl=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.sexe='MASCULIN' AND employes.categorie='NON CADRE' AND employes.entite='$choisir_entite'");
      $femmes_cadres_fnl=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.sexe='FEMININ' AND employes.categorie='CADRE' AND employes.entite='$choisir_entite'");
      $femmes_noncadres_fnl=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.sexe='FEMININ' AND employes.categorie='NON CADRE' AND employes.entite='$choisir_entite'");

      //REPARTITION  PAR DEPARTEMENT
      $dpt_rh_fnl=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='RESSOURCES HUMAINES'");
      $dpt_dmcc_fnl=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='DMCC'");
      $dpt_finance_fnl=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='FINANCE'");
      $dpt_informatique_fnl=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='INFORMATIQUE'");
      $dpt_expl_fnl=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='EXPLOITATION'");
      $dpt_credit_fnl=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='CREDIT'");
      $dpt_audit_fnl=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='AUDIT'");
      $dpt_ci_fnl=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='CONTROLE INTERNE'");
      $dpt_dg_fnl=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='DIRECTION GENERALE'");
      $dpt_d_fnl=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='DIRECTION'");
      $dpt_retail_fnl=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='RETAIL'");
      $dpt_legal_fnl=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='LEGAL'");
      $dpt_facilitie_fnl=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='FACILITIES'");
      $dpt_ops_fnl=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='OPERATIONS'");
      $dpt_phoenix_fnl=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='PHOENIX'");

      //REPARTITION  DES DEPARTS
      $depart_demission_fnl=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='DEMISSION'");
      $depart_negocie_fnl=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='DEPART NEGOCIE'");
      $depart_fincdd_fnl=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='FIN CDD'");
      $depart_finstage_fnl=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='FIN STAGE'");
      $depart_licenciement_fnl=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='LICENCIEMENT'");
      $depart_retraite_fnl=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='RETRAITRE'");

      //REPARTITION  DES SANCTIONS
      $sanction_avert_fnl=DB::select("select distinct * from employes, sanctions where employes.id=sanctions.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND sanctions.type_sanction='AVERTISSEMENT'");
      $sanction_blame_fnl=DB::select("select distinct * from employes, sanctions where employes.id=sanctions.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND sanctions.type_sanction='BLAME'");
      $sanction_map_fnl=DB::select("select distinct * from employes, sanctions where employes.id=sanctions.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND sanctions.type_sanction='MISE A PIED'");
      $sanction_licenciement_fnl=DB::select("select distinct * from employes, sanctions where employes.id=sanctions.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND sanctions.type_sanction='LICENCIEMENT'");

      //AGE MOYEN DES STAFFS PAR FILIALE
      $age_employes_fnl=DB::select("select avg(age) as age_moyen from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND entite='$choisir_entite'");

      //REPARTITION PAR SEXE
      $employes_fnl=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND entite='$choisir_entite'");
      $hommes_fnl=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.sexe='MASCULIN'");
      $femmes_fnl=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.sexe='FEMININ'");

      //REPARTION PAR CONTRAT
      $nb_empl_fnl=DB::select("SELECT distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND entite='$choisir_entite'");
      $nb_cdi_fnl=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND contrats.type_contrat='CDI'");
      $nb_cdd_fnl=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND contrats.type_contrat='CDD'");
      $nb_stage_fnl=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND contrats.type_contrat='STAGE'");
      $nb_prestation_fnl=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND contrats.type_contrat='PRESTATION'");
      $employes_fnl=DB::select("SELECT distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND entite='$choisir_entite'");


      //************************************************************************************************************************************
      $choisir_entite ="CPS SN";
      //REPARTITION PAR GENRE ET PAR CATEGORIE

      $hommes_cadres_cpssn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.sexe='MASCULIN' AND employes.categorie='CADRE' AND employes.entite='$choisir_entite'");
      $hommes_noncadres_cpssn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.sexe='MASCULIN' AND employes.categorie='NON CADRE' AND employes.entite='$choisir_entite'");
      $femmes_cadres_cpssn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.sexe='FEMININ' AND employes.categorie='CADRE' AND employes.entite='$choisir_entite'");
      $femmes_noncadres_cpssn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.sexe='FEMININ' AND employes.categorie='NON CADRE' AND employes.entite='$choisir_entite'");

      //REPARTITION  PAR DEPARTEMENT
      $dpt_rh_cpssn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='RESSOURCES HUMAINES'");
      $dpt_dmcc_cpssn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='DMCC'");
      $dpt_finance_cpssn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='FINANCE'");
      $dpt_informatique_cpssn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='INFORMATIQUE'");
      $dpt_expl_cpssn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='EXPLOITATION'");
      $dpt_credit_cpssn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='CREDIT'");
      $dpt_audit_cpssn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='AUDIT'");
      $dpt_ci_cpssn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='CONTROLE INTERNE'");
      $dpt_dg_cpssn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='DIRECTION GENERALE'");
      $dpt_d_cpssn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='DIRECTION'");
      $dpt_retail_cpssn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='RETAIL'");
      $dpt_legal_cpssn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='LEGAL'");
      $dpt_facilitie_cpssn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='FACILITIES'");
      $dpt_ops_cpssn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='OPERATIONS'");
      $dpt_phoenix_cpssn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='PHOENIX'");


      //REPARTITION  DES DEPARTS
      $depart_demission_cpssn=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='DEMISSION'");
      $depart_negocie_cpssn=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='DEPART NEGOCIE'");
      $depart_fincdd_cpssn=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='FIN CDD'");
      $depart_finstage_cpssn=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='FIN STAGE'");
      $depart_licenciement_cpssn=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='LICENCIEMENT'");
      $depart_retraite_cpssn=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='RETRAITRE'");

      //REPARTITION  DES SANCTIONS
      $sanction_avert_cpssn=DB::select("select distinct * from employes, sanctions where employes.id=sanctions.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND sanctions.type_sanction='AVERTISSEMENT'");
      $sanction_blame_cpssn=DB::select("select distinct * from employes, sanctions where employes.id=sanctions.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND sanctions.type_sanction='BLAME'");
      $sanction_map_cpssn=DB::select("select distinct * from employes, sanctions where employes.id=sanctions.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND sanctions.type_sanction='MISE A PIED'");
      $sanction_licenciement_cpssn=DB::select("select distinct * from employes, sanctions where employes.id=sanctions.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND sanctions.type_sanction='LICENCIEMENT'");

      //AGE MOYEN DES STAFFS PAR FILIALE
      $age_employes_cpssn=DB::select("select avg(age) as age_moyen from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND entite='$choisir_entite'");

      //REPARTITION PAR SEXE
      $employes_cpssn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND entite='$choisir_entite'");
      $hommes_cpssn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.sexe='MASCULIN'");
      $femmes_cpssn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.sexe='FEMININ'");

      //REPARTION PAR CONTRAT
      $nb_empl_cpssn=DB::select("SELECT distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND entite='$choisir_entite'");
      $nb_cdi_cpssn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND contrats.type_contrat='CDI'");
      $nb_cdd_cpssn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND contrats.type_contrat='CDD'");
      $nb_stage_cpssn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND contrats.type_contrat='STAGE'");
      $nb_prestation_cpssn=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND contrats.type_contrat='PRESTATION'");
      $employes_cpssn=DB::select("SELECT distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND entite='$choisir_entite'");

      //************************************************************************************************************************************
      $choisir_entite ="CPS CI";
      //REPARTITION PAR GENRE ET PAR CATEGORIE

      $hommes_cadres_cpsci=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.sexe='MASCULIN' AND employes.categorie='CADRE' AND employes.entite='$choisir_entite'");
      $hommes_noncadres_cpsci=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.sexe='MASCULIN' AND employes.categorie='NON CADRE' AND employes.entite='$choisir_entite'");
      $femmes_cadres_cpsci=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.sexe='FEMININ' AND employes.categorie='CADRE' AND employes.entite='$choisir_entite'");
      $femmes_noncadres_cpsci=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.sexe='FEMININ' AND employes.categorie='NON CADRE' AND employes.entite='$choisir_entite'");

      //REPARTITION  PAR DEPARTEMENT
      $dpt_rh_cpsci=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='RESSOURCES HUMAINES'");
      $dpt_dmcc_cpsci=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='DMCC'");
      $dpt_finance_cpsci=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='FINANCE'");
      $dpt_informatique_cpsci=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='INFORMATIQUE'");
      $dpt_expl_cpsci=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='EXPLOITATION'");
      $dpt_credit_cpsci=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='CREDIT'");
      $dpt_audit_cpsci=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='AUDIT'");
      $dpt_ci_cpsci=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='CONTROLE INTERNE'");
      $dpt_dg_cpsci=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='DIRECTION GENERALE'");
      $dpt_d_cpsci=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='DIRECTION'");
      $dpt_retail_cpsci=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='RETAIL'");
      $dpt_legal_cpsci=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='LEGAL'");
      $dpt_facilitie_cpsci=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='FACILITIES'");
      $dpt_ops_cpsci=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='OPERATIONS'");
      $dpt_phoenix_cpsci=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='PHOENIX'");

      //REPARTITION  DES DEPARTS
      $depart_demission_cpsci=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='DEMISSION'");
      $depart_negocie_cpsci=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='DEPART NEGOCIE'");
      $depart_fincdd_cpsci=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='FIN CDD'");
      $depart_finstage_cpsci=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='FIN STAGE'");
      $depart_licenciement_cpsci=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='LICENCIEMENT'");
      $depart_retraite_cpsci=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='RETRAITRE'");

      //REPARTITION  DES SANCTIONS
      $sanction_avert_cpsci=DB::select("select distinct * from employes, sanctions where employes.id=sanctions.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND sanctions.type_sanction='AVERTISSEMENT'");
      $sanction_blame_cpsci=DB::select("select distinct * from employes, sanctions where employes.id=sanctions.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND sanctions.type_sanction='BLAME'");
      $sanction_map_cpsci=DB::select("select distinct * from employes, sanctions where employes.id=sanctions.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND sanctions.type_sanction='MISE A PIED'");
      $sanction_licenciement_cpsci=DB::select("select distinct * from employes, sanctions where employes.id=sanctions.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND sanctions.type_sanction='LICENCIEMENT'");

      //AGE MOYEN DES STAFFS PAR FILIALE
      $age_employes_cpsci=DB::select("select avg(age) as age_moyen from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND entite='$choisir_entite'");

      //REPARTITION PAR SEXE
      $employes_cpsci=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND entite='$choisir_entite'");
      $hommes_cpsci=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.sexe='MASCULIN'");
      $femmes_cpsci=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.sexe='FEMININ'");

      //REPARTION PAR CONTRAT
      $nb_empl_cpsci=DB::select("SELECT distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND entite='$choisir_entite'");
      $nb_cdi_cpsci=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND contrats.type_contrat='CDI'");
      $nb_cdd_cpsci=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND contrats.type_contrat='CDD'");
      $nb_stage_cpsci=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND contrats.type_contrat='STAGE'");
      $nb_prestation_cpsci=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND contrats.type_contrat='PRESTATION'");
      $employes_cpsci=DB::select("SELECT distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND entite='$choisir_entite'");

      //************************************************************************************************************************************
      $choisir_entite ="CPS ML";
      //REPARTITION PAR GENRE ET PAR CATEGORIE

      $hommes_cadres_cpsml=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.sexe='MASCULIN' AND employes.categorie='CADRE' AND employes.entite='$choisir_entite'");
      $hommes_noncadres_cpsml=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.sexe='MASCULIN' AND employes.categorie='NON CADRE' AND employes.entite='$choisir_entite'");
      $femmes_cadres_cpsml=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.sexe='FEMININ' AND employes.categorie='CADRE' AND employes.entite='$choisir_entite'");
      $femmes_noncadres_cpsml=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.sexe='FEMININ' AND employes.categorie='NON CADRE' AND employes.entite='$choisir_entite'");

      //REPARTITION  PAR DEPARTEMENT
      $dpt_rh_cpsml=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='RESSOURCES HUMAINES'");
      $dpt_dmcc_cpsml=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='DMCC'");
      $dpt_finance_cpsml=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='FINANCE'");
      $dpt_informatique_cpsml=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='INFORMATIQUE'");
      $dpt_expl_cpsml=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='EXPLOITATION'");
      $dpt_credit_cpsml=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='CREDIT'");
      $dpt_audit_cpsml=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='AUDIT'");
      $dpt_ci_cpsml=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='CONTROLE INTERNE'");
      $dpt_dg_cpsml=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='DIRECTION GENERALE'");
      $dpt_d_cpsml=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='DIRECTION'");
      $dpt_retail_cpsml=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='RETAIL'");
      $dpt_legal_cpsml=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='LEGAL'");
      $dpt_facilitie_cpsml=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='FACILITIES'");
      $dpt_ops_cpsml=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='OPERATIONS'");
      $dpt_phoenix_cpsml=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.departement='PHOENIX'");

      //REPARTITION  DES DEPARTS
      $depart_demission_cpsml=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='DEMISSION'");
      $depart_negocie_cpsml=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='DEPART NEGOCIE'");
      $depart_fincdd_cpsml=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='FIN CDD'");
      $depart_finstage_cpsml=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='FIN STAGE'");
      $depart_licenciement_cpsml=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='LICENCIEMENT'");
      $depart_retraite_cpsml=DB::select("select distinct * from employes, departs where employes.id=departs.employe_id AND employes.entite='$choisir_entite' AND departs.type_depart='RETRAITRE'");

      //REPARTITION  DES SANCTIONS
      $sanction_avert_cpsml=DB::select("select distinct * from employes, sanctions where employes.id=sanctions.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND sanctions.type_sanction='AVERTISSEMENT'");
      $sanction_blame_cpsml=DB::select("select distinct * from employes, sanctions where employes.id=sanctions.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND sanctions.type_sanction='BLAME'");
      $sanction_map_cpsml=DB::select("select distinct * from employes, sanctions where employes.id=sanctions.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND sanctions.type_sanction='MISE A PIED'");
      $sanction_licenciement_cpsml=DB::select("select distinct * from employes, sanctions where employes.id=sanctions.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND sanctions.type_sanction='LICENCIEMENT'");

      //AGE MOYEN DES STAFFS PAR FILIALE
      $age_employes_cpsml=DB::select("select avg(age) as age_moyen from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND entite='$choisir_entite'");

      //REPARTITION PAR SEXE
      $employes_cpsml=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND entite='$choisir_entite'");
      $hommes_cpsml=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.sexe='MASCULIN'");
      $femmes_cpsml=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND employes.sexe='FEMININ'");

      //REPARTION PAR CONTRAT
      $nb_empl_cpsml=DB::select("SELECT distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND entite='$choisir_entite'");
      $nb_cdi_cpsml=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND contrats.type_contrat='CDI'");
      $nb_cdd_cpsml=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND contrats.type_contrat='CDD'");
      $nb_stage_cpsml=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND contrats.type_contrat='STAGE'");
      $nb_prestation_cpsml=DB::select("select distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND employes.entite='$choisir_entite' AND contrats.type_contrat='PRESTATION'");
      $employes_cpsml=DB::select("SELECT distinct * from employes, contrats where employes.id=contrats.employe_id AND employes.statut='ACTIVE' AND entite='$choisir_entite'");

/*
      $age_employes= round($age_employes, 0);
      $age_employes_cac= round($age_employes_cac, 0);
      $age_employes_cfnsn= round($age_employes_cfnsn, 0);
      $age_employes_csg= round($age_employes_csg, 0);
      $age_employes_cfml= round($age_employes_cfml, 0);
      $age_employes_cg= round($age_employes_cg, 0);
      $age_employes_gn= round($age_employes_gn, 0);
      $age_employes_bf= round($age_employes_bf, 0);
      $age_employes_csf= round($age_employes_csf, 0);
      $age_employes_fnl= round($age_employes_fnl, 0);
      $age_employes_cpssn= round($age_employes_cpssn, 0);
      $age_employes_cpsci= round($age_employes_cpsci, 0);
      $age_employes_cpsml= round($age_employes_cpsml, 0);*/
      //$age_employes_tot= round($age_employes_tot, 0);





    //dd($employes_cac);
       //$resultat_hommes =  array();
       //$resultat_femmes =  array();
       $sites= Site::where('entite','<>','')->get();
       //$resultat_hommes = ((($hommes->total_homme)*100)/floatval($employes->total_empl));
       //$resultat_femmes = ((floatval($femmes)*100)/floatval($employes));
       //$resultat_hommes = array_keys($resultat_hommes);

       $choisir_entite = $request->input('export_excel');

       if($choisir_entite=="Export Excel"){
       $spreadsheet = new Spreadsheet();
       $sheet = $spreadsheet->getActiveSheet();
       $sheet->setCellValue('A1', 'LIBELLE-KPI\'S');
       $sheet->setCellValue('B1', 'CTI');
       $sheet->setCellValue('C1', 'CAC');
       $sheet->setCellValue('D1', 'COFINA SN');
       $sheet->setCellValue('E1', 'CSG');
       $sheet->setCellValue('F1', 'COFINA ML');
       $sheet->setCellValue('G1', 'COFINA CG');
       $sheet->setCellValue('H1', 'COFINA GN');
       $sheet->setCellValue('I1', 'COFINA BF');
       $sheet->setCellValue('J1', 'CSF');
       $sheet->setCellValue('K1', 'FINELLE');
       $sheet->setCellValue('L1', 'CPS SN');
       $sheet->setCellValue('M1', 'CPS CI');
       $sheet->setCellValue('N1', 'CPS ML');
       $sheet->setCellValue('O1', 'TOTAL');


       $sheet->setCellValue('A2', 'Distribution effectif par Genre');
       $sheet->setCellValue('B2', 'NBRE');
       $sheet->setCellValue('C2', 'NBRE');
       $sheet->setCellValue('D2', 'NBRE');
       $sheet->setCellValue('E2', 'NBRE');
       $sheet->setCellValue('F2', 'NBRE');
       $sheet->setCellValue('G2', 'NBRE');
       $sheet->setCellValue('H2', 'NBRE');
       $sheet->setCellValue('I2', 'NBRE');
       $sheet->setCellValue('J2', 'NBRE');
       $sheet->setCellValue('K2', 'NBRE');
       $sheet->setCellValue('L2', 'NBRE');
       $sheet->setCellValue('M2', 'NBRE');
       $sheet->setCellValue('N2', 'NBRE');
       $sheet->setCellValue('O2', 'NBRE');

      // $hommes= (array) $hommes;

      //HOMMES
       $sheet->setCellValue('A3', 'HOMMES');
       $sheet->setCellValue('B3', count($hommes));
       $sheet->setCellValue('C3', count($hommes_cac));
       $sheet->setCellValue('D3', count($hommes_cfnsn));
       $sheet->setCellValue('E3', count($hommes_csg));
       $sheet->setCellValue('F3', count($hommes_cfml));
       $sheet->setCellValue('G3', count($hommes_cg));
       $sheet->setCellValue('H3', count($hommes_gn));
       $sheet->setCellValue('I3', count($hommes_bf));
       $sheet->setCellValue('J3', count($hommes_csf));
       $sheet->setCellValue('K3', count($hommes_fnl));
       $sheet->setCellValue('L3', count($hommes_cpssn));
       $sheet->setCellValue('M3', count($hommes_cpsci));
       $sheet->setCellValue('N3', count($hommes_cpsml));
       $sheet->setCellValue('O3', count($hommes_tot));

       //FEMMMES
        $sheet->setCellValue('A4', 'FEMMES');
        $sheet->setCellValue('B4', count($femmes));
        $sheet->setCellValue('C4', count($femmes_cac));
        $sheet->setCellValue('D4', count($femmes_cfnsn));
        $sheet->setCellValue('E4', count($femmes_csg));
        $sheet->setCellValue('F4', count($femmes_cfml));
        $sheet->setCellValue('G4', count($femmes_cg));
        $sheet->setCellValue('H4', count($femmes_gn));
        $sheet->setCellValue('I4', count($femmes_bf));
        $sheet->setCellValue('J4', count($femmes_csf));
        $sheet->setCellValue('K4', count($femmes_fnl));
        $sheet->setCellValue('L4', count($femmes_cpssn));
        $sheet->setCellValue('M4', count($femmes_cpsci));
        $sheet->setCellValue('N4', count($femmes_cpsml));
        $sheet->setCellValue('O4', count($femmes_tot));


        //TOTA HOMMES-FEMMMES
         $sheet->setCellValue('A5', 'TOTAL');
         $sheet->setCellValue('B5', count($employes));
         $sheet->setCellValue('C5', count($employes_cac));
         $sheet->setCellValue('D5', count($employes_cfnsn));
         $sheet->setCellValue('E5', count($employes_csg));
         $sheet->setCellValue('F5', count($employes_cfml));
         $sheet->setCellValue('G5', count($employes_cg));
         $sheet->setCellValue('H5', count($employes_gn));
         $sheet->setCellValue('I5', count($employes_bf));
         $sheet->setCellValue('J5', count($employes_csf));
         $sheet->setCellValue('K5', count($employes_fnl));
         $sheet->setCellValue('L5', count($employes_cpssn));
         $sheet->setCellValue('M5', count($employes_cpsci));
         $sheet->setCellValue('N5', count($employes_cpsml));
         $sheet->setCellValue('O5', count($employes_tot));

         $sheet->setCellValue('A7', 'Distribution effectif par type de Contrat');


         //Distribution effectif par filiale et CDI
          $sheet->setCellValue('A8', 'CDI');
          $sheet->setCellValue('B8', count($nb_cdi));
          $sheet->setCellValue('C8', count($nb_cdi_cac));
          $sheet->setCellValue('D8', count($nb_cdi_cfnsn));
          $sheet->setCellValue('E8', count($nb_cdi_csg));
          $sheet->setCellValue('F8', count($nb_cdi_cfml));
          $sheet->setCellValue('G8', count($nb_cdi_cg));
          $sheet->setCellValue('H8', count($nb_cdi_gn));
          $sheet->setCellValue('I8', count($nb_cdi_bf));
          $sheet->setCellValue('J8', count($nb_cdi_csf));
          $sheet->setCellValue('K8', count($nb_cdi_fnl));
          $sheet->setCellValue('L8', count($nb_cdi_cpssn));
          $sheet->setCellValue('M8', count($nb_cdi_cpsci));
          $sheet->setCellValue('N8', count($nb_cdi_cpsml));
          $sheet->setCellValue('O8', count($nb_cdi_tot));

          //Distribution effectif par filiale et CDD
           $sheet->setCellValue('A9', 'CDD');
           $sheet->setCellValue('B9', count($nb_cdd));
           $sheet->setCellValue('C9', count($nb_cdd_cac));
           $sheet->setCellValue('D9', count($nb_cdd_cfnsn));
           $sheet->setCellValue('E9', count($nb_cdd_csg));
           $sheet->setCellValue('F9', count($nb_cdd_cfml));
           $sheet->setCellValue('G9', count($nb_cdd_cg));
           $sheet->setCellValue('H9', count($nb_cdd_gn));
           $sheet->setCellValue('I9', count($nb_cdd_bf));
           $sheet->setCellValue('J9', count($nb_cdd_csf));
           $sheet->setCellValue('K9', count($nb_cdd_fnl));
           $sheet->setCellValue('L9', count($nb_cdd_cpssn));
           $sheet->setCellValue('M9', count($nb_cdd_cpsci));
           $sheet->setCellValue('N9', count($nb_cdd_cpsml));
           $sheet->setCellValue('O9', count($nb_cdd_tot));


           //Distribution effectif par filiale et STAGE
            $sheet->setCellValue('A10', 'STAGE');
            $sheet->setCellValue('B10', count($nb_stage));
            $sheet->setCellValue('C10', count($nb_stage_cac));
            $sheet->setCellValue('D10', count($nb_stage_cfnsn));
            $sheet->setCellValue('E10', count($nb_stage_csg));
            $sheet->setCellValue('F10', count($nb_stage_cfml));
            $sheet->setCellValue('G10', count($nb_stage_cg));
            $sheet->setCellValue('H10', count($nb_stage_gn));
            $sheet->setCellValue('I10', count($nb_stage_bf));
            $sheet->setCellValue('J10', count($nb_stage_csf));
            $sheet->setCellValue('K10', count($nb_stage_fnl));
            $sheet->setCellValue('L10', count($nb_stage_cpssn));
            $sheet->setCellValue('M10', count($nb_stage_cpsci));
            $sheet->setCellValue('N10', count($nb_stage_cpsml));
            $sheet->setCellValue('O10', count($nb_stage_tot));

            //Distribution effectif par filiale et PRESTATAIRE
             $sheet->setCellValue('A11', 'PRESTATION');
             $sheet->setCellValue('B11', count($nb_prestation));
             $sheet->setCellValue('C11', count($nb_prestation_cac));
             $sheet->setCellValue('D11', count($nb_prestation_cfnsn));
             $sheet->setCellValue('E11', count($nb_prestation_csg));
             $sheet->setCellValue('F11', count($nb_prestation_cfml));
             $sheet->setCellValue('G11', count($nb_prestation_cg));
             $sheet->setCellValue('H11', count($nb_prestation_gn));
             $sheet->setCellValue('I11', count($nb_prestation_bf));
             $sheet->setCellValue('J11', count($nb_prestation_csf));
             $sheet->setCellValue('K11', count($nb_prestation_fnl));
             $sheet->setCellValue('L11', count($nb_prestation_cpssn));
             $sheet->setCellValue('M11', count($nb_prestation_cpsci));
             $sheet->setCellValue('N11', count($nb_prestation_cpsml));
             $sheet->setCellValue('O11', count($nb_prestation_tot));

             //TOTAL CONTRATS HOMMES-FEMMMES
              $sheet->setCellValue('A12', 'TOTAL');
              $sheet->setCellValue('B12', count($employes));
              $sheet->setCellValue('C12', count($employes_cac));
              $sheet->setCellValue('D12', count($employes_cfnsn));
              $sheet->setCellValue('E12', count($employes_csg));
              $sheet->setCellValue('F12', count($employes_cfml));
              $sheet->setCellValue('G12', count($employes_cg));
              $sheet->setCellValue('H12', count($employes_gn));
              $sheet->setCellValue('I12', count($employes_bf));
              $sheet->setCellValue('J12', count($employes_csf));
              $sheet->setCellValue('K12', count($employes_fnl));
              $sheet->setCellValue('L12', count($employes_cpssn));
              $sheet->setCellValue('M12', count($employes_cpsci));
              $sheet->setCellValue('N12', count($employes_cpsml));
              $sheet->setCellValue('O12', count($employes_tot));

              $sheet->setCellValue('A13', 'Distribution effectif par Departement');


              //DEPARTEMENT AUDIT
               $sheet->setCellValue('A14', 'AUDIT');
               $sheet->setCellValue('B14', count($dpt_audit));
               $sheet->setCellValue('C14', count($dpt_audit_cac));
               $sheet->setCellValue('D14', count($dpt_audit_cfnsn));
               $sheet->setCellValue('E14', count($dpt_audit_csg));
               $sheet->setCellValue('F14', count($dpt_audit_cfml));
               $sheet->setCellValue('G14', count($dpt_audit_cg));
               $sheet->setCellValue('H14', count($dpt_audit_gn));
               $sheet->setCellValue('I14', count($dpt_audit_bf));
               $sheet->setCellValue('J14', count($dpt_audit_csf));
               $sheet->setCellValue('K14', count($dpt_audit_fnl));
               $sheet->setCellValue('L14', count($dpt_audit_cpssn));
               $sheet->setCellValue('M14', count($dpt_audit_cpsci));
               $sheet->setCellValue('N14', count($dpt_audit_cpsml));
               $sheet->setCellValue('O14', count($dpt_audit_tot));


               //DEPARTEMENT CONTROLE INTERNE
                $sheet->setCellValue('A15', 'CONTROLE INTERNE');
                $sheet->setCellValue('B15', count($dpt_ci));
                $sheet->setCellValue('C15', count($dpt_ci_cac));
                $sheet->setCellValue('D15', count($dpt_ci_cfnsn));
                $sheet->setCellValue('E15', count($dpt_ci_csg));
                $sheet->setCellValue('F15', count($dpt_ci_cfml));
                $sheet->setCellValue('G15', count($dpt_ci_cg));
                $sheet->setCellValue('H15', count($dpt_ci_gn));
                $sheet->setCellValue('I15', count($dpt_ci_bf));
                $sheet->setCellValue('J15', count($dpt_ci_csf));
                $sheet->setCellValue('K15', count($dpt_ci_fnl));
                $sheet->setCellValue('L15', count($dpt_ci_cpssn));
                $sheet->setCellValue('M15', count($dpt_ci_cpsci));
                $sheet->setCellValue('N15', count($dpt_ci_cpsml));
                $sheet->setCellValue('O15', count($dpt_ci_tot));

                //DEPARTEMENT CONTROLE CREDIT
                 $sheet->setCellValue('A16', 'CREDIT');
                 $sheet->setCellValue('B16', count($dpt_credit));
                 $sheet->setCellValue('C16', count($dpt_credit_cac));
                 $sheet->setCellValue('D16', count($dpt_credit_cfnsn));
                 $sheet->setCellValue('E16', count($dpt_credit_csg));
                 $sheet->setCellValue('F16', count($dpt_credit_cfml));
                 $sheet->setCellValue('G16', count($dpt_credit_cg));
                 $sheet->setCellValue('H16', count($dpt_credit_gn));
                 $sheet->setCellValue('I16', count($dpt_credit_bf));
                 $sheet->setCellValue('J16', count($dpt_credit_csf));
                 $sheet->setCellValue('K16', count($dpt_credit_fnl));
                 $sheet->setCellValue('L16', count($dpt_credit_cpssn));
                 $sheet->setCellValue('M16', count($dpt_credit_cpsci));
                 $sheet->setCellValue('N16', count($dpt_credit_cpsml));
                 $sheet->setCellValue('O16', count($dpt_credit_tot));

                 //DEPARTEMENT DIRECTION
                  $sheet->setCellValue('A17', 'DIRECTION');
                  $sheet->setCellValue('B17', count($dpt_d));
                  $sheet->setCellValue('C17', count($dpt_d_cac));
                  $sheet->setCellValue('D17', count($dpt_d_cfnsn));
                  $sheet->setCellValue('E17', count($dpt_d_csg));
                  $sheet->setCellValue('F17', count($dpt_d_cfml));
                  $sheet->setCellValue('G17', count($dpt_d_cg));
                  $sheet->setCellValue('H17', count($dpt_d_gn));
                  $sheet->setCellValue('I17', count($dpt_d_bf));
                  $sheet->setCellValue('J17', count($dpt_d_csf));
                  $sheet->setCellValue('K17', count($dpt_d_fnl));
                  $sheet->setCellValue('L17', count($dpt_d_cpssn));
                  $sheet->setCellValue('M17', count($dpt_d_cpsci));
                  $sheet->setCellValue('N17', count($dpt_d_cpsml));
                  $sheet->setCellValue('O17', count($dpt_d_tot));


                  //DEPARTEMENT DIRECTION GENERALE
                   $sheet->setCellValue('A18', 'DIRECTION GENERALE');
                   $sheet->setCellValue('B18', count($dpt_dg));
                   $sheet->setCellValue('C18', count($dpt_dg_cac));
                   $sheet->setCellValue('D18', count($dpt_dg_cfnsn));
                   $sheet->setCellValue('E18', count($dpt_dg_csg));
                   $sheet->setCellValue('F18', count($dpt_dg_cfml));
                   $sheet->setCellValue('G18', count($dpt_dg_cg));
                   $sheet->setCellValue('H18', count($dpt_dg_gn));
                   $sheet->setCellValue('I18', count($dpt_dg_bf));
                   $sheet->setCellValue('J18', count($dpt_dg_csf));
                   $sheet->setCellValue('K18', count($dpt_dg_fnl));
                   $sheet->setCellValue('L18', count($dpt_dg_cpssn));
                   $sheet->setCellValue('M18', count($dpt_dg_cpsci));
                   $sheet->setCellValue('N18', count($dpt_dg_cpsml));
                   $sheet->setCellValue('O18', count($dpt_dg_tot));


                   //DEPARTEMENT DIRECTION DMCC
                    $sheet->setCellValue('A19', 'DMCC');
                    $sheet->setCellValue('B19', count($dpt_dmcc));
                    $sheet->setCellValue('C19', count($dpt_dmcc_cac));
                    $sheet->setCellValue('D19', count($dpt_dmcc_cfnsn));
                    $sheet->setCellValue('E19', count($dpt_dmcc_csg));
                    $sheet->setCellValue('F19', count($dpt_dmcc_cfml));
                    $sheet->setCellValue('G19', count($dpt_dmcc_cg));
                    $sheet->setCellValue('H19', count($dpt_dmcc_gn));
                    $sheet->setCellValue('I19', count($dpt_dmcc_bf));
                    $sheet->setCellValue('J19', count($dpt_dmcc_csf));
                    $sheet->setCellValue('K19', count($dpt_dmcc_fnl));
                    $sheet->setCellValue('L19', count($dpt_dmcc_cpssn));
                    $sheet->setCellValue('M19', count($dpt_dmcc_cpsci));
                    $sheet->setCellValue('N19', count($dpt_dmcc_cpsml));
                    $sheet->setCellValue('O19', count($dpt_dmcc_tot));


                    //DEPARTEMENT DIRECTION EXPLOITATION
                     $sheet->setCellValue('A20', 'EXPLOITATION');
                     $sheet->setCellValue('B20', count($dpt_expl));
                     $sheet->setCellValue('C20', count($dpt_expl_cac));
                     $sheet->setCellValue('D20', count($dpt_expl_cfnsn));
                     $sheet->setCellValue('E20', count($dpt_expl_csg));
                     $sheet->setCellValue('F20', count($dpt_expl_cfml));
                     $sheet->setCellValue('G20', count($dpt_expl_cg));
                     $sheet->setCellValue('H20', count($dpt_expl_gn));
                     $sheet->setCellValue('I20', count($dpt_expl_bf));
                     $sheet->setCellValue('J20', count($dpt_expl_csf));
                     $sheet->setCellValue('K20', count($dpt_expl_fnl));
                     $sheet->setCellValue('L20', count($dpt_expl_cpssn));
                     $sheet->setCellValue('M20', count($dpt_expl_cpsci));
                     $sheet->setCellValue('N20', count($dpt_expl_cpsml));
                     $sheet->setCellValue('O20', count($dpt_expl_tot));


                     //DEPARTEMENT DIRECTION FACILITIES
                      $sheet->setCellValue('A21', 'FACILITIES');
                      $sheet->setCellValue('B21', count($dpt_facilitie));
                      $sheet->setCellValue('C21', count($dpt_facilitie_cac));
                      $sheet->setCellValue('D21', count($dpt_facilitie_cfnsn));
                      $sheet->setCellValue('E21', count($dpt_facilitie_csg));
                      $sheet->setCellValue('F21', count($dpt_facilitie_cfml));
                      $sheet->setCellValue('G21', count($dpt_facilitie_cg));
                      $sheet->setCellValue('H21', count($dpt_facilitie_gn));
                      $sheet->setCellValue('I21', count($dpt_facilitie_bf));
                      $sheet->setCellValue('J21', count($dpt_facilitie_csf));
                      $sheet->setCellValue('K21', count($dpt_facilitie_fnl));
                      $sheet->setCellValue('L21', count($dpt_facilitie_cpssn));
                      $sheet->setCellValue('M21', count($dpt_facilitie_cpsci));
                      $sheet->setCellValue('N21', count($dpt_facilitie_cpsml));
                      $sheet->setCellValue('O21', count($dpt_facilitie_tot));


                      //DEPARTEMENT DIRECTION FINANCE
                       $sheet->setCellValue('A22', 'FINANCE');
                       $sheet->setCellValue('B22', count($dpt_finance));
                       $sheet->setCellValue('C22', count($dpt_finance_cac));
                       $sheet->setCellValue('D22', count($dpt_finance_cfnsn));
                       $sheet->setCellValue('E22', count($dpt_finance_csg));
                       $sheet->setCellValue('F22', count($dpt_finance_cfml));
                       $sheet->setCellValue('G22', count($dpt_finance_cg));
                       $sheet->setCellValue('H22', count($dpt_finance_gn));
                       $sheet->setCellValue('I22', count($dpt_finance_bf));
                       $sheet->setCellValue('J22', count($dpt_finance_csf));
                       $sheet->setCellValue('K22', count($dpt_finance_fnl));
                       $sheet->setCellValue('L22', count($dpt_finance_cpssn));
                       $sheet->setCellValue('M22', count($dpt_finance_cpsci));
                       $sheet->setCellValue('N22', count($dpt_finance_cpsml));
                       $sheet->setCellValue('O22', count($dpt_finance_tot));

                       //DEPARTEMENT DIRECTION INFORMATIQUE
                        $sheet->setCellValue('A23', 'INFORMATIQUE');
                        $sheet->setCellValue('B23', count($dpt_informatique));
                        $sheet->setCellValue('C23', count($dpt_informatique_cac));
                        $sheet->setCellValue('D23', count($dpt_informatique_cfnsn));
                        $sheet->setCellValue('E23', count($dpt_informatique_csg));
                        $sheet->setCellValue('F23', count($dpt_informatique_cfml));
                        $sheet->setCellValue('G23', count($dpt_informatique_cg));
                        $sheet->setCellValue('H23', count($dpt_informatique_gn));
                        $sheet->setCellValue('I23', count($dpt_informatique_bf));
                        $sheet->setCellValue('J23', count($dpt_informatique_csf));
                        $sheet->setCellValue('K23', count($dpt_informatique_fnl));
                        $sheet->setCellValue('L23', count($dpt_informatique_cpssn));
                        $sheet->setCellValue('M23', count($dpt_informatique_cpsci));
                        $sheet->setCellValue('N23', count($dpt_informatique_cpsml));
                        $sheet->setCellValue('O23', count($dpt_informatique_tot));

                        //DEPARTEMENT DIRECTION LEGAL
                         $sheet->setCellValue('A24', 'LEGAL');
                         $sheet->setCellValue('B24', count($dpt_legal));
                         $sheet->setCellValue('C24', count($dpt_legal_cac));
                         $sheet->setCellValue('D24', count($dpt_legal_cfnsn));
                         $sheet->setCellValue('E24', count($dpt_legal_csg));
                         $sheet->setCellValue('F24', count($dpt_legal_cfml));
                         $sheet->setCellValue('G24', count($dpt_legal_cg));
                         $sheet->setCellValue('H24', count($dpt_legal_gn));
                         $sheet->setCellValue('I24', count($dpt_legal_bf));
                         $sheet->setCellValue('J24', count($dpt_legal_csf));
                         $sheet->setCellValue('K24', count($dpt_legal_fnl));
                         $sheet->setCellValue('L24', count($dpt_legal_cpssn));
                         $sheet->setCellValue('M24', count($dpt_legal_cpsci));
                         $sheet->setCellValue('N24', count($dpt_legal_cpsml));
                         $sheet->setCellValue('O24', count($dpt_legal_tot));


                         //DEPARTEMENT DIRECTION DES OPERATIONS
                          $sheet->setCellValue('A25', 'OPERATIONS');
                          $sheet->setCellValue('B25', count($dpt_ops));
                          $sheet->setCellValue('C25', count($dpt_ops_cac));
                          $sheet->setCellValue('D25', count($dpt_ops_cfnsn));
                          $sheet->setCellValue('E25', count($dpt_ops_csg));
                          $sheet->setCellValue('F25', count($dpt_ops_cfml));
                          $sheet->setCellValue('G25', count($dpt_ops_cg));
                          $sheet->setCellValue('H25', count($dpt_ops_gn));
                          $sheet->setCellValue('I25', count($dpt_ops_bf));
                          $sheet->setCellValue('J25', count($dpt_ops_csf));
                          $sheet->setCellValue('K25', count($dpt_ops_fnl));
                          $sheet->setCellValue('L25', count($dpt_ops_cpssn));
                          $sheet->setCellValue('M25', count($dpt_ops_cpsci));
                          $sheet->setCellValue('N25', count($dpt_ops_cpsml));
                          $sheet->setCellValue('O25', count($dpt_ops_tot));


                          //DEPARTEMENT PHOENIX
                           $sheet->setCellValue('A26', 'PHOENIX');
                           $sheet->setCellValue('B26', count($dpt_phoenix));
                           $sheet->setCellValue('C26', count($dpt_phoenix_cac));
                           $sheet->setCellValue('D26', count($dpt_phoenix_cfnsn));
                           $sheet->setCellValue('E26', count($dpt_phoenix_csg));
                           $sheet->setCellValue('F26', count($dpt_phoenix_cfml));
                           $sheet->setCellValue('G26', count($dpt_phoenix_cg));
                           $sheet->setCellValue('H26', count($dpt_phoenix_gn));
                           $sheet->setCellValue('I26', count($dpt_phoenix_bf));
                           $sheet->setCellValue('J26', count($dpt_phoenix_csf));
                           $sheet->setCellValue('K26', count($dpt_phoenix_fnl));
                           $sheet->setCellValue('L26', count($dpt_phoenix_cpssn));
                           $sheet->setCellValue('M26', count($dpt_phoenix_cpsci));
                           $sheet->setCellValue('N26', count($dpt_phoenix_cpsml));
                           $sheet->setCellValue('O26', count($dpt_phoenix_tot));

                           //DEPARTEMENT RESSOURCES HUMAINES
                            $sheet->setCellValue('A27', 'RESSOURCES HUMAINES');
                            $sheet->setCellValue('B27', count($dpt_rh));
                            $sheet->setCellValue('C27', count($dpt_rh_cac));
                            $sheet->setCellValue('D27', count($dpt_rh_cfnsn));
                            $sheet->setCellValue('E27', count($dpt_rh_csg));
                            $sheet->setCellValue('F27', count($dpt_rh_cfml));
                            $sheet->setCellValue('G27', count($dpt_rh_cg));
                            $sheet->setCellValue('H27', count($dpt_rh_gn));
                            $sheet->setCellValue('I27', count($dpt_rh_bf));
                            $sheet->setCellValue('J27', count($dpt_rh_csf));
                            $sheet->setCellValue('K27', count($dpt_rh_fnl));
                            $sheet->setCellValue('L27', count($dpt_rh_cpssn));
                            $sheet->setCellValue('M27', count($dpt_rh_cpsci));
                            $sheet->setCellValue('N27', count($dpt_rh_cpsml));
                            $sheet->setCellValue('O27', count($dpt_rh_tot));


                            //DEPARTEMENT RETAIL
                             $sheet->setCellValue('A28', 'RETAIL');
                             $sheet->setCellValue('B28', count($dpt_retail));
                             $sheet->setCellValue('C28', count($dpt_retail_cac));
                             $sheet->setCellValue('D28', count($dpt_retail_cfnsn));
                             $sheet->setCellValue('E28', count($dpt_retail_csg));
                             $sheet->setCellValue('F28', count($dpt_retail_cfml));
                             $sheet->setCellValue('G28', count($dpt_retail_cg));
                             $sheet->setCellValue('H28', count($dpt_retail_gn));
                             $sheet->setCellValue('I28', count($dpt_retail_bf));
                             $sheet->setCellValue('J28', count($dpt_retail_csf));
                             $sheet->setCellValue('K28', count($dpt_retail_fnl));
                             $sheet->setCellValue('L28', count($dpt_retail_cpssn));
                             $sheet->setCellValue('M28', count($dpt_retail_cpsci));
                             $sheet->setCellValue('N28', count($dpt_retail_cpsml));
                             $sheet->setCellValue('O28', count($dpt_retail_tot));


                             $sheet->setCellValue('A29', 'Distribution effectif par Genre et par Categorie');

                             //REPARTITION DES HOMMES CADRES
                              $sheet->setCellValue('A30', 'HOMMES CADRES');
                              $sheet->setCellValue('B30', count($hommes_cadres));
                              $sheet->setCellValue('C30', count($hommes_cadres_cac));
                              $sheet->setCellValue('D30', count($hommes_cadres_cfnsn));
                              $sheet->setCellValue('E30', count($hommes_cadres_csg));
                              $sheet->setCellValue('F30', count($hommes_cadres_cfml));
                              $sheet->setCellValue('G30', count($hommes_cadres_cg));
                              $sheet->setCellValue('H30', count($hommes_cadres_gn));
                              $sheet->setCellValue('I30', count($hommes_cadres_bf));
                              $sheet->setCellValue('J30', count($hommes_cadres_csf));
                              $sheet->setCellValue('K30', count($hommes_cadres_fnl));
                              $sheet->setCellValue('L30', count($hommes_cadres_cpssn));
                              $sheet->setCellValue('M30', count($hommes_cadres_cpsci));
                              $sheet->setCellValue('N30', count($hommes_cadres_cpsml));
                              $sheet->setCellValue('O30', count($hommes_cadres_tot));


                              //REPARTITION DES HOMMES NON CADRES
                               $sheet->setCellValue('A31', 'HOMMES NON CADRES');
                               $sheet->setCellValue('B31', count($hommes_noncadres));
                               $sheet->setCellValue('C31', count($hommes_noncadres_cac));
                               $sheet->setCellValue('D31', count($hommes_noncadres_cfnsn));
                               $sheet->setCellValue('E31', count($hommes_noncadres_csg));
                               $sheet->setCellValue('F31', count($hommes_noncadres_cfml));
                               $sheet->setCellValue('G31', count($hommes_noncadres_cg));
                               $sheet->setCellValue('H31', count($hommes_noncadres_gn));
                               $sheet->setCellValue('I31', count($hommes_noncadres_bf));
                               $sheet->setCellValue('J31', count($hommes_noncadres_csf));
                               $sheet->setCellValue('K31', count($hommes_noncadres_fnl));
                               $sheet->setCellValue('L31', count($hommes_noncadres_cpssn));
                               $sheet->setCellValue('M31', count($hommes_noncadres_cpsci));
                               $sheet->setCellValue('N31', count($hommes_noncadres_cpsml));
                               $sheet->setCellValue('O31', count($hommes_noncadres_tot));

                               //REPARTITION DES FEMMMES CADRES
                                $sheet->setCellValue('A32', 'FEMMMES CADRES');
                                $sheet->setCellValue('B32', count($femmes_cadres));
                                $sheet->setCellValue('C32', count($femmes_cadres_cac));
                                $sheet->setCellValue('D32', count($femmes_cadres_cfnsn));
                                $sheet->setCellValue('E32', count($femmes_cadres_csg));
                                $sheet->setCellValue('F32', count($femmes_cadres_cfml));
                                $sheet->setCellValue('G32', count($femmes_cadres_cg));
                                $sheet->setCellValue('H32', count($femmes_cadres_gn));
                                $sheet->setCellValue('I32', count($femmes_cadres_bf));
                                $sheet->setCellValue('J32', count($femmes_cadres_csf));
                                $sheet->setCellValue('K32', count($femmes_cadres_fnl));
                                $sheet->setCellValue('L32', count($femmes_cadres_cpssn));
                                $sheet->setCellValue('M32', count($femmes_cadres_cpsci));
                                $sheet->setCellValue('N32', count($femmes_cadres_cpsml));
                                $sheet->setCellValue('O32', count($femmes_cadres_tot));


                                //REPARTITION DESFEMMES NON CADRES
                                 $sheet->setCellValue('A33', 'HOMMES FEMMES NON CADRES');
                                 $sheet->setCellValue('B33', count($femmes_noncadres));
                                 $sheet->setCellValue('C33', count($femmes_noncadres_cac));
                                 $sheet->setCellValue('D33', count($femmes_noncadres_cfnsn));
                                 $sheet->setCellValue('E33', count($femmes_noncadres_csg));
                                 $sheet->setCellValue('F33', count($femmes_noncadres_cfml));
                                 $sheet->setCellValue('G33', count($femmes_noncadres_cg));
                                 $sheet->setCellValue('H33', count($femmes_noncadres_gn));
                                 $sheet->setCellValue('I33', count($femmes_noncadres_bf));
                                 $sheet->setCellValue('J33', count($femmes_noncadres_csf));
                                 $sheet->setCellValue('K33', count($femmes_noncadres_fnl));
                                 $sheet->setCellValue('L33', count($femmes_noncadres_cpssn));
                                 $sheet->setCellValue('M33', count($femmes_noncadres_cpsci));
                                 $sheet->setCellValue('N33', count($femmes_noncadres_cpsml));
                                 $sheet->setCellValue('O33', count($femmes_noncadres_tot));



                                 $sheet->setCellValue('A34', 'Distribution effectif des Departs');

                                 //REPARTITION PAR DEMISSION
                                  $sheet->setCellValue('A35', 'DEMISSION');
                                  $sheet->setCellValue('B35', count($depart_demission));
                                  $sheet->setCellValue('C35', count($depart_demission_cac));
                                  $sheet->setCellValue('D35', count($depart_demission_cfnsn));
                                  $sheet->setCellValue('E35', count($depart_demission_csg));
                                  $sheet->setCellValue('F35', count($depart_demission_cfml));
                                  $sheet->setCellValue('G35', count($depart_demission_cg));
                                  $sheet->setCellValue('H35', count($depart_demission_gn));
                                  $sheet->setCellValue('I35', count($depart_demission_bf));
                                  $sheet->setCellValue('J35', count($depart_demission_csf));
                                  $sheet->setCellValue('K35', count($depart_demission_fnl));
                                  $sheet->setCellValue('L35', count($depart_demission_cpssn));
                                  $sheet->setCellValue('M35', count($depart_demission_cpsci));
                                  $sheet->setCellValue('N35', count($depart_demission_cpsml));
                                  $sheet->setCellValue('O35', count($depart_demission_tot));


                                  //REPARTITION PAR DEPART NEGOCIE
                                   $sheet->setCellValue('A36', 'DEPART NEGOCIE');
                                   $sheet->setCellValue('B36', count($depart_negocie));
                                   $sheet->setCellValue('C36', count($depart_negocie_cac));
                                   $sheet->setCellValue('D36', count($depart_negocie_cfnsn));
                                   $sheet->setCellValue('E36', count($depart_negocie_csg));
                                   $sheet->setCellValue('F36', count($depart_negocie_cfml));
                                   $sheet->setCellValue('G36', count($depart_negocie_cg));
                                   $sheet->setCellValue('H36', count($depart_negocie_gn));
                                   $sheet->setCellValue('I36', count($depart_negocie_bf));
                                   $sheet->setCellValue('J36', count($depart_negocie_csf));
                                   $sheet->setCellValue('K36', count($depart_negocie_fnl));
                                   $sheet->setCellValue('L36', count($depart_negocie_cpssn));
                                   $sheet->setCellValue('M36', count($depart_negocie_cpsci));
                                   $sheet->setCellValue('N36', count($depart_negocie_cpsml));
                                   $sheet->setCellValue('O36', count($depart_negocie_tot));

                                   //REPARTITION DES FIN CDD
                                    $sheet->setCellValue('A37', 'FIN CDD');
                                    $sheet->setCellValue('B37', count($depart_fincdd));
                                    $sheet->setCellValue('C37', count($depart_fincdd_cac));
                                    $sheet->setCellValue('D37', count($depart_fincdd_cfnsn));
                                    $sheet->setCellValue('E37', count($depart_fincdd_csg));
                                    $sheet->setCellValue('F37', count($depart_fincdd_cfml));
                                    $sheet->setCellValue('G37', count($depart_fincdd_cg));
                                    $sheet->setCellValue('H37', count($depart_fincdd_gn));
                                    $sheet->setCellValue('I37', count($depart_fincdd_bf));
                                    $sheet->setCellValue('J37', count($depart_fincdd_csf));
                                    $sheet->setCellValue('K37', count($depart_fincdd_fnl));
                                    $sheet->setCellValue('L37', count($depart_fincdd_cpssn));
                                    $sheet->setCellValue('M37', count($depart_fincdd_cpsci));
                                    $sheet->setCellValue('N37', count($depart_fincdd_cpsml));
                                    $sheet->setCellValue('O37', count($depart_fincdd_tot));


                                    //REPARTITION PAR  FIN DE STAGE
                                     $sheet->setCellValue('A38', 'FIN STAGE');
                                     $sheet->setCellValue('B38', count($depart_finstage));
                                     $sheet->setCellValue('C38', count($depart_finstage_cac));
                                     $sheet->setCellValue('D38', count($depart_finstage_cfnsn));
                                     $sheet->setCellValue('E38', count($depart_finstage_csg));
                                     $sheet->setCellValue('F38', count($depart_finstage_cfml));
                                     $sheet->setCellValue('G38', count($depart_finstage_cg));
                                     $sheet->setCellValue('H38', count($depart_finstage_gn));
                                     $sheet->setCellValue('I38', count($depart_finstage_bf));
                                     $sheet->setCellValue('J38', count($depart_finstage_csf));
                                     $sheet->setCellValue('K38', count($depart_finstage_fnl));
                                     $sheet->setCellValue('L38', count($depart_finstage_cpssn));
                                     $sheet->setCellValue('M38', count($depart_finstage_cpsci));
                                     $sheet->setCellValue('N38', count($depart_finstage_cpsml));
                                     $sheet->setCellValue('O38', count($depart_finstage_tot));


                                     //REPARTITION PAR  LICENCIEMENT
                                      $sheet->setCellValue('A39', 'LICENCIEMENT');
                                      $sheet->setCellValue('B39', count($depart_licenciement));
                                      $sheet->setCellValue('C39', count($depart_licenciement_cac));
                                      $sheet->setCellValue('D39', count($depart_licenciement_cfnsn));
                                      $sheet->setCellValue('E39', count($depart_licenciement_csg));
                                      $sheet->setCellValue('F39', count($depart_licenciement_cfml));
                                      $sheet->setCellValue('G39', count($depart_licenciement_cg));
                                      $sheet->setCellValue('H39', count($depart_licenciement_gn));
                                      $sheet->setCellValue('I39', count($depart_licenciement_bf));
                                      $sheet->setCellValue('J39', count($depart_licenciement_csf));
                                      $sheet->setCellValue('K39', count($depart_licenciement_fnl));
                                      $sheet->setCellValue('L39', count($depart_licenciement_cpssn));
                                      $sheet->setCellValue('M39', count($depart_licenciement_cpsci));
                                      $sheet->setCellValue('N39', count($depart_licenciement_cpsml));
                                      $sheet->setCellValue('O39', count($depart_licenciement_tot));


                                      //REPARTITION PAR  RETRAITRE
                                       $sheet->setCellValue('A40', 'RETRAITRE');
                                       $sheet->setCellValue('B40', count($depart_retraite));
                                       $sheet->setCellValue('C40', count($depart_retraite_cac));
                                       $sheet->setCellValue('D40', count($depart_retraite_cfnsn));
                                       $sheet->setCellValue('E40', count($depart_retraite_csg));
                                       $sheet->setCellValue('F40', count($depart_retraite_cfml));
                                       $sheet->setCellValue('G40', count($depart_retraite_cg));
                                       $sheet->setCellValue('H40', count($depart_retraite_gn));
                                       $sheet->setCellValue('I40', count($depart_retraite_bf));
                                       $sheet->setCellValue('J40', count($depart_retraite_csf));
                                       $sheet->setCellValue('K40', count($depart_retraite_fnl));
                                       $sheet->setCellValue('L40', count($depart_retraite_cpssn));
                                       $sheet->setCellValue('M40', count($depart_retraite_cpsci));
                                       $sheet->setCellValue('N40', count($depart_retraite_cpsml));
                                       $sheet->setCellValue('O40', count($depart_retraite_tot));





                                       $sheet->setCellValue('A41', 'Distribution effectif des sanctions');

                                            //REPARTITION PAR AVERTISSEMENT
                                        $sheet->setCellValue('A42', 'AVERTISSEMENT');
                                        $sheet->setCellValue('B42', count($sanction_avert));
                                        $sheet->setCellValue('C42', count($sanction_avert_cac));
                                        $sheet->setCellValue('D42', count($sanction_avert_cfnsn));
                                        $sheet->setCellValue('E42', count($sanction_avert_csg));
                                        $sheet->setCellValue('F42', count($sanction_avert_cfml));
                                        $sheet->setCellValue('G42', count($sanction_avert_cg));
                                        $sheet->setCellValue('H42', count($sanction_avert_gn));
                                        $sheet->setCellValue('I42', count($sanction_avert_bf));
                                        $sheet->setCellValue('J42', count($sanction_avert_csf));
                                        $sheet->setCellValue('K42', count($sanction_avert_fnl));
                                        $sheet->setCellValue('L42', count($sanction_avert_cpssn));
                                        $sheet->setCellValue('M42', count($sanction_avert_cpsci));
                                        $sheet->setCellValue('N42', count($sanction_avert_cpsml));
                                        $sheet->setCellValue('O42', count($sanction_avert_tot));


                                        //REPARTITION PAR BLAME
                                        $sheet->setCellValue('A43', 'BLAME');
                                        $sheet->setCellValue('B43', count($sanction_blame));
                                        $sheet->setCellValue('C43', count($sanction_blame_cac));
                                        $sheet->setCellValue('D43', count($sanction_blame_cfnsn));
                                        $sheet->setCellValue('E43', count($sanction_blame_csg));
                                        $sheet->setCellValue('F43', count($sanction_blame_cfml));
                                        $sheet->setCellValue('G43', count($sanction_blame_cg));
                                        $sheet->setCellValue('H43', count($sanction_blame_gn));
                                        $sheet->setCellValue('I43', count($sanction_blame_bf));
                                        $sheet->setCellValue('J43', count($sanction_blame_csf));
                                        $sheet->setCellValue('K43', count($sanction_blame_fnl));
                                        $sheet->setCellValue('L43', count($sanction_blame_cpssn));
                                        $sheet->setCellValue('M43', count($sanction_blame_cpsci));
                                        $sheet->setCellValue('N43', count($sanction_blame_cpsml));
                                        $sheet->setCellValue('O43', count($sanction_blame_tot));

                                        //REPARTITION MISE A PIED
                                        $sheet->setCellValue('A44', 'MISE A PIED');
                                        $sheet->setCellValue('B44', count($sanction_map));
                                        $sheet->setCellValue('C44', count($sanction_map_cac));
                                        $sheet->setCellValue('D44', count($sanction_map_cfnsn));
                                        $sheet->setCellValue('E44', count($sanction_map_csg));
                                        $sheet->setCellValue('F44', count($sanction_map_cfml));
                                        $sheet->setCellValue('G44', count($sanction_map_cg));
                                        $sheet->setCellValue('H44', count($sanction_map_gn));
                                        $sheet->setCellValue('I44', count($sanction_map_bf));
                                        $sheet->setCellValue('J44', count($sanction_map_csf));
                                        $sheet->setCellValue('K44', count($sanction_map_fnl));
                                        $sheet->setCellValue('L44', count($sanction_map_cpssn));
                                        $sheet->setCellValue('M44', count($sanction_map_cpsci));
                                        $sheet->setCellValue('N44', count($sanction_map_cpsml));
                                        $sheet->setCellValue('O44', count($sanction_map_tot));

                                        //REPARTITION PAR  LICENCIEMENT
                                       $sheet->setCellValue('A45', 'LICENCIEMENT');
                                       $sheet->setCellValue('B45', count($sanction_licenciement));
                                       $sheet->setCellValue('C45', count($sanction_licenciement_cac));
                                       $sheet->setCellValue('D45', count($sanction_licenciement_cfnsn));
                                       $sheet->setCellValue('E45', count($sanction_licenciement_csg));
                                       $sheet->setCellValue('F45', count($sanction_licenciement_cfml));
                                       $sheet->setCellValue('G45', count($sanction_licenciement_cg));
                                       $sheet->setCellValue('H45', count($sanction_licenciement_gn));
                                       $sheet->setCellValue('I45', count($sanction_licenciement_bf));
                                       $sheet->setCellValue('J45', count($sanction_licenciement_csf));
                                       $sheet->setCellValue('K45', count($sanction_licenciement_fnl));
                                       $sheet->setCellValue('L45', count($sanction_licenciement_cpssn));
                                       $sheet->setCellValue('M45', count($sanction_licenciement_cpsci));
                                       $sheet->setCellValue('N45', count($sanction_licenciement_cpsml));
                                       $sheet->setCellValue('O45', count($sanction_licenciement_tot));






       $writer = new Xlsx($spreadsheet);
       $writer->save('hello world.xlsx');

       // redirect output to client browser
       header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
       header('Content-Disposition: attachment;filename="cofiquick_reporting_indicateur_groupe.xlsx"');
       header('Cache-Control: max-age=0');

       $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
       $writer->save('php://output');

     }
///**********************************************lol**********************************
$choisir_entite = $request->input('export_pdf');

 if($choisir_entite=="Export PDF"){
     $view = \View::make('/analyse/tableau_indicateur-new',['employes' => $employes,'sites' => $sites,'choisir_entite' => $choisir_entite,
     //'resultat_hommes'=>$resultat_hommes,
     //'resultat_femmes'=>$resultat_femmes,
     'hommes' => $hommes,
     //'departements' => $departements,
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

     'employes_cac' => $employes_cac,
     'hommes_cac' => $hommes_cac,
     //'departements_cac' => $departements_cac,
     'femmes_cac' => $femmes_cac,
     'nb_empl_cac' => $nb_empl_cac,
     'nb_cdi_cac' => $nb_cdi_cac,
     'nb_cdd_cac' => $nb_cdd_cac,
     'nb_stage_cac' => $nb_stage_cac,
     'nb_prestation_cac' => $nb_prestation_cac,
     'hommes_cadres_cac' => $hommes_cadres_cac,
     'hommes_noncadres_cac' => $hommes_noncadres_cac,
     'femmes_cadres_cac' => $femmes_cadres_cac,
     'femmes_noncadres_cac' => $femmes_noncadres_cac,

     'employes_cfnsn' => $employes_cfnsn,
     'hommes_cfnsn' => $hommes_cfnsn,
     //'departements_cfnsn' => $departements_cfnsn,
     'femmes_cfnsn' => $femmes_cfnsn,
     'nb_empl_cfnsn' => $nb_empl_cfnsn,
     'nb_cdi_cfnsn' => $nb_cdi_cfnsn,
     'nb_cdd_cfnsn' => $nb_cdd_cfnsn,
     'nb_stage_cfnsn' => $nb_stage_cfnsn,
     'nb_prestation_cfnsn' => $nb_prestation_cfnsn,
     'hommes_cadres_cfnsn' => $hommes_cadres_cfnsn,
     'hommes_noncadres_cfnsn' => $hommes_noncadres_cfnsn,
     'femmes_cadres_cfnsn' => $femmes_cadres_cfnsn,
     'femmes_noncadres_cfnsn' => $femmes_noncadres_cfnsn,

     'employes_csg' => $employes_csg,
     'hommes_csg' => $hommes_csg,
     //'departements_csg' => $departements_csg,
     'femmes_csg' => $femmes_csg,
     'nb_empl_csg' => $nb_empl_csg,
     'nb_cdi_csg' => $nb_cdi_csg,
     'nb_cdd_csg' => $nb_cdd_csg,
     'nb_stage_csg' => $nb_stage_csg,
     'nb_prestation_csg' => $nb_prestation_csg,
     'hommes_cadres_csg' => $hommes_cadres_csg,
     'hommes_noncadres_csg' => $hommes_noncadres_csg,
     'femmes_cadres_csg' => $femmes_cadres_csg,
     'femmes_noncadres_csg' => $femmes_noncadres_csg,

     'employes_cfml' => $employes_cfml,
     'hommes_cfml' => $hommes_cfml,
     //'departements_cfml' => $departements_cfml,
     'femmes_cfml' => $femmes_cfml,
     'nb_empl_cfml' => $nb_empl_cfml,
     'nb_cdi_cfml' => $nb_cdi_cfml,
     'nb_cdd_cfml' => $nb_cdd_cfml,
     'nb_stage_cfml' => $nb_stage_cfml,
     'nb_prestation_cfml' => $nb_prestation_cfml,
     'hommes_cadres_cfml' => $hommes_cadres_cfml,
     'hommes_noncadres_cfml' => $hommes_noncadres_cfml,
     'femmes_cadres_cfml' => $femmes_cadres_cfml,
     'femmes_noncadres_cfml' => $femmes_noncadres_cfml,

     'employes_cg' => $employes_cg,
     'hommes_cg' => $hommes_cg,
     //'departements_cg' => $departements_cg,
     'femmes_cg' => $femmes_cg,
     'nb_empl_cg' => $nb_empl_cg,
     'nb_cdi_cg' => $nb_cdi_cg,
     'nb_cdd_cg' => $nb_cdd_cg,
     'nb_stage_cg' => $nb_stage_cg,
     'nb_prestation_cg' => $nb_prestation_cg,
     'hommes_cadres_cg' => $hommes_cadres_cg,
     'hommes_noncadres_cg' => $hommes_noncadres_cg,
     'femmes_cadres_cg' => $femmes_cadres_cg,
     'femmes_noncadres_cg' => $femmes_noncadres_cg,

     'employes_gn' => $employes_gn,
     'hommes_gn' => $hommes_gn,
     //'departements_gn' => $departements_gn,
     'femmes_gn' => $femmes_gn,
     'nb_empl_gn' => $nb_empl_gn,
     'nb_cdi_gn' => $nb_cdi_gn,
     'nb_cdd_gn' => $nb_cdd_gn,
     'nb_stage_gn' => $nb_stage_gn,
     'nb_prestation_gn' => $nb_prestation_gn,
     'hommes_cadres_gn' => $hommes_cadres_gn,
     'hommes_noncadres_gn' => $hommes_noncadres_gn,
     'femmes_cadres_gn' => $femmes_cadres_gn,
     'femmes_noncadres_gn' => $femmes_noncadres_gn,

     'employes_bf' => $employes_bf,
     'hommes_bf' => $hommes_bf,
     //'departements_bf' => $departements_bf,
     'femmes_bf' => $femmes_bf,
     'nb_empl_bf' => $nb_empl_bf,
     'nb_cdi_bf' => $nb_cdi_bf,
     'nb_cdd_bf' => $nb_cdd_bf,
     'nb_stage_bf' => $nb_stage_bf,
     'nb_prestation_bf' => $nb_prestation_bf,
     'hommes_cadres_bf' => $hommes_cadres_bf,
     'hommes_noncadres_bf' => $hommes_noncadres_bf,
     'femmes_cadres_bf' => $femmes_cadres_bf,
     'femmes_noncadres_bf' => $femmes_noncadres_bf,

     'employes_csf' => $employes_csf,
     'hommes_csf' => $hommes_csf,
     //'departements_csf' => $departements_csf,
     'femmes_csf' => $femmes_csf,
     'nb_empl_csf' => $nb_empl_csf,
     'nb_cdi_csf' => $nb_cdi_csf,
     'nb_cdd_csf' => $nb_cdd_csf,
     'nb_stage_csf' => $nb_stage_csf,
     'nb_prestation_csf' => $nb_prestation_csf,
     'hommes_cadres_csf' => $hommes_cadres_csf,
     'hommes_noncadres_csf' => $hommes_noncadres_csf,
     'femmes_cadres_csf' => $femmes_cadres_csf,
     'femmes_noncadres_csf' => $femmes_noncadres_csf,

     'employes_fnl' => $employes_fnl,
     'hommes_fnl' => $hommes_fnl,
     //'departements_fnl' => $departements_fnl,
     'femmes_fnl' => $femmes_fnl,
     'nb_empl_fnl' => $nb_empl_fnl,
     'nb_cdi_fnl' => $nb_cdi_fnl,
     'nb_cdd_fnl' => $nb_cdd_fnl,
     'nb_stage_fnl' => $nb_stage_fnl,
     'nb_prestation_fnl' => $nb_prestation_fnl,
     'hommes_cadres_fnl' => $hommes_cadres_fnl,
     'hommes_noncadres_fnl' => $hommes_noncadres_fnl,
     'femmes_cadres_fnl' => $femmes_cadres_fnl,
     'femmes_noncadres_fnl' => $femmes_noncadres_fnl,

     'employes_cpssn' => $employes_cpssn,
     'hommes_cpssn' => $hommes_cpssn,
     //'departements_cpssn' => $departements_cpssn,
     'femmes_cpssn' => $femmes_cpssn,
     'nb_empl_cpssn' => $nb_empl_cpssn,
     'nb_cdi_cpssn' => $nb_cdi_cpssn,
     'nb_cdd_cpssn' => $nb_cdd_cpssn,
     'nb_stage_cpssn' => $nb_stage_cpssn,
     'nb_prestation_cpssn' => $nb_prestation_cpssn,
     'hommes_cadres_cpssn' => $hommes_cadres_cpssn,
     'hommes_noncadres_cpssn' => $hommes_noncadres_cpssn,
     'femmes_cadres_cpssn' => $femmes_cadres_cpssn,
     'femmes_noncadres_cpssn' => $femmes_noncadres_cpssn,

     'employes_cpsci' => $employes_cpsci,
     'hommes_cpsci' => $hommes_cpsci,
     //'departements_cpsci' => $departements_cpsci,
     'femmes_cpsci' => $femmes_cpsci,
     'nb_empl_cpsci' => $nb_empl_cpsci,
     'nb_cdi_cpsci' => $nb_cdi_cpsci,
     'nb_cdd_cpsci' => $nb_cdd_cpsci,
     'nb_stage_cpsci' => $nb_stage_cpsci,
     'nb_prestation_cpsci' => $nb_prestation_cpsci,
     'hommes_cadres_cpsci' => $hommes_cadres_cpsci,
     'hommes_noncadres_cpsci' => $hommes_noncadres_cpsci,
     'femmes_cadres_cpsci' => $femmes_cadres_cpsci,
     'femmes_noncadres_cpsci' => $femmes_noncadres_cpsci,

     'employes_cpsml' => $employes_cpsml,
     'hommes_cpsml' => $hommes_cpsml,
     //'departements_cpsml' => $departements_cpsml,
     'femmes_cpsml' => $femmes_cpsml,
     'nb_empl_cpsml' => $nb_empl_cpsml,
     'nb_cdi_cpsml' => $nb_cdi_cpsml,
     'nb_cdd_cpsml' => $nb_cdd_cpsml,
     'nb_stage_cpsml' => $nb_stage_cpsml,
     'nb_prestation_cpsml' => $nb_prestation_cpsml,
     'hommes_cadres_cpsml' => $hommes_cadres_cpsml,
     'hommes_noncadres_cpsml' => $hommes_noncadres_cpsml,
     'femmes_cadres_cpsml' => $femmes_cadres_cpsml,
     'femmes_noncadres_cpsml' => $femmes_noncadres_cpsml,

     'employes_tot' => $employes_tot,
     'hommes_tot' => $hommes_tot,
     //'departements_tot' => $departements_tot,
     'femmes_tot' => $femmes_tot,
     'nb_empl_tot' => $nb_empl_tot,
     'nb_cdi_tot' => $nb_cdi_tot,
     'nb_cdd_tot' => $nb_cdd_tot,
     'nb_stage_tot' => $nb_stage_tot,
     'nb_prestation_tot' => $nb_prestation_tot,
     'hommes_cadres_tot' => $hommes_cadres_tot,
     'hommes_noncadres_tot' => $hommes_noncadres_tot,
     'femmes_cadres_tot' => $femmes_cadres_tot,
     'femmes_noncadres_tot' => $femmes_noncadres_tot,


     'depart_demission' => $depart_demission,
     'depart_negocie' => $depart_negocie,
     'depart_fincdd' => $depart_fincdd,
     'depart_finstage' => $depart_finstage,
     'depart_licenciement' => $depart_licenciement,
     'depart_retraite' => $depart_retraite,

     'sanction_avert' => $sanction_avert,
     'sanction_blame' => $sanction_blame,
     'sanction_map' => $sanction_map,
     'sanction_licenciement' => $sanction_licenciement,

     'dpt_rh' => $dpt_rh,
     'dpt_dmcc' => $dpt_dmcc,
     'dpt_finance' => $dpt_finance,
     'dpt_informatique' => $dpt_informatique,
     'dpt_expl' => $dpt_expl,
     'dpt_credit' => $dpt_credit,
     'dpt_audit' => $dpt_audit,
     'dpt_ci' => $dpt_ci,
     'dpt_dg' => $dpt_dg,
     'dpt_d'=> $dpt_d,
     'dpt_retail' => $dpt_retail,
     'dpt_legal' => $dpt_legal,
     'dpt_facilitie' => $dpt_facilitie,
     'dpt_ops' => $dpt_ops,
     'dpt_phoenix' => $dpt_phoenix,

     'dpt_rh_tot' => $dpt_rh_tot,
     'dpt_dmcc_tot' => $dpt_dmcc_tot,
     'dpt_finance_tot' => $dpt_finance_tot,
     'dpt_informatique_tot' => $dpt_informatique_tot,
     'dpt_expl_tot' => $dpt_expl_tot,
     'dpt_credit_tot' => $dpt_credit_tot,
     'dpt_audit_tot' => $dpt_audit_tot,
     'dpt_ci_tot' => $dpt_ci_tot,
     'dpt_dg_tot' => $dpt_dg_tot,
     'dpt_d_tot'=> $dpt_d_tot,
     'dpt_retail_tot' => $dpt_retail_tot,
     'dpt_legal_tot' => $dpt_legal_tot,
     'dpt_facilitie_tot' => $dpt_facilitie_tot,
     'dpt_ops_tot' => $dpt_ops_tot,
     'dpt_phoenix_tot' => $dpt_phoenix_tot,

     'depart_demission_tot' => $depart_demission_tot,
     'depart_negocie_tot' => $depart_negocie_tot,
     'depart_fincdd_tot' => $depart_fincdd_tot,
     'depart_finstage_tot' => $depart_finstage_tot,
     'depart_licenciement_tot' => $depart_licenciement_tot,
     'depart_retraite_tot' => $depart_retraite_tot,

     'sanction_avert_tot' => $sanction_avert_tot,
     'sanction_blame_tot' => $sanction_blame_tot,
     'sanction_map_tot' => $sanction_map_tot,
     'sanction_licenciement_tot' => $sanction_licenciement_tot,

     'dpt_rh_cac' => $dpt_rh_cac,
     'dpt_dmcc_cac' => $dpt_dmcc_cac,
     'dpt_finance_cac' => $dpt_finance_cac,
     'dpt_informatique_cac' => $dpt_informatique_cac,
     'dpt_expl_cac' => $dpt_expl_cac,
     'dpt_credit_cac' => $dpt_credit_cac,
     'dpt_audit_cac' => $dpt_audit_cac,
     'dpt_ci_cac' => $dpt_ci_cac,
     'dpt_dg_cac' => $dpt_dg_cac,
     'dpt_d_cac'=> $dpt_d_cac,
     'dpt_retail_cac' => $dpt_retail_cac,
     'dpt_legal_cac' => $dpt_legal_cac,
     'dpt_facilitie_cac' => $dpt_facilitie_cac,
     'dpt_ops_cac' => $dpt_ops_cac,
     'dpt_phoenix_cac' => $dpt_phoenix_cac,


     'depart_demission_cac' => $depart_demission_cac,
     'depart_negocie_cac' => $depart_negocie_cac,
     'depart_fincdd_cac' => $depart_fincdd_cac,
     'depart_finstage_cac' => $depart_finstage_cac,
     'depart_licenciement_cac' => $depart_licenciement_cac,
     'depart_retraite_cac' => $depart_retraite_cac,

     'sanction_avert_cac' => $sanction_avert_cac,
     'sanction_blame_cac' => $sanction_blame_cac,
     'sanction_map_cac' => $sanction_map_cac,
     'sanction_licenciement_cac' => $sanction_licenciement_cac,

     'dpt_rh_cfnsn' => $dpt_rh_cfnsn,
     'dpt_dmcc_cfnsn' => $dpt_dmcc_cfnsn,
     'dpt_finance_cfnsn' => $dpt_finance_cfnsn,
     'dpt_informatique_cfnsn' => $dpt_informatique_cfnsn,
     'dpt_expl_cfnsn' => $dpt_expl_cfnsn,
     'dpt_credit_cfnsn' => $dpt_credit_cfnsn,
     'dpt_audit_cfnsn' => $dpt_audit_cfnsn,
     'dpt_ci_cfnsn' => $dpt_ci_cfnsn,
     'dpt_dg_cfnsn' => $dpt_dg_cfnsn,
     'dpt_d_cfnsn'=> $dpt_d_cfnsn,
     'dpt_retail_cfnsn' => $dpt_retail_cfnsn,
     'dpt_legal_cfnsn' => $dpt_legal_cfnsn,
     'dpt_facilitie_cfnsn' => $dpt_facilitie_cfnsn,
     'dpt_ops_cfnsn' => $dpt_ops_cfnsn,
     'dpt_phoenix_cfnsn' => $dpt_phoenix_cfnsn,

     'depart_demission_cfnsn' => $depart_demission_cfnsn,
     'depart_negocie_cfnsn' => $depart_negocie_cfnsn,
     'depart_fincdd_cfnsn' => $depart_fincdd_cfnsn,
     'depart_finstage_cfnsn' => $depart_finstage_cfnsn,
     'depart_licenciement_cfnsn' => $depart_licenciement_cfnsn,
     'depart_retraite_cfnsn' => $depart_retraite_cfnsn,

     'sanction_avert_cfnsn' => $sanction_avert_cfnsn,
     'sanction_blame_cfnsn' => $sanction_blame_cfnsn,
     'sanction_map_cfnsn' => $sanction_map_cfnsn,
     'sanction_licenciement_cfnsn' => $sanction_licenciement_cfnsn,

     'dpt_rh_csg' => $dpt_rh_csg,
     'dpt_dmcc_csg' => $dpt_dmcc_csg,
     'dpt_finance_csg' => $dpt_finance_csg,
     'dpt_informatique_csg' => $dpt_informatique_csg,
     'dpt_expl_csg' => $dpt_expl_csg,
     'dpt_credit_csg' => $dpt_credit_csg,
     'dpt_audit_csg' => $dpt_audit_csg,
     'dpt_ci_csg' => $dpt_ci_csg,
     'dpt_dg_csg' => $dpt_dg_csg,
     'dpt_d_csg'=> $dpt_d_csg,
     'dpt_retail_csg' => $dpt_retail_csg,
     'dpt_legal_csg' => $dpt_legal_csg,
     'dpt_facilitie_csg' => $dpt_facilitie_csg,
     'dpt_ops_csg' => $dpt_ops_csg,
     'dpt_phoenix_csg' => $dpt_phoenix_csg,


     'depart_demission_csg' => $depart_demission_csg,
     'depart_negocie_csg' => $depart_negocie_csg,
     'depart_fincdd_csg' => $depart_fincdd_csg,
     'depart_finstage_csg' => $depart_finstage_csg,
     'depart_licenciement_csg' => $depart_licenciement_csg,
     'depart_retraite_csg' => $depart_retraite_csg,

     'sanction_avert_csg' => $sanction_avert_csg,
     'sanction_blame_csg' => $sanction_blame_csg,
     'sanction_map_csg' => $sanction_map_csg,
     'sanction_licenciement_csg' => $sanction_licenciement_csg,

     'dpt_rh_cfml' => $dpt_rh_cfml,
     'dpt_dmcc_cfml' => $dpt_dmcc_cfml,
     'dpt_finance_cfml' => $dpt_finance_cfml,
     'dpt_informatique_cfml' => $dpt_informatique_cfml,
     'dpt_expl_cfml' => $dpt_expl_cfml,
     'dpt_credit_cfml' => $dpt_credit_cfml,
     'dpt_audit_cfml' => $dpt_audit_cfml,
     'dpt_ci_cfml' => $dpt_ci_cfml,
     'dpt_dg_cfml' => $dpt_dg_cfml,
     'dpt_d_cfml'=> $dpt_d_cfml,
     'dpt_retail_cfml' => $dpt_retail_cfml,
     'dpt_legal_cfml' => $dpt_legal_cfml,
     'dpt_facilitie_cfml' => $dpt_facilitie_cfml,
     'dpt_ops_cfml' => $dpt_ops_cfml,
     'dpt_phoenix_cfml' => $dpt_phoenix_cfml,

     'depart_demission_cfml' => $depart_demission_cfml,
     'depart_negocie_cfml' => $depart_negocie_cfml,
     'depart_fincdd_cfml' => $depart_fincdd_cfml,
     'depart_finstage_cfml' => $depart_finstage_cfml,
     'depart_licenciement_cfml' => $depart_licenciement_cfml,
     'depart_retraite_cfml' => $depart_retraite_cfml,

     'sanction_avert_cfml' => $sanction_avert_cfml,
     'sanction_blame_cfml' => $sanction_blame_cfml,
     'sanction_map_cfml' => $sanction_map_cfml,
     'sanction_licenciement_cfml' => $sanction_licenciement_cfml,

     'dpt_rh_cg' => $dpt_rh_cg,
     'dpt_dmcc_cg' => $dpt_dmcc_cg,
     'dpt_finance_cg' => $dpt_finance_cg,
     'dpt_informatique_cg' => $dpt_informatique_cg,
     'dpt_expl_cg' => $dpt_expl_cg,
     'dpt_credit_cg' => $dpt_credit_cg,
     'dpt_audit_cg' => $dpt_audit_cg,
     'dpt_ci_cg' => $dpt_ci_cg,
     'dpt_dg_cg' => $dpt_dg_cg,
     'dpt_d_cg'=> $dpt_d_cg,
     'dpt_retail_cg' => $dpt_retail_cg,
     'dpt_legal_cg' => $dpt_legal_cg,
     'dpt_facilitie_cg' => $dpt_facilitie_cg,
     'dpt_ops_cg' => $dpt_ops_cg,
     'dpt_phoenix_cg' => $dpt_phoenix_cg,


     'depart_demission_cg' => $depart_demission_cg,
     'depart_negocie_cg' => $depart_negocie_cg,
     'depart_fincdd_cg' => $depart_fincdd_cg,
     'depart_finstage_cg' => $depart_finstage_cg,
     'depart_licenciement_cg' => $depart_licenciement_cg,
     'depart_retraite_cg' => $depart_retraite_cg,

     'sanction_avert_cg' => $sanction_avert_cg,
     'sanction_blame_cg' => $sanction_blame_cg,
     'sanction_map_cg' => $sanction_map_cg,
     'sanction_licenciement_cg' => $sanction_licenciement_cg,

     'dpt_rh_gn' => $dpt_rh_gn,
     'dpt_dmcc_gn' => $dpt_dmcc_gn,
     'dpt_finance_gn' => $dpt_finance_gn,
     'dpt_informatique_gn' => $dpt_informatique_gn,
     'dpt_expl_gn' => $dpt_expl_gn,
     'dpt_credit_gn' => $dpt_credit_gn,
     'dpt_audit_gn' => $dpt_audit_gn,
     'dpt_ci_gn' => $dpt_ci_gn,
     'dpt_dg_gn' => $dpt_dg_gn,
     'dpt_d_gn'=> $dpt_d_gn,
     'dpt_retail_gn' => $dpt_retail_gn,
     'dpt_legal_gn' => $dpt_legal_gn,
     'dpt_facilitie_gn' => $dpt_facilitie_gn,
     'dpt_ops_gn' => $dpt_ops_gn,
     'dpt_phoenix_gn' => $dpt_phoenix_gn,

     'depart_demission_gn' => $depart_demission_gn,
     'depart_negocie_gn' => $depart_negocie_gn,
     'depart_fincdd_gn' => $depart_fincdd_gn,
     'depart_finstage_gn' => $depart_finstage_gn,
     'depart_licenciement_gn' => $depart_licenciement_gn,
     'depart_retraite_gn' => $depart_retraite_gn,

     'sanction_avert_gn' => $sanction_avert_gn,
     'sanction_blame_gn' => $sanction_blame_gn,
     'sanction_map_gn' => $sanction_map_gn,
     'sanction_licenciement_gn' => $sanction_licenciement_gn,

     'dpt_rh_bf' => $dpt_rh_bf,
     'dpt_dmcc_bf' => $dpt_dmcc_bf,
     'dpt_finance_bf' => $dpt_finance_bf,
     'dpt_informatique_bf' => $dpt_informatique_bf,
     'dpt_expl_bf' => $dpt_expl_bf,
     'dpt_credit_bf' => $dpt_credit_bf,
     'dpt_audit_bf' => $dpt_audit_bf,
     'dpt_ci_bf' => $dpt_ci_bf,
     'dpt_dg_bf' => $dpt_dg_bf,
     'dpt_d_bf'=> $dpt_d_bf,
     'dpt_retail_bf' => $dpt_retail_bf,
     'dpt_legal_bf' => $dpt_legal_bf,
     'dpt_facilitie_bf' => $dpt_facilitie_bf,
     'dpt_ops_bf' => $dpt_ops_bf,
     'dpt_phoenix_bf' => $dpt_phoenix_bf,

     'depart_demission_bf' => $depart_demission_bf,
     'depart_negocie_bf' => $depart_negocie_bf,
     'depart_fincdd_bf' => $depart_fincdd_bf,
     'depart_finstage_bf' => $depart_finstage_bf,
     'depart_licenciement_bf' => $depart_licenciement_bf,
     'depart_retraite_bf' => $depart_retraite_bf,

     'sanction_avert_bf' => $sanction_avert_bf,
     'sanction_blame_bf' => $sanction_blame_bf,
     'sanction_map_bf' => $sanction_map_bf,
     'sanction_licenciement_bf' => $sanction_licenciement_bf,

     'dpt_rh_csf' => $dpt_rh_csf,
     'dpt_dmcc_csf' => $dpt_dmcc_csf,
     'dpt_finance_csf' => $dpt_finance_csf,
     'dpt_informatique_csf' => $dpt_informatique_csf,
     'dpt_expl_csf' => $dpt_expl_csf,
     'dpt_credit_csf' => $dpt_credit_csf,
     'dpt_audit_csf' => $dpt_audit_csf,
     'dpt_ci_csf' => $dpt_ci_csf,
     'dpt_dg_csf' => $dpt_dg_csf,
     'dpt_d_csf'=> $dpt_d_csf,
     'dpt_retail_csf' => $dpt_retail_csf,
     'dpt_legal_csf' => $dpt_legal_csf,
     'dpt_facilitie_csf' => $dpt_facilitie_csf,
     'dpt_ops_csf' => $dpt_ops_csf,
     'dpt_phoenix_csf' => $dpt_phoenix_csf,

     'depart_demission_csf' => $depart_demission_csf,
     'depart_negocie_csf' => $depart_negocie_csf,
     'depart_fincdd_csf' => $depart_fincdd_csf,
     'depart_finstage_csf' => $depart_finstage_csf,
     'depart_licenciement_csf' => $depart_licenciement_csf,
     'depart_retraite_csf' => $depart_retraite_csf,

     'sanction_avert_csf' => $sanction_avert_csf,
     'sanction_blame_csf' => $sanction_blame_csf,
     'sanction_map_csf' => $sanction_map_csf,
     'sanction_licenciement_csf' => $sanction_licenciement_csf,

     'dpt_rh_fnl' => $dpt_rh_fnl,
     'dpt_dmcc_fnl' => $dpt_dmcc_fnl,
     'dpt_finance_fnl' => $dpt_finance_fnl,
     'dpt_informatique_fnl' => $dpt_informatique_fnl,
     'dpt_expl_fnl' => $dpt_expl_fnl,
     'dpt_credit_fnl' => $dpt_credit_fnl,
     'dpt_audit_fnl' => $dpt_audit_fnl,
     'dpt_ci_fnl' => $dpt_ci_fnl,
     'dpt_dg_fnl' => $dpt_dg_fnl,
     'dpt_d_fnl'=> $dpt_d_fnl,
     'dpt_retail_fnl' => $dpt_retail_fnl,
     'dpt_legal_fnl' => $dpt_legal_fnl,
     'dpt_facilitie_fnl' => $dpt_facilitie_fnl,
     'dpt_ops_fnl' => $dpt_ops_fnl,
     'dpt_phoenix_fnl' => $dpt_phoenix_fnl,

     'depart_demission_fnl' => $depart_demission_fnl,
     'depart_negocie_fnl' => $depart_negocie_fnl,
     'depart_fincdd_fnl' => $depart_fincdd_fnl,
     'depart_finstage_fnl' => $depart_finstage_fnl,
     'depart_licenciement_fnl' => $depart_licenciement_fnl,
     'depart_retraite_fnl' => $depart_retraite_fnl,

     'sanction_avert_fnl' => $sanction_avert_fnl,
     'sanction_blame_fnl' => $sanction_blame_fnl,
     'sanction_map_fnl' => $sanction_map_fnl,
     'sanction_licenciement_fnl' => $sanction_licenciement_fnl,

     'dpt_rh_cpssn' => $dpt_rh_cpssn,
     'dpt_dmcc_cpssn' => $dpt_dmcc_cpssn,
     'dpt_finance_cpssn' => $dpt_finance_cpssn,
     'dpt_informatique_cpssn' => $dpt_informatique_cpssn,
     'dpt_expl_cpssn' => $dpt_expl_cpssn,
     'dpt_credit_cpssn' => $dpt_credit_cpssn,
     'dpt_audit_cpssn' => $dpt_audit_cpssn,
     'dpt_ci_cpssn' => $dpt_ci_cpssn,
     'dpt_dg_cpssn' => $dpt_dg_cpssn,
     'dpt_d_cpssn'=> $dpt_d_cpssn,
     'dpt_retail_cpssn' => $dpt_retail_cpssn,
     'dpt_legal_cpssn' => $dpt_legal_cpssn,
     'dpt_facilitie_cpssn' => $dpt_facilitie_cpssn,
     'dpt_ops_cpssn' => $dpt_ops_cpssn,
     'dpt_phoenix_cpssn' => $dpt_phoenix_cpssn,

     'depart_demission_cpssn' => $depart_demission_cpssn,
     'depart_negocie_cpssn' => $depart_negocie_cpssn,
     'depart_fincdd_cpssn' => $depart_fincdd_cpssn,
     'depart_finstage_cpssn' => $depart_finstage_cpssn,
     'depart_licenciement_cpssn' => $depart_licenciement_cpssn,
     'depart_retraite_cpssn' => $depart_retraite_cpssn,

     'sanction_avert_cpssn' => $sanction_avert_cpssn,
     'sanction_blame_cpssn' => $sanction_blame_cpssn,
     'sanction_map_cpssn' => $sanction_map_cpssn,
     'sanction_licenciement_cpssn' => $sanction_licenciement_cpssn,

     'dpt_rh_cpsci' => $dpt_rh_cpsci,
     'dpt_dmcc_cpsci' => $dpt_dmcc_cpsci,
     'dpt_finance_cpsci' => $dpt_finance_cpsci,
     'dpt_informatique_cpsci' => $dpt_informatique_cpsci,
     'dpt_expl_cpsci' => $dpt_expl_cpsci,
     'dpt_credit_cpsci' => $dpt_credit_cpsci,
     'dpt_audit_cpsci' => $dpt_audit_cpsci,
     'dpt_ci_cpsci' => $dpt_ci_cpsci,
     'dpt_dg_cpsci' => $dpt_dg_cpsci,
     'dpt_d_cpsci'=> $dpt_d_cpsci,
     'dpt_retail_cpsci' => $dpt_retail_cpsci,
     'dpt_legal_cpsci' => $dpt_legal_cpsci,
     'dpt_facilitie_cpsci' => $dpt_facilitie_cpsci,
     'dpt_ops_cpsci' => $dpt_ops_cpsci,
     'dpt_phoenix_cpsci' => $dpt_phoenix_cpsci,

     'depart_demission_cpsci' => $depart_demission_cpsci,
     'depart_negocie_cpsci' => $depart_negocie_cpsci,
     'depart_fincdd_cpsci' => $depart_fincdd_cpsci,
     'depart_finstage_cpsci' => $depart_finstage_cpsci,
     'depart_licenciement_cpsci' => $depart_licenciement_cpsci,
     'depart_retraite_cpsci' => $depart_retraite_cpsci,

     'sanction_avert_cpsci' => $sanction_avert_cpsci,
     'sanction_blame_cpsci' => $sanction_blame_cpsci,
     'sanction_map_cpsci' => $sanction_map_cpsci,
     'sanction_licenciement_cpsci' => $sanction_licenciement_cpsci,

     'dpt_rh_cpsml' => $dpt_rh_cpsml,
     'dpt_dmcc_cpsml' => $dpt_dmcc_cpsml,
     'dpt_finance_cpsml' => $dpt_finance_cpsml,
     'dpt_informatique_cpsml' => $dpt_informatique_cpsml,
     'dpt_expl_cpsml' => $dpt_expl_cpsml,
     'dpt_credit_cpsml' => $dpt_credit_cpsml,
     'dpt_audit_cpsml' => $dpt_audit_cpsml,
     'dpt_ci_cpsml' => $dpt_ci_cpsml,
     'dpt_dg_cpsml' => $dpt_dg_cpsml,
     'dpt_d_cpsml'=> $dpt_d_cpsml,
     'dpt_retail_cpsml' => $dpt_retail_cpsml,
     'dpt_legal_cpsml' => $dpt_legal_cpsml,
     'dpt_facilitie_cpsml' => $dpt_facilitie_cpsml,
     'dpt_ops_cpsml' => $dpt_ops_cpsml,
     'dpt_phoenix_cpsml' => $dpt_phoenix_cpsml,

     'depart_demission_cpsml' => $depart_demission_cpsml,
     'depart_negocie_cpsml' => $depart_negocie_cpsml,
     'depart_fincdd_cpsml' => $depart_fincdd_cpsml,
     'depart_finstage_cpsml' => $depart_finstage_cpsml,
     'depart_licenciement_cpsml' => $depart_licenciement_cpsml,
     'depart_retraite_cpsml' => $depart_retraite_cpsml,

     'sanction_avert_cpsml' => $sanction_avert_cpsml,
     'sanction_blame_cpsml' => $sanction_blame_cpsml,
     'sanction_map_cpsml' => $sanction_map_cpsml,
     'sanction_licenciement_cpsml' => $sanction_licenciement_cpsml,

     'age_employes'=>$age_employes,
     'age_employes_cac'=>$age_employes_cac,
     'age_employes_cfnsn'=>$age_employes_cfnsn,
     'age_employes_csg'=>$age_employes_csg,
     'age_employes_cfml'=>$age_employes_cfml,
     'age_employes_cg'=>$age_employes_cg,
     'age_employes_gn'=>$age_employes_gn,
     'age_employes_bf'=>$age_employes_bf,
     'age_employes_csf'=>$age_employes_csf,
     'age_employes_fnl'=>$age_employes_fnl,
     'age_employes_cpssn'=>$age_employes_cpssn,
     'age_employes_cpsci'=>$age_employes_cpsci,
     'age_employes_cpsml'=>$age_employes_cpsml,
     'age_employes_tot'=>$age_employes_tot,

]);


   $html = (string) $view;
   $html = $view->render();
   $pdf = new TCPDF();
   PDF::SetTitle('TABLEAU DES INDICATEURS CLES DES FILIALES DU GROUPE COFINA');
   PDF::AddPage('P','A2');
   PDF::SetFont('times', '', 11);
   PDF::Cell(0, 0, 'COFIQUICK', 0, 1, 'C');
   PDF::writeHTML($html, true, false, true, false, '');
   //dd($html);
   PDF::Output(uniqid().'_departement.pdf');

}

//*****************************************************lol* fin***********************


      return view('/analyse/indicateur-new-rapport',['employes' => $employes,'sites' => $sites,'choisir_entite' => $choisir_entite,
      //'resultat_hommes'=>$resultat_hommes,
      //'resultat_femmes'=>$resultat_femmes,
      'hommes' => $hommes,
      //'departements' => $departements,
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

      'employes_cac' => $employes_cac,
      'hommes_cac' => $hommes_cac,
      //'departements_cac' => $departements_cac,
      'femmes_cac' => $femmes_cac,
      'nb_empl_cac' => $nb_empl_cac,
      'nb_cdi_cac' => $nb_cdi_cac,
      'nb_cdd_cac' => $nb_cdd_cac,
      'nb_stage_cac' => $nb_stage_cac,
      'nb_prestation_cac' => $nb_prestation_cac,
      'hommes_cadres_cac' => $hommes_cadres_cac,
      'hommes_noncadres_cac' => $hommes_noncadres_cac,
      'femmes_cadres_cac' => $femmes_cadres_cac,
      'femmes_noncadres_cac' => $femmes_noncadres_cac,

      'employes_cfnsn' => $employes_cfnsn,
      'hommes_cfnsn' => $hommes_cfnsn,
      //'departements_cfnsn' => $departements_cfnsn,
      'femmes_cfnsn' => $femmes_cfnsn,
      'nb_empl_cfnsn' => $nb_empl_cfnsn,
      'nb_cdi_cfnsn' => $nb_cdi_cfnsn,
      'nb_cdd_cfnsn' => $nb_cdd_cfnsn,
      'nb_stage_cfnsn' => $nb_stage_cfnsn,
      'nb_prestation_cfnsn' => $nb_prestation_cfnsn,
      'hommes_cadres_cfnsn' => $hommes_cadres_cfnsn,
      'hommes_noncadres_cfnsn' => $hommes_noncadres_cfnsn,
      'femmes_cadres_cfnsn' => $femmes_cadres_cfnsn,
      'femmes_noncadres_cfnsn' => $femmes_noncadres_cfnsn,

      'employes_csg' => $employes_csg,
      'hommes_csg' => $hommes_csg,
      //'departements_csg' => $departements_csg,
      'femmes_csg' => $femmes_csg,
      'nb_empl_csg' => $nb_empl_csg,
      'nb_cdi_csg' => $nb_cdi_csg,
      'nb_cdd_csg' => $nb_cdd_csg,
      'nb_stage_csg' => $nb_stage_csg,
      'nb_prestation_csg' => $nb_prestation_csg,
      'hommes_cadres_csg' => $hommes_cadres_csg,
      'hommes_noncadres_csg' => $hommes_noncadres_csg,
      'femmes_cadres_csg' => $femmes_cadres_csg,
      'femmes_noncadres_csg' => $femmes_noncadres_csg,

      'employes_cfml' => $employes_cfml,
      'hommes_cfml' => $hommes_cfml,
      //'departements_cfml' => $departements_cfml,
      'femmes_cfml' => $femmes_cfml,
      'nb_empl_cfml' => $nb_empl_cfml,
      'nb_cdi_cfml' => $nb_cdi_cfml,
      'nb_cdd_cfml' => $nb_cdd_cfml,
      'nb_stage_cfml' => $nb_stage_cfml,
      'nb_prestation_cfml' => $nb_prestation_cfml,
      'hommes_cadres_cfml' => $hommes_cadres_cfml,
      'hommes_noncadres_cfml' => $hommes_noncadres_cfml,
      'femmes_cadres_cfml' => $femmes_cadres_cfml,
      'femmes_noncadres_cfml' => $femmes_noncadres_cfml,

      'employes_cg' => $employes_cg,
      'hommes_cg' => $hommes_cg,
      //'departements_cg' => $departements_cg,
      'femmes_cg' => $femmes_cg,
      'nb_empl_cg' => $nb_empl_cg,
      'nb_cdi_cg' => $nb_cdi_cg,
      'nb_cdd_cg' => $nb_cdd_cg,
      'nb_stage_cg' => $nb_stage_cg,
      'nb_prestation_cg' => $nb_prestation_cg,
      'hommes_cadres_cg' => $hommes_cadres_cg,
      'hommes_noncadres_cg' => $hommes_noncadres_cg,
      'femmes_cadres_cg' => $femmes_cadres_cg,
      'femmes_noncadres_cg' => $femmes_noncadres_cg,

      'employes_gn' => $employes_gn,
      'hommes_gn' => $hommes_gn,
      //'departements_gn' => $departements_gn,
      'femmes_gn' => $femmes_gn,
      'nb_empl_gn' => $nb_empl_gn,
      'nb_cdi_gn' => $nb_cdi_gn,
      'nb_cdd_gn' => $nb_cdd_gn,
      'nb_stage_gn' => $nb_stage_gn,
      'nb_prestation_gn' => $nb_prestation_gn,
      'hommes_cadres_gn' => $hommes_cadres_gn,
      'hommes_noncadres_gn' => $hommes_noncadres_gn,
      'femmes_cadres_gn' => $femmes_cadres_gn,
      'femmes_noncadres_gn' => $femmes_noncadres_gn,

      'employes_bf' => $employes_bf,
      'hommes_bf' => $hommes_bf,
      //'departements_bf' => $departements_bf,
      'femmes_bf' => $femmes_bf,
      'nb_empl_bf' => $nb_empl_bf,
      'nb_cdi_bf' => $nb_cdi_bf,
      'nb_cdd_bf' => $nb_cdd_bf,
      'nb_stage_bf' => $nb_stage_bf,
      'nb_prestation_bf' => $nb_prestation_bf,
      'hommes_cadres_bf' => $hommes_cadres_bf,
      'hommes_noncadres_bf' => $hommes_noncadres_bf,
      'femmes_cadres_bf' => $femmes_cadres_bf,
      'femmes_noncadres_bf' => $femmes_noncadres_bf,

      'employes_csf' => $employes_csf,
      'hommes_csf' => $hommes_csf,
      //'departements_csf' => $departements_csf,
      'femmes_csf' => $femmes_csf,
      'nb_empl_csf' => $nb_empl_csf,
      'nb_cdi_csf' => $nb_cdi_csf,
      'nb_cdd_csf' => $nb_cdd_csf,
      'nb_stage_csf' => $nb_stage_csf,
      'nb_prestation_csf' => $nb_prestation_csf,
      'hommes_cadres_csf' => $hommes_cadres_csf,
      'hommes_noncadres_csf' => $hommes_noncadres_csf,
      'femmes_cadres_csf' => $femmes_cadres_csf,
      'femmes_noncadres_csf' => $femmes_noncadres_csf,

      'employes_fnl' => $employes_fnl,
      'hommes_fnl' => $hommes_fnl,
      //'departements_fnl' => $departements_fnl,
      'femmes_fnl' => $femmes_fnl,
      'nb_empl_fnl' => $nb_empl_fnl,
      'nb_cdi_fnl' => $nb_cdi_fnl,
      'nb_cdd_fnl' => $nb_cdd_fnl,
      'nb_stage_fnl' => $nb_stage_fnl,
      'nb_prestation_fnl' => $nb_prestation_fnl,
      'hommes_cadres_fnl' => $hommes_cadres_fnl,
      'hommes_noncadres_fnl' => $hommes_noncadres_fnl,
      'femmes_cadres_fnl' => $femmes_cadres_fnl,
      'femmes_noncadres_fnl' => $femmes_noncadres_fnl,

      'employes_cpssn' => $employes_cpssn,
      'hommes_cpssn' => $hommes_cpssn,
      //'departements_cpssn' => $departements_cpssn,
      'femmes_cpssn' => $femmes_cpssn,
      'nb_empl_cpssn' => $nb_empl_cpssn,
      'nb_cdi_cpssn' => $nb_cdi_cpssn,
      'nb_cdd_cpssn' => $nb_cdd_cpssn,
      'nb_stage_cpssn' => $nb_stage_cpssn,
      'nb_prestation_cpssn' => $nb_prestation_cpssn,
      'hommes_cadres_cpssn' => $hommes_cadres_cpssn,
      'hommes_noncadres_cpssn' => $hommes_noncadres_cpssn,
      'femmes_cadres_cpssn' => $femmes_cadres_cpssn,
      'femmes_noncadres_cpssn' => $femmes_noncadres_cpssn,

      'employes_cpsci' => $employes_cpsci,
      'hommes_cpsci' => $hommes_cpsci,
      //'departements_cpsci' => $departements_cpsci,
      'femmes_cpsci' => $femmes_cpsci,
      'nb_empl_cpsci' => $nb_empl_cpsci,
      'nb_cdi_cpsci' => $nb_cdi_cpsci,
      'nb_cdd_cpsci' => $nb_cdd_cpsci,
      'nb_stage_cpsci' => $nb_stage_cpsci,
      'nb_prestation_cpsci' => $nb_prestation_cpsci,
      'hommes_cadres_cpsci' => $hommes_cadres_cpsci,
      'hommes_noncadres_cpsci' => $hommes_noncadres_cpsci,
      'femmes_cadres_cpsci' => $femmes_cadres_cpsci,
      'femmes_noncadres_cpsci' => $femmes_noncadres_cpsci,

      'employes_cpsml' => $employes_cpsml,
      'hommes_cpsml' => $hommes_cpsml,
      //'departements_cpsml' => $departements_cpsml,
      'femmes_cpsml' => $femmes_cpsml,
      'nb_empl_cpsml' => $nb_empl_cpsml,
      'nb_cdi_cpsml' => $nb_cdi_cpsml,
      'nb_cdd_cpsml' => $nb_cdd_cpsml,
      'nb_stage_cpsml' => $nb_stage_cpsml,
      'nb_prestation_cpsml' => $nb_prestation_cpsml,
      'hommes_cadres_cpsml' => $hommes_cadres_cpsml,
      'hommes_noncadres_cpsml' => $hommes_noncadres_cpsml,
      'femmes_cadres_cpsml' => $femmes_cadres_cpsml,
      'femmes_noncadres_cpsml' => $femmes_noncadres_cpsml,

      'employes_tot' => $employes_tot,
      'hommes_tot' => $hommes_tot,
      //'departements_tot' => $departements_tot,
      'femmes_tot' => $femmes_tot,
      'nb_empl_tot' => $nb_empl_tot,
      'nb_cdi_tot' => $nb_cdi_tot,
      'nb_cdd_tot' => $nb_cdd_tot,
      'nb_stage_tot' => $nb_stage_tot,
      'nb_prestation_tot' => $nb_prestation_tot,
      'hommes_cadres_tot' => $hommes_cadres_tot,
      'hommes_noncadres_tot' => $hommes_noncadres_tot,
      'femmes_cadres_tot' => $femmes_cadres_tot,
      'femmes_noncadres_tot' => $femmes_noncadres_tot,


      'depart_demission' => $depart_demission,
      'depart_negocie' => $depart_negocie,
      'depart_fincdd' => $depart_fincdd,
      'depart_finstage' => $depart_finstage,
      'depart_licenciement' => $depart_licenciement,
      'depart_retraite' => $depart_retraite,

      'sanction_avert' => $sanction_avert,
      'sanction_blame' => $sanction_blame,
      'sanction_map' => $sanction_map,
      'sanction_licenciement' => $sanction_licenciement,

      'dpt_rh' => $dpt_rh,
      'dpt_dmcc' => $dpt_dmcc,
      'dpt_finance' => $dpt_finance,
      'dpt_informatique' => $dpt_informatique,
      'dpt_expl' => $dpt_expl,
      'dpt_credit' => $dpt_credit,
      'dpt_audit' => $dpt_audit,
      'dpt_ci' => $dpt_ci,
      'dpt_dg' => $dpt_dg,
      'dpt_d'=> $dpt_d,
      'dpt_retail' => $dpt_retail,
      'dpt_legal' => $dpt_legal,
      'dpt_facilitie' => $dpt_facilitie,
      'dpt_ops' => $dpt_ops,
      'dpt_phoenix' => $dpt_phoenix,

      'dpt_rh_tot' => $dpt_rh_tot,
      'dpt_dmcc_tot' => $dpt_dmcc_tot,
      'dpt_finance_tot' => $dpt_finance_tot,
      'dpt_informatique_tot' => $dpt_informatique_tot,
      'dpt_expl_tot' => $dpt_expl_tot,
      'dpt_credit_tot' => $dpt_credit_tot,
      'dpt_audit_tot' => $dpt_audit_tot,
      'dpt_ci_tot' => $dpt_ci_tot,
      'dpt_dg_tot' => $dpt_dg_tot,
      'dpt_d_tot'=> $dpt_d_tot,
      'dpt_retail_tot' => $dpt_retail_tot,
      'dpt_legal_tot' => $dpt_legal_tot,
      'dpt_facilitie_tot' => $dpt_facilitie_tot,
      'dpt_ops_tot' => $dpt_ops_tot,
      'dpt_phoenix_tot' => $dpt_phoenix_tot,

      'depart_demission_tot' => $depart_demission_tot,
      'depart_negocie_tot' => $depart_negocie_tot,
      'depart_fincdd_tot' => $depart_fincdd_tot,
      'depart_finstage_tot' => $depart_finstage_tot,
      'depart_licenciement_tot' => $depart_licenciement_tot,
      'depart_retraite_tot' => $depart_retraite_tot,

      'sanction_avert_tot' => $sanction_avert_tot,
      'sanction_blame_tot' => $sanction_blame_tot,
      'sanction_map_tot' => $sanction_map_tot,
      'sanction_licenciement_tot' => $sanction_licenciement_tot,

      'dpt_rh_cac' => $dpt_rh_cac,
      'dpt_dmcc_cac' => $dpt_dmcc_cac,
      'dpt_finance_cac' => $dpt_finance_cac,
      'dpt_informatique_cac' => $dpt_informatique_cac,
      'dpt_expl_cac' => $dpt_expl_cac,
      'dpt_credit_cac' => $dpt_credit_cac,
      'dpt_audit_cac' => $dpt_audit_cac,
      'dpt_ci_cac' => $dpt_ci_cac,
      'dpt_dg_cac' => $dpt_dg_cac,
      'dpt_d_cac'=> $dpt_d_cac,
      'dpt_retail_cac' => $dpt_retail_cac,
      'dpt_legal_cac' => $dpt_legal_cac,
      'dpt_facilitie_cac' => $dpt_facilitie_cac,
      'dpt_ops_cac' => $dpt_ops_cac,
      'dpt_phoenix_cac' => $dpt_phoenix_cac,


      'depart_demission_cac' => $depart_demission_cac,
      'depart_negocie_cac' => $depart_negocie_cac,
      'depart_fincdd_cac' => $depart_fincdd_cac,
      'depart_finstage_cac' => $depart_finstage_cac,
      'depart_licenciement_cac' => $depart_licenciement_cac,
      'depart_retraite_cac' => $depart_retraite_cac,

      'sanction_avert_cac' => $sanction_avert_cac,
      'sanction_blame_cac' => $sanction_blame_cac,
      'sanction_map_cac' => $sanction_map_cac,
      'sanction_licenciement_cac' => $sanction_licenciement_cac,

      'dpt_rh_cfnsn' => $dpt_rh_cfnsn,
      'dpt_dmcc_cfnsn' => $dpt_dmcc_cfnsn,
      'dpt_finance_cfnsn' => $dpt_finance_cfnsn,
      'dpt_informatique_cfnsn' => $dpt_informatique_cfnsn,
      'dpt_expl_cfnsn' => $dpt_expl_cfnsn,
      'dpt_credit_cfnsn' => $dpt_credit_cfnsn,
      'dpt_audit_cfnsn' => $dpt_audit_cfnsn,
      'dpt_ci_cfnsn' => $dpt_ci_cfnsn,
      'dpt_dg_cfnsn' => $dpt_dg_cfnsn,
      'dpt_d_cfnsn'=> $dpt_d_cfnsn,
      'dpt_retail_cfnsn' => $dpt_retail_cfnsn,
      'dpt_legal_cfnsn' => $dpt_legal_cfnsn,
      'dpt_facilitie_cfnsn' => $dpt_facilitie_cfnsn,
      'dpt_ops_cfnsn' => $dpt_ops_cfnsn,
      'dpt_phoenix_cfnsn' => $dpt_phoenix_cfnsn,

      'depart_demission_cfnsn' => $depart_demission_cfnsn,
      'depart_negocie_cfnsn' => $depart_negocie_cfnsn,
      'depart_fincdd_cfnsn' => $depart_fincdd_cfnsn,
      'depart_finstage_cfnsn' => $depart_finstage_cfnsn,
      'depart_licenciement_cfnsn' => $depart_licenciement_cfnsn,
      'depart_retraite_cfnsn' => $depart_retraite_cfnsn,

      'sanction_avert_cfnsn' => $sanction_avert_cfnsn,
      'sanction_blame_cfnsn' => $sanction_blame_cfnsn,
      'sanction_map_cfnsn' => $sanction_map_cfnsn,
      'sanction_licenciement_cfnsn' => $sanction_licenciement_cfnsn,

      'dpt_rh_csg' => $dpt_rh_csg,
      'dpt_dmcc_csg' => $dpt_dmcc_csg,
      'dpt_finance_csg' => $dpt_finance_csg,
      'dpt_informatique_csg' => $dpt_informatique_csg,
      'dpt_expl_csg' => $dpt_expl_csg,
      'dpt_credit_csg' => $dpt_credit_csg,
      'dpt_audit_csg' => $dpt_audit_csg,
      'dpt_ci_csg' => $dpt_ci_csg,
      'dpt_dg_csg' => $dpt_dg_csg,
      'dpt_d_csg'=> $dpt_d_csg,
      'dpt_retail_csg' => $dpt_retail_csg,
      'dpt_legal_csg' => $dpt_legal_csg,
      'dpt_facilitie_csg' => $dpt_facilitie_csg,
      'dpt_ops_csg' => $dpt_ops_csg,
      'dpt_phoenix_csg' => $dpt_phoenix_csg,


      'depart_demission_csg' => $depart_demission_csg,
      'depart_negocie_csg' => $depart_negocie_csg,
      'depart_fincdd_csg' => $depart_fincdd_csg,
      'depart_finstage_csg' => $depart_finstage_csg,
      'depart_licenciement_csg' => $depart_licenciement_csg,
      'depart_retraite_csg' => $depart_retraite_csg,

      'sanction_avert_csg' => $sanction_avert_csg,
      'sanction_blame_csg' => $sanction_blame_csg,
      'sanction_map_csg' => $sanction_map_csg,
      'sanction_licenciement_csg' => $sanction_licenciement_csg,

      'dpt_rh_cfml' => $dpt_rh_cfml,
      'dpt_dmcc_cfml' => $dpt_dmcc_cfml,
      'dpt_finance_cfml' => $dpt_finance_cfml,
      'dpt_informatique_cfml' => $dpt_informatique_cfml,
      'dpt_expl_cfml' => $dpt_expl_cfml,
      'dpt_credit_cfml' => $dpt_credit_cfml,
      'dpt_audit_cfml' => $dpt_audit_cfml,
      'dpt_ci_cfml' => $dpt_ci_cfml,
      'dpt_dg_cfml' => $dpt_dg_cfml,
      'dpt_d_cfml'=> $dpt_d_cfml,
      'dpt_retail_cfml' => $dpt_retail_cfml,
      'dpt_legal_cfml' => $dpt_legal_cfml,
      'dpt_facilitie_cfml' => $dpt_facilitie_cfml,
      'dpt_ops_cfml' => $dpt_ops_cfml,
      'dpt_phoenix_cfml' => $dpt_phoenix_cfml,

      'depart_demission_cfml' => $depart_demission_cfml,
      'depart_negocie_cfml' => $depart_negocie_cfml,
      'depart_fincdd_cfml' => $depart_fincdd_cfml,
      'depart_finstage_cfml' => $depart_finstage_cfml,
      'depart_licenciement_cfml' => $depart_licenciement_cfml,
      'depart_retraite_cfml' => $depart_retraite_cfml,

      'sanction_avert_cfml' => $sanction_avert_cfml,
      'sanction_blame_cfml' => $sanction_blame_cfml,
      'sanction_map_cfml' => $sanction_map_cfml,
      'sanction_licenciement_cfml' => $sanction_licenciement_cfml,

      'dpt_rh_cg' => $dpt_rh_cg,
      'dpt_dmcc_cg' => $dpt_dmcc_cg,
      'dpt_finance_cg' => $dpt_finance_cg,
      'dpt_informatique_cg' => $dpt_informatique_cg,
      'dpt_expl_cg' => $dpt_expl_cg,
      'dpt_credit_cg' => $dpt_credit_cg,
      'dpt_audit_cg' => $dpt_audit_cg,
      'dpt_ci_cg' => $dpt_ci_cg,
      'dpt_dg_cg' => $dpt_dg_cg,
      'dpt_d_cg'=> $dpt_d_cg,
      'dpt_retail_cg' => $dpt_retail_cg,
      'dpt_legal_cg' => $dpt_legal_cg,
      'dpt_facilitie_cg' => $dpt_facilitie_cg,
      'dpt_ops_cg' => $dpt_ops_cg,
      'dpt_phoenix_cg' => $dpt_phoenix_cg,


      'depart_demission_cg' => $depart_demission_cg,
      'depart_negocie_cg' => $depart_negocie_cg,
      'depart_fincdd_cg' => $depart_fincdd_cg,
      'depart_finstage_cg' => $depart_finstage_cg,
      'depart_licenciement_cg' => $depart_licenciement_cg,
      'depart_retraite_cg' => $depart_retraite_cg,

      'sanction_avert_cg' => $sanction_avert_cg,
      'sanction_blame_cg' => $sanction_blame_cg,
      'sanction_map_cg' => $sanction_map_cg,
      'sanction_licenciement_cg' => $sanction_licenciement_cg,

      'dpt_rh_gn' => $dpt_rh_gn,
      'dpt_dmcc_gn' => $dpt_dmcc_gn,
      'dpt_finance_gn' => $dpt_finance_gn,
      'dpt_informatique_gn' => $dpt_informatique_gn,
      'dpt_expl_gn' => $dpt_expl_gn,
      'dpt_credit_gn' => $dpt_credit_gn,
      'dpt_audit_gn' => $dpt_audit_gn,
      'dpt_ci_gn' => $dpt_ci_gn,
      'dpt_dg_gn' => $dpt_dg_gn,
      'dpt_d_gn'=> $dpt_d_gn,
      'dpt_retail_gn' => $dpt_retail_gn,
      'dpt_legal_gn' => $dpt_legal_gn,
      'dpt_facilitie_gn' => $dpt_facilitie_gn,
      'dpt_ops_gn' => $dpt_ops_gn,
      'dpt_phoenix_gn' => $dpt_phoenix_gn,

      'depart_demission_gn' => $depart_demission_gn,
      'depart_negocie_gn' => $depart_negocie_gn,
      'depart_fincdd_gn' => $depart_fincdd_gn,
      'depart_finstage_gn' => $depart_finstage_gn,
      'depart_licenciement_gn' => $depart_licenciement_gn,
      'depart_retraite_gn' => $depart_retraite_gn,

      'sanction_avert_gn' => $sanction_avert_gn,
      'sanction_blame_gn' => $sanction_blame_gn,
      'sanction_map_gn' => $sanction_map_gn,
      'sanction_licenciement_gn' => $sanction_licenciement_gn,

      'dpt_rh_bf' => $dpt_rh_bf,
      'dpt_dmcc_bf' => $dpt_dmcc_bf,
      'dpt_finance_bf' => $dpt_finance_bf,
      'dpt_informatique_bf' => $dpt_informatique_bf,
      'dpt_expl_bf' => $dpt_expl_bf,
      'dpt_credit_bf' => $dpt_credit_bf,
      'dpt_audit_bf' => $dpt_audit_bf,
      'dpt_ci_bf' => $dpt_ci_bf,
      'dpt_dg_bf' => $dpt_dg_bf,
      'dpt_d_bf'=> $dpt_d_bf,
      'dpt_retail_bf' => $dpt_retail_bf,
      'dpt_legal_bf' => $dpt_legal_bf,
      'dpt_facilitie_bf' => $dpt_facilitie_bf,
      'dpt_ops_bf' => $dpt_ops_bf,
      'dpt_phoenix_bf' => $dpt_phoenix_bf,

      'depart_demission_bf' => $depart_demission_bf,
      'depart_negocie_bf' => $depart_negocie_bf,
      'depart_fincdd_bf' => $depart_fincdd_bf,
      'depart_finstage_bf' => $depart_finstage_bf,
      'depart_licenciement_bf' => $depart_licenciement_bf,
      'depart_retraite_bf' => $depart_retraite_bf,

      'sanction_avert_bf' => $sanction_avert_bf,
      'sanction_blame_bf' => $sanction_blame_bf,
      'sanction_map_bf' => $sanction_map_bf,
      'sanction_licenciement_bf' => $sanction_licenciement_bf,

      'dpt_rh_csf' => $dpt_rh_csf,
      'dpt_dmcc_csf' => $dpt_dmcc_csf,
      'dpt_finance_csf' => $dpt_finance_csf,
      'dpt_informatique_csf' => $dpt_informatique_csf,
      'dpt_expl_csf' => $dpt_expl_csf,
      'dpt_credit_csf' => $dpt_credit_csf,
      'dpt_audit_csf' => $dpt_audit_csf,
      'dpt_ci_csf' => $dpt_ci_csf,
      'dpt_dg_csf' => $dpt_dg_csf,
      'dpt_d_csf'=> $dpt_d_csf,
      'dpt_retail_csf' => $dpt_retail_csf,
      'dpt_legal_csf' => $dpt_legal_csf,
      'dpt_facilitie_csf' => $dpt_facilitie_csf,
      'dpt_ops_csf' => $dpt_ops_csf,
      'dpt_phoenix_csf' => $dpt_phoenix_csf,

      'depart_demission_csf' => $depart_demission_csf,
      'depart_negocie_csf' => $depart_negocie_csf,
      'depart_fincdd_csf' => $depart_fincdd_csf,
      'depart_finstage_csf' => $depart_finstage_csf,
      'depart_licenciement_csf' => $depart_licenciement_csf,
      'depart_retraite_csf' => $depart_retraite_csf,

      'sanction_avert_csf' => $sanction_avert_csf,
      'sanction_blame_csf' => $sanction_blame_csf,
      'sanction_map_csf' => $sanction_map_csf,
      'sanction_licenciement_csf' => $sanction_licenciement_csf,

      'dpt_rh_fnl' => $dpt_rh_fnl,
      'dpt_dmcc_fnl' => $dpt_dmcc_fnl,
      'dpt_finance_fnl' => $dpt_finance_fnl,
      'dpt_informatique_fnl' => $dpt_informatique_fnl,
      'dpt_expl_fnl' => $dpt_expl_fnl,
      'dpt_credit_fnl' => $dpt_credit_fnl,
      'dpt_audit_fnl' => $dpt_audit_fnl,
      'dpt_ci_fnl' => $dpt_ci_fnl,
      'dpt_dg_fnl' => $dpt_dg_fnl,
      'dpt_d_fnl'=> $dpt_d_fnl,
      'dpt_retail_fnl' => $dpt_retail_fnl,
      'dpt_legal_fnl' => $dpt_legal_fnl,
      'dpt_facilitie_fnl' => $dpt_facilitie_fnl,
      'dpt_ops_fnl' => $dpt_ops_fnl,
      'dpt_phoenix_fnl' => $dpt_phoenix_fnl,

      'depart_demission_fnl' => $depart_demission_fnl,
      'depart_negocie_fnl' => $depart_negocie_fnl,
      'depart_fincdd_fnl' => $depart_fincdd_fnl,
      'depart_finstage_fnl' => $depart_finstage_fnl,
      'depart_licenciement_fnl' => $depart_licenciement_fnl,
      'depart_retraite_fnl' => $depart_retraite_fnl,

      'sanction_avert_fnl' => $sanction_avert_fnl,
      'sanction_blame_fnl' => $sanction_blame_fnl,
      'sanction_map_fnl' => $sanction_map_fnl,
      'sanction_licenciement_fnl' => $sanction_licenciement_fnl,

      'dpt_rh_cpssn' => $dpt_rh_cpssn,
      'dpt_dmcc_cpssn' => $dpt_dmcc_cpssn,
      'dpt_finance_cpssn' => $dpt_finance_cpssn,
      'dpt_informatique_cpssn' => $dpt_informatique_cpssn,
      'dpt_expl_cpssn' => $dpt_expl_cpssn,
      'dpt_credit_cpssn' => $dpt_credit_cpssn,
      'dpt_audit_cpssn' => $dpt_audit_cpssn,
      'dpt_ci_cpssn' => $dpt_ci_cpssn,
      'dpt_dg_cpssn' => $dpt_dg_cpssn,
      'dpt_d_cpssn'=> $dpt_d_cpssn,
      'dpt_retail_cpssn' => $dpt_retail_cpssn,
      'dpt_legal_cpssn' => $dpt_legal_cpssn,
      'dpt_facilitie_cpssn' => $dpt_facilitie_cpssn,
      'dpt_ops_cpssn' => $dpt_ops_cpssn,
      'dpt_phoenix_cpssn' => $dpt_phoenix_cpssn,

      'depart_demission_cpssn' => $depart_demission_cpssn,
      'depart_negocie_cpssn' => $depart_negocie_cpssn,
      'depart_fincdd_cpssn' => $depart_fincdd_cpssn,
      'depart_finstage_cpssn' => $depart_finstage_cpssn,
      'depart_licenciement_cpssn' => $depart_licenciement_cpssn,
      'depart_retraite_cpssn' => $depart_retraite_cpssn,

      'sanction_avert_cpssn' => $sanction_avert_cpssn,
      'sanction_blame_cpssn' => $sanction_blame_cpssn,
      'sanction_map_cpssn' => $sanction_map_cpssn,
      'sanction_licenciement_cpssn' => $sanction_licenciement_cpssn,

      'dpt_rh_cpsci' => $dpt_rh_cpsci,
      'dpt_dmcc_cpsci' => $dpt_dmcc_cpsci,
      'dpt_finance_cpsci' => $dpt_finance_cpsci,
      'dpt_informatique_cpsci' => $dpt_informatique_cpsci,
      'dpt_expl_cpsci' => $dpt_expl_cpsci,
      'dpt_credit_cpsci' => $dpt_credit_cpsci,
      'dpt_audit_cpsci' => $dpt_audit_cpsci,
      'dpt_ci_cpsci' => $dpt_ci_cpsci,
      'dpt_dg_cpsci' => $dpt_dg_cpsci,
      'dpt_d_cpsci'=> $dpt_d_cpsci,
      'dpt_retail_cpsci' => $dpt_retail_cpsci,
      'dpt_legal_cpsci' => $dpt_legal_cpsci,
      'dpt_facilitie_cpsci' => $dpt_facilitie_cpsci,
      'dpt_ops_cpsci' => $dpt_ops_cpsci,
      'dpt_phoenix_cpsci' => $dpt_phoenix_cpsci,

      'depart_demission_cpsci' => $depart_demission_cpsci,
      'depart_negocie_cpsci' => $depart_negocie_cpsci,
      'depart_fincdd_cpsci' => $depart_fincdd_cpsci,
      'depart_finstage_cpsci' => $depart_finstage_cpsci,
      'depart_licenciement_cpsci' => $depart_licenciement_cpsci,
      'depart_retraite_cpsci' => $depart_retraite_cpsci,

      'sanction_avert_cpsci' => $sanction_avert_cpsci,
      'sanction_blame_cpsci' => $sanction_blame_cpsci,
      'sanction_map_cpsci' => $sanction_map_cpsci,
      'sanction_licenciement_cpsci' => $sanction_licenciement_cpsci,

      'dpt_rh_cpsml' => $dpt_rh_cpsml,
      'dpt_dmcc_cpsml' => $dpt_dmcc_cpsml,
      'dpt_finance_cpsml' => $dpt_finance_cpsml,
      'dpt_informatique_cpsml' => $dpt_informatique_cpsml,
      'dpt_expl_cpsml' => $dpt_expl_cpsml,
      'dpt_credit_cpsml' => $dpt_credit_cpsml,
      'dpt_audit_cpsml' => $dpt_audit_cpsml,
      'dpt_ci_cpsml' => $dpt_ci_cpsml,
      'dpt_dg_cpsml' => $dpt_dg_cpsml,
      'dpt_d_cpsml'=> $dpt_d_cpsml,
      'dpt_retail_cpsml' => $dpt_retail_cpsml,
      'dpt_legal_cpsml' => $dpt_legal_cpsml,
      'dpt_facilitie_cpsml' => $dpt_facilitie_cpsml,
      'dpt_ops_cpsml' => $dpt_ops_cpsml,
      'dpt_phoenix_cpsml' => $dpt_phoenix_cpsml,

      'depart_demission_cpsml' => $depart_demission_cpsml,
      'depart_negocie_cpsml' => $depart_negocie_cpsml,
      'depart_fincdd_cpsml' => $depart_fincdd_cpsml,
      'depart_finstage_cpsml' => $depart_finstage_cpsml,
      'depart_licenciement_cpsml' => $depart_licenciement_cpsml,
      'depart_retraite_cpsml' => $depart_retraite_cpsml,

      'sanction_avert_cpsml' => $sanction_avert_cpsml,
      'sanction_blame_cpsml' => $sanction_blame_cpsml,
      'sanction_map_cpsml' => $sanction_map_cpsml,
      'sanction_licenciement_cpsml' => $sanction_licenciement_cpsml,

      'age_employes'=>$age_employes,
      'age_employes_cac'=>$age_employes_cac,
      'age_employes_cfnsn'=>$age_employes_cfnsn,
      'age_employes_csg'=>$age_employes_csg,
      'age_employes_cfml'=>$age_employes_cfml,
      'age_employes_cg'=>$age_employes_cg,
      'age_employes_gn'=>$age_employes_gn,
      'age_employes_bf'=>$age_employes_bf,
      'age_employes_csf'=>$age_employes_csf,
      'age_employes_fnl'=>$age_employes_fnl,
      'age_employes_cpssn'=>$age_employes_cpssn,
      'age_employes_cpsci'=>$age_employes_cpsci,
      'age_employes_cpsml'=>$age_employes_cpsml,
      'age_employes_tot'=>$age_employes_tot,
 ]);
  }


}
