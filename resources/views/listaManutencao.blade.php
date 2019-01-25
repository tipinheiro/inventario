<?php namespace inventario\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Route;
?>
@extends('adminlte::page')

@section('title', 'UFMA Inventário')


@section('content_header')
<!-- <h1>Dashboard</h1> -->
@stop

@section('content')
@if (Route::has('login'))
<div class="box box-info">
  <div class="box-header with-border">
    <div class="row">
      <div class="col-xs-9">
    <h3 class="box-title">Manutenções</h3>
  </div>
  </div>
  </div>
  <div class="box-body">
      <div class="box">

            <div class="box-body">
              <table id="listaManutencao" class="table table-bordered table-hover table-striped" style="cursor: pointer; width:100%">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Equipamento</th>
                  <th>Problema</th>
                  <th>Data Envio</th>
                  <th>Situação</th>
                  <th>Retorno</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($manutencaos as $manutencao)
                  <tr>
                    <td>{{ $manutencao->id }}</td>
                    <td>{{ $manutencao->idequipamento }}</td>
                    <td>{{ $manutencao->problema }}</td>
                    <td>{{ $manutencao->data_envio }}</td>
                    <td>{{ $manutencao->idsituacao }}</td>
                    <td>{{ $manutencao->data_retorno }}</td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Equipamento</th>
                  <th>Problema</th>
                  <th>Data Envio</th>
                  <th>Situação</th>
                  <th>Retorno</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      <script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.js') }}"></script>
      <script>
  $(function () {
    $('#listaManutencao').DataTable({
      "columnDefs": [
          {
              "targets": [ 0 ],
              "visible": false,
              "searchable": false
          }
      ],
      'info'        : false,
      'lengthChange': false,
      "language": {
            "lengthMenu": "Display _MENU_ records per page",
            "zeroRecords": "Nada Encontrado",
            "info": "Showing page _PAGE_ of _PAGES_",
            "infoEmpty": "No records available",
            "search": "Busca",
            "infoFiltered": "(filtered from _MAX_ total records)",
            "paginate": {
              "first":      "Primeiro",
              "last":       "Último",
              "next":       "Próximo",
              "previous":   "Anterior"
            }
      }

    })

    $('#listaManutencao tbody').on('click', 'tr', function () {
       var table = $('#listaacessorio').DataTable();
       var data = table.row( this ).data();
       //alert( 'You clicked on '+data[0]+'\'s row' );
       window.location.href = "/acessorio/"+data[0]+"/editar";
    } );
  })
</script>
@endif
@stop
