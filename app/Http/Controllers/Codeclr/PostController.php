<?php

namespace App\Http\Controllers\Codeclr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alert=request()->session()->get('alert');
        $data=Post::all();
        return view('projectclr.index')->with('alert',$alert)->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
       return view('projectclr.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $data=$request;
       $post=new Post();
       $post->title=$data->title;
       $post->slug=$data->slug;
       $post->user_id=$data->user_id;
       $post->access=$data->access;
       $post->format=$data->format;
       $post->content=$data->content;
       $post->save();
       $alert="sucessfully created a post[" .$post->title ."]";
       return redirect()->route('post.index')->with('alert',$alert);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( string $slug)
    {
        
        $post=Post::where('slug',$slug)->first();
        return view ('projectclr.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $slug)
    {
        $post=Post::where('slug',$slug)->first();
        $this->authorize('update',$post);
        return view ('projectclr.update')->with('post',$post); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $post=Post::where('slug',$slug)->first();
        $this->authorize('update',$post);
        $data=$request;
        $post->title=$data->title;
        $post->slug=$data->slug;
        $post->user_id=$data->user_id;
        $post->access=$data->access;
        $post->format=$data->format;
        $post->content=$data->content;
        $post->save();
        $alert="sucessfully updated a post[" .$post->title ."]";
        return redirect()->route('post.index')->with('alert',$alert);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $post=Post::where('slug',$slug)->first();
       $post->delete();
       $alert="sucessfully deleted a post[" .$post->title ."]";
       return redirect()->route('post.index');
    }
}
