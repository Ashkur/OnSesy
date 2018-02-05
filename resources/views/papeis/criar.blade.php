@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form method="POST" action="{{ action('PapelController@store') }}">
            	{{ csrf_field() }}

			  <div class="form-group">
			    <label for="exampleFormControlInput1">Nome Papel</label>
			    <input type="text" class="form-control" name="nome" placeholder="Auxiliar">
			  </div>

			  <div class="form-group">
			    <label for="exampleFormControlInput1">Descricao Papel</label>
			    <input type="text" class="form-control" name="descricao" placeholder="algum texto">
			  </div>

              <h5 class="card-title">Permissões</h5>

            <div class="form-group">
                <div class="row">
                @foreach($permissoes as $permissao)
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                            <div>                                
                                <input type="checkbox" id="{{$permissao->id}}" value="{{$permissao->id}}" name="permissoes[]"/>
                                <label for="{{$permissao->id}}">{{$permissao->descricao}}</label>
                            </div>
                    </div>
                @endforeach
                </div>
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