<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use App\Employe;
use App\Site;
use Image;
use DB;



class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $sites= Site::all();

      return view('parametres.sites.index', compact('sites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $sites= Site::all();

        return view('parametres.sites.create',['sites' => $sites]);
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

         'photo' => 'required',
         'nationnalite' => 'required',
         'pays' => 'required',

       ]
);
        //  Employe::create($request->all());

        $today = date("Y-m-d H:i:s");

        $site = new Site([

          'entite' => strtoupper($request->get('entite')),
          'pays' => strtoupper($request->get('pays')),
          'nationnalite' => strtoupper($request->get('nationnalite')),
          'created_at'=>$today,
          'updated_at'=>$today,

        ]);

        if($request->hasFile('photo')){
          $photo = $request->file('photo');
          $filename= $request->photo->getClientOriginalName();
          Image::make($photo)->save(public_path('/images/drapeau/'.$filename));
          //$request->photo->storeAs('public/images',$filename);
          $site->lien = $filename;
        }

        $site->save();

       return redirect('/parametres/sites')->with('success', 'Vos données ont été ajoutés avec succes !');
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
