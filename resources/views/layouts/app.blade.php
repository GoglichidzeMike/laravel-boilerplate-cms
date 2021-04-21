<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <title>Irma</title>
</head>
<body class="bg-gray-200">

    <div class="p-6 bg-white flex justify-between mb-6">

      <ul class="flex items-center">
        <li>
          <a href="" class="p-3">Home</a>
        </li>
        <li>
          <a href="" class="p-3">Dashboard</a>
        </li>
        <li>
          <a href="" class="p-3">Blogs</a>
        </li>
      </ul>


      <ul class="flex items-center">
        <li><a href="" class="p-3">Log In</a></li>
        <li><a href="" class="p-3">Register</a></li>
        <li><a href="" class="p-3">Log Out</a></li>
      </ul>


    </div>


  @yield('content')
</body>
</html>