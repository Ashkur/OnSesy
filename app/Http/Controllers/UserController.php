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
            'cpf' => 'required|string|min:14||unique:users',                        
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

        if($this->validCPF($request->cpf)){
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->cpf = $request->cpf;
            $user->password = bcrypt($request->password);
            $user->save(); 
        }else{
            return back()->withInput();
        }


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

    public function validCPF($cpf){
        $d1 = 0;
        $d2 = 0;
          $cpf = preg_replace("/[^0-9]/", "", $cpf);
          $ignore_list = array(
            '00000000000',
            '01234567890',
            '11111111111',
            '22222222222',
            '33333333333',
            '44444444444',
            '55555555555',
            '66666666666',
            '77777777777',
            '88888888888',
            '99999999999'
          );
          if(strlen($cpf) != 11 || in_array($cpf, $ignore_list)){
              return false;
          } else {
            for($i = 0; $i < 9; $i++){
              $d1 += $cpf[$i] * (10 - $i);
            }
            $r1 = $d1 % 11;
            $d1 = ($r1 > 1) ? (11 - $r1) : 0;
            for($i = 0; $i < 9; $i++) {
              $d2 += $cpf[$i] * (11 - $i);
            }
            $r2 = ($d2 + ($d1 * 2)) % 11;
            $d2 = ($r2 > 1) ? (11 - $r2) : 0;
            return (substr($cpf, -2) == $d1 . $d2) ? true : false;
          }
        }
}
