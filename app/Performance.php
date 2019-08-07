<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Performance extends Model
{
    protected $fillable = [
      'libelle',
      'objectif',
      'note_mp',
      'note_mdv_mp',
      'note_ef',
      'position_ef',
      'note_mdv'
    ];

    public function employes()
    {
      return $this->belongsToMany('App/Employe');
    }

}
