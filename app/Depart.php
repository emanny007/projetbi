<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Depart extends Model
{
      protected $fillable = ['date_depart','type_depart','motif','statut','employe_id'];


      public function employes()
      {
        return $this->belongsTo('App/Employe');
      }

}
