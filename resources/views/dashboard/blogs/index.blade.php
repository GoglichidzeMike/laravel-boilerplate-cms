@extends('layouts.app')

@section('content')
    
<div class="flex flex-col items-center" >
  @include('dashboard.includes.nav')

  <div class="w-10/12 bg-white p-6 rounded-lg">


    <div class="flex rounded-sm w-full bg-gray-100 mb-4">
      <div class="rounded-sm p-2 rounded-sm border-2 border-r-0 border-gray w-4/12">Title</div>
      <div class="rounded-sm p-2 rounded-sm border-2 border-r-0 border-gray w-2/12">Date</div>
      <div class="rounded-sm p-2 rounded-sm border-2 border-r-0 bborder-gray w-2/12">Author</div>
      <div class="rounded-sm p-2 rounded-sm border-2 border-r-0 bborder-gray w-2/12">Edit</div>
      <div class="rounded-sm p-2 rounded-sm border-2 border-gray w-2/12">Delete</div>
    </div>    


    @if($blogs->count())
      @foreach ($blogs as $blog)
      
      <div class="flex rounded-sm w-full bg-gray-10 my-2">
        <div class="rounded-sm p-2 rounded-sm border-2 border-r-0 border-gray w-4/12">{{ $blog->name }}</div>
        <div class="rounded-sm p-2 rounded-sm border-2 border-r-0 border-gray w-2/12">{{ $blog->created_at->toFormattedDateString() }}</div>
        <div class="rounded-sm p-2 rounded-sm border-2 border-r-0 bborder-gray w-2/12">{{ $blog->user->name}}</div>
        <div class="rounded-sm p-2 rounded-sm border-2 border-r-0 bborder-gray w-2/12">Edit</div>
        <div class="rounded-sm p-2 rounded-sm border-2 border-gray w-2/12">Delete</div>
      </div>    
      @endforeach

      {{ $blogs->links() }}
        
    @else
      <p>There are no blogs</p>    
    @endif


  </div>
</div>

@endsection