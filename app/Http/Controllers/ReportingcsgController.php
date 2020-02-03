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
use App\Departement;
use App\Groupe;


//use Excel;



class ReportingcsgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

      $employes=Employe::all();
       $departements= Departement::all();
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

                  //$niveau_etude=$request->get('niveau_etude');
                  //$experience=$request->get('experience');

//$query ="select * from employes emp, contrats c where emp.id=c.employe_id and emp.departement='$departement' and emp.nationnalite='$nationnalite' and emp.entite='$entite' and emp.sexe='$sexe' and emp.categorie = '$categorie' and emp.secteur = '$secteur' and c.type_contrat='$type_contrat'";
//$query ="select * from employes emp, contrats c where emp.id=c.employe_id";
if($type_filtre=="Liste")
{
  $query ="select emp.id as IDENTIFIANT,matricule as MATRICULE,numero_sss AS NUM_SECU_SOCIAL,nom as NOM,prenom as PRENOMS,email as EMAIL_PROFFESSIONNEL,date_naissance as DATE_NAISSANCE,mail_perso as MAIL_PERSONNEL,tel_pro as TEL_PROFESSIONNEL,tel_perso as TEL_PERSONNEL,contact_urgent as CONTACT_URGENT,entite as ENTITE,sexe as SEXE,civilite as CIVILITE,situation_matrimoniale as SITUATION_MATRIMONIALE,nbre_enfant as NBRE_ENFANT,nationnalite as NATIONNALITE,origine as ORIGINE,secteur as SECTEUR,categorie AS CATEGORIE, departement as DEPARTEMENT, pays AS PAYS,type_contrat as TYPE_DE_CONTRAT,date_debut as DATE_DEBUT,date_fin as DATE_FIN from employes emp, contrats c where emp.id=c.employe_id";

}else{

  $query ="select count(emp.id) as NBRE_EMPLOYE from employes emp, contrats c where emp.id=c.employe_id";

}
/*
if(isset($nationnalite) && trim($nationnalite)!="" ){

	$query=$query.' '."and emp.nationnalite ='$nationnalite'";
}*/

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
       header('Content-Disposition: attachment;filename="cofiquicik-reporting.xlsx"');
       header('Cache-Control: max-age=0');

       $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
       $writer->save('php://output');

      // $writer->save('hello wores.xlsx');

        return view('/csg/reportings/index',['sites' => $sites,'departements' => $departements,'employes' => $employes,]);
    }




       public function export(Request $request)
       {

         $employes=Employe::all();
          $departements= Departement::all();
          //$sites= Site::all();
          $sites= Site::where('entite','<>','')->get();
          $nationnalites= Site::where('nationnalite','<>','')->get();

         return view('/csg/reportings/index',[
         'sites' => $sites,
         'nationnalites' => $nationnalites,
         'departements' => $departements,
         'employes' => $employes,
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
}
