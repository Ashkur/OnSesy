@extends('layouts.app')
@section('content')
<div class="container">
        <form id="regForm" novalidate action="" method="post">
         {{csrf_field()}}   
        <h1>Inscrição:</h1>
        <!-- One "tab" for each step in the form: -->
        <div class="tab"><h2>Passo 1</h2>:
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="nome" id="nome" required placeholder="Primeiro Nome">
                <input type="text" class="form-control" name="sobrenome" required placeholder="Sobrenome">
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="cpf" id="cpf" required placeholder="CPF">
                <input type="text" class="form-control" name="rg" id="rg" required placeholder="RG">
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="nacionalidade" id="nacionalidade" required placeholder="Nacionalidade">
                <input type="text" class="form-control" name="naturalidade" id="naturalidade" required placeholder="Naturalidade">
            </div>
        </div>

        <div class="tab"><h2>PASSO 2</h2>
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

        <div class="tab">Experiencias:
           
            <input type="button" id="add_field" value="adicionar">
            <br>
            <div id="listas">
                <div>
                    <input placeholder="Descricão" type="text" name="experiencias[0][descricao]" value="{{ isset($pessoa->experiencias->descricao) ? $pessoa->experiencias->descricao : '' }}">
                    <input placeholder="Empresa" type="text" name="experiencias[0][empresa]" value="{{ isset($pessoa->experiencias->empresa) ? $pessoa->experiencias->empresa : '' }}">
                </div>
            </div>
        </div>
        
        <div style="overflow:auto;">
            <div style="float:right;">
                <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
            </div>
        </div>
        <!-- Circles which indicates the steps of the form: -->
        <div style="text-align:center;margin-top:40px;">
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>           
        </div>
    </form>
</div>
@endsection