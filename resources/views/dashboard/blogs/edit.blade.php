@extends('layouts.app')

@section('content')
    
<div class="flex flex-col items-center" >
  <div class="w-95 md:w-10/12 lg:w-8/12 bg-white px-1 py-4 md:p-6 rounded-lg mb-4">
    <form action="{{ route('blog.update', $blog->id) }}" method="post" class="mb-4" enctype="multipart/form-data">
      @csrf
      <div class="mb-4">

         <label for="name" class="sr-only">Name</label>
         <input type="text" name="name" id="name" placeholder="Blog Name"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg mb-3 text-sm md:text-base @error('name') border-red-500 @enderror " 
          value="{{ $blog->name }}">

         <label for="slug" class="sr-only">Slug</label>
         <input type="text" name="slug" id="slug" placeholder="Blog Slug"
          class="bg-gray-100 border-2 p-2 text-sm rounded-lg mb-4 w-full md:w-auto @error('slug') border-red-500 @enderror " 
          value="{{ $blog->slug }}">



        <label for="image" class="sr-only">Image</label>
        <input type="file" name="image" id="image" class="bg-gray-100 border-2 w-full md:w-auto p-2 text-xs rounded-lg mb-4 @error('image') border-red-500 @enderror" >
          @error('image')
          <div class="text-red-500 mt-2 text-sm">
            {{ $message }}
          </div>
        @enderror


        <label for="body" class="sr-only">Body</label>
        <textarea name="body" id="body" cols="30" rows="20" class="bg-gray-100  border-2 w-full p-4 rounded-lg content" @error('body') border-red-500  @enderror placeholder="Post Body">{{ $blog->body }}</textarea>

      </div>

      <div class="div">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium hover:bg-blue-700">Update</button>
      </div>

      <script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
      <script>
        tinymce.init({
          selector:'textarea.content',
          height: 500,
          plugins: [
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste imagetools textcolor"
            ],
          toolbar: "insertfile undo redo | styleselect | fontsizeselect | forecolor backcolor | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
          fontsize_formats: "8pt 10pt 12pt 14pt 16pt 18pt 24pt 36pt",
          images_upload_url: '/dashboard/blog/upload',
          images_upload_credentials: true,
          image_title: true,
          automatic_uploads: true,
          file_picker_types: 'image',

          images_upload_handler: function (blobInfo, success, failure) {
            var xhr, formData;
            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', '/dashboard/blog/upload');
            var token = '{{ csrf_token() }}';
            xhr.setRequestHeader("X-CSRF-Token", token);
            xhr.onload = function() {
                var json;
                if (xhr.status != 200) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }
                json = JSON.parse(xhr.responseText);

                if (!json || typeof json.location != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }
                success(json.location);
            };
            formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());
            xhr.send(formData);
          }
        });
      </script>
    </form>


  </div>
</div>

@endsection