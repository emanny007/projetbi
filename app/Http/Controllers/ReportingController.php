<?php
namespace App\Exports;
namespace App\Http\Controllers;


use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;

use Illuminate\Http\Request;
//use App\Http\Controllers\Auth\Request;
use App\Site;
use App\Employe;
use DB;

use App\Contrat;
use App\Departement;
use App\Groupe;


//use Excel;

class EmployesExport implements FromCollection
{
    public function collection()
    {
/*
           $date_debut=$request->get('date_debut');
           $date_fin=$request->get('date_fin');
           $nationnalite=$request->get('nationnalite');
           $pays=$request->get('pays');
           $sexe=$request->get('sexe');
           $situation_matrimoniale=$request->get('situation_matrimoniale');
*/

//$pays=$request->get('pays');
$pays="COTE D IVOIRE";
//$nb_empl=DB::select("SELECT * FROM employes");
      $nb_empl=Employe::where('entite','=',$pays)->take(2)->get();

        return $nb_empl;
    }

}


class ReportingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $employes=Employe::all();
       $departements= Departement::all();
       $sites= Site::where('pays','<>','NULL')->get();


        return view('reportings/index',[
        'sites' => $sites,
        '$departements' => $departements,
        'employes' => $employes,
      ]);
    }




       public function export(Request $request)
       {
/*
                    $date_debut=$request->get('date_debut');
                    $date_fin=$request->get('date_fin');
                    $nationnalite=$request->get('nationnalite');
                    $pays=$request->get('pays');
                    $sexe=$request->get('sexe');
                    $situation_matrimoniale=$request->get('situation_matrimoniale');*/

           return Excel::download(new EmployesExport, 'employes.xlsx');



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
