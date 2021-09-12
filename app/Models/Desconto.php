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

    public function campanha()
    {
        return $this->hasOne('Campanha', 'id', 'campanha');
    }
}
