@extends('layouts.app')

@section('content')
    
<div class="flex justify-center">
  <div class="w-8/12 bg-white p-6 rounded-lg">

    @if($blogs->count())
      @foreach ($blogs as $blog)
        <div class="mb-4 p-3 border-2"> 

          <h2>{{ $blog->name }}</h2>
          <a href="" class="font-bold">{{ $blog->user->name }}</a>
          <span class="text-gray-600 text-sm">  {{   $blog->created_at->toFormattedDateString() }}</span>
          <div class="my-3">
            {!! $blog->body !!}
          </div>
        </div>    

      @endforeach

      {{ $blogs->links() }}
        
    @else
      <p>There are no blogs</p>    
    @endif


  </div>
</div>

@endsection