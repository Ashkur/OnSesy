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
                    <td>{{$edital->data_inicio}}</td>
                    <td>{{$edital->data_fim}}</td>
                </tr>
            @endforeach
            
            <tr>
                <td>Sesc/RR</td>
                <td>008</td>
                <td>2018</td>
                <td>02/04/2018</td>
                <td>02/06/2018</td>
            </tr>
        </table>
    </div>
</div>
@endsection