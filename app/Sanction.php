<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sanction extends Model
{
    protected $fillable = ['liste'];

    public function employes()
    {
      return $this->belongsToMany('App/Employe');
    }

}
