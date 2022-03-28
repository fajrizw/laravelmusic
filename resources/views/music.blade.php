@extends('layouts/main')
@section('container')
@if (session('errors'))
        <p class="text-primary">{{session('errors')}}</p>
    @endif
<div class="col-lg-12">
    <div class="row">
        <a href="music/create" class="btn btn-dark">Add Music</a><br>
    </div><br>
    <div class="row">
        
        @foreach ($musics as $music)
        <div class="card">
        <div class="card-body">
        <div class="row">
        <div class="col-md-4">
            <h4 class="card-title" >{{ $music->title }}</h4>
            <img src="{{ asset('/audio/'.$music->audio) }}" >
</div>        
        <div class="col-md-8">
            <p class="card-text" >{{ $music->lyrics }}</p>
            <div class="d-flex align-items-end">
        <a href="music/detail/{{ $music->id }}" class="btn btn-secondary">Detail</a>
                <a href="music/{{ $music->id }}/edit" class="btn btn-warning">Edit</a>    
            <form method="POST" action="{{ url('music', $music->id ) }}">
                @csrf
                @method('DELETE') 
                <button class="btn btn-danger">Delete</button>
            </div>
           
            </div>
            </div>
        </div>
        
         
        @endforeach
    </div>
</div>
</div>
</div>
@endsection
