@extends('layouts.app')

@section('content')
<div class="container">
    <div class="table-responsive">            
            <table class="table table-hover text-center">
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
                    <td>{{\Carbon\Carbon::parse($comunicado->data_publicacao)->format('d/m/Y')}}</td>
                    <td>{{\Carbon\Carbon::parse($comunicado->created_at)->format('d/m/Y')}} às {{\Carbon\Carbon::parse($comunicado->created_at)->format('H:m')}}hrs</td>
                    <td>{{\Carbon\Carbon::parse($comunicado->update_at)->format('d/m/Y')}} às {{\Carbon\Carbon::parse($comunicado->update_at)->format('H:m')}}hrs</td>
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
@endsection