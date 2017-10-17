<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
        <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/default.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive_manual.css') }}" rel="stylesheet">
</head>
<body>

<div class="w-h-100 bg-img-login pos-fixed scroll-active">
  <div class="container pos-relative padding ">
      <div class="rows">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  padding">
                  <div class="col-lg-offset-3 col-lg-6 col-md-4 col-sm-6 col-xs-12 mar-2">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding bg-putih bor-radius-3">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding bor-dash-bot bor-color-gray">
                            <img src="{{ asset('img/logo.png') }}" class="w-h-px-150">
                            <span class="f-50 f-raleway">MUSIC TUNE</span>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding bg-abu">
                          <img src="{{ asset('img/title-login.png') }}" class="img-responsive mar-center">
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding  bg-abu  form_input">
                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                             <div class="rows">
                               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
                                 <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12 padding f-15 ">
                                   Email
                                 </div>
                                 <div class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-lg-9 col-md-9 col-sm-8 col-xs-12 no-pad mar-1">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                 </div>
                               </div>
                             </div>
                             <div class="rows">
                               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding mar-top-10">
                                 <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12 padding f-15 ">
                                   Password
                                 </div>
                                 <div class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-lg-9 col-md-9 col-sm-8 col-xs-12 no-pad mar-1">
                                    <input id="password" type="password" class="form-control" name="password" required>
                                 </div>
                               </div>
                             </div>
                             <div class="rows">
                               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad-left mar-top-10">
                                 <div class="col-lg-offset-3 col-md-offset-3 col-sm-offset-4 col-xs-offset-0 col-lg-9 col-md-9 col-sm-8 col-xs-12 no-pad-right no-pad mar-1">
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                <button type="submit" class="btn btn-primary right float-right">
                                    Login
                                </button>
                                  </div>
                               </div>
                             </div>
                             <div class="rows">
                               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad-left ">
                                  <span class="glyphicon glyphicon-home"></span><a href="register" class="btn btn-warning btn-xs">Belum punya akun ?</a>
                               </div>
                             </div>
                        </div>
                        </form>
                      </div>
                  </div>  
</body>
</html>


{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
