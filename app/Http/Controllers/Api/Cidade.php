<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cidade as RequestsCidade;
use App\Http\Resources\Cidade as ResourcesCidade;
use App\Models\Cidade as ModelsCidade;
use Exception;
use Illuminate\Http\Request;

class Cidade extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ResourcesCidade::collection(
            ModelsCidade::all()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestsCidade $request)
    {
        $this->validadeCidadeExistente($request->all());

        ModelsCidade::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return ResourcesCidade::collection(
            ModelsCidade::where('id', $id)->get()
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestsCidade $request, $id)
    {
        $this->validadeCidadeExistente($request->all());

        $cidade = ModelsCidade::find($id);
        $cidade->nome = $request->nome;
        $cidade->estado = $request->estado;
        $cidade->grupo = $request->grupo;
        $cidade->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grupo = ModelsCidade::find($id);

        if (empty($grupo)) {
            throw new Exception('Essa cidade não está cadastrada!');
        }

        $grupo->delete();
    }

    private function validadeCidadeExistente(array $request): void
    {
        $cidadeExistente = ModelsCidade::where('nome', $request['nome'])
            ->where('estado', $request['estado'])
            ->first();

        if (!empty($cidadeExistente)) {
            throw new Exception('Essa cidade já esta cadastrada!');
        }
    }
}
