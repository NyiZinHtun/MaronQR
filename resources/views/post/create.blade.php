@extends('layout.master')
@section('content')
<div class="container">
    <form action="{{ url('/post') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control">
                @if($errors->has('title'))
                    <p class="text-danger">{{ $errors->first('title') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea name="body" class="form-control"></textarea>
                @if($errors->has('body'))
                    <p class="text-danger">{{ $errors->first('body') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Tag</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default">Add Post</button>
            </div>
    </form>
</div>
@endsection