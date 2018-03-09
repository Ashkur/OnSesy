<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CargoEdital;
use App\Edital;

class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($edital_id)
    {
        $edital = Edital::find($edital_id);
        return view('edital.cargo.adicionar', compact('edital'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $edital_id)
    {
        $edital = Edital::find($edital_id);

        $cargo = new CargoEdital;
        $cargo->nome_cargo = $request->nome_cargo;
        $cargo->curso = $request->curso;
        $cargo->numero_vagas = $request->numero_vagas;
        $cargo->turno_trabalho = $request->turno_trabalho;
        $cargo->remuneracao = $request->remuneracao;
        $cargo->tempo_experiencia = $request->tempo_experiencia;

        $edital->cargo()->save($cargo);

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

        $edital = Edital::find($id);
        return view('edital.cargo.cargo', compact('edital'));
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
}
