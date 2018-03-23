<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Authorizable;
use App\Comunicado;
use App\Edital;
use App\User;
use Auth;

class EditalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    use Authorizable;
    
    public function index()
    {
        $editais = Edital::all();
        return view('edital.lista', compact('editais'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('edital.adicionar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = $request->validate([
            'entidade' => 'required|string|max:191',
            'numero' => 'required|string|max:191',
            'ano' => 'required|string|max:191',
            'data_inicio' => 'required|string|max:191',
            'data_fim' => 'required|string|max:191',
        ],[
            'entidade.required' => 'Preencha o campo Entidade/Orgão!',
            'entidade.max' => 'O campo Entidade/Orgão não pode ser maior que 191 caracteres!',
            'numero.required' => 'Preencha o campo Número!',
            'numero.max' => 'O Número não pode ser maior que 191 caracteres!',
            'ano.required' => 'Preencha o campo Ano!',
            'ano.max' => 'O campo Ano não pode ser maior que 191 caracteres!',
            'data_inicio.required' => 'Preencha o campo Data de Início!',
            'data_inicio.max' => 'O Data de Início não pode ser maior que 191 caracteres!',
            'data_fim.required' => 'Preencha o campo Data de Fim!',
            'data_fim.max' => 'O Data de Fim não pode ser maior que 191 caracteres!',
        ]);

        $user = User::find(Auth::id());

        $edital = new Edital;
        $edital->entidade = $request->entidade;
        $edital->numero = $request->numero;
        $edital->ano = $request->ano;
        $edital->data_inicio = $request->data_inicio;
        $edital->data_fim = $request->data_fim;

        $user->edital()->save($edital);
        
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
        $edital = Edital::find($id);

        return view('edital.editar', compact('edital'));
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
        $edital = Edital::find($id);
        $edital->entidade = $request->entidade;
        $edital->numero = $request->numero;
        $edital->ano = $request->ano;
        $edital->data_inicio = $request->data_inicio;
        $edital->data_fim = $request->data_fim;
        $edital->save();

        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $edital = Edital::find($id);
        if(isset($edital))
            $edital->delete();

        return redirect()->route('edital.index');
    }

    public function addComunicado(Request $request, $edital_id){
        
        $edital = Edital::find($edital_id);
        $user = User::find(Auth::id());

        $comunicado = new Comunicado;
        $comunicado->titulo = $request->titulo;
        $comunicado->data_publicacao = $request->data_publicacao;
        $comunicado->descricao = $request->descricao;

        $user->comunicado()->save($comunicado);

        $edital->comunicado()->attach(['id'=>$comunicado->id]);

        return $this->index();
    }
}
