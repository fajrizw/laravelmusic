@extends('layouts.main')
@section('container')

    <link rel="stylesheet" href="{{ asset('css/single.css') }}">



@if (session('errors'))
        <p class="text-primary">{{session('errors')}}</p>
    @endif


    <!-- section video-->
    <div class="card-body">
        <div class="container">
            <div class="row ">
                <div class="col-md-4">
                    <img src="{{ asset('/audio/'.$music->audio) }}" class="img-fluid" alt="No Audio">
                </div>
                <div class="col-md-8">
                    <h6 class="card-title">Title</h6>
                    <p class="card-text">{{ $music -> title }}</p>
                    <h6 class="card-title">Artist</h6>
                    <p class="card-text">{{ $music -> artist }}</p>
                    <h6 class="card-title">Lyrics</h6>
        <p class="card-text">{{ $music -> lyrics }}</p>
                </div>
            </div>
        </div>
        
 
    </div>

    @endsection

