<?php

namespace App\Http\Resources;

use App\Http\Resources\Cidade as ResourcesCidade;
use App\Models\Cidade;
use Illuminate\Http\Resources\Json\JsonResource;

class Grupo extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'grupo' => $this->nome,
            'cidades' => ResourcesCidade::collection(Cidade::where('grupo', $this->id)->get()),
        ];
    }
}
