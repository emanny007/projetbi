<?php
namespace App\Exports;
namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;

//require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use Illuminate\Http\Request;
//use App\Http\Controllers\Auth\Request;
use App\Site;
use App\Employe;
use DB;

use App\Contrat;
use App\Formation;
use App\Departement;
use App\Groupe;
use App\Etablissement;


//use Excel;



class ReportingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

      $employes=Employe::all();
      $etablissements=Etablissement::all();
      $departements= Departement::all();
      $formations= Formation::all();
       //$sites= Site::all();
                  $sites= Site::where('pays','<>','NULL')->get();
                  $type_filtre=$request->get('type_filtre');
                  $date_debut=$request->get('date_debut');
                  $date_fin=$request->get('date_fin');
                  $nationnalite=$request->get('nationnalite');
                  $entite=$request->get('entite');
                  $sexe=$request->get('sexe');
                  $situation_matrimoniale=$request->get('situation_matrimoniale');
                  $departement=$request->get('departement');
                  $secteur=$request->get('secteur');
                  $type_contrat=$request->get('type_contrat');
                  $categorie=$request->get('categorie');
                  $statut=$request->get('statut');
                  $pays=$request->get('pays');
                  $niveau_etude=$request->get('niveau_etude');
                  $experience=$request->get('experience');
                  $etablissement=$request->get('etablissement');
                  $conge=$request->get('conge');
                  $age=$request->get('age');

                  $boutton_exporter=$request->get('exporter');
                  $boutton_preview=$request->get('preview');

//dd($boutton_exporter);
//$query ="select * from employes emp, contrats c where emp.id=c.employe_id and emp.departement='$departement' and emp.nationnalite='$nationnalite' and emp.entite='$entite' and emp.sexe='$sexe' and emp.categorie = '$categorie' and emp.secteur = '$secteur' and c.type_contrat='$type_contrat'";
//$query ="select * from employes emp, contrats c where emp.id=c.employe_id";

$tablesFromStament = 'employes emp, contrats c';
$joinTable = "and 1=1 ";
$colonneTable="";
/*
if(!empty($tab) ){
  $tablesFromStament .= ",".$tab." ";
	$query=$query.' '."and emp.statut ='$statut'";
if($tab == 'pays')
{
  $jointable .= "and pays.id=employes.pays_id";
}
}
*/

if(!empty($niveau_etude) || !empty($experience) ){

  $tablesFromStament=$tablesFromStament.','.'experiences exp';

  $majointure=" and emp.id=exp.employe_id";

  $joinTable =$joinTable.''.$majointure;

  $colonneTable2=",entreprise as ENTREPRISE,poste as POSTE,niveau_etude as NIVEAU_D_ETUDE,nbre_annee_exp as ANNEE_EXPERIENCE";

  $colonneTable =$colonneTable." ".$colonneTable2;
	//$query=$query.' '."and emp.statut ='$statut'";
}

if(!empty($etablissement)){

  $tablesFromStament=$tablesFromStament.','.'formations f';

  $majointure=" and emp.id=f.employe_id";

  $joinTable =$joinTable." ".$majointure;

  $colonneTable1=",f.libelle as INTITULE_FORMATION,f.nbre_heure as ETABLISSEMENT,f.cout as COUT";

  $colonneTable =$colonneTable." ".$colonneTable1;
	//$query=$query.' '."and emp.statut ='$statut'";
}

if(!empty($conge)){

  $tablesFromStament=$tablesFromStament.','.'conges cg';

  $majointure=" and emp.id=cg.employe_id";

  $joinTable =$joinTable." ".$majointure;

  $colonneTable3=",cg.date_demande as DEMANDE_CONGE,cg.type_conge as TYPE_CONGE,cg.date_depart as DEPART_CONGE,cg.date_retour as RETOUR_CONGE,cg.commentaire as COMMENTAIRE";

  $colonneTable =$colonneTable." ".$colonneTable3;
	//$query=$query.' '."and emp.statut ='$statut'";
}




