@extends('layouts.app')

@section('content')
    <div class="container">
    @isset($papeisDoUsuario)
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Papel</th>
                <th scope="col">Descrição</th>
                <th scope="col">Remover</th>
                </tr>
            </thead>
            <tbody>
            @foreach($papeisDoUsuario as $papelDoUsuario)
                <tr>
                <th scope="row">1</th>
                <td>{{$papelDoUsuario->nome}}</td>
                <td>{{$papelDoUsuario->descricao}}</td>
                <td>
                    <form action="{{action('UserController@removerPapel', $user->id)}}" method="POST">
						{{ csrf_field() }}
                        <div class="form-group">
                            <input  name="papel" type="hidden" value="{{$papelDoUsuario->id}}">
                            <button type="submit" class="btn btn-danger">Remover</button>
                        </div>
                    </form>
                </td>
                </tr>         
            @endforeach       
            </tbody>
        </table>
    @endisset
    @empty($papeisDoUsuario)
        <h4>Este usuário ainda não tem nenhum papel, você pode adicionar um de acordo com a lista abaixo:</h4>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Papel</th>
                <th scope="col">Descricao</th>
                <th scope="col">Aplicar</th>
                </tr>
            </thead>            
            <tbody>
            @foreach($papeis as $papel)
                <tr>
                <th scope="row">1</th>
                <td>{{$papel->nome}}</td>
                <td>{{$papel->descricao}}</td>
                <td>
                    <form action="{{action('UserController@aplicarPapel', $user->id)}}" method="post">
						{{ csrf_field() }}
                        <div class="form-group">
                            <input  name="papel" type="hidden" value="{{$papel->id}}">
                            <button type="submit" class="btn btn-success">Aplicar</button>
                        </div>
                    </form>
                </td>
                </tr>                
            @endforeach
            </tbody>            
        </table>
    @endempty
    <a href="{{action('UserController@listar')}}" class="btn btn-info">Voltar</a>
    </div>
@endsection