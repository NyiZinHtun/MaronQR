@extends('layouts.app')
@section('content')
    <div class="container">
        @foreach($videos as $video)
        <h1>{{ $video->title }}</h1>
        <video width="320" height="240" controls>
            <source src="{{ 'storage/videos/' .$video->url}}" type="video/mp4">
        </video>
        <div class="pull-right">
            {!! QrCode::size(100)->generate($video->user->name  .'created this video.'); !!} 
        </div>
        <div class="panel-footer">
            @foreach($video->comments as $comment)
                {{ $comment->body }} <br>
            @endforeach
        </div>
        <form action="{{ url('/vstore/'.$video->id) }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <input type="hidden" name="commentable_id">
                <input type="text" class="form-control" name="cbody">
                <button class="pull-right">comment</button>
            </div><br>                
        </form>
        @endforeach
    </div>
@endsection