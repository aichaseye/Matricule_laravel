<?php

namespace App\Http\Requests\apprenant;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
class EditAppRequest extends FormRequest
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
            'num_tel' => 'required',
            'email' => 'required|email'
            
        ];
    }

    // public function failedValidation(Validator $validator){
    //     throw new HttpResponseException(response()->json([
    //         'sucess' => false,
    //         'status_code' => 422,
    //         'error' => true,
    //         'message' => 'Erreur de validation',
    //         'errorsList' => $validator->errors()
    //     ]));
    // }
    public function messages(){
        return [
            'nom.required' => 'Un nom doit etre fourni',
            'prenom.required' => 'Un prenom doit etre fourni',
            'genre.required' => 'Le genre doit etre fourni', 
            'genre.in' => 'erreur de saisie',
            'num_tel.required' => 'un numero de telephone doit etre fourni',
            
            'email.required' => 'L\'email doit etre fourni',
            'email.email' => 'Cette adresse mail est invalide',
           
        ];
    }
}
