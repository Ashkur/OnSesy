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
    Route::get('criar', 'ComunicadoController@create');
    Route::post('criar', 'ComunicadoController@store');
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


Route::group(['prefix' => 'administrador'], function () {
    Route::get('/home', 'AdministradorController@index');
    Route::get('/criarusuario', 'AdministradorController@criarUsuario');
    Route::get('/criarpermissoes', 'AdministradorController@criarPermissoes');
    Route::get('/definirpermissoesdousuario', 'AdministradorController@definirPermissoesDoUsuario');
    Route::get('/listapapel', 'AdministradorController@listaPapel');
});

Route::prefix('gerente')->group(function () {
    Route::get('/home', 'GerenteController@index');
    Route::get('/listadeseletivos', 'GerenteController@listarSeletivos');
    Route::get('/listaderelatorios', 'GerenteController@listarRelatorios');
    Route::get('/detalhesseletivo', 'GerenteController@detalharSeletivo');
    Route::get('/criarseletivo', 'GerenteController@criarSeletivo');
    Route::post('/criarseletivo', 'GerenteController@salvarSeletivo');
    Route::get('/editarseletivo', 'GerenteController@editarSeletivo');
    Route::get('/definirpermissao', 'GerenteController@definirPermissaoParaUsuarios');
});

Route::prefix('auxiliar')->group(function () {
    Route::get('/home', 'AuxiliarController@index');
    Route::get('/listadeseletivos', 'AuxiliarController@listarSeletivos');
    Route::get('/listaderelatorios', 'AuxiliarController@listarRelatorios');
    Route::get('/detalhesseletivo', 'AuxiliarController@detalharSeletivo');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
