@extends('layouts.app')

@section('title', 'Papéis e Permissões')

@section('content')

    <!-- Modal -->
    <div class="modal fade" id="roleModal" tabindex="-1" role="dialog" aria-labelledby="roleModalLabel">
        <div class="modal-dialog" role="document">
            {!! Form::open(['method' => 'post']) !!}

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="roleModalLabel">Novo Papel</h4>
                </div>
                <div class="modal-body">
                    <!-- name Form Input -->
                    <div class="form-group @if ($errors->has('name')) has-error @endif">
                        {!! Form::label('name', 'Name') !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Role Name']) !!}
                        @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                    <!-- Submit Form Button -->
                    {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <div class="row" style="margin: 10px;">
        <div class="col-md-5">
        </div>
        <div class="col-md-7 page-action text-right">
            @can('add_roles')
                <a href="#" class="btn btn-success pull-right" data-toggle="modal" data-target="#roleModal"> <i class="glyphicon glyphicon-plus"></i> Adicionar</a>
            @endcan
        </div>
    </div>

    <div class="panel panel-primary">
        <div class="panel-heading text-center"><h3>Papéis</h3></div>
            <div class="panel-body">
                @forelse ($roles as $role)
                {!! Form::model($role, ['method' => 'PUT', 'route' => ['roles.update',  $role->id ], 'class' => 'm-b']) !!}
        
                @if($role->name === 'Admin')
                    @include('shared._permissions', [
                                'title' => $role->name .' Permissões',
                                'options' => ['disabled'] ])
                @else
                    @include('shared._permissions', [
                                'title' => $role->name .' Permissões',
                                'model' => $role ])
                    @can('edit_roles')
                        {!! Form::submit('Aplicar', ['class' => 'btn btn-primary']) !!}
                    @endcan
                @endif
        
                {!! Form::close() !!}
        
                @empty
                    <p>No Roles defined, please run <code>php artisan db:seed</code> to seed some dummy data.</p>
                @endforelse
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading text-center">Legendas</div>
                <div class="panel-body">
                    <strong>View:</strong> Visualizar
                    <strong>Add:</strong> Adicionar
                    <strong>Edit:</strong> Editar
                    <strong>delete:</strong> Remover
                </div>
            </div>
        </div>
    </div>
@endsection