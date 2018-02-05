@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1>EDITAR PERMISSAO {{$permissao->nome}}</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <form action="{{ action('PermissaoController@update', $permissao->id) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
            <div class="form-group">
              <label for="exampleInputEmail1">Nome</label>
              <input type="text" name="nome" class="form-control" value="{{$permissao->nome}}" >
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Descricao</label>
                <input type="text" name="descricao" class="form-control" value="{{$permissao->descricao}}" >
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection