@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card m-4">
    <div class="card-header">
     <h3>Comunicado do Edital {{$edital->numero}}/{{$edital->ano}}</h3>
    </div>
    @foreach($edital->comunicado as $comunicado)
    <div class="card-body">
      <h5 class="card-title"><strong>Autor:</strong> {{$comunicado->user->name}}</h5>
      <p class="card-text"><strong>Criado em:</strong> {{$comunicado->created_at}}</p>
      <p class="card-text"><strong>Editado em:</strong> {{$comunicado->updated_at}}</p>
      <p class="card-text"><strong>Data da Publicação:</strong> {{$comunicado->data_publicacao}}</p>
      <p class="card-text"><strong>Título:</strong> {{$comunicado->titulo}}</p>
      <p class="card-text"><strong>Comunicado:</strong> {{$comunicado->descricao}}</p>
    </div>
    @endforeach
  </div>
</div>
@endsection