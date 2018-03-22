
<div class="container" style="border-style: solid">
    @foreach($candidato->edital as $edital)
        <h2 style="border-style: solid" class="text-center">
            {{$edital->entidade}} {{$edital->numero}}/{{$edital->ano}}
        </h2>
        @foreach($edital->cargo as $cargo)
            <p>SELETIVO PARA O CARGO <strong>{{strToUpper($cargo->nome_cargo)}}</strong></p>
        @endforeach

        <p style="border-style: solid">
           <p><strong>Detalhes do Candidato</strong></p> 
           <p>
               <strong>Nome Completo:</strong> {{strToUpper($candidato->nome)}} {{strToUpper($candidato->sobrenome)}} <br>
               <strong>CPF:</strong> {{$candidato->cpf}}<br>
               <strong>RG:</strong> {{$candidato->rg}}<br>
               <strong>Nacionalidade:</strong> {{$candidato->nacionalidade}}<br>
               <strong>Naturalidade:</strong> {{$candidato->naturalidade}}<br>
               <strong>Sexo:</strong> {{$candidato->sexo}}<br>
               <strong>Raça:</strong> {{$candidato->raca}}<br>
               <strong>Estado Civil:</strong> {{$candidato->estado_civil}}<br>
               <strong>filiacao 1:</strong> {{$candidato->filiacao1}}<br>
               <strong>filiacao 2:</strong> {{$candidato->filiacao2}}<br>
               <strong>Possui Necessidades Físicas?:</strong> @if($candidato->pne == 1) Sim @else Não @endif<br>
               <strong>Atendimento Especial?:</strong> @if($candidato->atendimento_especial == 1) Sim @else Não @endif<br>
               <strong>Telefone:</strong> {{$candidato->telefone1}}<br>
               <strong>Telefone 2:</strong> {{$candidato->telefone2}}<br>
               <strong>E-mail:</strong> {{$candidato->email}}<br>
            </p>
        </p>

        <p>
            Dia do Seletivo: {{$edital->data_inicio}}
        </p>
    @endforeach    
</div>