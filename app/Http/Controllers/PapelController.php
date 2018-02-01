<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Papel;
use App\Permissao;

class PapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $papeis = Papel::all();

        return view('permissoes.adicionapermissao', compact('papeis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissoes = Permissao::all();
        return view('papeis.criar_papel', compact('permissoes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $papel = new Papel;
        $papel->nome = $request->nome;
        $papel->descricao = $request->descricao;
        $papel->save();

        foreach($request->permissoes as $permissao_id){
            $papel->permissoes()->attach(['id'=>$permissao_id]);
        }
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $papel = Papel::find($id);
        return view('papeis.editar_papel', compact('papel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $papel = Papel::find($id);

        $papel->nome = $request->nome;
        $papel->descricao = $request->descricao;
        if($papel->save())
            return "editado";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($papel_id)
    {
        $papel = Papel::find($papel_id);
        $papel->delete();
    }

    public function visualizarPermissoesPapel($papel_id){
        $papel = Papel::findOrFail($papel_id);

        return view('papeis.visualizar_permissao', compact('papel'));
    }

    public function removerPermissaoPapel(Request $request, $permissao_id) {
        $permissao = Permissao::find($permissao_id);
        $permissao->papeis()->detach($request->papel);
        $permissao->papeis()->delete();
    }
}
