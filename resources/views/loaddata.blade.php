@extends('layouts.app') @section('content')

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <h3 class="title-color text-center">
            <u>Load More Data Demo</u>
        </h3>
    </div>

</div>

<div class="row">
    <div class="col-md-10 col-md-offset-1 " id="load-data">
        @foreach($posts as $post)
        <div class="mdl-grid mdl-cell mdl-cell--12-col  mdl-shadow--4dp">
            <div class="post">
                <a href="{{ url('blog/'.$post->slug) }}" class="nounderline">
                    <h2 class="post-title">{{ $post->title }}</h2>
                </a>
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="post-date">Published: {{ date('M j, Y', strtotime($post->created_at)) }}</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 post-img">
                        <img class="img-responsive1" src="{{ asset('img/logo.png') }}" alt="{{ $post->title }}">
                    </div>
                    <div class="col-md-8">
                        <p class="text-justify">{{ substr(strip_tags($post->body,'
                            <pre>,<code>'),0,500) }}{{ strlen(strip_tags($post->body))>500?"...":"" }}</p>
                    </div>
                </div>
            </div>   
               
            </div>
            @endforeach
            
            <div id="remove-row">
                <button id="btn-more" data-id="{{ $post->id }}" class="nounderline btn-block mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" > Load More </button>
            </div>
            
            
        </div>
        
        
    </div>    
@endsection