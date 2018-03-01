<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comunicado;

class ComunicadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comunicados = Comunicado::all();
        return view('comunicado.lista', compact('comunicados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comunicado.criar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $comunicado = new Comunicado;
        $comunicado->user_id = 2;
        $comunicado->titulo = $request->titulo;
        $comunicado->data_publicacao = $request->data_publicacao;
        $comunicado->descricao = $request->descricao;
        $comunicado->save();

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
        $comunicado = Comunicado::find($id);

        return view('comunicado.editar', compact('comunicado'));
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
        $comunicado = Comunicado::find($id);

        $comunicado->titulo = $request->titulo;
        $comunicado->descricao = $request->descricao;
        $comunicado->data_publicacao = $request->data_publicacao;
        $comunicado->save();

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
        $comunicado = Comunicado::find($id);
        $comunicado->delete();
        
        return $this->index();
    }
}
