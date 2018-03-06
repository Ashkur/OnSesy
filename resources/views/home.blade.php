@extends('layouts.app')

@section('content')
<div class="container">
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
                              </tbody>
                          </table>
                      </div>
                      </section>
                </div>
            </div>
</div>
@endsection
