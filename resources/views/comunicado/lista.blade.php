@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">Autor</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Comunicado</th>
                    <th scope="col">Data de Pulbicação</th>
                    <th scope="col">Data de Criação</th>
                    <th scope="col">Data de Edição</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($comunicados as $comunicado)
                    <tr>
                    <td>{{$comunicado->user->name}}</td>
                    <td>{{$comunicado->titulo}}</td>
                    <td>{{$comunicado->descricao}}</td>
                    <td>{{$comunicado->data_publicacao}}</td>
                    <td>{{$comunicado->created_at}}</td>
                    <td>{{$comunicado->updated_at}}</td>
                    <td>
                    <a href="{{action('ComunicadoController@edit', $comunicado->id)}}" class="btn btn-warning ">Editar</a>
                        <form action="{{action('ComunicadoController@destroy', $comunicado->id)}}" method="post">
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
</div>
@endsection