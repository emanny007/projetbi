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

use App\Departement;
use Image;
use App\Groupe;
use App\Site;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $employes= Employe::where('entite','<>','NULL')->get();
      //$sites= Site::where('entite','<>','')->get();
      //$departements = DB::table('departements')->orderBy('id', 'asc')->get();

      return view('parametres.users.index', compact('employes'));
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
        //
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
      $employes = Employe::findOrFail($id);

      $contrat = new Contrat();
      //$contrat_empls= DB::table('contrats')->where(['employe_id','=','6'])->get();
      $contrat= Contrat::find($id);

      $departements= Departement::all();
      $employe = Employe::findOrFail($id);
      $sites= Site::where('entite','<>','')->get();
      $pays= Site::where('pays','<>','NULL')->get();
      $nationnalite= Site::where('nationnalite','<>','NULL')->get();
      $groupes= Groupe::orderby('id','asc')->paginate(20);

      return view('parametres.users.edit',['employe' => $employe,
      'sites' => $sites,
      'pays' => $pays,
      'groupes' => $groupes,
      'nationnalite' => $nationnalite,
      'departements' => $departements,
      'contrat' => $contrat
    ]);
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
      $request->validate([

       //'password' => 'min:5',
       'email' => 'bail|required|email',
     ]
);
        $today = date("Y-m-d H:i:s");

        $employe = Employe::findOrFail($id);

        $employe->password = Hash::make($request->input('mot_pass'));
        $employe->email = strtolower($request->get('email'));
        $employe->role = $request->get('role');
        $employe->entite = $request->get('entite');
        $employe->statut = $request->get('statut');
        $employe->updated_at=$today;
        $employe->save();

     flash("Le profil a bien été modifié")->success();

    return redirect()->back()->with('status','Le profil a bien été modifié');

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
