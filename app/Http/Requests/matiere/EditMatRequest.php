<?php

namespace App\Http\Requests\matiere;

use Illuminate\Foundation\Http\FormRequest;

class EditMatRequest extends FormRequest
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
           
        ];
    }

    public function messages(){
        return[
            'nom.required'=>'un nom doit etre fourni',
            'structureCible.required'=>'un structure Cible doit etre fourni',
            'codeIA.required'=>'un code IAdoit etre fourni',
           
        ];

    }    

}
