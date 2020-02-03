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

     //La vue index ne fait que retourner la page d'authentification des utilisateurs
    public function index()
    {

      $sites= Site::where('entite','<>','')->get();

      return view('connexions/index',['sites' => $sites]);
      // return view('/',['sites' => $sites]);
    }

    public function authentification(Request $request)
    {
      $request->validate([
        'password' => 'required|min:4',
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

                   return redirect('/cti-maker/accueil')->with(compact('role'), 'success', 'Vous êtes à présent connecté.'); //Et le compact('role')

                 }
                 else if(($user->role=="CHECKER")&&($user->entite =="CTI"))
                  {

                    return redirect('/accueil')->with(compact('role'), 'success', 'Vous êtes à présent connecté.');

                 }
                 else if(($user->role=="CHECKER")&&($user->entite =="CAC"))
                  {

                    return redirect('/cac/accueil')->with(compact('role'), 'success', 'Vous êtes à présent connecté.');

                 }
                 else if(($user->role=="MAKER")&&($user->entite =="CAC"))
                  {

                    return redirect('/cote-d-ivoire/accueil')->with(compact('role'), 'success', 'Vous êtes à présent connecté.');

                 }
                 else if(($user->role=="CHECKER")&&($user->entite =="COFINA SN"))
                  {

                    return redirect('/cofinasn/accueil')->with(compact('role'), 'success', 'Vous êtes à présent connecté.'); //Et le compact('role')

                 }
                 else if(($user->role=="MAKER")&&($user->entite =="COFINA SN"))
                  {

                   return redirect('/cofinasn-checker/accueil')->with(compact('role'), 'success', 'Vous êtes à présent connecté');

                  //return redirect('/accueil')->with(compact('role'), 'success', 'Vous êtes à présent connecté.'); //Et le compact('role')

                 }else if(($user->role=="MAKER")&&($user->entite =="CSG"))
                  {

                    return redirect('/csg/accueil')->with(compact('role'), 'success', 'Vous êtes à présent connecté.'); //Et le compact('role')

                 }else if(($user->role=="CHECKER")&&($user->entite =="CSG"))
                  {

                    return redirect('/csg/accueil')->with(compact('role'), 'success', 'Vous êtes à présent connecté.'); //Et le compact('role')

                 }else if(($user->role=="MAKER")&&($user->entite =="COFINA GN"))
                  {

                    return redirect('/cofinagn/accueil')->with(compact('role'), 'success', 'Vous êtes à présent connecté.'); //Et le compact('role')

                 }else if(($user->role=="CHECKER")&&($user->entite =="COFINA GN"))
                  {

                    return redirect('/cofinagn/accueil')->with(compact('role'), 'success', 'Vous êtes à présent connecté.'); //Et le compact('role')

                 }else if(($user->role=="MAKER")&&($user->entite =="COFINA CG"))
                  {

                    return redirect('/cofinacg/accueil')->with(compact('role'), 'success', 'Vous êtes à présent connecté.'); //Et le compact('role')

                 }else if(($user->role=="CHECKER")&&($user->entite =="COFINA CG"))
                  {

                    return redirect('/cofinacg/accueil')->with(compact('role'), 'success', 'Vous êtes à présent connecté.'); //Et le compact('role')

                 }else if(($user->role=="MAKER")&&($user->entite =="COFINA ML"))
                  {

                    return redirect('/cofinaml/accueil')->with(compact('role'), 'success', 'Vous êtes à présent connecté.'); //Et le compact('role')

                 }else if(($user->role=="CHECKER")&&($user->entite =="COFINA ML"))
                  {

                    return redirect('/cofinaml/accueil')->with(compact('role'), 'success', 'Vous êtes à présent connecté.'); //Et le compact('role')

                 }else if(($user->role=="MAKER")&&($user->entite =="FINELLE"))
                  {

                    return redirect('/finelle/accueil')->with(compact('role'), 'success', 'Vous êtes à présent connecté.');

                 }else if(($user->role=="CHECKER")&&($user->entite =="FINELLE"))
                  {

                    return redirect('/finelle/accueil')->with(compact('role'), 'success', 'Vous êtes à présent connecté.');
                 }



                 if(($user->role=="MAKER")&&($user->entite=="CPS SN"))
                 {

                   return redirect('/cti-maker/accueil')->with(compact('role'), 'success', 'Vous êtes à présent connecté.'); //Et le compact('role')

                 }
                 else if(($user->role=="CHECKER")&&($user->entite =="CPS SN"))
                  {

                    return redirect('/accueil')->with(compact('role'), 'success', 'Vous êtes à présent connecté.');

                 }


                 if(($user->role=="MAKER")&&($user->entite=="COFINA BF"))
                 {

                   return redirect('/cofinabf/accueil')->with(compact('role'), 'success', 'Vous êtes à présent connecté.'); //Et le compact('role')

                 }
                 else if(($user->role=="CHECKER")&&($user->entite =="COFINA BF"))
                  {

                    return redirect('/cofinabf/accueil')->with(compact('role'), 'success', 'Vous êtes à présent connecté.');

                 }

                 if(($user->role=="MAKER")&&($user->entite=="CPS CI"))
                 {

                   return redirect('/accueil')->with(compact('role'), 'success', 'Vous êtes à présent connecté.'); //Et le compact('role')

                 }
                 else if(($user->role=="CHECKER")&&($user->entite =="CPS CI"))
                  {

                    return redirect('/accueil')->with(compact('role'), 'success', 'Vous êtes à présent connecté.');

                 }


                 if(($user->role=="MAKER")&&($user->entite=="CPS ML"))
                 {

                   return redirect('/cti-maker/accueil')->with(compact('role'), 'success', 'Vous êtes à présent connecté.'); //Et le compact('role')

                 }
                 else if(($user->role=="CHECKER")&&($user->entite =="CPS ML"))
                  {

                    return redirect('/accueil')->with(compact('role'), 'success', 'Vous êtes à présent connecté.');

                 }


                 if(($user->role=="MAKER")&&($user->entite=="COFINA SERVICES FRANCE"))
                 {

                   return redirect('/cti-maker/accueil')->with(compact('role'), 'success', 'Vous êtes à présent connecté.'); //Et le compact('role')

                 }
                 else if(($user->role=="CHECKER")&&($user->entite =="COFINA SERVICES FRANCE"))
                  {

                    return redirect('/accueil')->with(compact('role'), 'success', 'Vous êtes à présent connecté.');

                 }


             }



    }else{

       return back()
            ->withInput()->withErrors([
              'email' => 'Veuillez entrer des identifiants correctes svp!'
            ]);

    }

  }

      public function comptemaker(Request $request)
      {

          $profils = Employe::where('email', $request->get('email'))->get();

         return view('/includes/master',['profils' => $profils ]);
       }


}
