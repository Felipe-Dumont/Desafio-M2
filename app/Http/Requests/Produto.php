<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Produto extends FormRequest
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

    public function rules()
    {
        return [
            'nome' => 'required|min:2',
            'valor' => 'required|min:0|numeric',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'Nome do produto obrigatório!',
            'valor.required' => 'Valor do produto obrigatório!',
            'grupo.min' => 'Valor do produto não pode ser menor que zero!'
        ];
    }
}
