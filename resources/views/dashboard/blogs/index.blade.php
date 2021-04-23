@extends('layouts.app')

@section('content')
    

{{-- TODO: Change edit and delete texct to buttons
            seperate it from grid. maybe change it to some icons as well --}}

<div class="flex flex-col items-center" >
  @include('dashboard.includes.nav')

  <div class="w-10/12 bg-white p-6 rounded-lg">

    <div class="flex rounded-sm w-full bg-gray-100 mb-4 shadow">
      <div class="rounded-sm p-2 rounded-sm border-2 border-r-0 border-gray w-4/12">Title</div>
      <div class="rounded-sm p-2 rounded-sm border-2 border-r-0 border-gray w-2/12">Date</div>
      <div class="rounded-sm p-2 rounded-sm border-2 border-r-0 bborder-gray w-2/12">Author</div>
      <div class="rounded-sm p-2 rounded-sm border-2 border-r-0 bborder-gray w-2/12">Edit</div>
      <div class="rounded-sm p-2 rounded-sm border-2 border-gray w-2/12">Delete</div>
    </div>    


    @if($blogs->count())
      @foreach ($blogs as $blog)
      
      <div class="flex rounded-sm w-full bg-gray-10 my-2 shadow-sm hover:shadow-md transition duration-150 ease-in-out">
        <div class="rounded-sm p-2 rounded-sm border-2 border-r-0 border-gray w-4/12 flex justify-between"><a href="{{ route('blog.show', $blog->slug) }}">{{ $blog->name }}</a> <img class="h-6 rounded-sm" src="{{asset('/uploads/image/'.$blog->image)}}" alt=""></div>
        <div class="rounded-sm p-2 rounded-sm border-2 border-r-0 border-gray w-2/12">{{ $blog->created_at->toFormattedDateString() }}</div>
        <div class="rounded-sm p-2 rounded-sm border-2 border-r-0 bborder-gray w-2/12">{{ $blog->user->name}}</div>
        <div class="rounded-sm p-2 rounded-sm border-2 border-r-0 bborder-gray w-2/12"><a href="{{ route('blog.edit', $blog->id) }}">Edit</a></div>
        <div class="rounded-sm p-2 rounded-sm border-2 border-gray w-2/12">
        <form action="{{ route('blog.destroy', $blog->id) }}" method="POST">
          @csrf
          <button onclick="return confirm('Are you sure? This will forever delete this blog post.')" type="submit">
            Delete
          </button>  
        </form>
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