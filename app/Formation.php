<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    protected $fillable = ['libelle','nbre_heure','cout','date_debut','date_fin','employe_id'];

    public function employes()
    {
      return $this->belongsTo('App/Employe');
    }

}