if($type_filtre=="Liste")
{
  $query ="select distinct emp.id as IDENTIFIANT,matricule as MATRICULE,numero_sss AS NUM_SECU_SOCIAL,nom as NOM,prenom as PRENOMS,email as EMAIL_PROFFESSIONNEL,date_naissance as DATE_NAISSANCE,mail_perso as MAIL_PERSONNEL,tel_pro as TEL_PROFESSIONNEL,tel_perso as TEL_PERSONNEL,contact_urgent as CONTACT_URGENT,entite as ENTITE,pays as PAYS,sexe as SEXE,civilite as CIVILITE,situation_matrimoniale as SITUATION_MATRIMONIALE,nbre_enfant as NBRE_ENFANT,nationnalite as NATIONNALITE,origine as ORIGINE,secteur as SECTEUR,categorie AS CATEGORIE, departement as DEPARTEMENT, pays AS PAYS,type_contrat as TYPE_DE_CONTRAT,c.date_debut as DEBUT_CONTRAT,c.date_fin as FIN_CONTRAT $colonneTable from $tablesFromStament where emp.id=c.employe_id $joinTable";

}else{

  $query ="select count(emp.id) as NBRE_EMPLOYE $colonneTable from $tablesFromStament where emp.id=c.employe_id $joinTable";

}


if(!empty($date_debut)||!empty($date_fin)){

$reqt="and c.date_debut BETWEEN '$date_debut' and '$date_fin'";

$query=$query.''.$reqt;

}

//dd($query);

/*
if(isset($nationnalite) && trim($nationnalite)!="" ){

	$query=$query.' '."and emp.nationnalite ='$nationnalite'";
}*/



if(isset($conge) && trim($conge)!="" ){

	$query=$query.' '."and cg.type_conge ='$conge'";
  //dd($query);
}


if(isset($etablissement) && trim($etablissement)!="" ){

	$query=$query.' '."and f.nbre_heure ='$etablissement'";
  //dd($query);
}

if(isset($experience) && trim($experience)!="" ){

	$query=$query.' '."and exp.nbre_annee_exp ='$experience'";

}

if(isset($niveau_etude) && trim($niveau_etude)!="" ){

	$query=$query.' '."and exp.niveau_etude ='$niveau_etude'";
  //dd($query);
}


if(isset($statut) && trim($statut)!="" ){

	$query=$query.' '."and emp.statut ='$statut'";
}
if(isset($pays) && trim($pays)!="" ){

	$query=$query.' '."and emp.pays ='$pays'";
}
if(isset($nationnalite) && trim($nationnalite)!="" ){

	$query=$query.' '."and emp.nationnalite ='$nationnalite'";
}
if(isset($departement) && trim($departement)!="" ){

	$query=$query.' '."and emp.departement='$departement'";
}
if(isset($entite) && trim($entite)!="" ){

	$query=$query.' '."and emp.entite='$entite'";
}
if(isset($sexe) && trim($sexe)!="" ){

	$query=$query.' '."and emp.sexe='$sexe'";
}
if(isset($age) && trim($age)!="" ){

	$query=$query.' '."and emp.age='$age'";
}
if(isset($categorie) && trim($categorie)!="" ){

	$query=$query.' '." and emp.categorie = '$categorie'";
}
if(isset($secteur) && trim($secteur)!="" ){

	$query=$query.' '."and emp.secteur = '$secteur'";
}
if(isset($type_contrat) && trim($type_contrat)!="" ){

	$query=$query.' '."and c.type_contrat='$type_contrat'";
}

$query=DB::select($query);

$preview=$query;

//dd($preview);

