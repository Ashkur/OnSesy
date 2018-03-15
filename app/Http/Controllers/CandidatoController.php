<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Candidato;
use App\User;

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
    public function create($cpf, $idEdital)
    {
        $ar = array();
        $ar['cpf'] = $cpf;
        $ar['edital'] = $idEdital;
        return $ar;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request;
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
                //aplicar mais tarde
            }else 
                $res = "cadastrar";
        }
            
        return response()->json($res);
    }

    public function inscrito($cpf){
        $candidato = Candidato::where('cpf', $cpf)->first();
        
        if(isset($candidato));
            return true;

        return false;
    }
}
