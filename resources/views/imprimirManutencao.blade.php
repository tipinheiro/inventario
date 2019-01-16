
<head>
  <title>Relatório de Atendimento Técnico</title>
</head>

@extends('adminlte::master')

@yield('css')

@section('body')

<div class="imgcontainer">
    <div class="login-logo">
    <a href="{{ url(config('adminlte.dashboard_url', 'home')) }}"><b>UFMA</b> - Campus Pinheiro</a>
  </div>
  <p {{ trans('adminlte::adminlte.login_message') }}</p>
  </div>

<h3 align="center">Lista de Equipamentos com Defeito</h3>


<table class="table">
  <thead>
  <tr>

    <th>Tombamento</th>
    <th>Número de serie</th>
    <th>Descrição</th>
    <th>Problema Apresentado</th>
    <th>Data Envio</th>
    <th>Data Recebimento</th>
  </tr>
  </thead>
  <tbody>

    <tr>


      @foreach($equipamentos as $equipamento)
      <td> {{$equipamento->tombamento}}</td>
      <td> {{$equipamento->numero_serie}}</td>
      <td> {{$equipamento->descricao}}</td>
      @endforeach
      @foreach($acessorios as $acessorio)
      <td>Não Possui</td>
      <td> {{$acessorio->numero_serie}}</td>
      <td> {{$acessorio->descricao}}</td>
      @endforeach
      <td>{{$manutencao->problema}}</td>
      <td>{{$manutencao->data_envio}}</td>
      <td>{{$manutencao->data_retorno}}</td>

    </tr>

  </tbody>
</table>

@stop
