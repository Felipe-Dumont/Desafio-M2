<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoCampanha extends Model
{
    use HasFactory;

    protected $table = 'grupo_campanha';

    protected $fillable = [
        'grupo',
        'campanha',
        'ativo',
    ];
}
