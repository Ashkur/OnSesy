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
                        @foreach($editais as $edital)
                          @foreach($edital->cargo as $cargo)
                          @if($cargo->numero_vagas > 0)
                          <tr>
                              <td>{{$edital->id}}</td>
                              <td id="descricao{{$edital->id}}">Processo de Recrutamento e Seleção Nº {{$edital->numero}}/{{$edital->ano}} - 
                                @foreach($edital->cargo as $cargo)
                                    {{$cargo->nome_cargo}}
                                @endforeach
                              </td>
                              <td>{{$edital->entidade}}</td>
                              <td>
                                <div class="container">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-success" onclick="cpfModal({{$edital->id}})">
                                    Inscrever-se
                                    </button>
                                <a href="#" class="btn btn-primary">Edital</a>
                              </td>
                                    
                          </tr>
                        @endif
                        @endforeach
                        @endforeach
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
<!-- Modal -->
<div class="modal fade" id="modalcpf">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="">Inscrição Para o <span id="descricaoModal"></span> </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form class="form" id="idform">
    <div class="modal-body">
        <div class="input-group mb-2">
            <label for="cpf">CPF: </label>&nbsp
            <input type="text" id="cpf" name="cpf" class="form-control">
            <input type="text" id="idedital" name="idEdital" class="form-control" value="" hidden>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="submitData">Save changes</button>
    </div>
</form>
    </div>
</div>
</div>
<script type="text/javascript">
	$("#cpf").inputmask({
		mask: ['999.999.999-99'],
		keepStatic: true
	});

function cpfModal(n){
$(document).ready(function(){

    var str = "descricao"+n;
    var a = $("#"+str).text();
    $("#modalcpf").modal('show');
    $("#descricaoModal").text(a);
    $("#idedital").val(n);

});
}

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
}); 

$("#submitData").click(function(e){

    e.preventDefault();



    var cpf = $("input[name=cpf]").val();

    var idEdital = $("input[name=idEdital]").val();


    $.ajax({

    type:'POST',

    url:'{{action('CandidatoController@validaInscricao')}}',

    data:{cpf:cpf, idEdital:idEdital},

    success:function(data){
        switch (data) {
                case "cadastrar":
                    window.location.href = "candidato/"+cpf+"/edital/"+idEdital+"/inscricao";
                    break;
                case "inscrito":
                    window.location.href = "candidato/"+cpf+"/comprovante";
                    break;
                case "invalido":
                    alert("Este CPF é inválido!");
                    break;
                
                default:
                    break;
            }
    }

    });

});
</script>
<script type="text/javascript">
	$("#cpf").inputmask({
		mask: ['999.999.999-99'],
		keepStatic: true
	});
</script>
@endsection