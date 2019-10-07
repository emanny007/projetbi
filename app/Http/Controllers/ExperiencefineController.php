<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use App\Employe;
use App\Contrat;
use App\Formation;
use App\Experience;
use App\Departement;
use Image;
use App\Groupe;
use App\Site;
use DB;

class ExperiencefineController extends Controller
{

  public function edit($id)
  {
    $experience = new Experience();
    $experience = Experience::where('employe_id', $id)->get();
    $employe = Employe::findOrFail($id);
     return view('finelle.experiences.edit', compact('employe','experience'));
  }

    public function store(Request $request)
    {
      $request->validate([
         'entreprise' => 'required',
         'poste' => 'required',
         'niveau_etude' => 'required',
         'nbre_annee_exp'=>'required',
         'date_debut'=>'required|date',
        // 'date_fin'=>'date'
       ]
  );


      $experience = new Experience([
        'entreprise' => strtoupper($request->get('entreprise')),
        'poste' => strtoupper($request->get('poste')),
        'niveau_etude' => strtoupper($request->get('niveau_etude')),
        'nbre_annee_exp' => strtoupper($request->get('nbre_annee_exp')),
        'date_debut' => $request->get('date_debut'),
        'date_fin' => $request->get('date_fin'),
        'employe_id' => $request->get('id_empl')

      ]);

      $experience->save();
      flash("Vos informations ont bien été ajoutées !!!")->success();
      return redirect()->back()->with('success', 'Les informations renseignées ont bien été ajoutées');
    }

}
