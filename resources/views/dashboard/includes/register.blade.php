<div class="w-full py-20" id="contact">
  <h3 class="text-2xl font-medium text-primary text-center mb-4 uppercase">რეგისტრაცია</h3>
  <p class="text-secondary text-center mb-4">შეავსეთ ქვემოთ მოცემული ფორმა, და ჩვენ მალევე დაგიკავშირდებით</p>
  
  @if (session('status'))
    <div class="text-center animate-pulse text-primary font-medium my-4">
        {{ session('status') }} 
    </div>
  @endif

  
  <div class="mx-auto rounded-lg shadow-md px-4 py-6 flex justify-center">
    <form action="{{ route('contact') }}" method="post" class="mb-4" enctype="multipart/form-data">
      @csrf

        <div class="w-72">
          <label for="name" class="text-primary block font-light mb-1">სახელი</label>
          <input type="text" name="name" id="name" autocomplete="off" placeholder="თქვენი სახელი" class="input" value="{{ old('name') }}" @error('name') border-red-500 @enderror>
          <label for="email" class="text-primary block font-light mb-1">მეილი</label>
          <input type="email" name="email" id="email" autocomplete="off" placeholder="თქვენი e-mail" class="input" value="{{ old('email') }}"  @error('email') border-red-500 @enderror>
          <label for="phone" class="text-primary block font-light mb-1">ტელეფონი</label>
          <input type="text" name="phone" id="phone" autocomplete="off" placeholder="თქვენი ტელეფონის ნომერი" class="input" value="{{ old('phone') }}" @error('phone') border-red-500 @enderror>
        </div>

        <label  class="hidden" for="referrer"></label>
        <input type="text" name="referrer" id="referrer" class="hidden" value="{{ $event->slug }}">

        
        <div>
          <button type="submit" class="mx-auto mt-2 block uppercase bg-secondary text-white px-4 py-2 rounded font-medium hover:bg-primary transition-colors duration-300 ease focus:outline-none focus:bg-primary">რეგისტრაცია</button>
        </div>

    </form>
  </div>

</div>