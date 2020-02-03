<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use App\Employe;

use App\Etablissement;
use Image;
use DB;

class EtablissementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

         $etablissements= Etablissement::all()->sortByDesc('id');
         //$departements = DB::table('departements')->orderBy('id', 'asc')->get();

         return view('parametres.etablissements.index', compact('etablissements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $etablissements= Etablissement::all();

        return view('parametres.etablissements.create',['etablissements' => $etablissements]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
              $request->validate(['etablissement'=>'required']);
              $today = date("Y-m-d H:i:s");
              $etablissement = new Etablissement([
                'libelle' => strtoupper($request->get('etablissement')),
                'sigle' => strtoupper($request->get('sigle')),
                'telephone' => $request->get('telephone'),
                'adresse' => strtoupper($request->get('adresse')),
                'boite_postale' => strtoupper($request->get('boitepostale')),
                'siteweb' => strtolower($request->get('siteweb')),
                'ville' => strtoupper($request->get('ville')),
                'pays' => strtoupper($request->get('pays')),
                'created_at'=>$today,
                'updated_at'=>$today,
              ]);
              $etablissement->save();
             return redirect('/parametres/etablissements')->with('success', 'L\'etablissement a été ajouté avec succes !');
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
        $etablissements = Etablissement::findOrFail($id);

        return view('parametres.etablissements.edit',['etablissements' => $etablissements]);
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
      $today = date("Y-m-d H:i:s");
      $etablissements = Etablissement::findOrFail($id);

      $etablissements->libelle = strtoupper($request->get('etablissement'));
      $etablissements->updated_at=$today;
      $etablissements->save();

      return redirect('/parametres/etablissements')->with('success', 'L\'etablissement a bien été modifié !');
      //return redirect()->back()->with('status','Le departement a bien été modifié!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $etablissements = Etablissement::findOrFail($id);
      $etablissements->delete();
      return redirect('/parametres/etablissements')->with('success', 'Etablissement deleted!');
    }
}
