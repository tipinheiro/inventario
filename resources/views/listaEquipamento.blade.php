<?php namespace inventario\Http\Controllers;
use Illuminate\Support\Facades\DB;
?>
@extends('principal')

@section('conteudo')
<table class="table table-striped">
    <thead>
        <tr>
            <th>Tombamento</th>
            <th>Descrição</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($equipamentos as $equipamento)
            <tr>
                <td>{{ $equipamento->id }}</td>
                <td><a href=/equipamentos/mostra/{{ $equipamento->id }}>{{ $equipamento->descricao }}</a></td>
                <td>{{ $equipamento->status }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@stop
