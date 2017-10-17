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
<link href="{{ asset('bootstrap-star-rating/css/star-rating.css') }}" media="all" rel="stylesheet" type="text/css" />
 
<!-- optionally if you need to use a theme, then include the theme file as mentioned below -->
<link href="{{ asset('bootstrap-star-rating/themes/krajee-svg/theme.css') }}" media="all" rel="stylesheet" type="text/css" />
<link href="{{ asset('jquery.steps/dist/jquery-steps.css') }}" media="all" rel="stylesheet" type="text/css" />
 
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.js"></script>
<script src="{{ asset('bootstrap-star-rating/js/star-rating.js') }}" type="text/javascript"></script>
 
<!-- optionally if you need to use a theme, then include the theme file as mentioned below -->

<script src="{{ asset('bootstrap-star-rating/themes/krajee-svg/theme.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="{{ asset('jquery.steps/dist/jquery-steps.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
<script>


    // initialize with defaults
$("#input-id").rating();
$('.carousel-example-generic').carousel({
  interval: 0
})

$("#example-basic").steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "slideLeft",
    autoFocus: true
});
 
// with plugin options
</script>
</head>

<body>
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

      @if(collect(\App\Metadata::get())->count() == null)
          <h3 class="text-center">Tidak ada data musik</h3>
      @else
          
      {!! Form::open(['method' => 'post', 'url' => 'member/rating/create', 'class' => 'form-horizontal']) !!}
        {{ $page }}
      <input type="text" value="{{ $page }}" name="page" hidden>
      @foreach($preference as $index => $item)
        <div class="item @if($index == '0'){{'active'}}@endif">
            <div class="col-lg-12 col-md-12 col-sm-12 col-sm-12 col-xs-12 padding">
            <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 no-padding ">
              <img src="{{ $item->imUrl }}" class="img-responsive ">
              <input type="text" value="{{ $item->amazon_id }}" name="amazon_id" hidden>
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
                    <td>{{ $item->title }}</td>
                  </tr>
                  <tr>
                    <td>Nama Artis</td>
                    <td>:</td>
                    <td>{{ $item->artist }}</td>
                  </tr>
                  <tr>
                    <td>Genre</td>
                    <td>:</td>
                    <td>{{ $item->root_genre }}</td>
                  </tr>
                  <tr>
                    <td colspan="3" class="bg-darkgray">
                        <input id="input-id" name="rating" type="number" value=0 class="rating" min=0 max=5 step=1 data-size="medium" data-rtl="false">
                    </td>
                  </tr>
                </table>
              </div>
              <div class="col-lg-12 col-md-12 col-sm-12 col-sm-12 col-xs-12 padding mar-top-10">
                
              </div>
            </div>
          </div>
        </div> 
        
    @endforeach
   
  </div>

                            {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Submit', ['class' => 'btn btn-primary']) !!}
    
 {!! Form::close() !!}
      @endif
      </div>
    </div>
  </div>
</div> 
</body>
</html>

