@extends('framework.app')
@section('title','codeclr create page')
@section('content')
<h1 class="text-red-300 text-bold "> Create page</h1>

<form action="{{route('post.store')}}" method="post">
    <div class="grid  grid-cols-3 bg-red-300 p-3">
     <label class="col-span-1">Title</label>
     <input type="text" name="title" class="col-span-2 border-2 border-green-300 w-100">
     </div>
     <div class="grid  grid-cols-3 bg-red-300 p-3">
     <label class="col-span-1">slug</label>
     <input type="text"  name="slug" class="col-span-2 border-2 border-green-300 w-100">
     </div>
     <div class="grid  grid-cols-3 bg-red-300 p-3">
     <label class="col-span-1">access</label>
      <select name="access" class="col-span-2">
        <option value="public">public</option>     
        <option value="private">private</option>
        <option value="protected">protected</option>
      </select>
    </div>
     <div class="grid  grid-cols-3 bg-red-300 p-3">
     <label class="col-span-1">format</label>
      <select name="format" class="col-span-2">
        <option value="text">text</option>     
        <option value="code">code</option>
      </select>
    </div>
     <div class="grid  grid-cols-3 bg-red-300 p-3">
     <label class="col-span-1">Content</label>
     <textarea name="content" class="col-span-2" rows="8"></textarea>
     @csrf
</div>
<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
<div class="pt-4"> <button type="submit" class="bg-blue-300 p-2 hover:bg-green-700 hover:text-white rounded-lg">Create post</button></div>
</form>
@endsection
