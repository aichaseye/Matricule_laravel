<?php

namespace App\Http\Requests\matiere;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateMatiereRequest extends FormRequest
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
            'nom'=>'required',
            'codeIA'=>'required',
            'structureCible'=>'required',
            // 'image'=>'image'
            
        ];
    }

    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'succes'=>false,
            'status_code' => 422,
            'error'=>true,
            'message'=>'Erreur de validation',
             'errorsList'=>$validator->errors()

        ]));
        
    }

   public function messages()
 {
        return[
            'nom.required'=>'un nom doit etre fourni',
            'codeIA.required'=>'un code IA doit etre fourni',
            'structureCible.required'=>'une structure Cible doit etre fourni',

        ];
   }
}
