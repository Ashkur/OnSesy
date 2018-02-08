@extends('layouts.app')

@section('content')
  <div class="container">
    <form class="col s12"  action="{{action('UserController@update', $user->id)}}" method="POST">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="row">
        <div class="input-field col s6 inline">
          <input  name="name" type="text" class="validate" value="{{$user->name}}">
          <label for="first_name">First Name</label>
        </div>
    </div>    

    <div class="row">
        <div class="input-field col s12">
          <input name="email" type="email" class="validate" value="{{$user->email}}">
          <label for="email">Email</label>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s6">
          <input  name="cpf" id="first_name" type="text" class="validate" value="{{$user->cpf}}">
          <label for="first_name">CPF</label>
        </div>
    </div>
    <button class="btn btn-warning">button</button>
    </form>
    <a href="{{action('UserController@listar')}}" class="btn btn-info">voltar</a>
  </div>
@endsection