@extends('layouts.app')

@section('content')
    
<div class="flex justify-center">
  <div class="w-8/12 bg-white p-6 my-6 rounded-lg">


    <div class="grid grid-cols-3 gap-4">
      @if($blogs->count())
      @foreach ($blogs as $blog)
      <div class="mb-4 p-3 border-2 flex flex-col justify-between">
        <img src="/uploads/image/{{ $blog->image }}" class="mb-3" alt="{{ $blog->name }}">
        <a href="{{ route('public_blogs.show' , $blog->slug) }}"><h2>{{ $blog->name }}</h2></a>

        <div class="flex flex-col mt-3">
          <a href="{{ route('public_blogs.show' , $blog->slug) }}" class="font-bold">{{ $blog->user->name }}</a>
          <span class="text-gray-600 text-sm">  {{   $blog->created_at->toFormattedDateString() }}</span>
        </div>
        {{-- <div class="my-3">
          {!! $blog->body !!}
        </div> --}}
      </div>    
      
      @endforeach
      
      {{ $blogs->links() }}
      
      @else
      <p>There are no blogs</p>    
      @endif
    </div>


  </div>
</div>

@endsection