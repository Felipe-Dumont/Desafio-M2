<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Produto as RequestsProduto;
use App\Http\Resources\Produto as ResourcesProduto;
use App\Models\Produto as ModelsProduto;
use Illuminate\Http\Request;

class Produto extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ResourcesProduto::collection(
            ModelsProduto::all()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestsProduto $request)
    {
        ModelsProduto::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return ResourcesProduto::collection(
            ModelsProduto::where('id', $id)->get()
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestsProduto $request, $id)
    {
        $produto = ModelsProduto::find($id);
        $produto->nome = $request->nome;
        $produto->valor = $request->valor;
        $produto->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = ModelsProduto::find($id);
        $produto->delete();
    }
}
