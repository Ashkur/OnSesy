<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

        return $this->index();
    }
}
