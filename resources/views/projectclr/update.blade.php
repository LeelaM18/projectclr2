@extends('framework.app')
@section('title','codeclr create page')
@section('content')
<h1 class="text-red-300 text-bold "> Create page</h1>

<form action="{{ route('post.update', $post->slug) }}" method="post">
    <div class="grid  grid-cols-3 bg-red-300 p-3">
     <label class="col-span-1">Title</label>
     <input type="text" name="title"  value="{{$post->title}}"class="col-span-2 border-2 border-green-300 w-100 ">
     </div>
     <div class="grid  grid-cols-3 bg-red-300 p-3">
     <label class="col-span-1">slug</label>
     <input type="text"  name="slug" value="{{$post->slug}}" class="col-span-2 border-2 border-green-300 w-100 disabled">
     </div>
     <div class="grid  grid-cols-3 bg-red-300 p-3">
     <label class="col-span-1" value="{{$post->access}}">access</label>
      <select name="access" class="col-span-2" >
        <option value="public"  @if($post['access']=='public' ) selected @endif>public</option>     
        <option value="private"  @if($post['access']=='private' ) selected @endif>private</option>
        <option value="protected"  @if($post['access']=='protected' ) selected @endif>protected</option>
      </select>
    </div>
     <div class="grid  grid-cols-3 bg-red-300 p-3">
     <label class="col-span-1">format</label>
      <select name="format"  value="{{$post->format}}" class="col-span-2"   >
      <option value="code" @if($post['format']=='code' ) selected @endif>code</option>
      <option value="text"  @if($post['format']=='text' ) selected @endif>text</option>

      </select>
    </div>
     <div class="grid  grid-cols-3 bg-red-300 p-3">
     <label class="col-span-1">Content</label>
     <textarea name="content" value="{{$post->content}}" class="col-span-2" rows="8" >
     value="{{$post->content}}" 
     </textarea>
     @csrf
</div>
<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
<div class="pt-4 flex"> <button type="submit" class="bg-blue-300 p-2 hover:bg-green-700 hover:text-white rounded-lg">Create post</button>
<a  href="{{route('post.index')}}" type="submit" class= " ml-3 bg-blue-300 p-2 hover:bg-green-700 hover:text-white rounded-lg border-2 border-green-500">Back</a>
</div>
</form>
@endsection
