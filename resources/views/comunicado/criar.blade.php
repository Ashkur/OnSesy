@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form method="POST" action="{{ action('ComunicadoController@store') }}">
            	{{ csrf_field() }}

			    <div class="form-group">
			        <label for="exampleFormControlInput1">Titulo</label>
		            <input type="text" class="form-control" name="titulo" placeholder="Auxiliar" required>
			    </div>

                <div class="form-group">
			        <label for="exampleFormControlInput1">Data da Publicação</label>
		            <input type="date" class="form-control" name="data_publicacao" placeholder="Auxiliar" required>
			    </div>

			    <div class="form-group">
                    <label>Comunicado</label>
                    <textarea class="form-control" rows="3" name="descricao" required></textarea>
                </div>

                <button type="submit" class="btn btn-success">Success</button>

			</form>
        </div>
    </div>
</div>
@endsection