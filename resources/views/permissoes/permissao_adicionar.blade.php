@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
			<h3>teste</h3>
        <div class="col-md-8 col-md-offset-2">
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
        </div>
    </div>
</div>
@endsection