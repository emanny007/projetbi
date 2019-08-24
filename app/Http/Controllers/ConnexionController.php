<?php

namespace App\Http\Middleware;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Employe;
use App\Site;
use DB;
class ConnexionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     //La vue index ne fait que retourner la page d'authentification des utilisateurs
    public function index()
    {
      $sites= Site::all();

    //  flash("Vous êtes la bienvenue!")->success();
      return view('connexions/index',['sites' => $sites]);
      // return view('/',['sites' => $sites]);
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
    public function authentification(Request $request)
    {
      $request->validate([
        'password' => 'required|min:5|alpha_num',
        'email' => 'required|email'
       ]);

      $resultat = auth()->attempt([
          'email' => request('email'),
          'password' => request('password'),
          'entite' => request('entite'),
        ]);

      if($resultat){

          $user = Employe::where('email', $request->get('email'))->first();

             if($user && Hash::check($request->get('password'), $user->password))
             {
                 //Auth::login($user, $request->has('remember'));

                 if(($user->role=="MAKER")&&($user->entite=="CTI"))
                 {

                   return redirect('/accueil')->with(compact('role'), 'success', 'Vous êtes à présent connecté.'); //Et le compact('role')

                 }
                 else if(($user->role=="CHECKER")&&($user->entite =="CTI"))
                  {

                    return redirect('/accueil')->with(compact('role'), 'success', 'Vous êtes à présent connecté.');

                 }
                 else if(($user->role=="MAKER")&&($user->entite =="CAC"))
                  {

                    return redirect('/cac/accueil')->with(compact('role'), 'success', 'Vous êtes à présent connecté.');

                 }
                 else if(($user->role=="CHECKER")&&($user->entite =="CAC"))
                  {

                    return redirect('/cote-d-ivoire/accueil')->with(compact('role'), 'success', 'Vous êtes à présent connecté.');

                 }
                 else if(($user->role=="MAKER")&&($user->entite =="COFINA SN"))
                  {

                    return redirect('/cofinasn/accueil')->with(compact('role'), 'success', 'Vous êtes à présent connecté.'); //Et le compact('role')

                 }
                 else if(($user->role=="CHECKER")&&($user->entite =="COFINA SN"))
                  {

                   return redirect('/cofinasn-checker/accueil')->with(compact('role'), 'success', 'Vous êtes à présent connecté');

                  //return redirect('/accueil')->with(compact('role'), 'success', 'Vous êtes à présent connecté.'); //Et le compact('role')

                 }

             }




/*

      $empl=Employe::where('');

      dd($empl->entite);

      flash("Vous êtes la bienvenue!")->success();

      return redirect('/accueil'); */
    }else{

       return back()
            ->withInput()->withErrors([
              'email' => 'Veuillez entrer des identifiants correctes svp!'
            ]);

    }


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



      public function comptemaker(Request $request)
      {

          $profils = Employe::where('email', $request->get('email'))->get();

         return view('/includes/master',['profils' => $profils ]);
       }







    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
