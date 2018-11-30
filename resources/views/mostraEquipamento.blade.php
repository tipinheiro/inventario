<?php
namespace inventario\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;
?>

@extends('principal')

@section('conteudo')
<h1>{{ $equipamento->descricao }}</h1>
{{ $equipamento->id }} {{ $equipamento->descricao }}
@stop
