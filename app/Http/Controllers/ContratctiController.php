<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employe;
use App\Contrat;

use App\Departement;

use App\Groupe;
use App\Site;
use DB;

class ContratctiController extends Controller
{

  public function edit($id)
  {
      $contrat = new Contrat();
      $contrat=DB::table('employes')->select('employe_id','employes.id','employes.nom','employes.prenom','employes.email','contrats.type_contrat','contrats.date_debut','contrats.date_fin')
        ->join('contrats','employes.id','=','contrats.employe_id')->where('employe_id', '=', $id)->get()->first();
      $employe = Employe::findOrFail($id);

       return view('cti-maker.contrats.edit', compact('employe','contrat'));
  }



  public function update(Request $request, $id)
  {
                    $today = date("Y-m-d H:i:s");

//dd($request);
                    DB::table('contrats')->updateOrInsert(['employe_id' => $request->get('id_empl')],
                    [
                      'type_contrat' => $request->get('type_contrat'),
                      'date_debut' => $request->get('date_debut'),
                      'date_fin' => $request->get('date_fin'),
                      'employe_id' => $request->get('id_empl'),
                      'updated_at'=>$today,


              ]);

           //return redirect()->route('create',$employe)->with('statut','Successfull !!!');
           //flash("Successfull !!!")->success();
          return redirect()->back()->with('status','L\'employé a bien été modifié');
  }


}
