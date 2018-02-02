@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">nome</th>
                    <th scope="col">descricao</th>
                    <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($users as $user)
                    <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->cpf}}</td>
                    <td>
                        <a href="{{action('PapelController@visualizarPermissoesPapel', $user->id)}}" class="btn btn-sucess">Ver Permissoes</a>
                    </td>
                    <td><a href="{{action('PapelController@edit', $user->id)}}" class="btn btn-warning ">Editar</a>
                        <form action="{{action('PapelController@destroy', $user->id)}}" method="post">
						{{ csrf_field() }}
                        {{ method_field('DELETE') }}
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </div>
                        </form>
                    </td>
                    </tr>
                    @endforeach

                    <div class="form-group">                            
                        <a href="{{action('PapelController@create')}}" class="btn btn-sucess">Adicionar Papel</a>
                    </div>                    
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection