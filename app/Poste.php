<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poste extends Model
{
    protected $fillable = [
      'intitule',
      'fonction',
      'grade_local',
      'grade_cofina',
      'fonction_n1',      
      'date_embauche',
      'date_entree',
      'anciennete',
      'employe_id'
    ];

    public function employes()
    {
      return $this->belongsTo('App/Employe');
    }

}
