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
    <h3 class="box-title">Acessórios</h3>
  </div>
  <div class="col-xs-2">
<!-- <button type="button" class="btn btn-block btn-success btn-sm">Novo</button> -->
<!-- <a href=/equipamento><button type="button" class="btn btn-block btn-success btn-sm"><i class="fa fa-fw fa-plus box-title"></i>Novo</button></a> -->
<h3 class="box-title pull-right"><a href=/acessorio><i class="fa fa-fw fa-plus">Novo</i></a></h3>
</div>
  </div>
  </div>
  <div class="box-body">
      <div class="box">
        <!--
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            -->
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover table-striped" style="cursor: pointer;">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Num. Série</th>
                  <th>Descrição</th>
                  <th>Tipo</th>
                  <th>Localização</th>
                  <th>Situação</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($acessorios as $acessorio)
                  <tr>
                    <td>{{ $acessorio->id }}</td>
                    <td>{{ $acessorio->numero_serie }}</td>
                    <td>{{ $acessorio->descricao }}</td>
                    <td>{{ $acessorio->tipoitem }}</td>
                    <td>{{ $acessorio->localizacao }}</td>
                    <td>{{ $acessorio->situacao }}</td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                  <th>Status</th>
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
    $('#example1').DataTable({
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

    $('#example1 tbody').on('click', 'tr', function () {
       var table = $('#example1').DataTable();
       var data = table.row( this ).data();
       //alert( 'You clicked on '+data[0]+'\'s row' );
       window.location.href = "/acessorio/"+data[0]+"/editar";
    } );
  })
</script>
@endif
@stop
