@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height">
          <div class="content">
            <section id="empresa">
              <main role="main">
                <!-- Main jumbotron for a primary marketing message or call to action -->
                <div class="jumbotron">
                  <div class="container">
                    <h1 class="display-3">Bem Vindo a OnSeSy!</h1>
                        <p>A OnSeSy surgio da necessidade de gerenciar Seletivos com o proposito de Selecionar colaboradores para as empresas de uma manera simples e ágil.</p>
                        <p><a class="btn btn-warning btn-lg" href="#" role="button">Saiba mais...</a></p>
                  </div>
                </div>
              </main>
            </section>
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
                            <td id="descrição">Processo de Recrutamento e Seleção Nº 008/2018 - Instrutor I - Fanfarra </td>
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
            <section id="depoimentos">
                <div class="container">
                <!-- Example row of columns -->
                <div class="row mt-5">
                    <div class="col-md-4">
                    <h2>Empresa</h2>
                    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                    <p><a class="btn btn-warning" href="#" role="button">Mais &raquo;</a></p>
                    </div>
                    <div class="col-md-4">
                    <h2>Clientes</h2>
                    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                    <p><a class="btn btn-warning" href="#" role="button">Mais &raquo;</a></p>
                    </div>
                    <div class="col-md-4">
                    <h2>Suporte</h2>
                    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                    <p><a class="btn btn-warning" href="#" role="button" data-toggle="modal" data-target="#myModal">Mais &raquo;</a></p>
                    </div>
                </div>
                </div> <!-- /container -->
            </section>
          </div>
          <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title"></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <fieldset class="form-group">
                        <label for="cpf">CPF</label>
                        <input type="text" class="form-control validate" id="cpf" name="cpf" value="">
                    </fieldset>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">SAIR</button>
        </div>
        
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
	$("#cpf").inputmask({
		mask: ['999.999.999-99'],
		keepStatic: true
	});
</script>
@endsection