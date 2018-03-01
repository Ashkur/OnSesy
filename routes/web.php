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
Route::get('/', function () {
    return view('welcome');
});

Route::get('/a', function (){

    if (Auth::check()){
     Auth::logout();
     return redirect("/login");
}
});

//TESTE COMUNICADO
Route::prefix('comunicado')->group(function () {
    Route::get('lista', 'ComunicadoController@index');
    Route::get('criar', 'ComunicadoController@create');
    Route::post('criar', 'ComunicadoController@store');
    Route::get('{id}/editar', 'ComunicadoController@edit');
    Route::put('{id}/editar', 'ComunicadoController@update');
    Route::delete('{id}/remover', 'ComunicadoController@destroy');

});


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


//ROTAS PARA EDICAO DAS PERMICÕES DOS PAPEIS
Route::get('/permissao/adicionar', 'PermissaoController@create')->name('Adcionar Permissão');

//ROTAS PARA TESTE DE PERMISSAO
Route::get('/permissao/lista', 'PermissaoController@index')->name('lista');

Route::get('/permissao/adicionar', 'PermissaoController@create');
Route::post('/permissao/adicionar', 'PermissaoController@store');

Route::get('/permissao/editar/{id}', 'PermissaoController@edit');
Route::put('/permissao/editar/{id}', 'PermissaoController@update');

Route::delete('/permissao/remover/{id}', 'PermissaoController@destroy');


//ROTAS PARA TESTE DE PAPEIS
Route::get('/papel/lista', 'PapelController@index')->name('papel_lista');//->middleware('can:temAcesso');//teste com middleware

Route::get('/papel/adicionar', 'PapelController@create');
Route::post('/papel/adicionar', 'PapelController@store');

Route::get('/papel/editar/{id}', 'PapelController@edit');
Route::put('/papel/editar/{id}', 'PapelController@update');

Route::delete('/papel/remover/{id}', 'PapelController@destroy');

Route::put('/papel/permissao/adicionar/{id}', 'PapelController@adicionarPermissaoPapel');
Route::delete('/papel/permissoes/remover/{id}', 'PapelController@removerPermissaoPapel');

Route::get('/papel/permissoes/{id}', 'PapelController@visualizarPermissoesPapel');


//teste de cadastro do usuario
Route::group(['prefix' => 'usuario'], function () {
    Route::get('/cadastro', 'UserController@formularioCadastro');
    Route::post('/cadastro', 'UserController@cadastrar');
    Route::get('/cadastro/escolaridade', 'UserController@formularioEscolaridade');
    Route::post('/cadastro/escolaridade', 'UserController@cadastrarEscolaridade');
});



Route::get('/home', 'HomeController@index')->name('home');