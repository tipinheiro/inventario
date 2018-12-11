@extends('adminlte::page')

@section('title', 'UFMA Inventário')

@section('content_header')
    <h1>Painel de Controle</h1>
@stop

@section('content')
     Bem Vindo!<br>
     <h3 class="glyphicon glyphicon-user"> {{Auth::user()->name}}</h3>

@stop
