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
        <li class="active"><a href="#equipamento" data-toggle="tab">Equipamento</a></li>
      </ul>
      <div class="tab-content">
        <div class="active tab-pane" id="equipamento">
          <!-- Post -->
          <form role="form"  action="/equipamento/salvar" method="post">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label>Tombamento:</label>

                  <input type="text" name="tombamento" class="form-control" pattern="[0-9]{10}" autofocus required>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label>Ano:</label>
                  <input type="text" name="ano" class="form-control" pattern="[0-9]{4}" required>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label>Número de Série:</label>

                  <input type="text" name="numero_serie" class="form-control" pattern="[0-9]{5}" required>
                </div>

              </div>

            </div>

            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label>Descrição:</label>
                  <input type="text" name="descricao" class="form-control" placeholder="Descrição"  required>
                </div>
              </div>

              <div class="col-sm-4">
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
              <div class="col-sm-4">
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

            </div>
            <div class="box-footer">
              <a href=/equipamentos><button type="button" class="btn btn-danger glyphicon glyphicon-remove"> Voltar</button></a>
              <button type="submit" class="btn btn-info pull-right glyphicon glyphicon-ok"> Salvar</button>

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
