<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/default.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive_manual.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap-star-rating/css/star-rating.css') }}" media="all" rel="stylesheet" type="text/css" />

    <style>
        body{padding-top:20px;}
.carousel {
    margin-bottom: 0;
    padding: 0 40px 30px 40px;
}
/* The controlsy */
.carousel-control {
	left: -12px;
    height: 40px;
	width: 40px;
    background: none repeat scroll 0 0 #222222;
    border: 4px solid #FFFFFF;
    border-radius: 23px 23px 23px 23px;
    margin-top: 90px;
}
.carousel-control.right {
	right: -12px;
}
/* The indicators */
.carousel-indicators {
	right: 50%;
	top: auto;
	bottom: -10px;
	margin-right: -19px;
}
/* The colour of the indicators */
.carousel-indicators li {
	background: #cecece;
}
.carousel-indicators .active {
background: #428bca;
}
    </style>
</head>

<body>
    <div id="app">

        <nav class="navbar navbar-default bg-putih no-border" style="border-radius:0;">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
                        aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <img src="{{ asset('img/logo.png') }}" alt="" class="navbar-brand padding"> <span class="navbar-brand">Music Tune</span>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="f-15 f-raleway"><a href="/">Home <span class="sr-only">(current)</span></a></li>
                        <li class="f-15 f-raleway"><a href="#">Genre <span class="sr-only">(current)</span></a></li>
                        <li class="f-15 f-raleway"><a href="#">About <span class="sr-only">(current)</span></a></li>
                    </ul>

                    <form class="navbar-form navbar-left" method="get" url="general/pencarian" role="search">
                        <div class="form-input-2 bg-gray pad-left bor-radius-50px pad-right">
                            <input type="text" name="sch_general" class="form-control bg-transparan no-border" placeholder="Cari Lagu">
                            <button type="submit" class="btn bg-transparan"><span class="glyphicon glyphicon-search"></span></button>
                        </div>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        @guest
                        <li class="f-15 f-raleway"><a href="/register"><span class="glyphicon glyphicon-log-out"></span> Daftar </a></li>
                        <li class="f-15 f-raleway"><a href="/login"><span class="glyphicon glyphicon-log-in"></span> Login </a></li>
                        @else

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>
</body>

<script type="text/javascript">
</script>
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
<script>
$(document).ready(function() {
    $('#Carousel').carousel({
        interval: 5000
    })
});
</script>
<script>
    $(document).ready(function () {
        $(document).on('click', '#btn-more', function () {
            var id = $(this).data('id');
            $("#btn-more").html("Loading....");
            $.ajax({
                url: '{{ url("demos/loaddata") }}',
                method: "POST",
                data: { id: id, _token: "{{csrf_token()}}" },
                dataType: "text",
                success: function (data) {
                    if (data != '') {
                        console.log(id);
                        $('#remove-row').remove();
                        $('#load-data').append(data);
                        $("#input-id").rating();
                    }
                    else {
                        $('#btn-more').html("No Data");
                    }
                }
            });
        });

        $(document).on('click', '#btn-morepop', function () {
            var id = $(this).data('id');
            $("#btn-morepop").html("Loading....");
            $.ajax({
                url: '{{ url("demos/loaddatapop") }}',
                method: "POST",
                data: { id: id, _token: "{{csrf_token()}}" },
                dataType: "text",
                success: function (data) {
                    if (data != '') {
                        console.log(id);
                        $('#remove-rowpop').remove();
                        $('#load-datapop').append(data);
                    }
                    else {
                        $('#btn-morepop').html("No Data");
                    }
                }
            });
        });
    });

$("#input-id").rating();
</script>

</html>