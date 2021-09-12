<?php

use App\Http\Controllers\Api\Campanha;
use App\Http\Controllers\Api\CampanhaProduto;
use App\Http\Controllers\Api\Cidade;
use App\Http\Controllers\Api\Desconto;
use App\Http\Controllers\Api\Grupo;
use App\Http\Controllers\Api\GrupoCampanha;
use App\Http\Controllers\Api\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResource('grupo', Grupo::class);
Route::apiResource('cidade', Cidade::class);
Route::apiResource('produto', Produto::class);
Route::apiResource('campanha', Campanha::class);
Route::apiResource('desconto', Desconto::class);
Route::apiResource('grupo-campanha', GrupoCampanha::class);
Route::apiResource('campanha-produto', CampanhaProduto::class);
