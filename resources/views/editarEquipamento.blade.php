@extends('adminlte::page')

@section('title', 'UFMA Inventário')

@section('content_header')
<!-- <h1>Dashboard</h1> -->
@stop

@section('content')
@if (Route::has('login'))
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

              <div class="box-footer">
                <button type="button" class="btn btn-default">Cancelar</button>
                <button type="submit" class="btn btn-info pull-right">Atualizar</button>
              </div>
            </div>
            <!-- box-footer  -->
          </form>

        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="acessorios">
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
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>User</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Reason</th>
                </tr>
                <tr>
                  <td>183</td>
                  <td>John Doe</td>
                  <td>11-7-2014</td>
                  <td><span class="label label-success">Approved</span></td>
                  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                </tr>
                <tr>
                  <td>219</td>
                  <td>Alexander Pierce</td>
                  <td>11-7-2014</td>
                  <td><span class="label label-warning">Pending</span></td>
                  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                </tr>
                <tr>
                  <td>657</td>
                  <td>Bob Doe</td>
                  <td>11-7-2014</td>
                  <td><span class="label label-primary">Approved</span></td>
                  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                </tr>
                <tr>
                  <td>175</td>
                  <td>Mike Doe</td>
                  <td>11-7-2014</td>
                  <td><span class="label label-danger">Denied</span></td>
                  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <!-- Modal -->
          <div id="inserirAcessorio" class="modal fade" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                  <!-- <p>Some text in the modal.</p> -->
                  <table id="example1" class="table table-bordered table-hover">
                    <thead>
                    <tr>
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
                        <td>{{ $acessorio->numero_serie }}</td>
                        <td>{{ $acessorio->descricao }}</td>
                        <td>{{ $acessorio->tipos_item_id }}</td>
                        <td>{{ $acessorio->localizacao_id }}</td>
                        <td>{{ $acessorio->idsituacao }}</td>
                      </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
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
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
              <!--  end Modal content-->

            </div>
          </div>
        </div>
        <!-- /.tab-pane -->

        <div class="tab-pane" id="settings">
          <form class="form-horizontal" action="/equipamento/salvar" method="post">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Name</label>

              <div class="col-sm-10">
                <input type="email" class="form-control" id="inputName" placeholder="Name">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail" class="col-sm-2 control-label">Email</label>

              <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail" placeholder="Email">
              </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Name</label>

              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName" placeholder="Name">
              </div>
            </div>
            <div class="form-group">
              <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

              <div class="col-sm-10">
                <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                  </label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-danger">Submit</button>
              </div>
            </div>
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
<!-- <script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.js') }}"></script>
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

});
</script> -->
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

});
</script>
@endif
@stop
