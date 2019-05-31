<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BankRequest extends FormRequest
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
            'cod_banco' => 'required',
            'nome_banco' => 'required|nome_banco' // regra nome_banco criada em app\Providers\AppServiceProvider.php
         ];
    }

    public function messages()
    {
        return [
            'cod_banco.required' => 'Informe o Código do Banco',
            'nome_banco.required' => 'Informe o Nome do Banco',
            'nome_banco.nome_banco' => 'Somente Texto'
        ];
    }
}
