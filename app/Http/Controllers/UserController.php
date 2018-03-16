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
        return $this->listar();
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
        $validator = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'cpf' => 'required|string|min:14|cpf|unique:users',                        
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|min:6|same:password'
        ],[
            'name.required' => 'Preencha o campo Nome!',
            'name.string' => 'O nome não pode ser numérico!',
            'name.max' => 'O nome não pode ser maior que 255 caracteres!',
            'email.required' => 'Preencha o campo E-mail!',
            'email.max' => 'O E-mail não pode ser maior que 255 caracteres!',
            'email.unique' => 'E-mail inválido!',
            'cpf.required' => 'Preencha o campo CPF!',
            'cpf.min' => 'O campo CPF de conter 11 digitos!',
            'cpf.unique' => 'CPF inválido!',
            'password.required' => 'Preencha o campo Senha!',
            'password.min' => 'A senha deve ter no mínimo 6 caracteres!',
            'password.confirmed' => 'A senha não confere!',
            'password_confirmation.required' => 'Preencha o campo Confirmar!'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->cpf = $request->cpf;
        $user->password = bcrypt($request->password);
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
        if($user == NULL)
            return $this->listar();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->cpf = $request->cpf;
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

        if($user == NULL)
            return $this->listar();

        $papel = $this->temPapel($user->id);

        if($papel)
            $this->detachPapel($user, $papel);

        $user->delete();

        return $this->listar();
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
        
        if($user == NULL)
            return $this->listar();

        $user->papeis()->detach($request->papel);

        return $this->papel($id);
    }

    public function temPapel($id){
        $user = User::find($id);
        
        if($user->papeis()->get() != "[]"){
            $papel = $user->papeis()->get();
            foreach($papel as $papelId){
                return $papelId->id;
            }
        } else return false;
    }

    public function detachPapel($user, $papel){
        $user->papeis()->detach($papel);
        return true;
    }

}
