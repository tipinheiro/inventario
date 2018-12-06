@extends('adminlte::master')

@section('adminlte_css')
<link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/iCheck/square/blue.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/adminlte/css/auth.css') }}">
@yield('css')
@stop

@section('body_class', 'login-page')

@section('body')

<form class="modal-content animate" action="{{ url(config('adminlte.login_url', 'login')) }}" method="post">
  {!! csrf_field() !!}
  <div class="imgcontainer">
    <img src="/svg/140.png" alt="Avatar" class="avatar"><br>
    <div class="login-logo">
      <a href="{{ url(config('adminlte.dashboard_url', 'home')) }}">{!! config('adminlte.logo', '<b>UFMA</b>Inventário') !!}</a>
    </div>
    <p {{ trans('adminlte::adminlte.login_message') }}</p>
    </div>

    <div class="container form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
      <label for="uname"><b>Usuário</b></label>
      <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
        <input type="email" name="email" value="{{ old('email') }}" placeholder="{{ trans('adminlte::adminlte.email') }}" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        @if ($errors->has('email'))
        <span class="help-block">
          <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
      </div>

      <label><b>Senha</b></label>
      <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
        <input type="password" name="password" placeholder="{{ trans('adminlte::adminlte.password') }}"required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        @if ($errors->has('password'))
        <span class="help-block">
          <strong>{{ $errors->first('password') }}</strong>
        </span>
        @endif
      </div>

      <button class="btn-success" title="Entrar" type="submit">{{ trans('adminlte::adminlte.sign_in') }}</button>

      @if (config('adminlte.register_url', 'register'))
      <a href="{{ url(config('adminlte.register_url', 'register')) }}">
        <input type="button" class="btn-info" title="Criar Novo Usuário" value="Criar Novo Usuário" />
      </a>
      @endif

      <label>
        <input type="checkbox" name="remember"> {{ trans('adminlte::adminlte.remember_me') }}
      </label>

      <span class="psw">Esqueceu a <a href="{{ url(config('adminlte.password_reset_url', 'password/reset')) }}">senha?</a></span>
    </div>
  </form>

  @stop

  @section('adminlte_js')
  <script src="{{ asset('vendor/adminlte/plugins/iCheck/icheck.min.js') }}"></script>
  <script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
  </script>
  @yield('js')
  @stop
