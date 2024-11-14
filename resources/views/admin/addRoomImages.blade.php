<!DOCTYPE html>
<html>
  <head> 
  <base href="/public">
    @include('admin.css')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
     @include('admin.header')
      
     @include('admin.sidebar')
   
      <!-- Sidebar Navigation end-->
      
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
          <div class="container my-5">
            <div class="text-center">
                <h1 class="mb-4 fw-bold fs-2">Upload images for {{$data->room_title}}</h1>

                @if (session()->has('message'))
                  <div class="alert alert-success">
                     <button type="button" class="close" data-bs-dismiss="alert">x</button>
                         {{session()->get('message')}}
                    </div>
                @endif

                <div class="row">

                @foreach ($images as $image )

                  <div class=" col-md-4 col-sm-8 mb-4">
                   
                       <img style="height: 300px !important; width: 400px !important; margin-bottom: 8px"  src="/room/{{$image->image}}" />

                       <a class="btn btn-danger" href="{{url('delete_image', $image->id)}}">Delete Image</a>

                  </div>
                @endforeach
                </div>

                <form action="{{url('upload_images', $data->id)}}" method="Post" enctype="multipart/form-data" class="bg-light p-4 rounded shadow-sm" style="max-width: 400px; margin: 0 auto;">

                @csrf
                
                <div class="mb-3">
                    <label for="image" class="form-label">Upload Image</label>
                    <input type="file" class="form-control" id="image" name="image" required>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Add Image</button>
                </div>

                  </form>
                </div>
             </div>
           </div>
        </div>
    </div>


      @include('admin.footer')
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
  </body>
</html>