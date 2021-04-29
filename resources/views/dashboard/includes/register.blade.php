<div>
      <h2 class="text-xl mb-4 text-gray-700" >
        Register for this event
      </h2>

      @if (session('status'))
        <div class="mb-6 mx-auto w-8/12">
        <div class="mx-auto text-center text-green-700 font-medium">
            {{ session('status') }}
          </div>
        </div>
      @endif  

      <form action="{{ route('contact') }}" method="post" class="mb-4" enctype="multipart/form-data">
        @csrf
        <div class="mb-10 flex flex-col">

          <label for="name" class="sr-only">Name</label>
          <input type="text" name="name" id="name" placeholder="Your Name"
            class="bg-gray-100 border-2 w-52 p-2 text-sm rounded-lg mb-4 @error('name') border-red-500 @enderror " 
            value="{{ old('name') }}">

          <label for="email" class="sr-only">Email</label>
          <input type="email" name="email" id="email" placeholder="Your Email"
            class="bg-gray-100 border-2 w-52 p-2 text-sm rounded-lg mb-4 @error('slug') border-red-500 @enderror " 
            value="{{ old('email') }}">

          <label for="phone" class="sr-only">Phone</label>
          <input type="string" name="phone" id="phone" placeholder="Your Phone"
            class="bg-gray-100 border-2 w-52 p-2 text-sm rounded-lg mb-4 @error('slug') border-red-500 @enderror " 
            value="{{ old('phone') }}">

          <label  class="hidden" for="referrer"></label>
          <input type="text" name="referrer" id="referrer" class="hidden" value="{{ $event->slug }}">

          {{-- <label for="message" class="sr-only">Message</label>
          <textarea name="message" id="body" cols="20" rows="5" class="bg-gray-100  border-2 w-full p-4 rounded-lg" @error('body') border-red-500  @enderror placeholder="Message"></textarea> </div>  --}}
         
          <div class="div">
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded font-medium hover:bg-green-700">Register</button>
          </div>
      </form>
    </div>