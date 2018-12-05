@extends('adminlte::master')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/auth.css') }}">
    @yield('css')
@stop

@section('body_class', 'login-page')

@section('body')
            <form class="modal-content animate" action="{{ url(config('adminlte.password_email_url', 'password/email')) }}" method="post">
                {!! csrf_field() !!}
                <div class="imgcontainer">
                  <img src="/svg/forgot.png" alt="Avatar" class="avatar"><br>
                <div class="login-logo">
                    <a href="{{ url(config('adminlte.dashboard_url', 'home')) }}">{!! config('adminlte.logo', '<b>UFMA</b>Inventário') !!}</a>
                </div>
                </div>
                <!-- /.login-logo -->

                <div class="container">
                    <p class="login-box-msg">{{ trans('adminlte::adminlte.password_reset_message') }}</p>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                    <input type="email" name="email" value="{{ isset($email) ? $email : old('email') }}"
                           placeholder="{{ trans('adminlte::adminlte.email') }}">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <button type="submit"
                        class="btn-info"
                >{{ trans('adminlte::adminlte.send_password_reset_link') }}</button>
              </div>
            </form>


@stop

@section('adminlte_js')
    @yield('js')
@stop
