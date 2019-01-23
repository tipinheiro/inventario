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
        <li class="active"><a href="#ordem" data-toggle="tab">Ordem Serviço</a></li>
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


      <div class="active tab-pane" id="manutencao">

        <!-- Post -->
        <form role="form"  action="/manutencao/salvar" method="post">
          <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
          <input type="hidden" id="situacao" name="situacao">
          <input type="hidden" id="idequipamento" name="idequipamento">
          <input type="hidden" id="idacessorio" name="idacessorio">
          <input type="hidden" id="idsituacao" name="idsituacao" value=3>
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <label>Tombamento:</label>
                <input type="text" id="tombamento" name="tombamento" class="form-control" data-toggle="modal" data-target="#inserirEquipamento" readonly="readonly" pattern="[0-9]{5}" required>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label>Descrição:</label>
                <input type="text" id="descricao" name="descricao" class="form-control" data-toggle="modal" data-target="#inserirEquipamento" readonly="readonly" required>
              </div>
            </div>
              <div class="col-sm-4">
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
              <div class="col-sm-4">
                <div class="form-group">
                  <label>Data de Envio:</label>
                  <input type="date" name="data_envio" class="form-control" required>
                </div>
              </div>

            <div class="col-sm-4">
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
          <table id="listamanutencao" class="table table-bordered table-hover table-striped" style="cursor: pointer;">
            <thead>
              <tr>
                <th>ID</th>
                <th>ID Equipamento</th>
                <th>ID Acessório</th>
                <th>Defeito</th>
                <th>Solução</th>
                <th>Situação</th>
                <th>Data Envio</th>
                <th>Data Retorno</th>
                <th>Relatório</th>
              </tr>
            </thead>
            <tbody>
              @foreach($manutencaos as $manutencao)
              <tr>
                <td>{{ $manutencao->id }}</td>
                <td>{{ $manutencao->idequipamento }}</td>
                <td>{{ $manutencao->idacessorio}}</td>
                <td>{{ $manutencao->problema }}</td>
                <td>{{ $manutencao->solucao }}</td>
                <td>{{ $manutencao->idsituacao }}</td>
                <td>{{ $manutencao->data_envio }}</td>
                <td>{{ $manutencao->data_retorno }}</td>
                <td><input type="checkbox" id="relatorio" name="relatorio" value="{{ $manutencao->id }}"><a href="/manutencao/{{ $manutencao->id }}/imprimir" target="_blank"><button class="btn btn-info pull-right glyphicon" >Imprimir</button></a></td>
              </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>ID</th>
                <th>ID Equipamento</th>
                <th>ID Acessório</th>
                <th>Defeito</th>
                <th>Solução</th>
                <th>Situação</th>
                <th>Data Envio</th>
                <th>Data Retorno</th>
                <th>Relatório</th>
              </tr>
            </tfoot>
          </table>
          <input type="submit" title="Imprimir Seleção" value="Imprimir Seleção">
        </div>
      </div>
      <!-- /.tab-pane -->

      <div class="tab-pane" id="acessorios">
        <div clas="box-body">
          <div class="box">
            <div class="box-header">
              <div class="input-group margin">
                <input type="text" class="form-control">
                <span class="input-group-btn">
                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#inserirAcessorio">Gerar Ordem</button>
                </span>
              </div>
            </div>
            <!-- /.box-header -->

            <div class="box-body">

              <table class="table table-hover" id="teste">
                <thead>
                  <tr>
                    <th>ID</th>
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
                    <th>ID</th>
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
