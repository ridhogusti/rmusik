@extends('layouts.app') @section('content') @guest
<div class="container-fluid padding bg-darkblue mar-top-min-20">
    <div class="container">
        {!! Form::open(['method' => 'post', 'url' => 'member/rating/createdetail', 'class' => 'form-horizontal']) !!}
        <div class="rows">
            <div class="col-lg-3 col-md-3 col-sm-5 col-xs-12 f-raleway bg-skyblue padding bor-color-white color-white bor-left-solid-3">
                <strong>{{ $musik->title }}</strong>
            </div>
        </div>

        <div class="rows">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding mar-top-10">
                <div class="col-lg-3 col-md-3 col-sm-5 col-xs-12 no-padding">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
                        <img src="{{ $musik->imUrl }}" class="img-responsive">
                        <input type="text" value="{{ $musik->amazon_id }}" name="amazon_id" hidden>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding color-white">
                        <div class="media-wrapper">
                            <audio id="player2" preload="none" controls style="max-width:100%;">
                                <source src="" type="audio/mp3">
                            </audio>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding color-white">
                        <div class="col-lg-9 col-md-6 col-sm-6 col-xs-6">
                            @guest
                                                        @else
                            <?php
                                    $collection = collect(\App\Review::where('user_id', Auth::User()->id)->where('amazon_id', $musik->amazon_id)->get());
                                ?>
                                @if($collection->count() == null)
                                <input id="input-id" name="rating" type="number" value="0" class="rating" min=0 max=5 step=1 data-size="medium" data-rtl="false">                                @else
                                <input id="input-id" name="rating" type="number" value="{{ $collection[0]->rating }}" class="rating" min=0 max=5 step=1 data-size="medium"
                                    data-rtl="false"> @endif @endguest
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
                            <strong>{{ $musik->rating }}</strong>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding bg-abu bor-radius-3">
                        <table class="table f-raleway">
                            <tr>
                                <td width=100>Judul</td>
                                <td width=50>:</td>
                                <td>
                                    {{ $musik->title }}
                                </td>
                            </tr>
                            <tr>
                                <td>Nama Artis</td>
                                <td>:</td>
                                <td>
                                    {{ $musik->artist }}
                                </td>
                            </tr>
                            <tr>
                                <td>Genre</td>
                                <td>:</td>
                                <td>
                                    {{ $musik->root_genre }}
                                </td>
                            </tr>
                            <tr>
                                <td>Label</td>
                                <td>:</td>
                                <td>
                                    {{ $musik->label }}
                                </td>
                            </tr>
                            <tr>
                                <td>Tahun </td>
                                <td>:</td>
                                <td>
                                    {{ $musik->first_release_year }}
                                </td>
                            </tr>
                            <tr>
                                <td>Views </td>
                                <td>:</td>
                                <td>
                                    {{ $musik->view }}
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    {{--  {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Submit', ['class' => 'btn btn-primary pull-right']) !!}  --}}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@else
<div class="container-fluid padding bg-darkblue mar-top-min-20">
    <div class="container">
        {!! Form::open(['method' => 'post', 'url' => 'member/rating/createdetail', 'class' => 'form-horizontal']) !!}
        <div class="rows">
            <div class="col-lg-3 col-md-3 col-sm-5 col-xs-12 f-raleway bg-skyblue padding bor-color-white color-white bor-left-solid-3">
                <strong>{{ $musik->title }}</strong>
            </div>
        </div>

        <div class="rows">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding mar-top-10">
                <div class="col-lg-3 col-md-3 col-sm-5 col-xs-12 no-padding">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
                        <img src="{{ $musik->imUrl }}" class="img-responsive">
                        <input type="text" value="{{ $musik->amazon_id }}" name="amazon_id" hidden>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding color-white">
                        <div class="media-wrapper">
                            <audio id="player2" preload="none" controls style="max-width:100%;">
                                <source src="" type="audio/mp3">
                            </audio>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding color-white">
                        <div class="col-lg-9 col-md-6 col-sm-6 col-xs-6">
                            @guest
                            <input id="input-id" name="rating" type="number" value="0" class="rating" min=0 max=5 step=1 data-size="medium" data-rtl="false">                            @else
                            <?php
                                    $collection = collect(\App\Review::where('user_id', Auth::User()->id)->where('amazon_id', $musik->amazon_id)->get());
                                ?>
                                @if($collection->count() == null)
                                <input id="input-id" name="rating" type="number" value="0" class="rating" min=0 max=5 step=1 data-size="medium" data-rtl="false">                                @else
                                <input id="input-id" name="rating" type="number" value="{{ $collection[0]->rating }}" class="rating" min=0 max=5 step=1 data-size="medium"
                                    data-rtl="false"> @endif @endguest
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
                            <strong>{{ $musik->rating }}</strong>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding bg-abu bor-radius-3">
                        <table class="table f-raleway">
                            <tr>
                                <td width=100>Judul</td>
                                <td width=50>:</td>
                                <td>
                                    {{ $musik->title }}
                                </td>
                            </tr>
                            <tr>
                                <td>Nama Artis</td>
                                <td>:</td>
                                <td>
                                    {{ $musik->artist }}
                                </td>
                            </tr>
                            <tr>
                                <td>Genre</td>
                                <td>:</td>
                                <td>
                                    {{ $musik->root_genre }}
                                </td>
                            </tr>
                            <tr>
                                <td>Label</td>
                                <td>:</td>
                                <td>
                                    {{ $musik->label }}
                                </td>
                            </tr>
                            <tr>
                                <td>Tahun </td>
                                <td>:</td>
                                <td>
                                    {{ $musik->first_release_year }}
                                </td>
                            </tr>
                            <tr>
                                <td>Views </td>
                                <td>:</td>
                                <td>
                                    {{ $musik->view }}
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Submit', ['class' => 'btn btn-primary pull-right']) !!}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

<div class="container mar-bot-50">

	aosentuh

	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 f-raleway bg-skyblue padding color-white bor-color-gray bor-left-solid-3">
				Rekomendasi Lagu
			</div>
			<div class="col-md-12">
				<div id="Carousel" class="carousel slide">

					{{--
					<ol class="carousel-indicators">
						<li data-target="#Carousel" data-slide-to="0" class="active"></li>
						<li data-target="#Carousel" data-slide-to="1"></li>
						<li data-target="#Carousel" data-slide-to="2"></li>
					</ol> --}}

					<!-- Carousel items -->
					<div class="carousel-inner">

						<?php
                  $jmllimit = collect($rekomendasi)->count();
                  $loop = 0;
                ?>

							{{ number_format((float)$jmllimit/6, 0, '.', '') }} @for($i = 0; $i
							< 1; $i++) <div class="item @if($loop == 0) {{ 'active' }} @endif">
								<div class="row">
									@foreach(array_slice($rekomendasi->toArray(), $loop, 6) as $item)
									<div class="col-xs-4 col-md-2">
										{{--
										<a href="#" class="thumbnail"> --}}
											<a href="{{ url('/member/detailmusik/' . $item['id']) }}" title="View Post" class="thumbnail">
												<img class="lazyOwl img-responsive" data-src="{{ $item['imUrl'] }}" src="{{ $item['imUrl'] }}" alt="Lazy Owl Image">
											</a>
											<blockquote class="f-15 f-raleway no-pad-top no-pad-bot pad-left-5 no-pad-right ">
												{{ $item['title'] }}
												<br> {{ $item['artist'] }}
												<br> {{ $item['root_genre'] }}
												<br>
												<input id="input-id" name="rating" disabled type="number" value="{{ $item['rating'] }}" class="rating" min=0 max=5 step=1
												 data-size="medium" data-rtl="false">
											</blockquote>
											{{--
											<td colspan="3" class="bg-darkgray"> --}} {{-- </td> --}}
									</div>
									{{--
									<div class="col-md-3">
										<a href="#" class="thumbnail">
											<img src="{{ $item['imUrl'] }}" alt="Image" style="max-width:100%;">
										</a>
									</div> --}} @endforeach
								</div>
								<!--.row-->
					</div>
					<?php
                    $loop=$loop+6;
                  ?>
						@endfor
						<!--.item-->

						{{--
						<div class="item">
							<div class="row">
								<div class="col-md-3">
									<a href="#" class="thumbnail">
										<img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;">
									</a>
								</div>
								<div class="col-md-3">
									<a href="#" class="thumbnail">
										<img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;">
									</a>
								</div>
								<div class="col-md-3">
									<a href="#" class="thumbnail">
										<img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;">
									</a>
								</div>
								<div class="col-md-3">
									<a href="#" class="thumbnail">
										<img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;">
									</a>
								</div>
							</div>
							<!--.row-->
						</div>
						<!--.item-->--}} {{--
						<div class="item">
							<div class="row">
								<div class="col-md-3">
									<a href="#" class="thumbnail">
										<img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;">
									</a>
								</div>
								<div class="col-md-3">
									<a href="#" class="thumbnail">
										<img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;">
									</a>
								</div>
								<div class="col-md-3">
									<a href="#" class="thumbnail">
										<img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;">
									</a>
								</div>
								<div class="col-md-3">
									<a href="#" class="thumbnail">
										<img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;">
									</a>
								</div>
							</div>
							<!--.row-->
						</div>
						<!--.item-->--}}

				</div>
				<!--.carousel-inner-->
				<a data-slide="prev" href="#Carousel" class="left carousel-control">‹</a>
				<a data-slide="next" href="#Carousel" class="right carousel-control">›</a>
			</div>
			<!--.Carousel-->

		</div>
	</div>
</div>
<!--.container-->




</div>




@endguest @endsection