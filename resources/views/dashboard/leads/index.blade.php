@extends('layouts.app')

@section('content')
    


<div class="flex flex-col items-center" >
  @include('dashboard.includes.nav')


  <div class="w-10/12 bg-white p-6 rounded-lg">

    <div class="flex rounded-sm w-full bg-gray-100 mb-4 shadow">
      <div class="rounded-sm p-2 rounded-sm border-2 border-r-0 border-gray w-3/12">Name</div>
      <div class="rounded-sm p-2 rounded-sm border-2 border-r-0 border-gray w-2/12">Date</div>
      <div class="rounded-sm p-2 rounded-sm border-2 border-r-0 border-gray w-2/12">Email</div>
      <div class="rounded-sm p-2 rounded-sm border-2 border-r-0 bborder-gray w-2/12">Phone</div>
      <div class="rounded-sm p-2 rounded-sm border-2 border-r-0 bborder-gray w-3/12">Message</div>
      <div class="rounded-sm p-1 rounded-sm border-2 border-gray">
        <div class="px-4 py-1 rounded">
          Delete
        </div>
      </div>
    </div>    


    @if($leads->count())
      @foreach ($leads as $lead)
      
      <div class="flex rounded-sm w-full bg-gray-10 my-2 shadow-sm hover:shadow-md transition duration-150 ease-in-out">
        <div class="rounded-sm p-2 rounded-sm border-2 border-r-0 border-gray w-3/12 flex justify-between"><a href="{{ route('lead.show', $lead->id) }}">{{ $lead->name }}</a></div>
        <div class="rounded-sm p-2 rounded-sm border-2 border-r-0 border-gray w-2/12">{{ $lead->created_at->toFormattedDateString() }} {{-- toDayDateTimeString --}}</div>
        <div class="rounded-sm p-2 rounded-sm border-2 border-r-0 bborder-gray w-2/12">{{ $lead->email}}</div>
        <div class="rounded-sm p-2 rounded-sm border-2 border-r-0 bborder-gray w-2/12">{{ $lead->phone}}</div>
        <div class="rounded-sm p-2 rounded-sm border-2 border-r-0 bborder-gray w-3/12">{{ mb_substr($lead->message, 0, 35) }}...</div>
        <div class="rounded-sm p-1 rounded-sm border-2 border-gray">
        <form action="{{ route('lead.destroy', $lead->id) }}" method="POST">
          @csrf
          <button type="submit" class="bg-red-500 text-white px-4 py-1 rounded hover:bg-red-700 font-medium transition duration-150 ease-in-out" onclick="return confirm('Are you sure? This will forever delete this lead.')">Delete</button>
          {{-- <button onclick="return confirm('Are you sure? This will forever delete this lead post.')" type="submit">
            Delete
          </button>   --}}
        </form>
        </div>
      </div>    
      @endforeach

      {{ $leads->links() }}
        
    @else
      <p>There are no leads</p>    
    @endif


  </div>
</div>

@endsection