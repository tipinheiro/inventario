@extends('adminlte::page')

@section('title', 'UFMA Inventário')

@section('content_header')
<!-- <h1>Dashboard</h1> -->
@stop

@section('content')
@if (Route::has('login'))
<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Cadastro de Manutenção de Equipamento</h3>
  </div>
  <div class="box-body">

    <!--start tab-->
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#activity" data-toggle="tab">Manutenção Equipamento</a></li>

        <!-- <li><a href="#acessorios" data-toggle="tab">Acessórios</a></li> -->
        <!-- <li><a href="#settings" data-toggle="tab">Movimentações</a></li> -->
        <!-- <li><a href="#tab-pesquisa" data-toggle="tab">Pesquisa</a></li> -->
      </ul>
      <div class="tab-content">

        <div class="active tab-pane" id="activity">

          <!-- Post -->
          <form role="form"  action="/manutencao/salvar" method="post">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            <input type="hidden" id="situacao" name="situacao">
            <input type="hidden" id="idequipamento" name="idequipamento">
            <input type="hidden" id="idacessorio" name="idacessorio">
            <input type="hidden" id="idsituacao" name="idsituacao" value=3>
            <div class="row">
                                  <div class="col-xs-2">
                      <div class="form-group">

                  <label>Tombamento:</label>

                  <input type="text" id="tombamento" name="tombamento" class="form-control" data-toggle="modal" data-target="#inserirEquipamento" readonly="readonly" pattern="[0-9]{5}" required>
                </div>
              </div>
              <div class="col-xs-4">
                <div class="form-group">
                  <label>Descrição:</label>
                  <input type="text" id="descricao" name="descricao" class="form-control" data-toggle="modal" data-target="#inserirEquipamento" readonly="readonly" required>
                </div>
              </div>

              <div class="row">
                <div class="col-xs-2">
                  <div class="form-group">
                    <label>Localização:</label>
                    <select class="form-control" id="idlocalizacao" name="idlocalizacao" required>
                      <option></option>
                      @foreach($localizacoes as $localizacao)
                      <option value="{{ $localizacao->id }}">{{ $localizacao->localizacao }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-xs-2">
                <div class="form-group">
                  <label>Data de Envio:</label>

                  <input type="date" name="data_envio" class="form-control" required>
                </div>
              </div>
          </div>

                <div class="col-xs-10">
                <div class="form-group">
                  <label>Defeito Apresentado:</label>

                  <input type="text" name="problema" class="form-control" required>
                </div>
              </div>
                      </div>

              <div class="box-footer">
                  <a href=/manutencao><button type="button" class="btn btn-danger glyphicon glyphicon-remove"> Cancelar</button></a>
                <button type="submit" class="btn btn-info pull-right glyphicon glyphicon-ok"> Salvar</button>

                </div>

            <!-- box-footer  -->
          </form>

          <div class="box-body">
            <table id="example1" class="table table-bordered table-hover table-striped" style="cursor: pointer;">
              <thead>
              <tr>
                <th>ID</th>
                <th>Tombamento</th>
                <th>Num. Série</th>
                <th>Descrição</th>
                <th>Tipo</th>
                <th>Localização</th>
                <th>Defeito Apresentado</th>
                <th>Relatório</th>
              </tr>
              </thead>
              <tbody>
                @foreach($manutencaos as $manutencao)
                <tr>
                  <td>{{ $manutencao->id }}</td>
                  <td>{{ $manutencao->tombamento}}</td>
                  <td>{{ $manutencao->descricao }}</td>
                  <td>{{ $manutencao->idlocalizacao }}</td>
                  <td>{{ $manutencao->idtipo_item }}</td>
                  <td>{{ $manutencao->idsituacao }}</td>
                  <td>{{ $manutencao->motivo }}</td>
                  <td><button type="submit" class="btn btn-info pull-right glyphicon">Imprimir</button></td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
              <tr>
                <th>ID</th>
                <th>Tombamento</th>
                <th>Num. Série</th>
                <th>Descrição</th>
                <th>Tipo</th>
                <th>Localização</th>
                <th>Defeito Apresentado</th>
                <th>Relatório</th>
              </tr>
              </tfoot>
            </table>
          </div>




        </div>
        <!-- /.tab-pane -->

      </div>
      <!-- /.tab-content -->
    </div>
    <!--end start tab-->

    <!-- /input-group -->
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->



<div id="inserirEquipamento" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width:60%">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Equipamento</h4>
      </div>
      <div class="modal-body" >
        <!-- <p>Some text in the modal.</p> -->
        <table id="lista_equipamento" class="table table-bordered table-hover" style="cursor: pointer; width:100%">
          <thead>
            <tr>
              <th>ID Equipamento</th>
              <th>ID Acessório</th>
              <th>Tombamento</th>
              <th>Num. Série</th>
              <th>Descrição</th>
              <th>ID Localização</th>
              <th>Localização</th>
              <th>Situação</th>
            </tr>
          </thead>
          <tbody>
            @foreach($equipamentos as $equipamento)
            <tr>
              <td>{{ $equipamento->idequipamento}}</td>
              <td>{{ $equipamento->idacessorio}}</td>
              <td>{{ $equipamento->tombamento}}</td>
              <td>{{ $equipamento->numero_serie }}</td>
              <td>{{ $equipamento->descricao }}</td>
              <td>{{ $equipamento->idlocalizacao }}</td>
              <td>{{ $equipamento->localizacao }}</td>
              <td>{{ $equipamento->situacao }}</td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th>Rendering engine</th>
              <th>numero_serie</th>
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



<script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.js') }}"></script>
<script lang="javascript">
$( document ).ready(function() {
  console.log( "ready!" );
  $('#lista_equipamento').DataTable({
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
    },
    "columnDefs": [
            {
                "targets": [ 0 ],
                "visible": false,
                "searchable": false
            },
            {
                "targets": [ 1 ],
                "visible": false,
                "searchable": false
            },
            {
                "targets": [ 5 ],
                "visible": false,
                "searchable": false
            }
        ]
  })

  $('#lista_equipamento tbody').on('dblclick', 'tr', function () {
    var table = $('#lista_equipamento').DataTable();
     var data = table.row( this ).data();
     //alert( 'You clicked on '+data[0]+'\'s row' );
     $("#idequipamento").val(data[0]);
     $("#idacessorio").val(data[1]);
     $("#tombamento").val(data[2]);
     $("#descricao").val(data[4]);
<<<<<<< HEAD
     $("#idsituacao").val(data[7]);
=======
     $("#idlocalizacao").val(data[5]);
     console.log(data[5]);
>>>>>>> e00430978839e7a492970b67a7e553543705313e
     // $("#inserirEquipamento").close();
     $("#inserirEquipamento .close").click();
  } );

  // $("#pesquisa").click(function(){
  //   console.log('pesquisa clicked.');
  //   //$("#pessquisa").attr('active');
  //   $('.nav-tabs a[href="#tab-pesquisa"]').tab('show');
  //   //window.location("pesquisa");
  // });
});
</script>
@endif
@stop
