@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-6 col-md-4 mx-auto">
			<div class="card">
				<div class="card-body">
					<form class="form-signin">
					   <label for="inputEmail" class="sr-only">Nome</label>
						<input type="text" id="inputEmail" class="form-control" placeholder="Nome" required autofocus>
						<label for="inputEmail" class="sr-only">Email</label>
						<input type="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
						<label for="inputPassword" class="sr-only">Senha</label>
						<input type="password" id="inputPassword" class="form-control" placeholder="Senha" required>
						<label for="inputPassword" class="sr-only">Confirme a senha</label>
						<input type="password" id="inputPassword" class="form-control" placeholder="Confirme a senha" required>
						</div>
						<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div> <!-- /container -->
@endsection
