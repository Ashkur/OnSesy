@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 720px;">

<div class="card m-4">
    <div class="card-header">
        <h3>Adicionar um cargo ao EDital {{$edital->id}}</h3>
    </div>
    <div class="card-body">
    <form action="{{action('CargoController@store', $edital->id)}}" method="POST">
                {{ csrf_field() }}
            <div class="form-group">
                <label for="nome_cargo">Nome</label>
                <input type="text" name="nome_cargo" class="form-control" id="nome_cargo" placeholder="Sesc/RR">
            </div>
            <div class="form-group">
                <label for="curso">Curso</label>
                <input type="text" name="curso" class="form-control" id="curso" placeholder="008">
            </div>
            <div class="form-group">
                <label for="numero_vagas">Vagas</label>
                <input type="text" name="numero_vagas" class="form-control" id="numero_vagas" placeholder="2018">
            </div>
            <div class="form-group">
                <label for="turno_trabalho">Turno</label>
                <input type="text" name="turno_trabalho" class="form-control" id="turno_trabalho" placeholder="10/07/2018" >
            </div>
            <div class="form-group">
                <label for="remuneracao">Remuneração</label>
                <input type="text" name="remuneracao" class="form-control" id="remuneracao" placeholder="10/07/2018">
            </div>
            <div class="form-group">
                <label for="tempo_experiencia">Experiencia</label>
                <input type="text" name="tempo_experiencia" class="form-control" id="tempo_experiencia" placeholder="10/07/2018">
            </div>

            <button class="btn btn-success float-right">Adicionar</button>
            <a href="{{action('EditalController@index')}}" class="btn btn-info">Voltar</a>
        </form>
    </div>
</div>

</div>
@endsection