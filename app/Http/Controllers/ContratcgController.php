<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employe;
use App\Contrat;

use App\Departement;

use App\Groupe;
use App\Site;
use DB;

class ContratcgController extends Controller
{

  public function edit($id)
  {
    $contrat = new Contrat();
    $contrat=DB::table('employes')->select('employe_id','employes.nom','employes.prenom','employes.email','contrats.type_contrat','contrats.date_debut','contrats.date_fin','contrats.montant_net','contrats.montant_brut')
      ->join('contrats','employes.id','=','contrats.employe_id')->where('employe_id', '=', $id)->get()->first();
      $employe = Employe::findOrFail($id);
       return view('cofinacg.contrats.edit', compact('employe','contrat'));
  }



  public function update(Request $request, $id)
  {
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

    flash("update success!!!")->success();
    return redirect()->back()->with('status','update success!!!');

  }

}
