<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employe;
use App\Contrat;
use App\Formation;
use App\Poste;
use App\Departement;
use Image;
use App\Groupe;
use App\Site;
use DB;

class PosteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
      $poste = new Poste();
    //$poste = Poste::where('employe_id', $id)->get();
    $poste=DB::table('employes')->select('employe_id','employes.id','employes.matricule','employes.nom','employes.prenom','employes.sexe','employes.departement','employes.categorie','employes.secteur','employes.entite','employes.email','postes.intitule','postes.fonction',
    'postes.grade_local','postes.grade_cofina','postes.fonction_n1','postes.date_embauche','postes.date_entree','postes.anciennete')
     ->join('postes','employes.id','=','postes.id')->where('employe_id', '=', $id)->get()->first();
      //  $formation=Formation::all($id);
      $employe = Employe::findOrFail($id);
       return view('postes.edit', compact('employe','poste'));
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
      DB::table('postes')->updateOrInsert(['employe_id' => $request->get('id_empl')],
      [
        'intitule' => $request->get('intitule'),
        'fonction' => $request->get('fonction'),
        'grade_local' => $request->get('grade_local'),
        'grade_cofina' => $request->get('grade_cofina'),
        'fonction_n1' => $request->get('fonction_n1'),
        'date_embauche' => $request->get('date_embauche'),
        'date_entree' => $request->get('date_entree'),
        'anciennete' => $request->get('anciennete'),
        'employe_id' => $request->get('id_empl'),
        //'created_at' => Carbon::today()->get(),
        //'updated_at' => Carbon::today()->get()
      ]);

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
