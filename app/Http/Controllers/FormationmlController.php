<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employe;
use App\Contrat;
use App\Formation;

use App\Departement;
use Image;
use App\Groupe;
use App\Site;
use DB;

class FormationmlController extends Controller
{

    public function edit($id)
    {
      $formation = new Formation();
      $formation = Formation::where('employe_id', $id)->get();
      //  $formation=Formation::all($id);
      $employe = Employe::findOrFail($id);
       return view('cofinaml.formations.edit', compact('employe','formation'));
    }

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

    flash("Successfull !!!")->success();
    return redirect()->back()->with('success', 'Les informations ont bien été ajoutées');
  }


  public function update(Request $request, $id)
  {
    DB::table('formations')->Insert(['employe_id' => $request->get('id_empl')],
    [
      'libelle' => strtoupper($request->get('libelle')),
      'nbre_heure' => $request->get('nbre_heure'),
      'cout' => str_replace($request->get('cout')),
      'date_debut' => $request->get('date_debut'),
      'date_fin' => $request->get('date_fin'),
      'employe_id' => $request->get('id_empl')

    ]);

    flash("Successfull !!!")->success();
    return redirect()->back()->with('status','Vos informations ont bien été ajoutées');
  }





}
