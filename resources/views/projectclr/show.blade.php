@extends('framework.app')
@section('title',$post->title)
@section('content')

@if(request()->get('delete'))
<div class="text-red-500 bg-green-200 rounded-lg p-3 text-xl font-bold  border-2 border-red-200">
    Confirm to delete
    <form action="{{route('post.destroy',$post->slug)}} " class="flex">
    <button type="submit" class="bg-red-300 rounded-md px-6 py-3 text-white mt-2 hover:bg-red-700 ">I confirm to delete</button>
</button>
        </div>
        
</from>
@endif
</div>
</div>
<h1 class="bg-white p-3 rounded-sm border-3 flex justify-end">
    <div class="flex">
       <div class="flex"> 
        <a href="{{route('post.edit',$post->slug)}}" class="text-red-500">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
        </svg>
        </div>
        <div class="text-xl text-red-500 ">edit</div>

</a>
</div>
<div class="flex ml-4">
       <div class="flex"> 
<a href="{{route('post.show',$post->slug)}}?delete=1"  type="submit" class="text-xl text-red-500 flex"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
</svg>
delete

</a>
        </div>
        
</from>
</a>
</div>
</h1>
<div class=" grid grid-cols-4">
    <div class="col-span-1 bg-slate-200 rounded-md p-3">slug</div>
    <div class="col-span-3 bg-slate-400 rounded-md p-3 ml-3">{{$post->slug}}</div>
</div>
<div class=" grid grid-cols-4 mt-2">
    <div class="col-span-1 bg-slate-200 rounded-md p-3">Title</div>
    <div class="col-span-3 bg-slate-400 rounded-md p-3 ml-3">{{$post->title}}</div>
</div>
<div class=" grid grid-cols-4 mt-2">
    <div class="col-span-1 bg-slate-200 rounded-md p-3">content</div>
    <div class="col-span-3 bg-slate-400 rounded-md p-3 ml-3">{{$post->content}}</div>
</div>
<div class="mt-3 px-3 py-4">
<a href="{{route('post.index')}}" class="bg-red-500 hover:text-white border-2 border-black-200 mt-3">Back</a>
</div>
@endsection
