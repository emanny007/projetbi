<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employe;
use App\Contrat;
use App\Formation;
use App\Etablissement;
use App\Departement;
use Image;
use App\Groupe;
use App\Site;
use DB;


class FormationController extends Controller
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
      $formation = new Formation([
        'libelle' => strtoupper($request->get('libelle')),
        'nbre_heure' => $request->get('nbre_heure'),
        'cout' => $request->get('cout'),
        'date_debut' => $request->get('date_debut'),
        'date_fin' => $request->get('date_fin'),
        'employe_id' => $request->get('id_empl')

      ]);

      $formation->save();

      return redirect()->back()->with('success', 'Les informations renseignées ont bien été ajoutés');
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

      $formation = new Formation();
      /*$formation = DB::table('employes')->select('employe_id','employes.id','employes.nom','employes.prenom','employes.email','formations.libelle','formations.nbre_heure','formations.cout','formations.date_debut','formations.date_fin','formations.employe_id')
        ->join('formations','employes.id','=','formations.employe_id')->where('employe_id', '=', $id)->get()->first();
        */
      $etablissements=Etablissement::all();
      $formation = Formation::where('employe_id', $id)->orderby('id','desc')->get();
      $employe = Employe::findOrFail($id);

       return view('formations.edit', compact('employe','formation','etablissements'));
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
      DB::table('formations')->Insert(['employe_id' => $request->get('id_empl')],
      [
        'libelle' => $request->get('libelle'),
        'nbre_heure' => $request->get('nbre_heure'),
        'cout' => $request->get('cout'),
        'date_debut' => $request->get('date_debut'),
        'date_fin' => $request->get('date_fin'),
        'employe_id' => $request->get('id_empl')

      ]);
   //return redirect()->route('create',$employe)->with('statut','Successfull !!!');
  return redirect()->back()->with('status','Les informations renseignées ont bien été ajoutés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $formation = Formation::findOrFail($id);
      $formation->delete();
      //return redirect('/formations')->with('success', 'Formation deleted!');
      return redirect()->back()->with('status','Formation deleted !!');
    }
}
