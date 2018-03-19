<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Candidato;
use App\Edital;
use App\Endereco;
use App\Escolaridade;
use App\ExperienciaProfissional;

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

        $candidato = new Candidato;
        $endereco = new Endereco;
        $escolaridade = new Escolaridade;

        $candidato->nome = $request->nome;
        $candidato->sobrenome = $request->sobrenome;
        $candidato->cpf = $request->cpf;
        $candidato->rg = $request->rg;
        $candidato->email = $request->email;
        $candidato->raca = $request->raca;
        $candidato->estado_civil = $request->estado_civil;
        $candidato->naturalidade = $request->naturalidade;
        $candidato->nacionalidade = $request->nacionalidade;
        $candidato->filiacao1 = $request->filiacao1;
        $candidato->filiacao2 = $request->filiacao2;
        $candidato->telefone1 = $request->telefone1;
        $candidato->telefone2 = $request->telefone2;

        foreach($request->sexo as $sexo)
            $candidato->sexo = $sexo;
        
        $candidato->pne = $request->pne;
        $candidato->atendimento_especial = $request->atendimento_especial;
        $candidato->save();        

        //experiencias
        foreach($request->experiencias as $exp){
            $experienciaProfissional = new ExperienciaProfissional;
            $experienciaProfissional->empresa = $exp['empresa'];
            $experienciaProfissional->cargo = $exp['cargo'];
            $experienciaProfissional->funcao = $exp['funcao'];
            $experienciaProfissional->data_inicio = $exp['data_inicio'];
            $experienciaProfissional->data_fim = $exp['data_fim'];
            $experienciaProfissional->descricao = $exp['descricao'];
            $experienciaProfissional->tempo = $this->periodoDeExperiencia($exp['data_inicio'], $exp['data_fim']);
            $candidato->experiencias()->save($experienciaProfissional);
        }

        //escolaridade
        $escolaridade->instituicao = $request->instituicao;
        $escolaridade->nivel_escolar = $request->nivel_escolar;
        $escolaridade->nome_curso = $request->nome_curso;
        $escolaridade->ano_conclusao = $request->ano_conclusao;
        $candidato->escolaridade()->save($escolaridade);
        
        //endereco data
        $endereco->logradouro = $request->logradouro;
        $endereco->bairro = $request->bairro;
        $endereco->cidade = $request->cidade;
        $endereco->estado = $request->estado;
        $endereco->cep = $request->cep;
        $candidato->endereco()->save($endereco);

        return "ok";

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
        $editalId = $input['idEdital'];
        $res = "invalido";
        
        $user = new User;
        if($user->validCPF($cpf)){
            if($this->cadastrado($cpf)){
                if(!$this->inscrito($cpf, $editalId)){
                    if($this->inscrever($cpf, $editalId)){
                        $res = "inscrito";
                    }
                } $res = "inscrito";
            } else $res = "cadastrar";
        }
            
        return response()->json($res);
    }

    public function cadastrado($cpf){
        $candidato = Candidato::where('cpf', $cpf)->first();
        if(isset($candidato))
            return true;

        return false;
    }

    public function inscrever($cpf, $editalId){
        $candidato = Candidato::where('cpf', $cpf)->first();
        $edital = Edital::find($editalId);

        $candidato->edital()->attach($edital);
        return true;
    }

    public function periodoDeExperiencia($data1, $data2){

        $dt_ini = new \DateTime($data1);
        $dt_fim = new \DateTime($data2);
    
        $intervalo = $dt_ini->diff($dt_fim);

        return $intervalo->y . " Ano(s), " . $intervalo->m." Mese(s), ".$intervalo->d." Dia(s) ";        
    }

    public function gerarComprovante($cpf){
        $candidato = Candidato::where('cpf', $cpf)->first();
        return view('candidato.comprovante', compact('candidato'));
    }

    public function inscrito($cpf, $editalId){
        $candidato = Candidato::where('cpf', $cpf)->first();
        $edital = Edital::find($editalId);
        
        if($candidato->edital->contains($edital))
            return true;
        
        return false;
    }
}
