@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 720px;">
    <p class="m-2 ">
        <h3 class="text-center">EDITAR PAPEL: {{$papel->nome}}</h3>
    </p>
    <div class="">
        <form action="{{ action('PapelController@update', $papel->id) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
            <div class="form-group">
              <label for="exampleInputEmail1">Nome</label>
              <input type="text" name="nome" class="form-control" value="{{$papel->nome}}" >
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Descrição</label>
                <input type="text" name="descricao" class="form-control" value="{{$papel->descricao}}" >
            </div>

            <a class="btn btn-info" href="{{action('PapelController@index')}}">Voltar</a>

            <button type="submit" class="btn btn-success float-right">Aplicar</button>
        </form>
    </div>
</div>
@endsection