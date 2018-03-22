@extends('layouts.app')

@section('title', 'Usuários')

@section('content')
    <div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading text-center"><h2>Usuários</h2></div>

            <div class="panel-body">
            <div class="row">
                <div class="col-md-5">
                    <h3 class="modal-title">{{ $result->total() }} Usuários </h3>
                </div>
                <div class="col-md-7 page-action text-right">
                    @can('add_users')
                        <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm"> <i class="glyphicon glyphicon-plus-sign"></i> Adicionar</a>
                    @endcan
                </div>
            </div>

            <div class="result-set">
                <div class="table-responsive">                    
                <table class="table table-bordered table-striped table-hover" id="data-table">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Email</th>
                        <th>Papel</th>
                        <th>Ultimo acesso</th>
                        <th>Cadastrado em:</th>
                        <th class="text-center">Opções</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($result as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->cpf }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->roles->implode('name', ', ') }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->last_login_at)->format('d/m/Y')}} às {{\Carbon\Carbon::parse($item->last_login_at)->format('H:m') }}hrs</td>
                            <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y')}} às {{\Carbon\Carbon::parse($item->created_at)->format('H:m') }}hrs</td>
                            <td class="text-center">
                                @include('shared._actions', [
                                    'entity' => 'users',
                                    'id' => $item->id
                                ])
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>

                <div class="text-center">
                    {{ $result->links() }}
                </div>
            </div>
            </div>
        </div>
    </div>
    </div>

@endsection