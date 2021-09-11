<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Grupo as RequestsGrupo;
use App\Http\Resources\Grupo as ResourcesGrupo;
use App\Models\Grupo as ModelsGrupo;
use Illuminate\Http\Request;

class Grupo extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ResourcesGrupo::collection(
            ModelsGrupo::all()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestsGrupo $request)
    {
        ModelsGrupo::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return ResourcesGrupo::collection(
            ModelsGrupo::where('id', $id)->get()
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestsGrupo $request, $id)
    {
        $grupo = ModelsGrupo::find($id);
        $grupo->nome = $request->nome;
        $grupo->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grupo = ModelsGrupo::find($id);
        $grupo->delete();
    }
}
