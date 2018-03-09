@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-6 offset-md-3">
        <span class="anchor" id="formRegister"></span>

        <!-- form card register -->
        <div class="card card-outline-secondary">
            <div class="card-header">
                <h3 class="mb-0">CADASTRO</h3>
            </div>
            <div class="card-body">
			<form class="form-signin" action="{{ url('/register') }}" method="post">
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
                    <fieldset class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" name="name" id="inputNome" class="form-control" required autofocus value="{{old('name')}}">
                    </fieldset>

                    <fieldset class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" name="email"  id="inputEmail" class="form-control" required autofocus value="{{old('email')}}">
                    </fieldset>

                    <fieldset class="form-group">
                        <label for="cpf">CPF</label>
                        <input type="text" name="cpf"  id="cpf" class="form-control" required autofocus value="{{old('cpf')}}">
                    </fieldset>

                    <fieldset class="form-group">
                        <label for="senha">Senha</label>
                        <input type="password" name="password" id="inputPassword" class="form-control" required>
						@if ($errors->has('password'))
				<span>
					<strong>{{ $errors->first('password') }}</strong>
				</span>
			@endif
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="senha">Confirmar</label>
                        <input type="password" id="inputPasswordConfirmation" name="password_confirmation" class="form-control" required>
						@if ($errors->has('password_confirmation'))
				<span>
					<strong>{{ $errors->first('password_confirmation') }}</strong>
				</span>
			@endif
                    </fieldset>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-lg float-right">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /form card register -->

    </div>
    </div>
</div>
<script type="text/javascript">
	$("#cpf").inputmask({
		mask: ['999.999.999-99'],
		keepStatic: true
	});
</script>
@endsection
