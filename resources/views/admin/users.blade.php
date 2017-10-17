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
    {{-- <div class="w-h-100 pos-fixed  padding bg-img-adm ">
        <div class="container pos-relative padding  mar-top-100">
            <div class="rows">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding ">
                    <div class="col-lg-offset-4 col-md-offset-4 col-sm-offset-3 col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
                        <div class=" w-h-px-200 mar-center ">
                            <img src="{{ asset('img/konsumen.png') }}" class="w-h-100 bor-radius-50">
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  no-padding ">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center color-white f-30 no-padding">
                            <span class="glyphicon glyphicon-triangle-top"></span>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bg-putih mar-top-min-20 padding text-center microsoft bor-radius-3 ">
                        @foreach($users as $user)
                            {{ $user->name }}
                        @endforeach
                            aoeusth
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rows">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  padding">

                    <a href="admin/kelolah_akun">
                        <div class="col-lg-offset-3 col-lg-2 col-md-4 col-sm-4 col-xs-12 padding">
                            <div class="w-h-px-150 mar-center bor-radius-50  bg-magenta text-center color-white f-25 f-microsoft pad-top-30 transparent">
                                <span class="glyphicon glyphicon-user"></span><br>
                                Kelola User
                            </div>
                        </div>
                    </a>
                    <a href="admin/kelola_music">
                        <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12  padding">
                            <div class="w-h-px-150 mar-center bor-radius-50  bg-skyblue text-center color-white f-25 f-microsoft pad-top-30 transparent">
                                <span class="glyphicon glyphicon-music"></span><br>
                                Kelola Musik
                            </div>
                        </div>
                    </a>
                    <a href="admin/pengujian_sistem">
                        <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12  padding">
                            <div class="w-h-px-150 mar-center bor-radius-50 bg-ligtgreen text-center color-white f-25 f-microsoft pad-top-30 transparent">
                                <span class="glyphicon glyphicon-cog"></span><br>
                                Pengujian Sistem
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div> --}}
<div class="container-fluid bg-img-adm padding ">
        <div class="container no-padding f-13">
          <div class="col-lg-5 col-md-6 col-sm-8 col-xs-12 padding text-center microsoft ">
            <a href="users">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 padding bg-primary  bor-left-radius-5 bg-skyblue">
                    <span class="glyphicon glyphicon-user"></span> &nbsp; Kelola Akun
                </div>
            </a>
            <a href="kelola_music">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 padding bg-primary">
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
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 no-padding">
                <blockquote class="bg-abu bg-magenta color-white ">Kelola Akun</blockquote>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 padding right bg-abu bor-radius-50px">
                <div class="col-lg-1 col-md-1 col-sm-4  col-xs-4">
                    <button type="submit" class="btn bg-transparan"><span class="glyphicon glyphicon-search"></span></button>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-8">
                    <input type="search" name="sch_akun" placeholder="Cari Data" class="no-border bg-transparan no-box form-control">       
                </div>
            </div>
        </div>
 
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding mar-top-20">
            <table class="table  f-13 zebra-cross table-bordered">
            <tr>
                <th>No</th>
                <th>ID</ht>
                <th>Nama</th>
                <th>Username</th>
                <th width=100>Action</th>
            </tr>
            @foreach($users as $item)
                <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>
                    {!! Form::open(['method'=>'DELETE','url' => ['/admin/users', $item->id],'style' => 'display:inline']) !!}
                        {!! Form::button('<span class="glyphicon glyphicon-trash"></span> Delete', array('type' => 'submit','class' => 'btn btn-danger','title' => 'Delete Post','onclick'=>'return confirm("Confirm delete?")')) !!}
                    {!! Form::close() !!}
                </td>
                </tr> 
            @endforeach
            </table>
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