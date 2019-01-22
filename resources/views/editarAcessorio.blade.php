@extends('adminlte::page')

@section('title', 'UFMA Inventário')

@section('content_header')
<!-- <h1>Dashboard</h1> -->
@stop

@section('content')
@if (Route::has('login'))
<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Editar Acessórios</h3>
  </div>
  <div class="box-body">

    <!--start tab-->
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#editeacessorio" data-toggle="tab">Acessórios</a></li>
      </ul>
      <div class="tab-content">
        <div class="active tab-pane" id="editeacessorio">
          <!-- Post -->
          <form role="form"  action="/acessorio/{{ $acessorio->id }}/atualizar" method="post">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label>Número de Série:</label>
                  <input type="text" name="numero_serie" class="form-control" value="{{ $acessorio->numero_serie }}">
                </div>
              </div>



              <div class="col-sm-4">
                <div class="form-group">
                  <label>Localização:</label>
                  <select class="form-control" name="idlocalizacao">
                    @foreach($localizacoes as $localizacao)
                    <option value="{{ $localizacao->id }}" @if($localizacao->id == $acessorio->localizacaos_id) selected="selected" @endif>{{ $localizacao->localizacao }}</option>
                    @endforeach
                  </select>
                </div>
              </div>


              <div class="col-sm-4">
                <div class="form-group">
                  <label>Tipo:</label>
                  <select class="form-control" name="idtipo">
                    @foreach($tipos as $tipo)
                    <option value="{{ $tipo->id }}" @if($tipo->id == $acessorio->tipo_items_id) selected="selected" @endif>{{ $tipo->descricao }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="col-sm-4">
                <div class="form-group">
                  <label>Situação:</label>
                  @foreach($situacao as $s)
                  @if($s->id == $acessorio->situacaos_id) <input readonly="readonly" type="text" name="descricao" class="form-control" value="{{ $s->situacao }}"> @endif
                  @endforeach
                </div>
              </div>

              <div class="col-sm-4">
                <div class="form-group">
                  <label>Descrição:</label>
                  <input type="text" name="descricao" class="form-control" value="{{ $acessorio->descricao }}">
                </div>
              </div>
            </div>
            <div class="box-footer">
              <a href=/acessorios><button type="button" class="btn btn-default">Cancelar</button></a>
              <button  type="submit" class="btn btn-info pull-right">Atualizar</button>
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
                      <tr>
                        <td>{{ $acessorio->numero_serie }}</td>
                        <td>{{ $acessorio->descricao }}</td>
                        <td>{{ $acessorio->tipo_items_id }}</td>
                        <td>{{ $acessorio->localizacaos_id }}</td>
                        <td>{{ $acessorio->situacao_id }}</td>
                      </tr>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Num. Série</th>
                        <th>Descrição</th>
                        <th>Tipo</th>
                        <th>Localização</th>
                        <th>Situação</th>
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
@endif
@stop
