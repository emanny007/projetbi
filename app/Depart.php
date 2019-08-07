<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Depart extends Model
{
      protected $fillable = ['libelle','date_depart','motif'];


      public function employes()
      {
        return $this->belongsToMany('App/Employe');
      }

}
