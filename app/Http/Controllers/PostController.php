<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Image;
use App\Comment;
use App\Tag;
use Gate;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth")->only(['index', 'view']);
    }

    public function index()
    {
        $posts = Post::orderBy('id','DESC')->get();
        return view('post.index',compact('posts'));
    }

  
    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        
        $post->save();
        $tag = new Tag();
        $tag->name = $request->name;
        $post->tags()->save($tag);
        return redirect('post');
    }

   
    public function show($id)
    {
        //
    }

    public function edit(Post $post)
    {
        return view('post.edit',compact('post'));
    }

    public function update(Request $request,Post $post)
    {
        $response = Gate::inspect('edit',$post);
        if($response->allowed()){
            $post->update(request(['title','body']));
        }else{
            echo $response->message();
        }
       
        return redirect('/post');
    }

    public function destroy(Post $post)
    {
        $post->delete();     
        return redirect('post');
    }

    public function storeComment(Request $request,$id){
        $post = Post::find($id);
        $comment = new Comment();        
        $comment->body = $request->cbody;
        $comment->user_id = Auth()->user()->id;
        $post->comments()->save($comment);
        return redirect('post');
    }

    public function gate(comment $comment,$id)
    {
        $comment = Comment::find($id);
        if(Gate::allows('owner',$comment)){
            $comment->delete();
        }else{
            abort(403);
        }
        return redirect('/post');
    }
}
