<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desconto extends Model
{
    use HasFactory;

    protected $fillable = [
        'porcentagem_desconto',
        'campanha'
    ];

    public function setGrupoAttribute(int $value): void
    {
        if (!$idCampanha = Campanha::id($value)) {
            throw new Exception('Campanha não encontrado.');
        }

        $this->attributes['campanha'] = $idCampanha->id;
    }
}
