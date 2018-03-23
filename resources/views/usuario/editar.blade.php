@extends('layouts.app')

@section('title', 'Editar Usuario ' . $user->name)

@section('content')

    <div class="row">
        <div class="col-md-5">
            <h3>Editar usuário {{ $user->name }}</h3>
        </div>
        <div class="col-md-7 page-action text-right">
            <a href="{{ route('users.index') }}" class="btn btn-default btn-sm"> <i class="fa fa-arrow-left"></i> Voltar</a>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        {!! Form::model($user, ['method' => 'PUT', 'route' => ['users.update',  $user->id ] ]) !!}
                            @include('usuario._form')
                            <!-- Submit Form Button -->
                            {!! Form::submit('Aplicar Mudanças', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
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
  