
@extends('layouts.app')
@section('content')
<div class="container">
        <form id="regForm" novalidate action="{{action('CandidatoController@store')}}" method="post">
         {{csrf_field()}}   
        <h1>Inscrição para o edital {{$edital->numero}}/{{$edital->ano}}</h1>
        <!-- One "tab" for each step in the form: -->
        <div class="tab"><h2>Passo 1</h2>
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="nome" id="nome" required placeholder="Primeiro Nome">
                <input type="text" class="form-control" name="sobrenome" required placeholder="Sobrenome">
            </div>
            <div class="input-group mb-3">
            <input type="text" class="form-control" name="cpf" id="cpf" required placeholder="CPF" value="{{$cpf}}">
                <input type="text" class="form-control" name="rg" id="rg" required placeholder="RG">
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="nacionalidade" id="nacionalidade" required placeholder="Nacionalidade">
                <input type="text" class="form-control" name="naturalidade" id="naturalidade" required placeholder="Naturalidade">
            </div>
        </div>

        <div class="tab"><h2>Passo 2</h2>
           <div class="mb-3">
           <p>Sexo</p>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                    <label class="form-check-label" for="exampleRadios1">
                        Masculino
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                        Feminino
                    </label>
                </div>
            </div>
            
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="filiacao1" id="filiacao1" required placeholder="Filiacao 1">
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="filiacao2" id="filiacao2" required placeholder="Filiacao 2">
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                <label class="form-check-label" for="inlineCheckbox1">Possui Necessidades Especiais?</label>
                </div>
                <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                <label class="form-check-label" for="inlineCheckbox2">Necessita Atendimento Especial?</label>
                </div>
            </div>

        <div class="tab"><h2>Passo 3</h2>
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="telefone1" id="telefone1" required placeholder="Telefone 1">
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="telefone2" id="telefone2" required placeholder="Telefone 2">
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="email" id="email" required placeholder="E-mail">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Raça</label>
                <select class="form-control" id="exampleFormControlSelect1">
                    <option>Branco</option>
                    <option>Negro</option>
                    <option>Amarelo</option>
                    <option>Pardo</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect2">Estado Civil</label>
                <select class="form-control" id="exampleFormControlSelect2">
                <option>Solteiro</option>
                <option>Casado</option>
                <option>Viúvo</option>
                <option>Divorciado</option>
                <option>Separado</option>
                </select>
            </div>
        </div>

        <div class="tab"><h2>Passo 4</h2>
            <h3>Experiencias:</h3>
           
            <input class="inputclass" type="button" id="add_field" value="adicionar">
            <br>
            <div id="listas">
                <div>
                    <input placeholder="Descricão" class="inputclass" type="text" name="experiencias[0][descricao]" value="{{ isset($pessoa->experiencias->descricao) ? $pessoa->experiencias->descricao : '' }}">
                    <input placeholder="Empresa" class="inputclass" type="text" name="experiencias[0][empresa]" value="{{ isset($pessoa->experiencias->empresa) ? $pessoa->experiencias->empresa : '' }}">
                </div>
            </div>
        </div>
        <div class="tab"><h2>Passo 5</h2>
            <h3>Endereço:</h3>
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="cep" id="cep" required placeholder="CEP">
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="logradouro" id="logradouro" required placeholder="Logradouro">
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="bairro" id="bairro" required placeholder="Bairro">
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="cidade" id="cidade" required placeholder="Cidade">
            </div>
        </div>

        <div class="tab"><h2>Passo 6</h2>
            <h3>Escolaridade</h3>
            <div class="form-group">
                <label for="exampleFormControlSelect3">Nivel Escolar</label>
                <select class="form-control" id="exampleFormControlSelect3">
                    <option>Superior</option>
                    <option>Médio</option>
                    <option>Fundamental</option>
                </select>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="instituicao" id="instituicao" required placeholder="Instituição">
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="nome_curso" id="nome_curso" required placeholder="Curso">
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="ano_conclusao" id="ano_conclusao" required placeholder="Ano de Conclusão">
                </div>
            </div>

        </div>
        
        <div style="overflow:auto;">
            <div style="float:right;">
                <button type="button" id="prevBtn" onclick="nextPrev(-1)">Anterior</button>
                <button type="button" id="nextBtn" onclick="nextPrev(1)">Próximo</button>
            </div>
        </div>

        
        <!-- Circles which indicates the steps of the form: -->
        <div style="text-align:center;margin-top:40px;">
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>           
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
        </div>
    </form>
</div>
@endsection