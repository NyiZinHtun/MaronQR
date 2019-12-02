<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;
use App\Video;
use App\Comment;
use App\Tag;
use Auth;

class VideoController extends Controller
{
   
    public function index()
    {
        $videos = Video::all();
        return view('video.index',compact('videos'));
    }

    
    public function create()
    {
        return view('video.create');
    }

    
    public function store(Request $request)
    {
        $video = new Video();
        $video->title = $request->title;
        $video->user_id = Auth::user()->id;
        $imageName = time().'.'.request()->file('url')->getClientOriginalExtension();
        request()->file('url')->move(public_path('storage/videos'), $imageName);
        $video->url = $imageName;
        $video->save();
        $tag = new Tag();
        $tag->name = $request->name;
        $video->tags()->save($tag);
        return redirect('video');
    }

    
    public function show(Filesystem $file)
    {
        dd($file);
    }

   
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }

    public function vstoreComment(Request $request,$id)
    {
        $video = Video::find($id);
        $comment = new Comment();
        $comment->body = $request->cbody;
        $video->comments()->save($comment); 
        return redirect('video');
    }

    public function qrshow(Video $video)
    {
        $videos = Video::all();
        return view('video.qrcode',compact('videos'));
    }
}
