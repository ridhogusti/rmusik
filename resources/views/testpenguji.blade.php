<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Laravel</title>

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/default.css') }}" rel="stylesheet">
	<link href="{{ asset('css/responsive_manual.css') }}" rel="stylesheet">
	<link href="{{ asset('bootstrap-star-rating/css/star-rating.css') }}" media="all" rel="stylesheet" type="text/css" />
	<!-- Styles -->

</head>

<body>
	<div class="container padding">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
			<div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 no-padding">
				<blockquote class="bg-abu bg-magenta color-white ">Pengujian Sistem</blockquote>
			</div>
		</div>

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding ">
			<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12  padding bg-abu">
				{!! Form::open(['method' => 'GET', 'url' => '/test', 'class' => 'form-horizontal']) !!}
				<div class="rows">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 no-padding">
							<blockquote class="f-15 bor-color-magenta ">CORLP Length</blockquote>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
							<input type="text" name="panjang" id="inpt" placeholder="Lenght" required onBlur="cek();" onFocus="cek();" class="form-control">
							<div id="msgfoto"></div>
						</div>
					</div>
				</div>
                <div class="rows">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 no-padding">
							<blockquote class="f-15 bor-color-magenta ">Top N</blockquote>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
							<input type="text" name="top" id="inpt" placeholder="Top" required onBlur="cek();" onFocus="cek();" class="form-control">
							<div id="msgfoto"></div>
						</div>
					</div>
				</div>
				<div class="rows">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
                    {!! Form::submit("Submit", ['class' => 'btn btn-primary col-lg-3 col-md-3 col-sm-12 col-xs-12 mar-2']) !!}
					</div>
				</div>
                {!! Form::close() !!}
			</div>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding mar-top-20">
			<table class="table  f-15 zebra-cross table-bordered">
				<tr>
					<th>Top N</th>
					<th>Hit Rate Length</th>
					<th>Coverage Length</th>
				</tr>
				<tr>
					<td>{{ $top }}</td>
					<td>{{ $hasilakhir }} %</td>
					<td>{{ $hasilakhircoverage }} %</td>
				</tr>
			</table>
		</div>
	</div>



</body>

</html>