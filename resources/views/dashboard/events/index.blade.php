
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
  <div class="w-95 lg:w-10/12 bg-white py-6 px-1 md:p-6 rounded-lg">
    <div>
      <p class="text-center mb-4">
        <a href="{{ route('event.create') }}" class="bg-blue-500 text-white px-6 py-3 rounded hover:bg-blue-700 transition duration-150 ease-in-out">Create A New Event</a>
      </p>
    </div>
    <div class="flex justify-between rounded-sm w-full bg-gray-100 mb-4 shadow">
      <div class="rounded-sm p-2 border-2 border-r-0 border-gray w-full md:w-8/12">Name</div>
      <div class="rounded-sm p-2 border-2 border-r-0 border-gray w-2/12 hidden md:block">Event Date</div>
      <div class="rounded-sm p-2 border-2 border-r-0 border-gray w-2/12 hidden md:block">Created at</div>

      <div class="flex w-24">
        <div class="w-full rounded-sm border-2 border-r-0 bborder-gray flex justify-center items-center">
            <img src="/image/dashboard/edit.svg" alt="Edit Icon">
        </div>
        <div class="w-full rounded-sm border-2 border-gray flex justify-center items-center">
            <img src="/image/dashboard/trash.svg" alt="Edit Icon">
        </div>
      </div>
    
    </div>    


    @if($events->count())
      @foreach ($events as $event)
      
      <div class="flex rounded-sm w-full bg-gray-10 my-2 shadow-sm hover:shadow-md transition duration-150 ease-in-out text-sm lg:text-base">
        <div class="rounded-sm p-2 border-2 border-r-0 border-gray w-full md:w-8/12 flex justify-between items center"><a href="{{ route('event.show', $event->slug) }}">{{ $event->name }}</a> <img class="h-6 rounded-sm" src="{{asset('/uploads/image/'.$event->image)}}" alt=""></div>
        <div class="rounded-sm p-2 border-2 border-r-0 border-gray w-2/12 hidden md:block">
         @if ($event->date)
          {{ $event->date }}

         @else
          No date
         @endif
        </div>
        <div class="rounded-sm p-2 border-2 border-r-0 border-gray w-2/12 hidden md:block">{{ $event->created_at->toFormattedDateString() }}</div>

        
        <div class="flex w-24">
          <div class="w-full rounded-sm border-2 border-r-0 bborder-gray flex justify-center items-center hover:bg-blue-200">
            <a href="{{ route('event.edit', $event->id) }}">
              <img src="/image/dashboard/edit.svg" alt="Edit Icon" class="min-w-full">
            </a>
          </div>
          
          <div class="w-full rounded-sm p-1 border-2 border-gray flex justify-center items-center hover:bg-red-200">
            <form action="{{ route('event.destroy', $event->id) }}" class="flex justify-center items-center" method="POST">
              @csrf
              <button type="submit" onclick="return confirm('Are you sure? This will forever delete this event.')" >
                <img src="/image/dashboard/trash.svg" alt="Edit Icon" >
              </button>
            </form>
          </div>
        </div>
       

      </div>    
      @endforeach

      {{ $events->links() }}
        
    @else
      <p>There are no events to display</p>    
    @endif


  </div>
</div>

@endsection