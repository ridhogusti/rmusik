<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Admin</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/default.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive_manual.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap-star-rating/css/star-rating.css') }}" media="all" rel="stylesheet" type="text/css" />

    <style>
        body{
            background-color: white;
        }
    </style>
</head>
<body>
<div class="container-fluid bg-img-adm padding ">
        <div class="container no-padding f-13">
          <div class="col-lg-5 col-md-6 col-sm-8 col-xs-12 padding text-center microsoft ">
            <a href="{{ route('users') }}">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 padding bg-primary  bor-left-radius-5 ">
                    <span class="glyphicon glyphicon-user"></span> &nbsp; Kelola Akun
                </div>
            </a>
            <a href="kelola_music">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 padding bg-primary bg-skyblue">
                    <span class="glyphicon glyphicon-music"></span> &nbsp; Kelola Music
                </div>
            </a>
            <a href="admin/pengujian_sistem">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 padding bg-primary bor-right-radius-5">
                <span class="glyphicon glyphicon-cog"></span> &nbsp; Pengujian Sistem
                </div>
            </a>
          </div>
          <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 padding right text-center ">
            <strong class="color-white">{{ Auth::User()->name }}</strong> &nbsp;
            <a href="{{ route('logout') }}" class="btn btn-warning" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    <span class="glyphicon glyphicon-log-out"></span>Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
          </div>
        </div>
</div>

    

<div class="container padding">
<div class="container  padding">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
    <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 no-padding">
        <blockquote class="bg-abu bg-magenta color-white ">Tambah Lagu</blockquote>
    </div>
  </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding bg-abu">
    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12  no-padding">
              {!! Form::open(['url' => '/admin/kelola_music','method'=>'post', 'class' => 'form-horizontal', 'files' => true]) !!}


          {!! Form::close() !!}


          {!! Form::model($musik, [
            'method' => 'PATCH',
            'url' => ['/admin/kelola_music', $musik->id],
            'class' => 'form-horizontal',
            'files' => true
            ]) !!}

            @include ('admin.musik.form', ['submitButtonText' => 'Ubah'])

            {!! Form::close() !!}

    </div>
  </div>
</div>

  

  
</div>
  
</body>
<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popperjs" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
    crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
    crossorigin="anonymous"></script>
<script src="{{ asset('/slick-1.8.0/slick/slick.js') }}" type="text/javascript"></script>
<script src="{{ asset('bootstrap-star-rating/js/star-rating.js') }}" type="text/javascript"></script>
 
<!-- optionally if you need to use a theme, then include the theme file as mentioned below -->

<script src="{{ asset('bootstrap-star-rating/themes/krajee-svg/theme.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
</html>

  

