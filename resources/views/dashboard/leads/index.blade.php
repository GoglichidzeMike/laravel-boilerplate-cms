@extends('layouts.app')

@section('content')
    


<div class="flex flex-col items-center" >
  @if (session('status'))
    <div class="mb-6 bg-white rounded-lg w-8/12 p-3">
    <div class="mx-auto text-center text-green-700 font-medium">
      <p class="animate-pulse">
        {{ session('status') }}
      </p>
      </div>
    </div>
  @endif  

  <div class="w-95 lg:w-11/12 bg-white py-6 px-1 md:p-6 rounded-lg">
    <div class="flex justify-end">
      <p data-href="/leads/exort" id="export" class="inline-block text-dark  px-4 mb-2 cursor-pointer py-1 border border-blue-500 rounded hover:bg-blue-500 hover:text-white font-medium transition-colors duration-150 ease-in-out" onclick="exportTasks(event.target);">Export</p>
    </div>
      <script>
        function exportTasks(_this) {
          window.location.href = '/leads/export';
        }
      </script>
    <div class="flex rounded-sm w-full bg-gray-100 mb-4 shadow text-sm lg:text-base">
      <div class="rounded-sm p-2 border-2 border-r-0 border-gray w-full lg:w-2/12">Name</div>
      <div class="rounded-sm p-2 border-2 border-r-0 border-gray sm:w-4/12 md:w-2/12 hidden sm:block">Date</div>
      <div class="rounded-sm p-2 border-2 border-r-0 border-gray w-2/12 hidden md:block">Email</div>
      <div class="rounded-sm p-2 border-2 border-r-0 bborder-gray w-2/12 hidden md:block">Phone</div>
      <div class="rounded-sm p-2 border-2 border-r-0 bborder-gray w-2/12 hidden lg:block">Message</div>
      <div class="rounded-sm p-2 border-2 border-r-0 bborder-gray w-2/12 hidden lg:block">Event</div>
      <div class="flex w-12">
        <div class="w-full rounded-sm border-2 border-gray flex justify-center items-center">
            <img src="/image/dashboard/trash.svg" alt="Delete Icon">
        </div>
      </div>
    </div>    


    @if($leads->count())
      @foreach ($leads as $lead)
      
      <div class="flex rounded-sm w-full bg-gray-10 my-2 shadow-sm hover:shadow-md transition duration-150 ease-in-out text-sm lg:text-base">
        <div class="rounded-sm p-2 border-2 border-r-0 border-gray w-full lg:w-2/12 flex justify-between"><a href="{{ route('lead.show', $lead->id) }}">{{ $lead->name }}</a></div>
        <div class="rounded-sm p-2 border-2 border-r-0 border-gray sm:w-4/12 md:w-2/12 hidden sm:block overflow-hidden">{{ $lead->created_at->toFormattedDateString() }} {{-- toDayDateTimeString --}}</div>
        <div class="rounded-sm p-2 border-2 border-r-0 bborder-gray w-2/12 hidden md:block overflow-hidden">{{ $lead->email}}</div>
        <div class="rounded-sm p-2 border-2 border-r-0 bborder-gray w-2/12 hidden md:block overflow-hidden">{{ $lead->phone}}</div>
        <div class="rounded-sm p-2 border-2 border-r-0 bborder-gray w-2/12 hidden lg:block overflow:hidden">{{ mb_substr($lead->message, 0, 20) }}@if (strlen($lead->message > "20"))...@endif</div>
        <div class="rounded-sm p-2 border-2 border-r-0 bborder-gray w-2/12 hidden lg:block overflow:hidden">{{ mb_substr($lead->referrer, 0, 20) }}</div>

          
        <div class="flex w-12">
            <div class="w-full rounded-sm p-1 border-2 border-gray flex justify-center items-center hover:bg-red-200">
              <form action="{{ route('lead.destroy', $lead->id) }}" class="flex justify-center items-center" method="POST">
                @csrf
                <button type="submit" onclick="return confirm('Are you sure? This will forever delete this event.')" >
                  <img src="/image/dashboard/trash.svg" alt="Edit Icon" >
                </button>
              </form>
            </div>
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