@extends('layouts.app')

@section('content')

<div class="container">

    <p class="m-2">
        <a href="{{action('EditalController@create')}}" class="btn btn-success">Adicionar Edital</a>
    </p>
    
    <div class="table-responsive">
        <table class="table text-center">
            <tr>
                <th>Entidade/Orgão</th>
                <th>Numéro</th>
                <th>Ano</th>
                <th>Data de Início</th>
                <th>Data Fim</th>
            </tr>

            @foreach($editais as $edital)
                <tr>
                    <td>{{$edital->entidade}}</td>
                    <td>{{$edital->numero}}</td>
                    <td>{{$edital->ano}}</td>
                    <td>{{\Carbon\Carbon::parse($edital->data_inicio)->format('d/m/Y')}}</td>
                    <td>{{\Carbon\Carbon::parse($edital->data_fim)->format('d/m/Y')}}</td>
                    <td><a href="{{action('CargoController@index')}}">Detalhes</a></td>
                    <td><a href="{{action('EditalController@edit', $edital->id)}}">Editar</a></td>
                    <td>
                        <form action="{{action('EditalController@destroy', $edital->id)}}" method="post">
						    {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection