<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <title>Dashboards</title>
</head>
<body class="bg-gray-200 min-h-screen flex justify-between flex-col">
  <div class="bg-white mb-6">
    <div class="nav w-95 md:w-10/12 mx-auto flex flex-col sm:flex-row justify-between overflow-hidden">
      <div class="burger absolute top-2 right-2 sm:hidden cursor-pointer">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
      </div>
      
      <ul class="flex flex-col sm:flex-row sm:items-center space-y-2 sm:m-0 sm:space-y-0 sm:space-x-6">
        <li class="h-16 sm:h-auto flex sm:block items-center">
          <a href="{{ route('dashboard') }}" class="py-3">Dashboard</a>
        </li>
        <li>
          <a href="{{ route('home') }}" class="py-3">Home</a>
        </li>
        @auth
          <li><a href="{{ route('blog.dashboard') }}" class="py-3">Blogs</a></li>
          <li><a href="{{ route('event.dashboard') }}" class="py-3">Events</a></li>
          <li><a href="{{ route('lead.dashboard') }}" class="py-3">Leads</a></li>
        @endauth
      </ul>
      <ul class="flex flex-col sm:flex-row sm:items-center my-3 space-y-2 sm:m-0 sm:space-y-0 sm:space-x-6">
        @auth
          <li><a href="" class="py-3 hidden sm:block">{{ auth()->user()->name }}</a></li>     
          <li>
            <form action="{{ route('logout') }}" method="post" class="py-3 inline">
              @csrf
              <button type="submit">Log Out</button>
            </form>
          </li>
        @endauth
        @guest
          <li class=""><a href="{{ route('login') }}" class="py-3">Log In</a></li>
          <li class=""><a href="{{ route('register') }}" class="py-3">Register</a></li>
        @endguest
      </ul>

    </div>
  </div>

      @yield('content')


    <footer class="mt-auto">
       <div class="p-6 bg-white flex justify-between">

      <ul class="flex items-center">
        <li>
          <a href="{{ route('home') }}" class="p-3">Home</a>
        </li>
        <li>
          <a href="{{ route('dashboard') }}" class="p-3">Dashboard</a>
        </li>
      </ul>
    </footer>

<script>

  const navSlide = () => {
      const burger = document.querySelector(".burger");
      const nav = document.querySelector(".nav");

      burger.addEventListener("click", () => {
          //Toggle Nav
          nav.classList.toggle("nav-active");

          //Burger Animation
          burger.classList.toggle("toggle");
      });
  };

  navSlide();
</script>
</body>
</html>