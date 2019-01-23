@extends('adminlte::page')

@section('title', 'UFMA Inventário')

@section('content_header')
<!-- <h1>Dashboard</h1> -->
@stop

@section('content')
@if (Route::has('login'))
<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Cadastro de Ordem de Serviço</h3>
  </div>
  <div class="box-body">

    <!--start tab-->
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#ordem" data-toggle="tab">Ordem de Serviço</a></li>
      </ul>
      <div class="tab-content">
        <div class="active tab-pane" id="ordem">
          <!-- Post -->
          <form role="form"  action="/ordem/salvar" method="post">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label>Termo:</label>
                  <input type="text" name="termo" class="form-control" autofocus required>
                </div>
              </div>
                  <input type="hidden" name="data_envio" class="form-control">
                  <input type="hidden" name="idsituacao" class="form-control">

          </div>

            <div class="box-footer">
              <a href=/ordem><button type="button" class="btn btn-default">Voltar</button></a>
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

@endif
@stop
