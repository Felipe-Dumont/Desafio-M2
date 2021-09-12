<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campanha extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome'
    ];

    public function grupo()
    {
        return $this->belongsToMany(Grupo::class, 'grupo_campanha', 'campanha', 'grupo');
    }

    public function produto()
    {
        return $this->belongsToMany(Produto::class, 'campanha_produto', 'campanha', 'produto');
    }
}
