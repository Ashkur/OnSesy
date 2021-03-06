@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 720px;">

<div class="card m-4">
    <div class="card-header">
        <h3>Adicionar um novo Edital</h3>
    </div>
    <div class="card-body">
    <form action="{{action('EditalController@store')}}" method="POST">
                {{ csrf_field() }}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-group">
                <label for="entidade">Entidade/Orgão</label>
                <input type="text" name="entidade" class="form-control" id="entidade" placeholder="Sesc/RR">
            </div>
            <div class="form-group">
                <label for="numero">Número</label>
                <input type="text" name="numero" class="form-control" id="numero" placeholder="008">
            </div>
            <div class="form-group">
                <label for="ano">Ano</label>
                <input type="text" name="ano" class="form-control" id="ano" placeholder="2018">
            </div>
            <div class="form-group">
                <label for="data_inicio">Data de Início</label>
                <input type="date" name="data_inicio" class="form-control" id="data_inicio" placeholder="10/07/2018" >
            </div>
            <div class="form-group">
                <label for="data_fim">Data Fim</label>
                <input type="date" name="data_fim" class="form-control" id="data_fim" placeholder="10/07/2018">
            </div>

            <button class="btn btn-success float-right">Adicionar</button>
            <a href="{{action('EditalController@index')}}" class="btn btn-info">Voltar</a>
        </form>
    </div>
</div>

</div>
@endsection