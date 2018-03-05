@extends('layouts.app')

@section('content')

<div class="container">

    <p class="m-2">
        <a href="{{action('UserController@create')}}" class="btn btn-success">Adicionar Usuario</a>
    </p>
    <div class="table-responsive">
        <table class="table text-center">
                <thead>
                    <tr >
                        <th scope="col">Nome</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Papel</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($users as $user)
                    <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->cpf}}</td>
                    @if($user->papeis == '[]')
                        <td>
                            Este usuário não contém papel <br>
                        <em><a href="{{action('UserController@papel', $user->id)}}">Clique aqui para adicionar um papel</a></em>

                        </td>
                    @else
                        <td>
                            @foreach($user->papeis as $papelUsuario)
                            {{$papelUsuario->nome}} <br>
                            <a href="{{action('UserController@papel', $user->id)}}" class="btn btn-sucess">Detalhes</a>
                            @endforeach
                        </td>                    
                    @endif
                    
                    <td><a href="{{action('UserController@edit', $user->id)}}" class="btn btn-warning ">Editar</a>
                        <form action="{{action('UserController@destroy', $user->id)}}" method="post">
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
</div>
@endsection