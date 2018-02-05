@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            
            <table class="table table-hover">
                <h3>LISTA DE PERMISSOES DO {{$papel->nome}}</h3>
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">nome</th>
                    <th scope="col">TESTE</th>
                    <th scope="col">Ações</th>
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

            <div class="form-group">
                <div class="row">
                    <form action="{{action('PapelController@adicionarPermissaoPapel', $papel->id)}}" method="post">
						{{ csrf_field() }}
                        {{ method_field('PUT') }}   

                       @foreach($pms as $permissaonl)
                        <div class="form-group">  
                            <div class="card-body">                            
                                <input type="checkbox" id="{{$permissaonl->id}}" value="{{$permissaonl->id}}" name="permissoes[]"/>
                                <label for="{{$permissaonl->id}}">{{$permissaonl->descricao}}</label>                                
                            </div>
                        </div>
                        @endforeach

                         <button type="submit" class="btn btn-danger">register</button>
                    </form>                

                
                
                </div>
            </div>

        </div>
    </div>
</div>
@endsection