<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContacRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
       return [
          'matricule' => 'bail|required|between:5,20',
          'numero_sss' => 'bail|required',
          'nom' => 'required|max:255|min:4|alpha',
          'prenom' => 'required',
          'date_naissance' => 'required',
          'mail_pro' => 'bail|required|email',
          'mail_perso' => 'bail|required|email',
          'tel_pro' => 'required',
          'tel_perso' => 'required',
          'contact_urgent' => 'required',
          'entite' => 'required',
          'sexe' => 'required',
          'photo' => 'required',
          'civilite' => 'required',
          'situation_matrimoniale' => 'required',
          'nbre_enfant' => 'required',
          'nationnalite' => 'required',
          'origine' => 'required'
        ];

    }
}
