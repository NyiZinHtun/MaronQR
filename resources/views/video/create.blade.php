@extends('layouts.app')
@section('content')
    <div class="container">
    <form action="{{ url('video/') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="form-group">
            <input type="file" name="url" class="form-control">
        </div>
        <div class="form-group">
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <button type="submit">Add Video</button> 
        </div>
    </form>
    </div>
@endsection