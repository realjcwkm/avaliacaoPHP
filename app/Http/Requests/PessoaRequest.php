<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PessoaRequest extends FormRequest
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
            'cNome' => 'required',
            'cDataNasc' => 'required|date',
            'cEmail' => 'required|email'

        ];
    }
    public function messages()
    {
        return [
            'cNome.required' => 'O campo nome é requerido.',
            'cDataNasc.required' => 'Preencha a data de nascimento.',
            'cEmail.required' => 'Preencha o campo email com um email válido.'
        ];
    }
}
