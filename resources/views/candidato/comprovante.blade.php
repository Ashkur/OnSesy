<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1", "shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title') OnSeSy - Sistema Online de Seletivos</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
        <!-- Script Jquery e Mascaras-->
        <script src="{{ asset('js/funcoes.js') }}"></script>
        <script src="{{ asset('js/add.js') }}"></script>
    </head>
    <body>
<div class="container-fluid">
<h1 class="center">Comprovante De Inscrição</h1><br> 
<div class="card col-6 offset-3">
<h3 class="card-header">
@foreach($candidato->edital as $edital)
        
            {{$edital->entidade}} {{$edital->numero}}/{{$edital->ano}}
        
</h3>
<div class="card-body">
<h4 class="card-title">
@foreach($edital->cargo as $cargo)
    <p>SELETIVO PARA O CARGO <strong>{{strToUpper($cargo->nome_cargo)}}</strong></p>
@endforeach</h4>
<p class="card-text">
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
</div>
<div class="card-footer">
<p>
    Dia do Seletivo: {{ \Carbon\Carbon::parse($edital->data_inicio)->format('d/m/Y')}}
</p>
    @endforeach
</div>
</div>
</body>
</html>