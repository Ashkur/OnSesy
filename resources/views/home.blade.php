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
                                  @foreach($editais as $edital)
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
                                  @endforeach
                              </tbody>
                          </table>
                      </div>
                      </section>
                </div>
            </div>
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
    <div class="modal-body">
        <div class="input-group mb-2">
            <label for="cpf">CPF: </label>&nbsp
            <input type="text" id="cpf" name="cpf" class="form-control">
            <input type="text" id="" name="" value="" hidden>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
    </div>
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

});
}
</script>
@endsection
