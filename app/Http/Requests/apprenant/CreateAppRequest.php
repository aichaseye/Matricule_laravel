<?php

namespace App\Http\Requests\apprenant;

use Illuminate\Foundation\Http\FormRequest;

class CreateAppRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nom' => 'required',
            'prenom' => 'required',
            'genre' => 'required|in:M,F',
            'num_tel' => 'required|integer|min:9',
            'email' => 'required|unique:apprenants|email:apprenants, email',
            'matricule'=>'nullable'
            
        ];
    }
    public function messages(){
        return [
            'nom.required' => 'Un prenom doit etre fourni',
            'prenom.required' => 'Un nom doit etre fourni',
            'genre.required' => 'Un genre doit etre fourni', 
            'genre.in' => 'Un genre doit etre M ou F ',
            'num_tel.required' => 'un numero de telephone doit etre fourni',
            'num_tel.unique' => 'Ce numero de telephone existe deja',
            'num_tel.min' => 'Ce numero de telephone doit contenir 9 chiffres au min',
            'num_tel.integer' => 'Ce numero de telephone est invalide',
            'email.required' => 'L\'email doit etre fourni',
            'email.unique' => 'Cette adresse mail existe deja',
            'email.email' => 'L\'email est invalide',
           
        ];
    }
}
