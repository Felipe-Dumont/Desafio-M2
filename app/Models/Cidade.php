<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'estado',
        'grupo'
    ];

    public function setGrupoAttribute(int $value): void
    {
        if (!$idGrupo = Grupo::id($value)) {
            throw new Exception('Grupo não encontrado.');
        }

        $this->attributes['grupo'] = $idGrupo->id;
    }
}
