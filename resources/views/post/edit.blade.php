@extends('layouts.app')
@section('content')
    <div class="container">
       <form action="{{ url('post/' . $post->id) }}" method="post">
            {{ method_field('PATCH') }}
            {{ csrf_field() }}
            <div class="panel-heading">
                <label for="title">Title</label>
                <input type="text" name="title" value="{{ $post->title }}" class="form-control">
            </div>
            <div class="panel-body">
                <label for="body">Body</label>
                <input type="text" name="body" value="{{ $post->body }}" class="form-control">
            </div>
            <button type="submit">Update Post</button>
       </form>
    </div>
@endsection