<?php

namespace App\Http\Requests\etablissement;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class EditEtabRequest extends FormRequest
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
            'nomEtab'=>'required',
            'emailEtab'=>'required|email',
            'statusEtab'=>'required', 
            'typeEtab'=>'required',       
            'codeIA'=>'required',    
            'dateCreation'=>'required',
            
        ];
    }

    // public function failedValidation(Validator $validator){
    //     throw new HttpResponseException(response()->json([
    //         'succes'=>false,
    //         'status_code' => 422,
    //         'error'=>true,
    //         'message'=>'Erreur de validation',
    //          'errorsList'=>$validator->errors()

    //     ]));
        
    // }

   public function messages(){
        return[
            'nomEtab.required'=>'un nom doit etre fourni',
            'emailEtab.required'=>'un email doit etre fourni',
            'emailEtab.email'=>'email  non valide',
            'statusEtab.required'=>'le status doit etre fourni',
            'typeEtab.required'=>'le type doit etre fourni',
            'codeIA.required'=>'un code IAdoit etre fourni',
            'dateCreation.required'=>'une date doit etre fourni',

        ];

    }    

}
