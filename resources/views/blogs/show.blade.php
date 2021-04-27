@extends('layouts.app')

@section('content')
    
<div class="flex justify-center">
  <div class="w-8/12 bg-white p-6 rounded-lg">



      <div class="mb-4 p-3 border-2 flex flex-col justify-between">
        <h2 class="text-3xl mb-4">{{ $blog->name }}</h2>
        <img src="/uploads/image/{{ $blog->image }}" class="mb-3 max-w-lg rounded-md shadow-md" alt="{{ $blog->name }}">

        <div class="my-3">
          {!! $blog->body !!}
        </div>
        <div class="flex flex-col mt-3">
          <a href="" class="font-bold">{{ $blog->user->name }}</a>
          <span class="text-gray-600 text-sm">  {{   $blog->created_at->toFormattedDateString() }}</span>
        </div>
      </div>    


  </div>
</div>

@endsection