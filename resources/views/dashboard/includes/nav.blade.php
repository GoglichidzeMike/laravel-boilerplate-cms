
<div class="mb-6 bg-white rounded-lg w-8/12 p-3">
  <ul class="w-10/12 flex justify-between mx-auto rounded-md border-b-1">
    <li><a href="/dashboard">Dashboard</a></li>
    <div class="flex w-2/12 justify-between">
      <li><a href="/dashboard/blogs">Blogs</a></li>
      <li><a href="/dashboard/blogs/create">Create Blog</a></li>
    </div>
    <div class="flex w-2/12 justify-between">
      <li ><a href="/dashboard/events">Events</a></li>
      <li><a href="/dashboard/events/create">Create Event</a></li>
    </div>
  </ul>
</div>




@if (session('status'))
  <div class="mb-6 bg-white rounded-lg w-8/12 p-3">
   <div class="mx-auto text-center text-green-700 font-medium">
      {{ session('status') }}
    </div>
  </div>
@endif  