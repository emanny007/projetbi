<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contrat extends Model
{
      protected $fillable = ['type_contrat','date_debut','date_fin','employe_id'];


      public function employes()
      {
        return $this->belongsTo('App/Employe');
      }

}
