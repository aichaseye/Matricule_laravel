<?php

namespace App\Http\Requests\etablissement;

use Illuminate\Foundation\Http\FormRequest;

class CreateEtabRequest extends FormRequest
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
            'nomEtab' => 'required|unique:etablissements',
            'codeIA' => 'required',
            'typeEtab' => 'required',
            'statusEtab' => 'required',
            'emailEtab' => 'required|unique:etablissements|email:etablissements,email',
            'dateCreation'=>'required'
            
        ];
    }
    public function messages(){
        return [
            'nomEtab.required' => 'Un nom d\'établissment doit etre fourni',
            'nomEtab.unique' => 'ce nom d\'établissment exist',
            'codeIA.required' => 'Un codeIA doit etre fourni',
            'typeEtab.required' => 'Un typeEtab doit etre fourni', 
             'statusEtab.required' => 'Un statusEtab doit etre fourni',
            'dateCreation.required' => 'un dateCreation doit etre fourni',
            'emailEtab.required' => 'un email doit etre fourni',
            'emailEtab.unique' => 'Cette adresse mail existe deja',
            'emailEtab.email' => 'L\'email est invalide',
           
        ];
    }
}

