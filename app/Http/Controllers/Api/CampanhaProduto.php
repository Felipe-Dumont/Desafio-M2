<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CampanhaProduto as RequestsCampanhaProduto;
use App\Models\Campanha;
use App\Models\CampanhaProduto as ModelsCampanhaProduto;
use App\Models\Produto;
use Exception;
use Illuminate\Http\Request;

class CampanhaProduto extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestsCampanhaProduto $request)
    {
        $this->validaProdutoAndCampanhaExistente($request->campanha, $request->produto);

        $grupoCampanhaExistente = ModelsCampanhaProduto::where('campanha', $request->campanha)
            ->where('produto', $request->produto)
            ->first();

        if (!empty($grupoCampanhaExistente)) {
            throw new Exception('Já existe um produto com essa campanha!');
        }

        ModelsCampanhaProduto::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestsCampanhaProduto $request, $id)
    {
        $this->validaGrupoAndCampanhaExistente($request->campanha, $request->produto);

        $campanhaProduto = ModelsCampanhaProduto::find($id);
        $campanhaProduto->campanha = $request->campanha;
        $campanhaProduto->produto = $request->produto;
        $campanhaProduto->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $campanhaProduto = ModelsCampanhaProduto::find($id);

        if (empty($campanhaProduto)) {
            throw new Exception('Não encontrado produtos vinculados com essa campanha!');
        }

        $campanhaProduto->delete();
    }

    private function validaProdutoAndCampanhaExistente(int $campanha, int $produto): void
    {
        if (!Campanha::where('id', $campanha)->first()) {
            throw new Exception('Campanha não encontrada');
        }

        if (!Produto::where('id', $produto)->first()) {
            throw new Exception('Produto não encontrada');
        }
    }
}
