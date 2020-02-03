<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employe;
use App\Performance;

use App\Departement;
use Image;
use App\Groupe;
use App\Site;
use DB;

class PerformancebfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $performances=DB::select("select * from employes,performances where employes.id=performances.employe_id and employes.entite='COFINA BF' and employes.statut='ACTIVE'");

         return view('cofinabf.performances.index', compact('performances'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function modif($id)
    {

      $performance = new Performance();

      $poste=DB::table('employes')->select('performances.employe_id','employes.matricule','employes.nom','employes.prenom','employes.sexe','employes.departement','employes.categorie','employes.secteur','employes.entite','employes.email','performances.employe_id',
      'performances.libelle','performances.note_mp','performances.note_mdv_mp','performances.note_ef','performances.position_ef','performances.note_mdv')
       ->join('performances','employes.id','=','performances.employe_id')->where('employe_id', '=', $id)->get()->first();

      $performance = Performance::where('employe_id', $id)->orderby('id','desc')->get()->first();
      $employe = Employe::findOrFail($id);

       return view('cofinabf.performances.modif', compact('employe','performance'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

  /*    $request->validate([
         'note_mp' => 'numeric',
         'note_mdv_mp' => 'numeric',
         'note_ef' => 'numeric',
         'note_mdv' => 'numeric',
         'libelle' => 'required|numeric',
       ]
);
*/

      $performance = new Performance([
        'note_mp' => $request->get('note_mp'),
        'note_mdv_mp' => $request->get('note_mdv_mp'),
        'note_ef' => $request->get('note_ef'),
        'note_mdv' => $request->get('note_mdv'),
        'position_ef' => $request->get('position_ef'),
        'libelle' => $request->get('annee_eval'),
        'employe_id' => $request->get('id_empl')
      ]);
      $performance->save();
      flash("Vos informations ont bien été ajoutées !!!")->success();

      return redirect()->back()->with('success', 'Les informations renseignées ont bien été rajoutées');
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
      $performance = new Performance();
      $performance = Performance::where('employe_id', $id)->orderby('id','desc')->get();
      $employe = Employe::findOrFail($id);

       return view('cofinabf.performances.edit', compact('employe','performance'));
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

      $id=$request->get('id_empl');

      $performances = Performance::findOrFail($id);

        $performances->note_mp = $request->get('note_mp');
        $performances->note_mdv_mp = $request->get('note_mdv_mp');
        $performances->note_ef = $request->get('note_ef');
        $performances->note_mdv = $request->get('note_mdv');
        $performances->position_ef = $request->get('position_ef');
        $performances->libelle = $request->get('annee_eval');
        $performances->employe_id = $request->get('id_empl');
        $performances->updated_at = $today;
        $performances->save();

        flash("Vos informations ont bien été ajoutées !!!")->success();
       return redirect()->back()->with('success', 'Les informations renseignées ont bien été rajoutées');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $performance = Performance::findOrFail($id);
      $performance->delete();

      return redirect()->back()->with('status','Rating deleted !!');
    }
}
