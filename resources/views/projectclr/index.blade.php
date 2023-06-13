@extends('framework.app')
@section('title','codeclr index page')
@section('content')
@if($alert)
<div class="bg-yellow-300 border-2 border-black-200 rounded-lg p-3 shadow-lg">{{$alert}}</div>
@endif 
<table class="border-2 w-full">
    <thead class="border-b-2">
        <th class="border-2 text-left p-2">id</th>
        <th class="border-2 text-left p-2">user_id</th>
        <th class="border-2 text-left p-2">title</th>
        <th class="border-2 text-left p-2">slug</th>
        <th class="border-2 text-left p-2">access</th>
        <th class="border-2 text-left p-2">format</th>
    </thead>

    <tbody>
        @foreach($data as $record)
        <tr class="border-2">
        <th class="border-2 text-left p-2 ">{{$record->id}}</th>
        <th class="border-2 text-left p-2">{{Auth::user()->where('id',$record->user_id)->first()->name}}</th>
        <th class="border-2 text-left p-2"> 
            <a href="{{route('post.show', $record->slug)}}" class="text-blue-400">{{$record->title}}</th></a>
        <th class="border-2 text-left p-2">{{$record->slug}}</th>
        <th class="border-2 text-left p-2">{{$record->access}}</th>
        <th class="border-2 text-left p-2">{{$record->format}}</th>
       
</tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection
