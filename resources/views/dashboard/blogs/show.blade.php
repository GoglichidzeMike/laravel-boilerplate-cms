@extends('layouts.app')

@section('content')
    
<div class="flex flex-col items-center" >
    @if (session('status'))
      <div class="mb-6 bg-white rounded-lg w-8/12 p-3">
        <div class="mx-auto text-center text-green-700 font-medium ">
          <p class="animate-pulse">
             {{ session('status') }}   
          </p>
        </div>
      </div>
    @endif  
  <div class="w-95 md:w-10/12 lg:w-8/12 bg-white p-6 mb-10 rounded-lg">

    <h2 class="text-2xl md:text-3xl">
      {{$blog->name}}      
    </h2>

    <div class="my-10">
      <img class="rounded-md md:max-w-sm shadow" src="{{asset('/uploads/image/'.$blog->image)}}" alt="{{ $blog->name }}">
    </div>

    <div class="my-10">
      {!! $blog->body !!}
    </div>


    <div class="flex">
      <a class="bg-blue-500 text-white px-4 py-2 mr-5 rounded font-medium hover:bg-blue-700 transition duration-150 ease-in-out" href="{{ route('blog.edit', $blog->id) }}">Edit</a>
      <div>
        <form action="{{ route('blog.destroy', $blog->id) }}" method="POST">
          @csrf
          <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700 font-medium transition duration-150 ease-in-out" onclick="return confirm('Are you sure? This will forever delete this blog post.')">Delete</button>
        </form>
      </div>
    </div>


  </div>
</div>

@endsection