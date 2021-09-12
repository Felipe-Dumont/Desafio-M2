<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Desconto extends FormRequest
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
            'porcentagem_desconto' => 'required|min:0|numeric',
        ];
    }

    public function messages()
    {
        return [
            'porcentagem_desconto.required' => 'Desconto obrigatório!',
            'porcentagem_desconto.min' => 'Desconto não pode ser menor que zero!'
        ];
    }
}
