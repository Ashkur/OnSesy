@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <a href="{{action('UserController@listar')}}" class="waves-effect waves-light btn">Lista de Usuarios</a>
                <a href="{{action('PapelController@index')}}" class="waves-effect waves-light btn">Lista de Papeis</a>
                <a href="{{action('PermissaoController@index')}}" class="waves-effect waves-light btn">Lista de Permissoes</a>
            </div>
        </div>
    </div>
</div>
@endsection