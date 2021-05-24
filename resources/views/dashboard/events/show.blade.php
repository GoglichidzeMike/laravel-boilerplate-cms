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
      {{ $event->name }}      
    </h2>

    <div class="my-10">
      <img class="rounded-md md:max-w-sm shadow" src="{{asset('/uploads/image/'.$event->image)}}" alt="{{ $event->name }}">
    </div>

    @if ($event->date)
      <p>Event date: {{ $event->date }}</p>
    @endif

    @if ($event->duration)
      <p>Event duration: {{ $event->duration }}</p>
    @endif

    <div class="my-10">
      {!! $event->body !!}
    </div>


    <div class="my-10">
      @include('dashboard.includes.register')
    </div>


    <div class="flex">
      <a class="bg-blue-500 text-white px-4 py-2 mr-5 rounded font-medium hover:bg-blue-700 transition duration-150 ease-in-out" href="{{ route('event.edit', $event->id) }}">Edit</a>
      <div>
        <form action="{{ route('event.destroy', $event->id) }}" method="POST">
          @csrf
          <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700 font-medium transition duration-150 ease-in-out" onclick="return confirm('Are you sure? This will forever delete this event post.')">Delete</button>
        </form>
      </div>
    </div>


  </div>
</div>

@endsection