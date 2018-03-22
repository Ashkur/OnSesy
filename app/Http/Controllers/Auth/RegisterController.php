<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
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
            'email.email' => 'E-mail inválido!',
            'cpf.required' => 'Preencha o campo CPF!',
            'cpf.unique' => 'CPF inválido!',
            'cpf.cpf' => 'CPF inválido!',
            'password.required' => 'Preencha o campo Senha!',
            'password.min' => 'A senha deve ter no mínimo 6 caracteres!',
            'password.confirmed' => 'A senha não confere!',
            'password_confirmation.required' => 'Preencha o campo Confirmar!',
            'password_confirmation.min' => 'A senha deve ter no mínimo 6 caracteres!',
            'password_confirmation.same' => 'A senha não confere!'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),            
            'cpf' => $data['cpf'],
        ]);
    }
}
