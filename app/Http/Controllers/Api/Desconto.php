<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Desconto as RequestsDesconto;
use App\Http\Resources\Desconto as ResourcesDesconto;
use App\Models\Campanha;
use App\Models\Desconto as ModelsDesconto;
use Exception;
use Illuminate\Http\Request;

class Desconto extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ResourcesDesconto::collection(
            ModelsDesconto::all()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestsDesconto $request)
    {
        if (!Campanha::where('id', $request->campanha)->first()) {
            throw new Exception('Campanha não encontrada');
        }

        $campanhaExistente = ModelsDesconto::where('campanha', $request->campanha)
            ->first();

        if (!empty($campanhaExistente)) {
            throw new Exception('já existe desconto cadastrada para os produtos dessa campanha!');
        }

        ModelsDesconto::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return ResourcesDesconto::collection(
            ModelsDesconto::where('id', $id)->get()
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestsDesconto $request, $id)
    {
        $desconto = ModelsDesconto::find($id);
        $desconto->porcentagem_desconto = $request->porcentagem_desconto;
        $desconto->campanha = $request->campanha;
        $desconto->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $desconto = ModelsDesconto::find($id);

        if (empty($desconto)) {
            throw new Exception('Essa campanha não está cadastrada!');
        }

        $desconto->delete();
    }
}
