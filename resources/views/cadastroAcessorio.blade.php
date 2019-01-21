@extends('adminlte::page')

@section('title', 'UFMA Inventário')

@section('content_header')
<!-- <h1>Dashboard</h1> -->
@stop

@section('content')
@if (Route::has('login'))
<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Cadastro de Acessório</h3>
  </div>
  <div class="box-body">

    <!--start tab-->
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#acessorio" data-toggle="tab">Acessório</a></li>
      </ul>
      <div class="tab-content">
        <div class="active tab-pane" id="acessorio">
          <!-- Post -->
          <form role="form"  action="/acessorio/salvar" method="post">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            <div class="row">
              <div class="col-xs-3">
                <div class="form-group">
                  <label>Número de Série:</label>
                  <input type="text" name="numero_serie" class="form-control" autofocus required>
                </div>
              </div>
              <div class="col-xs-4">
                <div class="form-group">
                  <label>Descrição:</label>
                  <input type="text" name="descricao" class="form-control" required>
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
              <a href=/acessorios><button type="button" class="btn btn-default">Voltar</button></a>
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
