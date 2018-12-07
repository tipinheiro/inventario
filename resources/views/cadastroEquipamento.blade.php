@extends('adminlte::page')

@section('title', 'UFMA Inventário')

@section('content_header')
<!-- <h1>Dashboard</h1> -->
@stop

@section('content')
@if (Route::has('login'))
<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Cadastro de Equipamento</h3>
  </div>
  <div class="box-body">

    <!--start tab-->
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#activity" data-toggle="tab">Equipamento</a></li>
        <!-- <li><a href="#acessorios" data-toggle="tab">Acessórios</a></li> -->
        <!-- <li><a href="#settings" data-toggle="tab">Movimentações</a></li> -->
        <!-- <li><a href="#tab-pesquisa" data-toggle="tab">Pesquisa</a></li> -->
      </ul>
      <div class="tab-content">
        <div class="active tab-pane" id="activity">
          <!-- Post -->
          <form role="form"  action="/equipamento/salvar" method="post">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            <div class="row">
              <div class="col-xs-4">
                <div class="form-group">
                  <label>Tombamento:</label>

                  <input type="text" name="tombamento" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask pattern="[0-9]{15}" required>
                </div>
              </div>
              <div class="col-xs-1">
                <div class="form-group">
                  <label>Ano:</label>
                  <input type="text" name="ano" class="form-control" data-inputmask='"mask": "9999"' data-mask pattern="[0-9]{4}" required>
                </div>
              </div>
              <div class="col-xs-3">
                <div class="form-group">
                  <label>Número de Série:</label>

                  <input type="text" name="numero_serie" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask pattern="[0-9]{15}" required>
                </div>

              </div>
              <div class="col-xs-4">
                <div class="form-group">
                  <label>Descrição:</label>
                  <input type="text" name="descricao" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask required>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-xs-4">
                <div class="form-group">
                  <label>Localização:</label>
                  <select class="form-control" name="idlocalizacao" required>
                    <option></option>
                    @foreach($localizacoes as $localizacao)
                    <option value="{{ $localizacao->id }}">{{ $localizacao->localizacao }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-xs-4">
                <div class="form-group">
                  <label>Tipo:</label>
                  <select class="form-control" name="idtipo" required>
                    <option></option>
                    @foreach($tipos as $tipo)
                    <option value="{{ $tipo->id }}">{{ $tipo->descricao }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-xs-4">
                <div class="form-group">
                  <label>Situação:</label>
                  <select class="form-control" name="idsituacao" required>
                    <option></option>
                    @foreach($situacao as $s)
                    <option value="{{ $s->id }}">{{ $s->situacao }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
              <div class="box-footer">
                  <a href=/equipamentos><button type="button" class="btn btn-default">Cancelar</button></a>
                <button type="submit" class="btn btn-info pull-right">Salvar</button>
              </div>

            <!-- box-footer  -->
          </form>

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
<script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.js') }}"></script>
<script lang="javascript">
$( document ).ready(function() {
  console.log( "ready!" );
  $('#example1').DataTable({
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
  })

  $('#example1 tbody').on('dblclick', 'tr', function () {
    var table = $('#example1').DataTable();
     var data = table.row( this ).data();
     alert( 'You clicked on '+data[0]+'\'s row' );
  } );

  $("#pesquisa").click(function(){
    console.log('pesquisa clicked.');
    //$("#pessquisa").attr('active');
    $('.nav-tabs a[href="#tab-pesquisa"]').tab('show');
    //window.location("pesquisa");
  });
});
</script>
@endif
@stop
