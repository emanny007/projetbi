<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = ['entreprise','poste','niveau_etude','nbre_annee_exp','date_debut','date_fin','diplome','sigle','employe_id'];

    public function employes()
    {
      return $this->belongsTo('App/Employe');
    }

}
