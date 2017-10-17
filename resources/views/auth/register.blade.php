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
    <div class="container-fluid pos-relative padding">
        <div class="col-lg-offset-3 col-lg-6 col-md-4 col-sm-6 col-xs-12 mar-2 ">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding bg-putih bor-radius-3">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding bor-dash-bot bor-color-gray">
                <img src="{{ asset('img/logo.png') }}" class="w-h-px-150">
                <span class="f-50 f-raleway">MUSIC TUNE</span>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding bg-abu">
                <img src="{{ asset('img/register.png') }}" class="img-responsive mar-center">
            </div>
            
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding bg-abu">
            
                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    <div class="rows">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 padding f-15 text-right">
                            Nama Lengkap
                            </div>
                            <div class=" col-lg-8 col-md-8 col-sm-8 col-xs-12 no-pad mar-1 ">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                            </div>
                        </div>
                    </div>
            
                    <div class="rows">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding mar-top-10">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 padding f-15 text-right">
                                Email                                   
                            </div>
                            <div class=" col-lg-8 col-md-8 col-sm-8 col-xs-12 no-pad mar-1">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="rows">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding mar-top-10">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 padding f-15 text-right">
                                Password
                            </div>
                            <div class=" col-lg-8 col-md-8 col-sm-8 col-xs-12 no-pad mar-1">
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>
                        </div>
                    </div>

                    <div class="rows">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding mar-top-10">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 padding f-15 text-right">
                            Confirm Password
                            </div>
                            <div class=" col-lg-8 col-md-8 col-sm-8 col-xs-12 no-pad mar-1">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                    </div>
                
                    <div class="rows">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad-left mar-top-10">
                            <a href="" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-home"></span></a>
                            | Sudah punya akun ?
                            <a href="/login">Login</a>

                            <button type="submit" class="btn btn-primary right">
                                Register
                            </button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
    </div>
</div>

    {{-- <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

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
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
</div>   
</body>
</html>

