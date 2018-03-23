@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card m-4">
    <div class="card-header">
      Cargo para o Edital {{$edital->numero}}/{{$edital->ano}}
    </div>
    @foreach($edital->cargo as $cargo)
    <div class="card-body">
      <h5 class="card-title">{{$cargo->nome_cargo}}</h5>
      <p class="card-text"><strong>Curso:</strong> {{$cargo->curso}}</p>
      <p class="card-text"><strong>Vagas:</strong> {{$cargo->numero_vagas}}</p>
      <p class="card-text"><strong>Turno:</strong> {{$cargo->turno_trabalho}}</p>
      <p class="card-text"><strong>Remuneração:</strong> {{$cargo->remuneracao}}</p>
      <p class="card-text"><strong>Tempo de Experiência:</strong> {{$cargo->tempo_experiencia}} meses</p>
      <p class="card-text"><strong>Cidade:</strong> Boa Vista - Roraima</p>
    </div>
    @endforeach
  </div>
</div>
@endsection