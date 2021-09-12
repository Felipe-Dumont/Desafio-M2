<?php

namespace App\Http\Resources;

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
        return [
            'id' => $this->id,
            'campanha' => $this->nome,
            'grupos' => $this->grupo
        ];
    }
}
