@extends('layouts.app')

@section('content')
<div class="container">
        <form action="{{action('ComunicadoController@update', $comunicado->id)}}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
            <div class="form-group">
                <label>Titulo</label>
                <input type="text" class="form-control" placeholder="Titulo" name="titulo" value="{{$comunicado->titulo}}">
            </div>

            <div class="form-group">
                <label>Comunicado</label>
                <textarea class="form-control" rows="4" name="descricao"  required>{{$comunicado->descricao}}</textarea>
            </div>
            
            <div class="form-group">
                <label>Data Publicação</label>
                <input type="date" class="form-control" placeholder="Data Publicação" name="data_publicacao" value="{{$comunicado->data_publicacao}}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <a href="{{action('ComunicadoController@index')}}" class="btn btn-info">Voltar</a>
</div>
@endsection