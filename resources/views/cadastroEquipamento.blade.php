@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1>Dashboard</h1>
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
        <li><a href="#timeline" data-toggle="tab">Acessórios</a></li>
        <li><a href="#settings" data-toggle="tab">Movimentações</a></li>
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

                <input type="text" name="tombamento" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask>
              </div>
            </div>
            <div class="col-xs-1">
              <div class="form-group">
                <label>Ano:</label>
                <input type="text" name="ano" class="form-control" data-inputmask='"mask": "9999"' data-mask>
              </div>
            </div>
            <div class="col-xs-3">
              <div class="form-group">
                <label>Número de Série:</label>

                <input type="text" name="numero_serie" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask>
              </div>

            </div>
            <div class="col-xs-4">
              <div class="form-group">
                <label>Descrição:</label>
                <input type="text" name="descricao" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-4">
              <div class="form-group">
                <label>Localização:</label>
                <select class="form-control" name="idlocalizacao">
                  @foreach($localizacoes as $localizacao)
                  <option value="{{ $localizacao->id }}">{{ $localizacao->localizacao }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-xs-4">
              <div class="form-group">
                <label>Tipo:</label>
                <select class="form-control" name="idtipo">
                  @foreach($tipos as $tipo)
                  <option value="{{ $tipo->id }}">{{ $tipo->descricao }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-xs-4">
              <div class="form-group">
                <label>Situação:</label>
                <select class="form-control" name="idsituacao">
                  @foreach($situacao as $s)
                  <option value="{{ $s->id }}">{{ $s->situacao }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>

          <div class="box-footer">
            <button type="submit" class="btn btn-default">Cancelar</button>
            <button type="submit" class="btn btn-info pull-right">Salvar</button>
          </div>
        </form>

        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="timeline">

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
@endif
@stop
