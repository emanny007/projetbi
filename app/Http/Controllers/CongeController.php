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

class CongeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //$conges=Conge::all();
      $conges=DB::select("select * from employes,conges where employes.id=conges.employe_id");
         return view('conges.index', compact('conges'));
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
          $conge = new Conge([
            'date_demande' => strtoupper($request->get('date_demande')),
            'type_conge' => $request->get('type_conge'),
            'date_depart' => $request->get('date_depart'),
            'date_retour' => $request->get('date_retour'),
            'commentaire' => $request->get('commentaire'),
            'employe_id' => $request->get('id_empl')

          ]);

          $conge->save();

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
       $conge = new Conge();
       $conge = Conge::where('employe_id', $id)->get();
       $employe = Employe::findOrFail($id);
        return view('conges.edit', compact('employe','conge'));
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
