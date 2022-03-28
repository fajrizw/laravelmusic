@extends('layouts/main')
@section('container')
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="{{ asset('css/add.css') }}">




<div class="container">
<form action="{{ url('music') }}" method="post" enctype="multipart/form-data">
@csrf
<div class="row">
        <div class="col-25">
        <label for="title" class="form-label">Artist Name</label>
        </div>
    <div class="col-75">
       <input type="text" name="artist" class="form-control" id="artist">
                </div>
</div>
<div class="row">
<div class="col-25">
                    <label for="author" class="form-label"> Title </label>
                    </div>
                    <div class="col-75">
                    <input type="text" name="title" class="form-control" id="title">
                </div>
</div>
<div class="row">
<div class="col-25">
                        <label for="formFile" class="form-label">Audio</label>
                        </div>
                        <div class="col-75">
                        <input class="form-control" name="audio" type="file" id="formFile">
                    </div>
                       </div>
                       <div class="row">
    <div class="col-25">
        
                    <label for="author" class="form-label"> Lyrics </label>
                    </div>
    <div class="col-75">
    <textarea id="lyrics" name="lyrics" style="height:200px"></textarea>
    </div>
                </div>
                <br>
                <div class="row justify-content-end">
    <input type="submit" value="Add Music">
    </div>

</body>
</html>

             @endsection