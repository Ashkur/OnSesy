@extends('layouts.app')

@section('content')
  <div class="row">
    <form class="col s12"  action="{{action('UserController@create')}}" method="POST">
    {{ csrf_field() }}
    <div class="row">
        <div class="input-field col s6 inline">
          <input  name="name" type="text" class="validate">
          <label for="first_name">First Name</label>
        </div>
    </div>    

    <div class="row">
        <div class="input-field col s12">
          <input name="email" type="email" class="validate">
          <label for="email">Email</label>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s6">
          <input  name="cpf" id="first_name" type="text" class="validate">
          <label for="first_name">CPF</label>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s6">
          <input  name="password" type="text" class="validate">
          <label for="first_name">SENHA:</label>
        </div>
    </div>

    <button class="waves-effect waves-light btn">button</button> 



    </form>
  </div>
@endsection