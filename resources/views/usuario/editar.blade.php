@extends('layouts.app')

@section('content')
  <div class="container" style="max-width: 720px">

    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Editar dados do Usuário: {{$user->name}}</h3>
      </div>
      <div class="panel-body">
        <form>
          {{ csrf_field() }}
          {{ method_field('PUT') }}

          <div class="form-group">
            <label for="name">Nome Completo</label>
            <input  name="name" type="text" class="form-control validate" value="{{$user->name}}">            
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input name="email" type="email" class="validate form-control" value="{{$user->email}}">            
          </div>

          <div class="form-group">
            <label for="cpf">CPF</label>
            <input  name="cpf" id="cpf" type="text" class="validate form-control" value="{{$user->cpf}}">            
          </div>

          <button class="btn btn-warning">Salvar</button>
          <a href="{{action('UserController@listar')}}" class="btn btn-info float-right">voltar</a>
        </form>
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