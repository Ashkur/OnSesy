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
                    
                    @foreach($papeis as $papel)
                    <tr>
                    <th scope="row">{{$papel->id}}</th>
                    <td>{{$papel->nome}}</td>
                    <td>{{$papel->descricao}}</td>
                    <td><a href="{{action('PapelController@edit', $papel->id)}}" class="btn btn-warning ">Editar</a>
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