<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Contracts\Auth\Authenticatable  as BasicAuthenticatable;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthContract;

class Employe extends Model implements AuthContract
{
    //use BasicAuthenticatable;

     use Authenticatable;

      protected $fillable = [
      'matricule',
      'numero_sss',
      'nom',
      'prenom',
      'password',
      'email',
      'role',
      'date_naissance',
      'mail_perso',
      'tel_pro',
      'tel_perso',
      'contact_urgent',
      'entite',
      'sexe',
      'photo',
      'civilite',
      'situation_matrimoniale',
      'nbre_enfant',
      'nationnalite',
      'origine',
      'secteur',
      'categorie',
      'departement',
      'statut',
      'pays',
      'age',
    ];

    public function getAuthPassword()
    {
      return $this->password;
    }

    public function getRememberToken()
    {
    return $this->remember_token;
    }

    public function setRememberToken($value)
    {
    $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
      //return 'remember_token';
    return '';
    }


    public function departements()
    {
      return $this->belongsToMany('App/Departement');
    }

    public function conges()
    {
      return $this->hasMany('App/Conge');
    }

    public function contrats()
    {
      return $this->hasMany('App/Contrat');
    }

    public function experiences()
    {
      return $this->hasMany('App/Experience');
    }

    public function formations()
    {
      return $this->hasMany('App/Formation');
    }

    public function performances()
    {
      return $this->hasMany('App/Performance');
    }

    public function postes()
    {
      return $this->hasMany('App/Poste');
    }

    public function promotions()
    {
      return $this->hasMany('App/Promotion');
    }

    public function sanctions()
    {
      return $this->hasMany('App/Sanction');
    }
    public function departs()
    {
      return $this->hasMany('App/Depart');
    }

}
