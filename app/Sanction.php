<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sanction extends Model
{
    protected $fillable = ['date_sanction','type_sanction','commentaire','employe_id'];

    public function employes()
    {
      return $this->belongsTo('App/Employe');
    }

}
