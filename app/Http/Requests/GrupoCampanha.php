<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GrupoCampanha extends FormRequest
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
            'grupo' => 'required|min:0|numeric',
            'campanha' => 'required|min:0|numeric',
            'ativo' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'grupo.required' => 'Grupo é obrigatório!',
            'campanha.required' => 'Campanha é obrigatório!',
            'ativo.required' => 'Ativo é obrigatório!',
            'min' => ':attribute não pode ser menor que zero!'
        ];
    }
}
