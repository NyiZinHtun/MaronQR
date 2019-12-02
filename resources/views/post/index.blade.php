@extends('layouts.app')
@section('content')
    <div class="continer">
        @foreach($posts as $post)
        <div class="panel panel-default">
           <div class="panel-heading">
                {{ $post->title }}
            </div>
            <div class="panel-body">
                {{ $post->body }}
            </div> 
            <div class="panel-footer">
                @foreach($post->comments as $comment)
                    {{ $comment->body }} <br>
                @endforeach
            </div> 
        </div>
        <form action="{{ 'post/' . $post->id }}" method="post">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button class="btn btn-danger">Delete</button>
        </form>
        <form action="{{ url('/store/'.$post->id) }}" method="post">
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
