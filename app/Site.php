<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $fillable = ['pays','entite','nationnalite','lien'];
}
