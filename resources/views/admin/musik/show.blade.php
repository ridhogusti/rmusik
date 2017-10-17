@extends('layouts.app')

@section('content')

<div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Berita {{ $berita->title }} <small>{{ $berita->created_at }}</small>
                        </h2>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class=" col-md-6">
                            <a href="javascript:void(0);" class="thumbnail">
                                <img src="{{ asset('uploads/'.$berita->image) }}" class="img-responsive">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                    <div class="body">
                        {{ $berita->content }}
                        <br>
                        <br>
                        <a href="{{ url('/adminn/beritas') }}" title="Back"><button class="btn bg-red btn-block btn-lg waves-effect"><i class="fa fa-arrow-left" aria-hidden="true"></i> KEMBALI</button></a>
                    </div>
                </div>
            </div>
        </div>


@endsection
