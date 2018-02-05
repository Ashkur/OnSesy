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

        return view('papeis.lista', compact('papeis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissoes = Permissao::all();
        return view('papeis.criar', compact('permissoes'));
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

        return $this->index();
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
        $permissoes = Permissao::all();
        return view('papeis.editar', compact('papel', 'permissoes'));
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
            return $this->index();
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
        
        $this->temPermissao($papel_id);

        $papel->delete();

        return $this->index();
    }

    public function temPermissao($papel_id) {
        $papel = Papel::find($papel_id);
        
        //verifico se o papel tem permissões, se verdadeiro, então removo as permissoes do papel
        foreach($papel->permissoes as $permissao){
            if($permissao->id){
                $permissao_id = $permissao->id;               
               if($this->destroyPermissaoPapel($papel_id, $permissao_id)){
                   
               }else echo "nao foi possivel remove este papel";
            }
        }
    }

    public function visualizarPermissoesPapel($papel_id){
        $papel = Papel::findOrFail($papel_id);
        
        $pms = Permissao::all();
        $teste = $papel->permissoes;
        //dd($pms);
        dd(array_diff($teste, $pms));
        return view('papeis.permissao', compact('papel', 'pms'));
    }

    public function adicionarPermissaoPapel(Request $request, $papel_id){
        $papel = Papel::find($papel_id);
        
        foreach($request->permissoes as $permissao){
            $papel->permissoes()->attach(['id'=>$permissao]);
        }
    }

    public function removerPermissaoPapel(Request $request, $permissao_id) {
        $permissao = Permissao::find($permissao_id);
        $permissao->papeis()->detach($request->papel);
    }

    public function destroyPermissaoPapel($papel_id, $permissao_id) {
        $permissao = Permissao::find($permissao_id);
        $permissao->papeis()->detach($papel_id);
        return true;
    }
}
