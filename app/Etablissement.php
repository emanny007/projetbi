<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etablissement extends Model
{
  protected $fillable = ['libelle','sigle','telephone','adresse','boite_postale','siteweb','ville','pays'];
}
