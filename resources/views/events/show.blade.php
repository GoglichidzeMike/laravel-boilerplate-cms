@extends('layouts.app')

@section('content')
    
<div class="flex justify-center">
  <div class="w-8/12 my-6 bg-white p-6 rounded-lg">

      <div class="mb-4 p-3 border-2 flex flex-col justify-between">
        <h2 class="text-3xl">
          {{ $event->name }}      
        </h2>

        <div class="my-10">
          <img class="rounded-md max-w-sm shadow" src="{{asset('/uploads/image/'.$event->image)}}" alt="{{ $event->name }}">
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

      </div>    
  </div>
</div>


@endsection