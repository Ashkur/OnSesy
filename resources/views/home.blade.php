@extends('layouts.app')

@section('content')
            <div class="panel panel-default">
                <div class="panel-heading"><p>Dashboard</p></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <section  id="seletvos">
                        <!-- Tabela -->
                        <div class="container h1">Seletivos Disponveis</div>
                        <div class="container pt-2 border" style="border:1px solid #cecece;">
                          <table class="table table-hover">
                              <thead>
                                  <tr>
                                      <th>nº</th>
                                      <th>Seletivo</th>
                                      <th>Entidade</th>
                                      <th>informações</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <td>1</td>
                                      <td>Processo de Recrutamento e Seleção Nº 008/2018 - Instrutor I - Fanfarra </td>
                                      <td>Sesc/RR</td>
                                      <td><a link="#" class="btn btn-warning ">Mais informações</a></td>
                                  </tr>
                                  <tr>
                                      <td>2</td>
                                      <td>Processo de Recrutamento e Seleção Nº 007/2018 - Professor I - Música</td>
                                      <td>Sesc/RR</td>
                                      <td><a link="#" class="btn btn-warning ">Mais informações</a></td>
                                  </tr>
                                  <tr>
                                      <td>3</td>
                                      <td>Processo de Recrutamento e Seleção Nº 006/2018 - Professor I - Inglês</td>
                                      <td>Sesc/RR</td>
                                      <td><a link="#" class="btn btn-warning ">Mais informações</a></td>
                                  </tr>
                                  @foreach($editais as $edital)
                                  <tr>
                                      <td>{{$edital->id}}</td>
                                      <td>Processo de Recrutamento e Seleção Nº {{$edital->numero}}/{{$edital->ano}} - 
                                        @foreach($edital->cargo as $cargo)
                                            {{$cargo->nome_cargo}}
                                        @endforeach
                                      </td>
                                      <td>{{$edital->entidade}}</td>
                                      <td>
                                        <div class="container">
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#{{$edital->id}}">
                                            Inscrever-se
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="{{$edital->id}}" tabindex="-1" role="dialog" aria-labelledby="label{{$edital->id}}" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="labe{{$edital->id}}">Inscrição Seletivo Nº {{$edital->numero}}/{{$edital->ano}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="input-group mb-2">
                                                        <label for="cpf{{$edital->id}}">CPF: </label>&nbsp
                                                        <input type="text" id="cpf{{$edital->id}}" name="cpf" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="" class="btn btn-primary">Edital</a>
                                      </td>
                                            
                                  </tr>
                                  @endforeach
                              </tbody>
                          </table>
                      </div>
                      </section>
                </div>
            </div>
</div>


@endsection
