<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $fillable = ['libelle','salaire_actuel','salaire_debut','anciennete','employe_id'];

    public function employes()
    {
      return $this->belongsTo('App/Employe');
    }

}
