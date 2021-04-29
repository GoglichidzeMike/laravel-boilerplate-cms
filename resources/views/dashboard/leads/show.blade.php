
@extends('layouts.app')

@section('content')
    
<div class="flex flex-col items-center" >
  @include('dashboard.includes.nav')

  <div class="w-8/12 bg-white p-6 mb-10 rounded-lg">


    <h2 class="text-3xl">
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
      <div>
        <form action="{{ route('lead.destroy', $lead->id) }}" method="POST">
          @csrf
          <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700 font-medium transition duration-150 ease-in-out" onclick="return confirm('Are you sure? This will forever delete this lead.')">Delete</button>
        </form>
      </div>
    </div>


  </div>
</div>

@endsection