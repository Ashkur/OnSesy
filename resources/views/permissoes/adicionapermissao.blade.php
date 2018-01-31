@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            
            <table class="class="table table-hover"">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">nome</th>
                    <th scope="col">descricao</th>
                    <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($papeis as $permissao)
                    <tr>
                    <th scope="row">{{$permissao->id}}</th>
                    <td>{{$permissao->nome}}</td>
                    <td>{{$permissao->descricao}}</td>
                    <td><a link="#" class="btn btn-warning ">Editar</a>
                        <a link="#" class="btn btn-warning ">Excluir</a>
                    </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection