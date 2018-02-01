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
                    
                    @foreach($permissoes as $permissao)
                    <tr>
                    <th scope="row">{{$permissao->id}}</th>
                    <td>{{$permissao->nome}}</td>
                    <td>{{$permissao->descricao}}</td>
                    <td><a href="{{action('PermissaoController@edit', $permissao->id)}}" class="btn btn-warning ">Editar</a>
                        <form action="{{action('PermissaoController@destroy', $permissao->id)}}" method="post">
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
                        <a href="{{action('PermissaoController@create')}}" class="btn btn-sucess">Adicionar Permissao</a>
                    </div>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection