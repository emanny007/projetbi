<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use App\Employe;

use App\Departement;
use Image;
use DB;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

         $departements= Departement::all()->sortByDesc('id');
         //$departements = DB::table('departements')->orderBy('id', 'asc')->get();

         return view('parametres.departements.index', compact('departements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $departements= Departement::all();

        return view('parametres.departements.create',['departements' => $departements]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
              $request->validate(['departement'=>'required']);
              $today = date("Y-m-d H:i:s");
              $departement = new Departement([
                'libelle' => strtoupper($request->get('departement')),
                'created_at'=>$today,
                'updated_at'=>$today,
              ]);
              $departement->save();
             return redirect('/parametres/departements')->with('success', 'Le departement a été ajouté avec succes !');
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
        $departements = Departement::findOrFail($id);

        return view('parametres.departements.edit',['departements' => $departements]);
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
      $departements = Departement::findOrFail($id);

      $departements->libelle = strtoupper($request->get('departement'));
      $departements->updated_at=$today;
      $departements->save();

      return redirect('/parametres/departements')->with('success', 'Le departement a bien été modifié !');
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
      $departements = Departement::findOrFail($id);
      $departements->delete();
      return redirect('/parametres/departements')->with('success', 'Departement deleted!');
    }
}
