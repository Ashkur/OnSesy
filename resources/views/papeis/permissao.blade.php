@extends('layouts.app')

@section('content')
<div class="container">
    @if($papel->permissoes != "[]")
    <table class="table table-hover">
        <p>
            <h3 class="text-center">LISTA DE PERMISSOES DO {{$papel->nome}}</h3>
        </p>
        <thead>
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Descrição</th>
            <th scope="col">Excluir</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach($papel->permissoes as $permissao)
            <tr>
            <th scope="row">{{$permissao->id}}</th>
            <td>{{$permissao->descricao}}</td>
            <td>
                <form action="{{action('PapelController@removerPermissaoPapel', $permissao->id)}}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                    <div class="form-group">
                        <input type="hidden" name="papel" value="{{$papel->id}}">
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </div>
                </form>
            </td>
            </tr>
            @endforeach
                               
        </tbody>
    </table>
    @else
        <p class="m-4">
            <h2 class="text-center">Este Pápel não contém nenhuma permissão no momento.</h2>
        </p>
    @endif
    <div class="card m-2">
        <div class="card-header">
            Permissões não atribuídas a este papel:
        </div>
        <div class="card-body">
            <form action="{{action('PapelController@adicionarPermissaoPapel', $papel->id)}}" method="post">
                {{ csrf_field() }}
                {{ method_field('PUT') }}   
                
               @foreach($diff as $permissaonl)
                <div class="form-group">                         
                    <input type="checkbox" id="{{$permissaonl->id}}" value="{{$permissaonl->id}}" name="permissoes[]"/>
                    <label for="{{$permissaonl->id}}">{{$permissaonl->descricao}}</label>
                </div>
                @endforeach
                
                <a class="btn btn-info" href="{{action('PapelController@index')}}">Voltar</a>

                <button type="submit" class="btn btn-success float-right">Aplicar</button>
            </form>
        </div>
    </div>
</div>
@endsection