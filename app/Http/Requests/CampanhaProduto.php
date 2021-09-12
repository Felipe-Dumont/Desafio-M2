<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CampanhaProduto extends FormRequest
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
            'produto' => 'required|min:0|numeric',
            'campanha' => 'required|min:0|numeric',
        ];
    }

    public function messages()
    {
        return [
            'produto.required' => 'Produto é obrigatório!',
            'campanha.required' => 'Campanha é obrigatório!',
            'min' => ':attribute não pode ser menor que zero!'
        ];
    }
}
