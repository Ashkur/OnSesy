<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
Route::get('/z', function () {
    $numero = 4;

    $numero = --$numero;
     return $numero;
});

Route::get('/', function () {
    $editais = App\Edital::all();
    return view('welcome', compact('editais'));
});

Route::get('/a', function (){

    if (Auth::check()){
     Auth::logout();
     return redirect("/login");
}
});
Route::get('/home', 'HomeController@index')->name('home');

Route::group( ['middleware' => ['auth']], function() {
    Route::resource('users', 'UserController');
    Route::resource('roles', 'RoleController');
    Route::resource('edital', 'EditalController');
    Route::resource('cargos', 'CargoController');
});

//ADD CARGO
Route::get('{id}/cargos/add', 'CargoController@add');
Route::post('{edital}/store', 'CargoController@salvarCargo');   
//ADD Comunicado
Route::post('{id}/comunicado/criar', 'EditalController@addComunicado');

//ROTAS CANDIDATO
Route::prefix('candidato')->group(function () {
    Route::get('{id}/edital/{edital}/inscricao', 'CandidatoController@create');
    Route::get('{cpf}/comprovante', 'CandidatoController@gerarComprovante');
    Route::post('/inscricao', 'CandidatoController@store');
    Route::post('validarCPF', 'CandidatoController@validaInscricao');
});


//ROTAS CARGO
Route::middleware('auth')->prefix('cargo')->group(function () {
    Route::get('lista', 'CargoController@index');
    Route::get('{id}/adicionar', 'CargoController@create');
    Route::post('{id}/adicionar', 'CargoController@store');
    Route::get('{id}', 'CargoController@show');
});
/*
//ROTAS EDITAL
Route::middleware('auth')->prefix('edital')->group(function () {
    Route::get('/', 'EditalController@index');

    Route::get('criar', 'EditalController@create');
    Route::post('lista', 'EditalController@store');

    Route::get('{id}/editar', 'EditalController@edit');
    Route::put('{id}/editar', 'EditalController@update');

    Route::delete('{id}/excluir', 'EditalController@destroy');

    Route::get('{id}/editar', 'EditalController@edit');

    Route::post('{id}/comunicado/criar', 'EditalController@addComunicado');
});
*/
//ROTAS COMUNICADO
Route::prefix('comunicado')->group(function () {
    Route::get('lista', 'ComunicadoController@index');
    Route::get('{id}/criar', 'ComunicadoController@create');
    Route::post('criar', 'ComunicadoController@store');
    Route::get('{id}/editar', 'ComunicadoController@edit');
    Route::put('{id}/editar', 'ComunicadoController@update');
    Route::delete('{id}/remover', 'ComunicadoController@destroy');

    Route::get('{id}', 'ComunicadoController@show');
});

/*
//ROTAS USER
Route::prefix('user')->group(function () {
    Route::get('dashboard', 'UserController@index');
    Route::get('lista', 'UserController@listar');
    Route::get('{id}/papel', 'UserController@papel');
    Route::get('adicionar', 'UserController@create');
    Route::post('adicionar', 'UserController@store');
    Route::get('{id}/edit', 'UserController@edit');
    Route::put('{id}/edit', 'UserController@update');
    Route::delete('{id}/remover', 'UserController@destroy');
    Route::post('{id}/aplicar/papel}', 'UserController@aplicarPapel');
    Route::post('{id}/remover/papel}', 'UserController@removerPapel');
});
*/

//teste de cadastro do usuario
Route::group(['prefix' => 'usuario'], function () {
    Route::get('/cadastro', 'UserController@formularioCadastro');
    Route::post('/cadastro', 'UserController@cadastrar');
    Route::get('/cadastro/escolaridade', 'UserController@formularioEscolaridade');
    Route::post('/cadastro/escolaridade', 'UserController@cadastrarEscolaridade');
});



