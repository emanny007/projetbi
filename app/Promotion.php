<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $fillable = ['libelle','salaire_actuel','salaire_debut','anciennete'];

    public function employes()
    {
      return $this->belongsToMany('App/Employe');
    }

}
