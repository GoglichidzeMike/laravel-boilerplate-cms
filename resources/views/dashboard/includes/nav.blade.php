
<div class="mb-6 bg-white rounded-lg w-95  md:w-10/12 lg:w-8/12 p-3">
  <ul class="w-full md:w-10/12 flex justify-between mx-auto rounded-md border-b-1 text-sm">

    <li><a href="/dashboard">Dashboard</a></li>

    <div class="md:flex md:w-2/12 justify-between">
      <li><a href="/dashboard/blogs">Blogs</a></li>
      <li><a href="/dashboard/blogs/create">Create Blog</a></li>
    </div>
    
    <div class="md:flex md:w-2/12 justify-between">
      <li ><a href="/dashboard/event">Events</a></li>
      <li><a href="/dashboard/event/create">Create Event</a></li>
    </div>

    <li><a href="/dashboard/leads">Leads</a></li>

  </ul>
</div>




@if (session('status'))
  <div class="mb-6 bg-white rounded-lg w-8/12 p-3">
   <div class="mx-auto text-center text-green-700 font-medium">
      {{ session('status') }}
    </div>
  </div>
@endif  