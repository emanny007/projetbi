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

class ExperienceController extends Controller
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
      $experience = new Experience();
      $experience = Experience::where('employe_id', $id)->get();
      $employe = Employe::findOrFail($id);
       return view('experiences.edit', compact('employe','experience'));
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
        //
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
