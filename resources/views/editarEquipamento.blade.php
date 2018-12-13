@extends('adminlte::page')

@section('title', 'UFMA Inventário')

@section('content_header')
<!-- <h1>Dashboard</h1> -->
@stop

@section('content')
@if (Route::has('login'))
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Editar Equipamento</h3>
  </div>
  <div class="box-body">

    <!--start tab-->
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#activity" data-toggle="tab">Equipamento</a></li>
        <li><a href="#acessorios" data-toggle="tab">Acessórios</a></li>
        <li><a href="#settings" data-toggle="tab">Movimentações</a></li>
      </ul>
      <div class="tab-content">
        <div class="active tab-pane" id="activity">
          <!-- Post -->
          <form role="form"  action="/equipamento/{{ $equipamento->id }}/atualizar" method="post">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            <input id="idequipamento" type="hidden" name="idequipamento" value="{{{ $equipamento->id }}}" />
            <div class="row">
              <div class="col-xs-4">
                <div class="form-group">
                  <label>Tombamento:</label>

                  <input type="text" name="tombamento" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask value="{{ $equipamento->tombamento }}">
                </div>
              </div>
              <div class="col-xs-1">
                <div class="form-group">
                  <label>Ano:</label>
                  <input type="text" name="ano" class="form-control" data-inputmask='"mask": "9999"' data-mask value="{{ $equipamento->ano }}">
                </div>
              </div>
              <div class="col-xs-3">
                <div class="form-group">
                  <label>Número de Série:</label>

                  <input type="text" name="numero_serie" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask value="{{ $equipamento->numero_serie }}">
                </div>

              </div>
              <div class="col-xs-4">
                <div class="form-group">
                  <label>Descrição:</label>
                  <input type="text" name="descricao" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask value="{{ $equipamento->descricao }}">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-xs-4">
                <div class="form-group">
                  <label>Localização:</label>
                  <select class="form-control" name="idlocalizacao">
                    @foreach($localizacoes as $localizacao)
                    <option value="{{ $localizacao->id }}" @if($localizacao->id == $equipamento->idlocalizacao) selected="selected" @endif>{{ $localizacao->localizacao }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-xs-4">
                <div class="form-group">
                  <label>Tipo:</label>
                  <select class="form-control" name="idtipo">
                    @foreach($tipos as $tipo)
                    <option value="{{ $tipo->id }}" @if($tipo->id == $equipamento->idtipo_item) selected="selected" @endif>{{ $tipo->descricao }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-xs-4">
                <div class="form-group">
                  <label>Situação:</label>
                  <select class="form-control" name="idsituacao">

                    @foreach($situacao as $s)
                    <option value="{{ $s->id }}"@if($s->id == $equipamento->idsituacao) selected="selected" @endif>{{ $s->situacao }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>

            <div class="box-footer">
              <a href=/equipamentos><button type="button" class="btn btn-default">Cancelar</button></a>
              <button type="submit" class="btn btn-info pull-right">Atualizar</button>
            </div>

            <!-- box-footer  -->
          </form>

        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="acessorios">
          <div clas="box-body">
            <div class="box">
              <div class="box-header">
                <div class="input-group margin">
                  <input type="text" class="form-control">
                  <span class="input-group-btn">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#inserirAcessorio">Associar</button>
                  </span>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">

                <table class="table table-bordered table-hover table-striped" style="cursor: pointer;" id="teste">
                  <thead>
                    <tr>
<<<<<<< HEAD

=======
                      <th>ID</th>
>>>>>>> ecc282e5f99790835c9dea474b6acc56d4d75502
                      <th>Número de Série</th>
                      <th>Tipo</th>
                      <th>Descrição</th>
                      <th>Localização</th>
                      <th>Situação</th>
                      <th>Ação</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                  <tfoot>
                    <tr>
<<<<<<< HEAD
                    
=======
                      <th>ID</th>
>>>>>>> ecc282e5f99790835c9dea474b6acc56d4d75502
                      <th>Número de Série</th>
                      <th>Tipo</th>
                      <th>Descrição</th>
                      <th>Localização</th>
                      <th>Situação</th>
                      <th>Ação</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          <!-- /.box-body -->
          <!-- Modal -->
          <div id="inserirAcessorio" class="modal fade" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Acessórios</h4>
                </div>
                <div class="modal-body" >
                  <!-- <p>Some text in the modal.</p> -->
                  <table id="example1" class="table table-bordered table-hover" style="cursor: pointer;">
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
                        <td>{{ $acessorio->tipo_items_id }}</td>
                        <td>{{ $acessorio->localizacaos_id }}</td>
                        <td>{{ $acessorio->situacaos_id }}</td>
                      </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Rendering engine</th>
                        <th>Browser</th>
                        <th>Platform(s)</th>
                        <th>Engine version</th>
                        <th>Status</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                </div>
              </div>
              <!--  end Modal content-->

            </div>
          </div>
        </div>
        <!-- /.tab-pane -->

        <div class="tab-pane" id="settings">


          <div class="box-body">
            <div class="box">
              <!--
              <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
          -->
          <!-- /.box-header -->
          <div class="box-body">
            <table id="tabela_movimentacoes" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Tombamento</th>
                  <th>Num. Série</th>
                  <th>Descrição</th>
                  <th>Tipo</th>
                  <th>Data de Cadastro</th>
                  <th>Ultima Movimentação</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>{{ $equipamento->id }}</td>
                  <td>{{ $equipamento->tombamento }}</td>
                  <td>{{ $equipamento->numero_serie }}</td>
                  <td>{{ $equipamento->descricao }}</td>
                  <td>{{ $equipamento->idtipo_item }}</td>
                  <td>{{ $equipamento->created_at }}</td>
                  <td>{{ $equipamento->updated_at}}</td>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                  <th>kerneldark</th>
                  <th>Status</th>
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>

      <script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.js') }}"></script>
      <script lang="javascript">
      $( document ).ready(function() {
        console.log('ready');

        var equipamentos_id = $('#idequipamento').val();

        //
        $('#teste').DataTable( {
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
          },
          "ajax": "/acessorio/"+equipamentos_id+"/associados",
          "columns": [
            { "data": "id" },
            { "data": "numero_serie" },
            { "data": "tipoitem" },
            { "data": "descricao" },
            { "data": "localizacao" },
            { "data": "situacao" },
            {
              "data": null,
              "mRender": function (o) { return '<button type="button" class="desassociarButton" value=' +o.idacessorio + '>Desassociar</button>'; }
            }
          ]
        } );

        // console.log( "ready!" );
        $('#example1').DataTable({
          // "columnDefs": [
          //     {
          //         "targets": [ 0 ],
          //         "visible": false,
          //         "searchable": false
          //     }
          // ],
          'info'        : false,
          'lengthChange': false,
          "language": {
            "lengthMenu": "Display _MENU_ records per page",
            "zeroRecords": "Nothing found - sorry",
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
        });

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $('#example1 tbody').on('click', 'tr', function () {
          console.log('clicou');
          // $('#teste').DataTable( {
          //     var equipamentos_id = $('#idequipamento').val();
          //     ajax: 'acessorio/4/associados'
          // } );
          var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
          var table = $('#example1').DataTable();
          var data = table.row( this ).data();

          // document.getElementById('numserie').innerHTML=data[0]
          var id = data[0];
          var equipamentos_id = $('#idequipamento').val();

          $.ajax({
            url: '/acessorio/associar',
            type: 'POST',
            // data: {_token: CSRF_TOKEN, id: id, equipamentos_id: equipamentos_id},
            data: {id: id, equipamentos_id: equipamentos_id},
            dataType: 'html',
            success: function (e) {
              console.log(e);
            }
          });

          var v_associados = $('#teste').DataTable();
          v_associados.ajax.reload();
        });

        $('#teste tbody').on( 'click', 'button', function () {
          var v_associados = $('#teste').DataTable();
          console.log('desassociar id = ' + $(this).attr('value'));
          var id = $(this).attr('value');
          $.ajax({
            url: '/acessorio/desassociar',
            type: 'POST',
            // data: {_token: CSRF_TOKEN, id: id, equipamentos_id: equipamentos_id},
            data: {id: id},
            dataType: 'html',
            success: function (e) {
              console.log(e);
            }
          });
          v_associados.ajax.reload();
        } );

        //alert( 'You clicked on '+data[0]+'\'s row' );
      } );

      // });
      </script>
      @endif
      @stop
