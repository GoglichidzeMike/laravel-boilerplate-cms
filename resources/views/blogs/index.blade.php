@extends('layouts.app')

@section('content')
    
<div class="flex justify-center">
  <div class="w-8/12 bg-white p-6 rounded-lg">

    <form action="{{ route('blogs') }}" method="post">
      @csrf
      <div class="mb-4">



         <label for="name" class="sr-only">Name</label>
         <input type="text" name="name" id="name" placeholder="Blog Name"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg mb-3 @error('name') border-red-500 @enderror " 
          value="{{ old('name') }}">

         <label for="slug" class="sr-only">Slug</label>
         <input type="text" name="slug" id="slug" placeholder="Blog Slug"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg mb-4 @error('slug') border-red-500 @enderror " 
          value="{{ old('slug') }}">


        <label for="body" class="sr-only">Body</label>
        <textarea name="body" id="body" cols="30" rows="20" class="bg-gray-100  border-2 w-full p-4 rounded-lg content" @error('body') border-red-500  @enderror placeholder="Post Body"></textarea>
        {{-- @error('body')
          <div class="text-red-500 mt-2 text-sm">
            {{ $message }}
          </div>
        @enderror --}}
      </div>

      <div class="div">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">Create</button>
      </div>

      <script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
      <script>
          tinymce.init({
              selector:'textarea.content',
              height: 500
          });
      </script>
    </form>


  </div>
</div>

@endsection