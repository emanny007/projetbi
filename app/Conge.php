<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conge extends Model
{
    protected $fillable = ['date_demande','libelle','type_conge','date_depart','date_retour','solde','statut','nbre_jour','commentaire','validation','employe_id'];


    public function employes()
    {
      return $this->belongsTo('App/Employe');
    }

}
