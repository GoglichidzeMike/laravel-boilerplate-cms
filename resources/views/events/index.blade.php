@extends('layouts.app')

@section('content')
    
<div class="flex justify-center">
  <div class="w-8/12 bg-white p-6 my-6 rounded-lg">


    <div class="grid grid-cols-3 gap-4">
      @if($events->count())
      @foreach ($events as $event)
      <div class="mb-4 p-3 border-2 flex flex-col justify-between">
        <img src="/uploads/image/{{ $event->image }}" class="mb-3" alt="{{ $event->name }}">
        <a class="font-bold" href="{{ route('public_event.show' , $event->slug) }}"><h2>{{ $event->name }}</h2></a>

        <div class="flex flex-col mt-3">
          @if ($event->date)
            <p>Start:  <span class="font-bold">{{ $event->date }}</span></p>
          @endif
          @if ($event->duration)
            <p>Duration:  <span class="font-bold">{{ $event->duration }}</span></p>
          @endif
          <span class="text-gray-600 text-sm">  {{   $event->created_at->toFormattedDateString() }}</span>
        </div>

      </div>    
      
      @endforeach
      
      {{ $events->links() }}
      
      @else
      <p>There are no events</p>    
      @endif
    </div>


  </div>
</div>

@endsection