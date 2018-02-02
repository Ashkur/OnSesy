@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
			<h3>teste</h3>
        <div class="col-md-8 col-md-offset-2">
<<<<<<< HEAD
					<form method="POST" action="{{ action('PermissaoController@store') }}">
								{{ csrf_field() }}
						<div class="form-group input-field inline">
								<input  type="text" class="form-control validate" name="nome">
								<label  data-error="wrong" data-success="right" for="exampleFormControlInput1">Nome Permissao</label>
						</div>
						<div class="form-group input-field inline">
							<input  type="text" class="form-control validate" name="descricao">
							<label  data-error="wrong" data-success="right" for="exampleFormControlInput1">Descrição Permissão</label>
						</div>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">Register</button>
							</div>
						</div>
					</form>
=======
            <form method="POST" action="{{ action('PermissaoController@store') }}">
            	{{ csrf_field() }}

							<div class="form-group">
								<label for="exampleFormControlInput1">Nome Permissao</label>
								<input type="text" class="form-control" name="nome" placeholder="adionar-permissao">
							</div>

							<div class="form-group">
								<label for="exampleFormControlInput1">Descricao Permissao</label>
								<input type="text" class="form-control" name="descricao" placeholder="algum texto">
							</div>

							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
										<button type="submit" class="btn btn-primary">Register</button>
								</div>
							</div>

			</form>
>>>>>>> 493356163bbf2125de30136b8086c29166743616
        </div>
    </div>
</div>
@endsection