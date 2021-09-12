<?php

namespace App\Http\Resources;

use App\Models\Desconto;
use Illuminate\Http\Resources\Json\JsonResource;

class Campanha extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $campanha = $this->id;

        return [
            'id' => $campanha,
            'campanha' => $this->nome,
            'grupos' => Grupo::collection($this->grupo),
            'produtos' => Produto::collection($this->produto)->map(function ($valor) use ($campanha) {
                return [
                    "id" => $valor->id,
                    "nome" => $valor->nome,
                    "valor_com_desconto" => number_format(
                        $valor->valor - ($valor->valor / 100 * (Desconto::where('campanha', $campanha)->first() ? Desconto::where('campanha', $campanha)->first()->porcentagem_desconto : 0)),
                        2,
                        '.',
                        ''
                    ) . " R$"
                ];
            }),
        ];
    }
}
