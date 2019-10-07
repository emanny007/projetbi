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

class EmployesnckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

      $employes=Employe::all()->where('entite','COFINA SN');

         return view('/cofinasn-checker/employes/index-employe', compact('employes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $departements= Departement::all();
      $sites= Site::where('entite','<>','')->get();
      $pays= Site::where('pays','<>','NULL')->get();
      $nationnalite= Site::where('nationnalite','<>','NULL')->get();
      $groupes= Groupe::orderby('id','asc')->paginate(20);

        return view('/cofinasn-checker/employes/create-employe',[
          'sites' => $sites,
          'groupes' => $groupes,
          'departements' => $departements
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $request->validate([
         'matricule' => 'between:2,20',
         'numero_sss' => 'bail|required|numeric',
         'nom' => 'required|max:100',
         'prenom' => 'required',
         //'password' => 'min:5',
         'date_naissance' => 'required|date',
         'email' => 'bail|required|email',
         'mail_perso' => 'bail|email',
         'tel_pro' => 'numeric',
         'tel_perso' => 'required|numeric',
         'contact_urgent' => 'required|numeric',
         'entite' => 'required',
         'sexe' => 'required|alpha',
         'photo' => 'required|image',
         'civilite' => 'required',
         'situation_matrimoniale' => 'required',
         //'nbre_enfant' => 'required|numeric',
         'nationnalite' => 'required',
         //'origine' => 'required',
         'categorie' => 'required',
         'secteur' => 'required',
         'departement'=>'required',
         'type_contrat'=>'required',
         'date_debut'=>'required|date',
        // 'date_fin'=>'date'
       ]
  );
        //  Employe::create($request->all());

        $employe = new Employe([
          'matricule' => $request->get('matricule'),
          'numero_sss' => $request->get('numero_sss'),
          'nom' => $request->get('nom'),
          'prenom' => $request->get('prenom'),
          //'password' => Hash::make($request->input('password')),
          //'role' => $request->get('role'),
          'email' => $request->get('email'),
          'date_naissance' => $request->get('date_naissance'),
          'mail_perso' => $request->get('mail_perso'),
          'tel_pro' => $request->get('tel_pro'),
          'tel_perso' => $request->get('tel_perso'),
          'contact_urgent' => $request->get('contact_urgent'),
          'entite' => $request->get('entite'),
          'sexe' => $request->get('sexe'),
          'civilite' => $request->get('civilite'),
          'pays' => $request->get('pays'),
          'nationnalite' => $request->get('nationnalite'),
          'situation_matrimoniale' => $request->get('situation_matrimoniale'),
          'nbre_enfant' => $request->get('nbre_enfant'),
          'origine' => $request->get('origine'),
          'categorie' => $request->get('categorie'),
          'secteur' => $request->get('secteur'),
          'departement' => $request->get('departement'),

        ]);

        if($request->hasFile('photo')){
          $photo = $request->file('photo');
          $filename= $request->photo->getClientOriginalName();
          Image::make($photo)->save(public_path('/images/'.$filename));
          //$request->photo->storeAs('public/images',$filename);
          $employe->photo = $filename;
        }

        $employe->save();

       return redirect('/cofinasn-checker/employes')->with('success', 'L\'employé a été ajouté avec succes !');
      //return redirect()->back()->with('status','L employé a été bien ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

      $employes = Employe::find($id);
      return view('/cofinasn-checker/employes/show-employe',['employe' => $employes]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $contrat = new Contrat();
      $contrat= Contrat::find($id);
      $departements= Departement::all();
      $employe = Employe::findOrFail($id);
      $sites= Site::where('entite','<>','')->get();
      $pays= Site::where('pays','<>','NULL')->get();
      $nationnalite= Site::where('nationnalite','<>','NULL')->get();
      $groupes= Groupe::orderby('id','asc')->paginate(20);

        return view('/cofinasn-checker/employes/edit-employe',[
          'employe' => $employe,
          'sites' => $sites,
          'groupes' => $groupes,
          'departements' => $departements,
          'contrat' => $contrat,
      ]);



      //  return view('employes.edit', compact('employe'));
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
        'matricule' => 'between:2,20',
        'numero_sss' => 'required|numeric',
        'nom' => 'required|max:200',
        'prenom' => 'required',
        //'password' => 'min:5',
        'email' => 'bail|required|email',
        'date_naissance' => 'required|date',
        'mail_perso' => 'required|email',
        'tel_pro' => 'required|numeric',
        'tel_perso' => 'required|numeric',
        'contact_urgent' => 'required|numeric',
        'entite' => 'required',
        'sexe' => 'required',
        'photo' => 'image',
        'civilite' => 'required',
        'situation_matrimoniale' => 'required',
        'nbre_enfant' => 'required',
        'nationnalite' => 'required',
        'statut' => 'required'
      ]
 );
         $today = date("Y-m-d H:i:s");

         $employe = Employe::findOrFail($id);
         $mdp=$request->input('mot_pass');

         if(isset($mdp) && trim($mdp)!="" ){

         $employe->password = Hash::make($mdp);

         }
         //$employe->update($request->all());
         $employe->matricule = $request->get('matricule');
         $employe->numero_sss = $request->get('numero_sss');
         $employe->nom = strtoupper($request->get('nom'));
         $employe->prenom = strtoupper($request->get('prenom'));
         //$employe->password = Hash::make($request->input('mot_pass'));
         $employe->email = strtolower($request->get('email'));
         $employe->role = $request->get('role');
         $employe->date_naissance = $request->get('date_naissance');
         $employe->mail_perso = strtolower($request->get('mail_perso'));
         $employe->tel_pro = $request->get('tel_pro');
         $employe->tel_perso = $request->get('tel_perso');
         $employe->contact_urgent = $request->get('contact_urgent');
         $employe->entite = $request->get('entite');
         $employe->sexe = $request->get('sexe');
         $employe->civilite = $request->get('civilite');
         $employe->situation_matrimoniale = $request->get('situation_matrimoniale');
         $employe->nbre_enfant = $request->get('nbre_enfant');
         $employe->nationnalite = $request->get('nationnalite');
         $employe->statut = $request->get('statut');
         $employe->secteur = $request->get('secteur');
         $employe->categorie = $request->get('categorie');
         $employe->departement = $request->get('departement');
         $employe->pays = $request->get('pays');
         $employe->updated_at=$today;


         if($request->hasFile('photo')){
           $photo = $request->file('photo');
           //$data = $request->input('photo');
           $filename= $request->photo->getClientOriginalName();
           Image::make($photo)->save(public_path('/images/'.$filename));
           //$request->photo->storeAs('/public/images',$filename);
           $employe->photo = $filename;
         }
         $employe->save();

      flash("L'employé a bien été modifié")->success();
     return redirect()->back()->with('status','L employé a bien été modifié');
 }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_employe($id)
    {
        $employe = Employe::findOrFail($id);
        $employe->delete();
        return redirect('/cofinasn-checker/destroy-employe')->with('success', 'Employe deleted !!');
    }
}
