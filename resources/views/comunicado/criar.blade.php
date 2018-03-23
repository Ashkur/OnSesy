@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 720px">
    <p><h4>Adicionar um Novo Comunicado</h4></p>
    <form method="POST" action="{{ action('EditalController@addComunicado', $edital->id) }}">
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
	        <label for="exampleFormControlInput1">Titulo</label>
            <input type="text" class="form-control" name="titulo" placeholder="Auxiliar" required>
	    </div>

        <div class="form-group">
	        <label for="exampleFormControlInput1">Data da Publicação</label>
            <input type="date" class="form-control" name="data_publicacao" required>
	    </div>

	    <div class="form-group">
            <label>Arquivos</label>
            <label>Arquivos</label>
            <!-- <textarea class="form-control" rows="3" name="descricao" required></textarea> -->
            <input type="file" class="form-control" name="descricao" required>
        </div>
                
        <button type="submit" class="btn btn-success">Adicionar</button>
        <a href="{{action('EditalController@index')}}" class="btn btn-info float-right">Voltar</a>
	</form>
</div>
@endsection