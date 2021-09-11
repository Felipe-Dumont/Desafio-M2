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
        if (!$idGrupo = Grupo::find($value)) {
            throw new Exception('Grupo não encontrado.');
        }

        $this->attributes['grupo'] = $idGrupo->id;
    }

    public function grupo()
    {
        return $this->hasOne('Grupo', 'id', 'grupo');
    }
}
