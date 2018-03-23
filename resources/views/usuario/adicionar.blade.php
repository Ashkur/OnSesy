@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-6 offset-md-3">
        <span class="anchor" id="formRegister"></span>

        <!-- form card register -->
        <div class="card card-outline-secondary">
            <div class="card-header">
                <h3 class="mb-0">ADICIONAR</h3>
            </div>
            <div class="card-body">
                <form class="form" role="form" autocomplete="off" action="{{action('UserController@store')}}" method="POST">
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
                        <div class="alert alert-danger" hidden>
                                <ul>
                                    <li>CPF inválido!</li>
                                </ul>
                            </div>
                    <fieldset class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" class="form-control validate" id="name" name="name" value="{{old('name')}}">
                    </fieldset>

                    <fieldset class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control validate" id="email" name="email" value="{{old('email')}}">
                    </fieldset>

                    <fieldset class="form-group">
                        <label for="cpf">CPF</label>
                        <input type="text" class="form-control validate" id="cpf" name="cpf" value="{{old('cpf')}}">
                    </fieldset>

                    <fieldset class="form-group">
                        <label for="senha">Senha</label>
                        <input type="password" class="form-control validate" id="senha" name="password">
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="senha">Confirmar</label>
                        <input type="password" class="form-control validate" id="confirmar" name="password_confirmation">
                    </fieldset>

                    <!-- Roles Form Input -->
                    <div class="form-group @if ($errors->has('roles')) has-error @endif">
                        {!! Form::label('roles[]', 'Papéis') !!}{!! Form::select('roles[]', $roles, isset($user) ? $user->roles->pluck('id')->toArray() : null,  ['class' => 'form-control', 'multiple']) !!}
                        
                        @if ($errors->has('roles')) <p class="help-block">{{ $errors->first('roles') }}</p> @endif
                    </div>

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
