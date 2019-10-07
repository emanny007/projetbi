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

class PostesctiController extends Controller
{

  public function edit($id)
  {
    $poste = new Poste();
  //$poste = Poste::where('employe_id', $id)->get();
  $poste=DB::table('employes')->select('employe_id','employes.id','employes.matricule','employes.nom','employes.prenom','employes.sexe','employes.departement','employes.categorie','employes.secteur','employes.entite','employes.email','postes.intitule','postes.fonction',
  'postes.grade_local','postes.grade_cofina','postes.fonction_n1','postes.date_embauche','postes.date_entree','postes.anciennete')
   ->join('postes','employes.id','=','postes.employe_id')->where('employe_id', '=', $id)->get()->first();
    //  $formation=Formation::all($id);
    $employe = Employe::findOrFail($id);
     return view('cti-maker.postes.edit', compact('employe','poste'));
  }





  public function update(Request $request, $id)
  {

    $today = date("Y-m-d H:i:s");

    DB::table('postes')->updateOrInsert(['employe_id' => $request->get('id_empl')],
    [
      'intitule' => strtoupper($request->get('intitule')),
      'fonction' => strtoupper($request->get('fonction')),
      'grade_local' => strtoupper($request->get('grade_local')),
      'grade_cofina' => strtoupper($request->get('grade_cofina')),
      'fonction_n1' => strtoupper($request->get('fonction_n1')),
      'date_embauche' => $request->get('date_embauche'),
      'date_entree' => $request->get('date_entree'),
      'anciennete' => $request->get('anciennete'),
      'employe_id' => $request->get('id_empl'),
      'created_at'=>$today,
      'updated_at'=>$today,
    ]);

 flash("L employé a bien été modifié")->success();
 return redirect()->back();
  }


}
