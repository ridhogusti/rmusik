@extends('layouts.app') @section('content') @guest
<div class="w-h-100 bg-img-login pos-fixed scroll-active">
    <div class="container pos-relative padding  mar-top-100">
        <div class="col-lg-offset-2 col-md-offset-2  col-lg-8 col-md-8 col-sm-12  col-xs-12 bg-putih padding bor-radius-3">
            <div class="rows">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 color-magenta  bor-color-magenta bor-bot-3 padding  text-center f-20">
                    PREFERENCE<br>
                    <span class="f-13">Berikan rating pada 5 lagu berikut</span>
                </div>
            </div>
            <div class="rows">
                <div class="item">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-sm-12 col-xs-12 padding">
                        <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 no-padding ">
                            <img src="{{ $musik->imUrl }}" class="img-responsive ">
                            <input type="text" value="{{ $musik->amazon_id }}" name="amazon_id" hidden>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
                                <audio id="player2" preload="none" controls style="max-width:100%;">
                                    <source src="" type="audio/mp3">
                                </audio>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12 mar-2 no-padding ">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-sm-12 col-xs-12 padding bor-left-solid-3 bor-color-magenta">
                                <table class="table">
                                    <tr>
                                        <td>Judul</td>
                                        <td>:</td>
                                        <td>{{ $musik->title }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Artis</td>
                                        <td>:</td>
                                        <td>{{ $musik->artist }}</td>
                                    </tr>
                                    <tr>
                                        <td>Genre</td>
                                        <td>:</td>
                                        <td>{{ $musik->root_genre }}</td>
                                    </tr>
                                    {{--
                                    <tr>
                                        <td colspan="3" class="bg-darkgray">
                                            <input id="input-id" name="rating" type="number" value="{{ $musik->rating }}" class="rating" min=0 max=5 step=1 data-size="medium"
                                                data-rtl="false">
                                        </td>
                                    </tr> --}}
                                </table>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-sm-12 col-xs-12 padding mar-top-10">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

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

<div class="container mar-top-10">
  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 f-raleway bg-skyblue padding color-white bor-color-gray bor-left-solid-3">
    Rekomendasi Lagu
  </div>

  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding bg-putih bor-radius-3 mar-top-10">
    <div class="wrap">
      <div class="item">
        <div class="cau_left">
          <div class="row">
            @foreach($rekomendasi as $item)
            <div class="col-xs-4 col-md-2">
              {{-- <a href="#" class="thumbnail"> --}}
                <a href="{{ url('/detailmusik/' . $item->id) }}" title="View Post" class="thumbnail">
                  <img class="lazyOwl img-responsive" data-src="{{ $item->imUrl }}" src="{{ $item->imUrl }}" alt="Lazy Owl Image">
                </a>
              <blockquote class="f-15 f-raleway no-pad-top no-pad-bot pad-left-5 no-pad-right ">
                {{ $item->title }} <br> {{ $item->artist }} <br> {{ $item->root_genre }} <br> {{ $item->rating }}
                <input id="input-id" name="rating" disabled type="number" value="{{ $item->rating }}" class="rating" min=0 max=5 step=1 data-size="medium" data-rtl="false">
              </blockquote>
              {{-- <td colspan="3" class="bg-darkgray"> --}}
              {{-- </td> --}}
            </div>
            @endforeach {{-- {!! $rekomendasi->links() !!} --}}
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

@endguest @endsection