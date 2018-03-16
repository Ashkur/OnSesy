<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Candidato;
use App\Edital;

class CandidatoController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($cpf, $editalId)
    {
        $edital = Edital::find($editalId);
        return view('candidato.inscricao', compact('edital', 'cpf'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request->experiencias;
        $candidato = new Candidato;
        $experienciaProfissional = new ExperienciaProfissional;
        $endereco = new Endereco;

        $candidato->nome = $request->nome;
        $candidato->sobrenome = $request->sobrenome;
        $candidato->cpf = $request->cpf;
        $candidato->rg = $request->rg;
        $candidato->email = $request->email;
        $candidato->raca = $request->raca;
        $candidato->estado_civil = $request->estado_civil;
        $candidato->nacionalidade = $request->nacionalidade;
        $candidato->sexo = $request->sexo;
        $candidato->pne = $request->pne;
        $candidato->atendimento_especial = $request->atendimento_especial;
        $candidato->atendimento1 = $request->atendimento1;
        $candidato->atendimento2 = $request->atendimento2;
        //$candidato->save();

        //endereco data
        $endereco->logradouro = $request->logradouro;
        $endereco->bairro = $request->bairro;
        $endereco->cidade = $request->cidade;
        $endereco->estado = $request->estado;
        $endereco->cep = $request->cep;
        //$endereco->save();

        $experienciaProfissional->empresa = $request->empresa;
        $experienciaProfissional->descricao = $request->descricao;
        //$experienciaProfissional->save();

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function validaInscricao(){
        $input = request()->all();
        $cpf = $input['cpf'];
        $res = "invalido";
        
        $user = new User;
        if($user->validCPF($cpf)){
            if($this->inscrito($cpf)){
                //aplicar depois
            } else $res = "cadastrar";
        }
            
        return response()->json($res);
    }

    public function inscrito($cpf){
        $candidato = Candidato::where('cpf', $cpf)->first();
        if(isset($candidato))
            return true;

        return false;
    }
}
