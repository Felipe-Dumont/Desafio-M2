<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\GrupoCampanha as RequestsGrupoCampanha;
use App\Models\Campanha;
use App\Models\Grupo;
use App\Models\GrupoCampanha as ModelsGrupoCampanha;
use Exception;
use Illuminate\Http\Request;

class GrupoCampanha extends Controller
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
    public function store(RequestsGrupoCampanha $request)
    {
        $this->validaGrupoAndCampanhaExistente($request->campanha, $request->grupo);

        $grupoCampanhaExistente = ModelsGrupoCampanha::where('campanha', $request->campanha)
            ->where('grupo', $request->grupo)
            ->where('ativo', 'S')
            ->first();

        if (!empty($grupoCampanhaExistente)) {
            throw new Exception('Já existe um grupo com essa campanha com status ativo!');
        }

        ModelsGrupoCampanha::create($request->all());
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
    public function update(RequestsGrupoCampanha $request, $id)
    {
        $this->validaGrupoAndCampanhaExistente($request->campanha, $request->grupo);

        $grupoCampanha = ModelsGrupoCampanha::find($id);
        $grupoCampanha->campanha = $request->campanha;
        $grupoCampanha->grupo = $request->grupo;
        $grupoCampanha->ativo = $request->ativo;
        $grupoCampanha->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grupoCampanha = ModelsGrupoCampanha::find($id);

        if (empty($grupoCampanha)) {
            throw new Exception('Não encontrado campanha para esse grupo!');
        }

        $grupoCampanha->delete();
    }

    private function validaGrupoAndCampanhaExistente(int $campanha, int $grupo): void
    {
        if (!Campanha::where('id', $campanha)->first()) {
            throw new Exception('Campanha não encontrada');
        }

        if (!Grupo::where('id', $grupo)->first()) {
            throw new Exception('Grupo não encontrada');
        }
    }
}
