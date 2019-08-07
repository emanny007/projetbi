<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
  protected $fillable = ['libelle'];


  public function employes()
  {
    return $this->belongsToMany('App/Employe');
  }
}
