@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1>EDITAR PAPEL {{$papel->nome}}</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <form action="{{ action('PapelController@update', $papel->id) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
            <div class="form-group">
              <label for="exampleInputEmail1">Nome</label>
              <input type="text" name="nome" class="form-control" value="{{$papel->nome}}" >
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Descricao</label>
                <input type="text" name="descricao" class="form-control" value="{{$papel->descricao}}" >
            </div>

            <div class="form-group">
                <div class="row">
                @foreach($permissoes as $permissao)
                    <div class="card-body">
                        <h5 class="card-title">{{$permissao->nome}}</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{$permissao->id}}" name="permissoes[]">
                            </div>
                    </div>
                @endforeach
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection