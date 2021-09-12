<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampanhaProduto extends Model
{
    use HasFactory;

    protected $table = 'campanha_produto';

    protected $fillable = [
        'produto',
        'campanha',
    ];
}
