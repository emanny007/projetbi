<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Conge;
use App\Employe;
use App\Contrat;
use App\Formation;
use App\Sanction;

use App\Departement;
use Image;
use App\Groupe;
use App\Site;
use DB;



class SanctionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $sanctions=DB::select("select * from employes,sanctions where employes.id=sanctions.employe_id");
         return view('sanctions.index', compact('sanctions'));
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
      $sanctions = new Sanction([
        'date_sanction' => $request->get('date_sanction'),
        'type_sanction' => $request->get('type_sanction'),
        'commentaire' => $request->get('commentaire'),
        'employe_id' => $request->get('id_empl')

      ]);

      //dd($sanctions);
      $sanctions->save();

      flash("Successfull !!!")->success();
      return redirect()->back()->with('success', 'Vos informations ont été ajoutées avec succès!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sanction  $sanction
     * @return \Illuminate\Http\Response
     */
    public function show(Sanction $sanction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sanction  $sanction
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $sanctions = new Sanction();
      $sanctions = Sanction::where('employe_id', $id)->get();
      $employe = Employe::findOrFail($id);
       return view('sanctions.edit', compact('employe','sanctions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sanction  $sanction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sanction $sanction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sanction  $sanction
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $sanctions = Sanction::findOrFail($id);
      $sanctions->delete();
      flash("Successfull !!!")->success();
      return redirect()->back()->with('success', 'Sanction deleted !');
    }
}
