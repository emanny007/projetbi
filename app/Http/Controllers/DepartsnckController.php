<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employe;
use App\Contrat;
use App\Depart;
use App\Departement;
use Image;
use App\Groupe;
use App\Site;
use DB;


class DepartsnckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $departs=DB::select("select * from employes,departs where employes.id=departs.employe_id and employes.statut='DESACTIVE' and employes.entite='COFINA SN'");

         return view('cofinasn-checker.departs.index', compact('departs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
      $depart = new Depart();

      $depart = DB::table('employes')->select('employes.id','employes.matricule','employes.nom','employes.prenom','employes.sexe','employes.departement','employes.categorie','employes.secteur','employes.entite','employes.email',
    'departs.date_depart','departs.type_depart','departs.motif','departs.statut')
     ->join('departs','employes.id','=','departs.employe_id')->where('departs.employe_id', '=', $id)->get()->first();

      $employe = Employe::findOrFail($id);

      //dd($depart);
       return view('cofinasn-checker.departs.edit', compact('employe','depart'));
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
      $today = date("Y-m-d H:i:s");
      $id=$request->get('id_empl');

      DB::table('departs')->updateOrInsert(['employe_id' => $request->get('id_empl')],
      [
        'date_depart' => $request->get('date_depart'),
        'type_depart' => $request->get('type_depart'),
        'motif' => $request->get('motif'),
        'statut' => 'DESACTIVE',
        'employe_id' => $request->get('id_empl'),
        'created_at'=>$today,
        'updated_at'=>$today,

      ]);

        DB::table('contrats')
                    ->where('employe_id', $id)
                    ->update(['date_fin' => $request->get('date_depart')]);


        DB::table('employes')
                    ->where('id', $id)
                    ->update(['statut' => 'DESACTIVE']);

   flash("L employé a bien été modifié")->success();
   return redirect()->back();
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
