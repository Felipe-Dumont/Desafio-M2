<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Campanha as RequestsCampanha;
use App\Http\Resources\Campanha as ResourcesCampanha;
use App\Models\Campanha as ModelsCampanha;
use Exception;

class Campanha extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ResourcesCampanha::collection(
            ModelsCampanha::all()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestsCampanha $request)
    {
        $campanhaExistente = ModelsCampanha::where('nome', $request->nome)
            ->first();

        if (!empty($campanhaExistente)) {
            throw new Exception('Essa campanha já esta cadastrada!');
        }

        ModelsCampanha::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return ResourcesCampanha::collection(
            ModelsCampanha::where('id', $id)->get()
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestsCampanha $request, $id)
    {
        $campanha = ModelsCampanha::find($id);
        $campanha->nome = $request->nome;
        $campanha->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $campanha = ModelsCampanha::find($id);

        if (empty($campanha)) {
            throw new Exception('Essa campanha não está cadastrada!');
        }

        $campanha->delete();
    }
}
