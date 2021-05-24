
@extends('layouts.app')

@section('content')
    
<div class="flex flex-col items-center" >
  <div class="w-95 md:w-8/12 bg-white py-6 px-2 md:p-6 mb-10 rounded-lg">
    <h2 class="text-2xl sm:text-3xl">
      {{$lead->name}}      
    </h2>

    <div class="my-5">
      <span class="font-semibold mr-3">Date: </span><span>{{ $lead->created_at->toDayDateTimeString() }}</span>
    </div>

    <div class="my-5">
      <span class="font-semibold mr-3">Email: </span> <span>{{ $lead->email }}</span>
    </div>

    <div class="my-5">
      <span class="font-semibold mr-3">Phone: </span> <span>{{ $lead->phone }}</span>
    </div>

    @if ($lead->message)
      <div class="my-5">
        <span class="font-semibold mr-3">Message: </span> <span>{{ $lead->message }}</span>
      </div>        
    @endif

    @if ($lead->referrer)
      <div class="my-5">
        <span class="font-semibold mr-3">Event: </span> <span>{{ $lead->event }}</span>
      </div>        
    @endif

    <div class="flex">
        <a href="{{ route('lead.dashboard') }}" class="text-dark border border-blue-500 px-4 py-1 rounded hover:bg-blue-700 hover:text-white font-medium transition duration-200 ease-in-out tracking-widest cursor-pointer">All Leads</a>
      <form action="{{ route('lead.destroy', $lead->id) }}" method="POST" class="ml-4">
          @csrf
          <button type="submit" class=" text-dark border border-red-500 px-4 py-1 rounded hover:bg-red-700 hover:text-white font-medium transition duration-200 ease-in-out tracking-widest" onclick="return confirm('Are you sure? This will forever delete this lead.')">Delete</button>
        </form>
      </div>
    </div>


  </div>
</div>

@endsection