if($boutton_exporter=="Exporter") {

$query= (array) $query;
//dd(array_keys($query));

$spreadsheet = new Spreadsheet();
//$sheet = $spreadsheet->getActiveSheet();
//$sheet->setCellValue('A1',array_keys($query));
if(isset($query[0])) {

$rowArray = array_keys((array) $query[0]);

$spreadsheet->getActiveSheet()
    ->fromArray(
        $rowArray,   // The data to set
        NULL,           // Array values with this value will not be set
        'A1'            // Top left coordinate of the worksheet range where
                        //    we want to set these values (default is A1)
    );
  }
    $i=2;
foreach ($query as $key) {
$rowArray = (array) $key;
  $spreadsheet->getActiveSheet()
      ->fromArray(
          $rowArray,   // The data to set
          NULL,           // Array values with this value will not be set
          'A'.$i            // Top left coordinate of the worksheet range where
                          //    we want to set these values (default is A1)
      );
        $i++;
}
      //dd($query);
       $writer = new Xlsx($spreadsheet);

       // redirect output to client browser
       header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
       header('Content-Disposition: attachment;filename="cofiquick-reporting.xlsx"');
       header('Cache-Control: max-age=0');

       $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
       $writer->save('php://output');
      // $writer->save('hello wores.xlsx');
}

        return view('reportings/index',['nationnalite' => $nationnalite,'preview' => $preview,'sites' => $sites,'departements' => $departements,'employes' => $employes,'etablissements' => $etablissements,'formations' => $formations]);
    }




       public function export(Request $request)
       {

        $employes=Employe::all();
        $etablissements=Etablissement::all();
        $departements= Departement::all();
        $formations= Formation::where('nbre_heure','<>','')->get();
          //$sites= Site::all();
          $sites= Site::where('entite','<>','')->get();
          $nationnalites= Site::where('nationnalite','<>','NULL')->get();

//dd($nationnalites);
         return view('reportings/index',[
         'sites' => $sites,
         'nationnalites' => $nationnalites,
         'departements' => $departements,
         'employes' => $employes,
         'etablissements' => $etablissements,
         'formations' => $formations,
         ]);
      }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function excel()
    {

      //return $this->exporter->download(new Employe, 'users.xlsx');
      /*
        $employe_data = DB::table('employes')->get()->toArray();
      $employe_data[] =array('MATRICULE','SECURITE SOCIALE','NOM','PRENOM','EMAIL PRO',
        'DATE DE NAISSANCE','EMAIL PERSONNEL','TEL PROFESSIONNEL','TEL PERSONNEL','CONTACT URGENT',
        'ENTITE','SEXE','CIVILITE','SITUATION MATRIMONIALE','NBRE ENFANTS','NATIONNALITE','ORIGINE');*/
      /*  foreach ($employe_data as  $employes) {

          //dump($employes);
          $employe_data[] =array('MATRICULE' =>$employes->matricule,
          'SECURITE SOCIALE'=>$employes->numero_sss,
          'NOM'=>$employes->nom,
          'PRENOM'=>$employes->prenom,
          'EMAIL PRO'=>$employes->email,
          'DATE DE NAISSANCE'=>$employes->date_naissance,
          'EMAIL PERSONNEL'=>$employes->mail_perso,
          'TEL PROFESSIONNEL'=>$employes->tel_pro,
          'TEL PERSONNEL'=>$employes->tel_perso,
          'CONTACT URGENT'=>$employes->contact_urgent,
          'ENTITE'=>$employes->entite,
          'SEXE'=>$employes->sexe,
          'CIVILITE'=>$employes->civilite,
          'SITUATION MATRIMONIALE'=>$employes->situation_matrimoniale,
          'NBRE ENFANTS'=>$employes->nbre_enfant,
          'NATIONNALITE'=>$employes->nationnalite,
          'ORIGINE'=>$employes->origine
        );
      }

      $employe_data=Employe::all();
      return Excel::create("employedata",function($excel) use ($employe_data){
          $excel->setTitle('employedata');
          $excel->sheet('employedata',function($sheet) use ($employe_data){
          $sheet->fromArray($employe_data,null,'A1',false,false);
          });
        })->download('xlsx');

        */

    /*    $filename='test';
        $fn = $filename.'-'.date('Y-m-d_H-i-s');
        Excel::create($fn, function ($excel) use ($data, $captions) {
        $excel->sheet('SHEET NAME', function ($sheet) use ($data, $captions) {
        $sheet->fromArray($data, null, 'A1', false, false);
        $sheet->prependRow(1, $captions);
        $sheet->freezeFirstRow();
        }
   }*/
 }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }




    public function preview(Request $request)
    {

      $employes=Employe::all();
      $etablissements=Etablissement::all();
      $departements= Departement::all();
      $formations= Formation::all();
       //$sites= Site::all();
                  $sites= Site::where('pays','<>','NULL')->get();
                  $type_filtre=$request->get('type_filtre');
                  $date_debut=$request->get('date_debut');
                  $date_fin=$request->get('date_fin');
                  $nationnalite=$request->get('nationnalite');
                  $entite=$request->get('entite');
                  $sexe=$request->get('sexe');
                  $situation_matrimoniale=$request->get('situation_matrimoniale');
                  $departement=$request->get('departement');
                  $secteur=$request->get('secteur');
                  $type_contrat=$request->get('type_contrat');
                  $categorie=$request->get('categorie');
                  $statut=$request->get('statut');
                  $pays=$request->get('pays');

                  $niveau_etude=$request->get('niveau_etude');
                  $experience=$request->get('experience');
                  $etablissement=$request->get('etablissement');

                  $conge=$request->get('conge');

//$query ="select * from employes emp, contrats c where emp.id=c.employe_id and emp.departement='$departement' and emp.nationnalite='$nationnalite' and emp.entite='$entite' and emp.sexe='$sexe' and emp.categorie = '$categorie' and emp.secteur = '$secteur' and c.type_contrat='$type_contrat'";
//$query ="select * from employes emp, contrats c where emp.id=c.employe_id";

$tablesFromStament = 'employes emp, contrats c';
$joinTable = "and 1=1 ";
$colonneTable="";
/*
if(!empty($tab) ){
  $tablesFromStament .= ",".$tab." ";
	$query=$query.' '."and emp.statut ='$statut'";
if($tab == 'pays')
{
  $jointable .= "and pays.id=employes.pays_id";
}
}
*/

if(!empty($niveau_etude) || !empty($experience) ){

  $tablesFromStament=$tablesFromStament.','.'experiences exp';

  $majointure=" and emp.id=exp.employe_id";

  $joinTable =$joinTable.''.$majointure;

  $colonneTable2=",entreprise as ENTREPRISE,poste as POSTE,niveau_etude as NIVEAU_D_ETUDE,nbre_annee_exp as ANNEE_EXPERIENCE";

  $colonneTable =$colonneTable." ".$colonneTable2;
	//$query=$query.' '."and emp.statut ='$statut'";
}

if(!empty($etablissement)){

  $tablesFromStament=$tablesFromStament.','.'formations f';

  $majointure=" and emp.id=f.employe_id";

  $joinTable =$joinTable." ".$majointure;

  $colonneTable1=",f.libelle as INTITULE_FORMATION,f.nbre_heure as ETABLISSEMENT,f.cout as COUT";

  $colonneTable =$colonneTable." ".$colonneTable1;
	//$query=$query.' '."and emp.statut ='$statut'";
}

if(!empty($conge)){

  $tablesFromStament=$tablesFromStament.','.'conges cg';

  $majointure=" and emp.id=cg.employe_id";

  $joinTable =$joinTable." ".$majointure;

  $colonneTable3=",cg.date_demande as DEMANDE_CONGE,cg.type_conge as TYPE_CONGE,cg.date_depart as DEPART_CONGE,cg.date_retour as RETOUR_CONGE,cg.commentaire as COMMENTAIRE";

  $colonneTable =$colonneTable." ".$colonneTable3;
	//$query=$query.' '."and emp.statut ='$statut'";
}




if($type_filtre=="Liste")
{
  $query ="select distinct emp.id as IDENTIFIANT,matricule as MATRICULE,numero_sss AS NUM_SECU_SOCIAL,nom as NOM,prenom as PRENOMS,email as EMAIL_PROFFESSIONNEL,date_naissance as DATE_NAISSANCE,mail_perso as MAIL_PERSONNEL,tel_pro as TEL_PROFESSIONNEL,tel_perso as TEL_PERSONNEL,contact_urgent as CONTACT_URGENT,entite as ENTITE,pays as PAYS,sexe as SEXE,civilite as CIVILITE,situation_matrimoniale as SITUATION_MATRIMONIALE,nbre_enfant as NBRE_ENFANT,nationnalite as NATIONNALITE,origine as ORIGINE,secteur as SECTEUR,categorie AS CATEGORIE, departement as DEPARTEMENT, pays AS PAYS,type_contrat as TYPE_DE_CONTRAT,c.date_debut as DEBUT_CONTRAT,c.date_fin as FIN_CONTRAT $colonneTable from $tablesFromStament where emp.id=c.employe_id $joinTable";

}else{

  $query ="select count(emp.id) as NBRE_EMPLOYE $colonneTable from $tablesFromStament where emp.id=c.employe_id $joinTable";

}
/*
if(isset($nationnalite) && trim($nationnalite)!="" ){

	$query=$query.' '."and emp.nationnalite ='$nationnalite'";
}*/



if(isset($conge) && trim($conge)!="" ){

	$query=$query.' '."and cg.type_conge ='$conge'";
  //dd($query);
}


if(isset($etablissement) && trim($etablissement)!="" ){

	$query=$query.' '."and f.nbre_heure ='$etablissement'";
  //dd($query);
}

if(isset($experience) && trim($experience)!="" ){

	$query=$query.' '."and exp.nbre_annee_exp ='$experience'";

}

if(isset($niveau_etude) && trim($niveau_etude)!="" ){

	$query=$query.' '."and exp.niveau_etude ='$niveau_etude'";
  //dd($query);
}


if(isset($statut) && trim($statut)!="" ){

	$query=$query.' '."and emp.statut ='$statut'";
}
if(isset($pays) && trim($pays)!="" ){

	$query=$query.' '."and emp.pays ='$pays'";
}
if(isset($nationnalite) && trim($nationnalite)!="" ){

	$query=$query.' '."and emp.nationnalite ='$nationnalite'";
}
if(isset($departement) && trim($departement)!="" ){

	$query=$query.' '."and emp.departement='$departement'";
}
if(isset($entite) && trim($entite)!="" ){

	$query=$query.' '."and emp.entite='$entite'";
}
if(isset($sexe) && trim($sexe)!="" ){

	$query=$query.' '."and emp.sexe='$sexe'";
}
if(isset($categorie) && trim($categorie)!="" ){

	$query=$query.' '." and emp.categorie = '$categorie'";
}
if(isset($secteur) && trim($secteur)!="" ){

	$query=$query.' '."and emp.secteur = '$secteur'";
}
if(isset($type_contrat) && trim($type_contrat)!="" ){

	$query=$query.' '."and c.type_contrat='$type_contrat'";
}

$query=DB::select($query);

/*
//dd($query);
 $query= (array) $query;

dd(array_keys($query));

$spreadsheet = new Spreadsheet();
//$sheet = $spreadsheet->getActiveSheet();
//$sheet->setCellValue('A1',array_keys($query));
if(isset($query[0])) {

$rowArray = array_keys((array) $query[0]);

$spreadsheet->getActiveSheet()
    ->fromArray(
        $rowArray,   // The data to set
        NULL,           // Array values with this value will not be set
        'A1'            // Top left coordinate of the worksheet range where
                        //    we want to set these values (default is A1)
    );
  }
    $i=2;
foreach ($query as $key) {
$rowArray = (array) $key;
  $spreadsheet->getActiveSheet()
      ->fromArray(
          $rowArray,   // The data to set
          NULL,           // Array values with this value will not be set
          'A'.$i            // Top left coordinate of the worksheet range where
                          //    we want to set these values (default is A1)
      );
        $i++;
}
  //dd($query);
       $writer = new Xlsx($spreadsheet);

       // redirect output to client browser
       header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
       header('Content-Disposition: attachment;filename="cofiquicik-reporting.xlsx"');
       header('Cache-Control: max-age=0');

       $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
       $writer->save('php://output');

      // $writer->save('hello wores.xlsx');

        //return view('reportings/preview',['query' => $query,'sites' => $sites,'departements' => $departements,'employes' => $employes,'etablissements' => $etablissements,]);

*/
        return view('reportings.preview')->with(compact('query', 'sites', 'departements', 'employes', '$etablissements','$formations'));
    }





}
