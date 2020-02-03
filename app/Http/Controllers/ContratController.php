<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employe;
use App\Contrat;

use App\Departement;
use Image;
use App\Groupe;
use App\Site;
use DB;

class ContratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
              $empl = DB::table('employes')
              ->join('contrats','employes.id','=','contrats.employe_id')
              ->select('employes.id','employes.nom','employes.prenom','employes.email','contrats.type_contrat','contrats.date_debut','contrats.date_fin')->get();

              $employes = Employe::orderby('id','desc')->paginate(20);
         return view('contrats.index', compact('employes','empl'));
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
      $employes=DB::table('employes')->select('employe_id','employes.matricule','employes.numero_sss','employes.id','employes.nom','employes.prenom','employes.password','employes.role','employes.civilite','employes.photo','employes.situation_matrimoniale','employes.origine','employes.nationnalite','employes.nbre_enfant','employes.contact_urgent','employes.sexe',
      'employes.entite','employes.date_naissance','employes.tel_perso','employes.tel_pro','employes.mail_perso','employes.entite','employes.email','contrats.type_contrat','contrats.date_debut','contrats.date_fin')
      ->join('contrats','employes.id','=','contrats.id')->where('employe_id', '=', $id)->get()->first();
      return view('contrats.show',['employe' => $employes]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contrat = new Contrat();

        $contrat=DB::table('employes')->select('employe_id','employes.nom','employes.prenom','employes.email','contrats.type_contrat','contrats.date_debut','contrats.date_fin','contrats.montant_net','contrats.montant_brut')
          ->join('contrats','employes.id','=','contrats.employe_id')->where('employe_id', '=', $id)->get()->first();
        $employe = Employe::findOrFail($id);
         return view('contrats.edit', compact('employe','contrat'));
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
                /*$contrat = new Contrat();
                //[
                $id_empl= $request->get('id_empl');
                $employe = Contrat::findOrFail($id_empl);
                $contrat->type_contrat = $request->get('type_contrat');
                $contrat->date_debut = $request->get('date_debut');
                $contrat->date_fin = $request->get('date_fin');
                $contrat->employe_id = $request->get('id_empl');

            //  ]);
                $contrat->save();
                */

                $today = date("Y-m-d H:i:s");

                DB::table('contrats')->updateOrInsert(['employe_id' => $request->get('id_empl')],
                [
                  'type_contrat' => $request->get('type_contrat'),
                  'date_debut' => $request->get('date_debut'),
                  'date_fin' => $request->get('date_fin'),
                  'montant_net' => $request->get('montant_net'),
                  'montant_brut' => $request->get('montant_brut'),
                  'employe_id' => $request->get('id_empl'),
                  'created_at'=>$today,
                  'updated_at'=>$today,

                ]);
             //return redirect()->route('create',$employe)->with('statut','Successfull !!!');
             flash("update success!!!")->success();
            return redirect()->back()->with('status','update success!!!');
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
