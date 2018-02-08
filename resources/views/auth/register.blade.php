@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-6 col-md-4 mx-auto">
			<div class="card">
				<div class="card-body">
					<form class="form-signin" action="{{ url('/register') }}" method="post">
						{{ csrf_field() }}
						<input type="text" name="name" id="inputNome" class="form-control" placeholder="Nome" required autofocus>
						<label for="inputNome" class="sr-only">Nome</label>
						@if ($errors->has('name'))
							<span>
								<strong>{{ $errors->first('name') }}</strong>
							</span>
						@endif
						<input type="email" name="email"  id="inputEmail" class="form-control" placeholder="Email" required autofocus>
						<label for="inputEmail" class="sr-only">Email</label>
						@if ($errors->has('email'))
							<span>
								<strong>{{ $errors->first('email') }}</strong>
							</span>
						@endif
						<!--- CAMPO DE CPF FALTANTE -->
						<input type="text" name="cpf"  id="" class="form-control" placeholder="cpf" required autofocus>
						<label for="" class="sr-only">CPF</label>

						<input type="password" name="password" id="inputPassword" class="form-control" placeholder="Senha" required>
						<label for="inputPassword" class="sr-only">Senha</label>
						@if ($errors->has('password'))
							<span>
								<strong>{{ $errors->first('password') }}</strong>
							</span>
						@endif
						<label for="inputPasswordConfirmation" name="password_confirmation" class="sr-only">Confirme a senha</label>
						<input type="password" id="inputPasswordConfirmation" class="form-control" placeholder="Confirme a senha" required>
						@if ($errors->has('password_confirmation'))
							<span>
								<strong>{{ $errors->first('password_confirmation') }}</strong>
							</span>
						@endif
						</div>
						<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div> <!-- /container -->
@endsection
