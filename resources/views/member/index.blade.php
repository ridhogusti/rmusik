@extends('layouts.app') @section('content') @guest 


belum login


 @else

<div class="container mar-bot-50">

login

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
							{{ number_format((float)$jmllimit/6, 0, '.', '') }} 
              @for($i = 0; $i < number_format((float)$jmllimit/6, 0, '.', ''); $i++) <div class="item @if($loop == 0) {{ 'active' }} @endif">
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

@endguest

<div class="container-fluid padding bg-darkblue">
	<div class="container">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
			<div class="col-lg-8 col-md-8 col-sm-7 col-xs-12 no-padding ">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
					<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 f-raleway bg-skyblue padding color-white bor-left-solid-3 mar-top-20">
						Lagu Baru
					</div>
				</div>
				<div class="col-md-12 " id="load-data">
					@foreach($preferencebaru as $itemm)
					<div class="rows">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-pad-left mar-top-10">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding ">
								<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-padding hide-bg-abu color-white">
									<a href="{{ url('/member/detailmusik/' . $itemm->id) }}" title="View Post">
										<img src="{{ $itemm->imUrl }}" alt="" class="img-cover">
									</a>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 f-raleway f-13 no-padding color-white hide-bg-abu hide-bor-bot">
									<p>
										<strong>{{ $itemm->title }}</strong>
									</p>
									<p>{{ $itemm->artist }}</p>
									<p>{{ $itemm->root_genre }}</p>
									<p>{{ $itemm->first_release_year }}</p>
									@guest {{--
									<p>
										<input id="input-id" disabled name="rating" type="number" value="0" class="rating" min=0 max=5 step=1 data-size="medium"
										 data-rtl="false">
									</p> --}} @else
									<?php
                    $collection = collect(\App\Review::where('user_id', Auth::User()->id)->where('amazon_id', $itemm->amazon_id)->get());
                  ?>
										@if($collection->count() == null)
										<input id="input-id" name="rating" disabled type="number" value="0" class="rating" min=0 max=5 step=1 data-size="medium"
										 data-rtl="false"> @else
										<p>
											<input id="input-id" name="rating" disabled type="number" value="{{ $collection[0]->rating }}" class="rating" min=0 max=5
											 step=1 data-size="medium" data-rtl="false">
										</p>
										@endif @endguest

								</div>
							</div>
						</div>
					</div>

					@endforeach {{-- {!! $preferencebaru->links() !!} --}}

					<div id="remove-row">
						<div class="rows">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding color-white mar-top-10 text-center f-15">
								<div class="padding bor-dash-top bor-color-white col-lg-offset-4 col-md-offset-4 col-sm-offset-3 col-lg-4 col-md-4 col-sm-6 col-xs-12">
									Tampilkan Lebih Banyak
									<br> {{--
									<button id="btn-more" data-id="{{ $itemm->id }}" class="nounderline btn-block mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
									Load More </button> --}} {{--
									<span id="btn-more" data-id="{{ $itemm->id }}" class="glyphicon glyphicon-chevron-down"></span> --}}
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

			<div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 hide-bor-left-dash">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 f-raleway bg-skyblue padding color-white bor-left-solid-3 mar-top-20">
						Lagu Populer
					</div>
				</div>

				<div id="load-datapop">
					@foreach($preferencepopuler as $item)
					<div class="rows">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding mar-top-10 ">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-padding">
								<a href="{{ url('/member/detailmusik/' . $item->id) }}" title="View Post">
									<img src="{{ $item->imUrl }}" alt="" class="img-cover">
								</a>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 f-raleway f-13 no-padding color-white hide-bg-gray hide-bor-bot">
								<p>
									<strong>{{ $item->title }}</strong>
								</p>
								<p>{{ $item->artist }}</p>
								<p>{{ $item->root_genre }}</p>
								<p>{{ $item->first_release_year }}</p>
								@guest {{--
								<p>
									<input id="input-id" disabled name="rating" type="number" value="0" class="rating" min=0 max=5 step=1 data-size="medium"
									 data-rtl="false">
								</p> --}} @else
								<?php
                    $collection = collect(\App\Review::where('user_id', Auth::User()->id)->where('amazon_id', $item->amazon_id)->get());
                  ?>
									@if($collection->count() == null)
									<input id="input-id" disabled name="rating" disable="true" type="number" value="0" class="rating" min=0 max=5 step=1 data-size="medium"
									 data-rtl="false"> @else
									<p>
										<input id="input-id" disabled name="rating" disable type="number" value="{{ $collection[0]->rating }}" class="rating" min=0
										 max=5 step=1 data-size="medium" data-rtl="false">
									</p>
									@endif @endguest
							</div>
						</div>
					</div>
					@endforeach {{-- {!! $preferencepopuler->links() !!} --}}

					<div id="remove-rowpop">
						<div class="rows">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding color-white mar-top-10 text-center f-15 bor-dash-top">
								Tampilkan Lebih Banyak
								<br> {{--
								<button id="btn-more" data-id="{{ $itemm->id }}" class="nounderline btn-block mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
								Load More </button> --}} {{--
								<span id="btn-morepop" data-id="{{ $item->id }}" class="glyphicon glyphicon-chevron-down"></span> --}}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection