<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Papel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('usuario.listar');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario.adicionar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->cpf = $request->cpf;
        $user->password = $request->password;
        $user->save();
        return $this->listar();        
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
        $user = User::find($id);
        return view('usuario.editar', compact('user'));
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
        $user = User::find($id);
        $user->name = $request->nome;
        $user->email = $request->email;
        $user->cpf = $request->cpf;
        $user->password = $request->password;
        $user->save();

        return $this->listar();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $this->temPapel($user->id);
        //$user->delete();
        //return $this->listar();
    }

    public function listar(){
        $users = User::all();
        return view('usuario.lista', compact('users'));
    }

    public function papel($id){
        $user = User::find($id);
        $papeisDoUsuario = $user->papeis;
        $papeis = Papel::all();

        if($papeisDoUsuario == "[]")
            $papeisDoUsuario = NULL;
        
        return view('usuario.papel', compact('papeisDoUsuario', 'papeis', 'user'));
    }

    public function aplicarPapel(Request $request, $id){
        $user = User::find($id);

        $user->papeis()->attach($request->papel);

        return $this->papel($id);
    }

    public function removerPapel(Request $request, $id){
        $user = User::find($id);

        $user->papeis()->detach($request->papel);

        return $this->papel($id);
    }

    public function temPapel($id){
        $user = User::find($id);
        
        if($user->papeis()->get() == "[]")
            return true;
    }
}
