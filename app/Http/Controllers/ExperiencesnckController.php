<?php

namespace App\Http\Controllers;

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

class ExperiencesnckController extends Controller
{


  public function edit($id)
  {
    $experience = new Experience();
    $experience = Experience::where('employe_id', $id)->get();
    $employe = Employe::findOrFail($id);
     return view('cofinasn-checker.experiences.edit', compact('employe','experience'));
  }



    public function store(Request $request)
    {
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

      return redirect()->back()->with('success', 'Les informations renseignées ont bien été ajoutés');
    }

}
