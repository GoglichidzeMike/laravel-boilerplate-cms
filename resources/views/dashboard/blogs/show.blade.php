
@extends('layouts.app')

@section('content')
    
<div class="flex flex-col items-center" >
  @include('dashboard.includes.nav')

  <div class="w-8/12 bg-white p-6 mb-10 rounded-lg">


    <h2 class="text-3xl">
      {{$blog->name}}      
    </h2>

    <div class="my-3">
      <img class="rounded-md max-w-sm" src="{{asset('/uploads/image/'.$blog->image)}}" alt="{{ $blog->name }}">
    </div>

    <div class="">
      {!! $blog->body !!}
    </div>


  </div>
</div>

@endsection