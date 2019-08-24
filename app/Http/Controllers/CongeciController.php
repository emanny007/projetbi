<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Conge;
use App\Employe;
use App\Contrat;
use App\Formation;

use App\Departement;
use Image;
use App\Groupe;
use App\Site;
use DB;

class CongeciController extends Controller
{
  public function index()
  {
    //$conges=Conge::all();
    $conges=DB::select("select * from employes,conges where employes.id=conges.employe_id and employes.entite='CAC'");
       return view('cote-d-ivoire.conges.index', compact('conges'));
  }



  public function store(Request $request)
  {
    $conge = new Conge([
      'date_demande' => strtoupper($request->get('date_demande')),
      'type_conge' => $request->get('type_conge'),
      'date_depart' => $request->get('date_depart'),
      'date_retour' => $request->get('date_retour'),
      'commentaire' => $request->get('commentaire'),
      'employe_id' => $request->get('id_empl')

    ]);

    $conge->save();

    return redirect()->back()->with('success', 'Les informations renseignées ont bien été ajoutées');
  }



  public function edit($id)
  {
    $conge = new Conge();
    $conge = Conge::where('employe_id', $id)->get();
    $employe = Employe::findOrFail($id);
     return view('cote-d-ivoire.conges.edit', compact('employe','conge'));
  }



}
