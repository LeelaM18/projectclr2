<?php

namespace App\Http\Controllers\codeclr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{
    //class varibles 
    public $app="codeclr";
    public $module="post";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
        $alert=request()->session()->get('alert');
        $user=Auth::user();
        $allusers=User::all()->KeyBy('id');
        if($user->role=='admin')
        {
            $data=$post->paginate(20);
        }
        else
        $data=post->where('user_id',$user_id)->paginate(5);
         
        return view('projectclr.post.index')->with('alert',$alert)->with('data',$data)->with('allusers',$allusers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post)
    { 
        $this->stub='Create';
       return view('projectclr.post.create')->with('app',$this)->with('post',$post);


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
       if(isset($request->all()['image'])){
        $file =$request->all()['image'];
        $filename='$data->slug' . '.' .$file->getClientOriginalExtension();
        $path=Storage::disk('local')->putFileAs('images/', $request->file('image'),$filename,'public');
       }
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
        Storage::disk('local')->put('example.txt', 'manohar'); 
        $post=Post::where('slug',$slug)->first();
        $this->authorize('view',$post);
        return view ('projectclr.post.show')->with('post',$post);
       ;
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
        $this->stub='edit';
        $this->authorize('update',$post);
        return view ('projectclr.post.update')->with('post',$post)->with('app',$this); 
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
