<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <title>Irma</title>
</head>
<body class="bg-gray-200 min-h-screen flex justify-between flex-col">

    <div class="p-6 bg-white flex justify-between mb-6">

      <ul class="flex items-center">
        <li>
          <a href="{{ route('home') }}" class="p-3">Home</a>
        </li>
        <li>
          <a href="{{ route('blogs') }}" class="p-3">Blogs</a>
        </li>
        <li>
          <a href="{{ route('contact') }}" class="p-3">Contact</a>
        </li>
      </ul>


      <ul class="flex items-center">

        @auth
          <li><a href="" class="p-3">{{ auth()->user()->name }}</a></li>     
          <li><a href="{{ route('dashboard') }}" class="p-3">Dashboard</a></li>
          <li>
            <form action="{{ route('logout') }}" method="post" class="p-3 inline">
              @csrf
              <button type="submit">Log Out</button>
            </form>
          </li>
        @endauth

        @guest
          <li><a href="{{ route('login') }}" class="p-3">Log In</a></li>
          <li><a href="{{ route('register') }}" class="p-3">Register</a></li>
        @endguest
      </ul>


    </div>

      @yield('content')


    <footer class="mt-auto">
       <div class="p-6 bg-white flex justify-between">

      <ul class="flex items-center">
        <li>
          <a href="{{ route('home') }}" class="p-3">Home</a>
        </li>
        <li>
          <a href="{{ route('blogs') }}" class="p-3">Blogs</a>
        </li>
      </ul>
    </footer>

</body>
</html>