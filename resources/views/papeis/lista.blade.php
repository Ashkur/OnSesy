@extends('layouts.app')

@section('content')
<div class="container">
    <p class="m-2">                            
        <a href="{{action('PapelController@create')}}" class="btn btn-success">Adicionar Papel</a>
    </p>
    <div class="table-responsive">            
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Permissões</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>

                @foreach($papeis as $papel)
                <tr>
                <td>{{$papel->nome}}</td>
                <td>{{$papel->descricao}}</td>
                <td>
                    <a href="{{action('PapelController@visualizarPermissoesPapel', $papel->id)}}" class="btn btn-sucess">Ver Permissoes</a>
                </td>
                <td>
                <a href="{{action('PapelController@edit', $papel->id)}}" class="btn btn-warning ">Editar</a>
                    <form action="{{action('PapelController@destroy', $papel->id)}}" method="post">
	    			{{ csrf_field() }}
                    {{ method_field('DELETE') }}
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </div>
                    </form>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
</div>
@endsection