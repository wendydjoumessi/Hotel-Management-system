<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <style type="text/css">
        label {
          display: inline-block;
          width: 200px;
        }

        .div_deg{
            padding-top: 30px;
        }

    </style>

  </head>
  <body>
     @include('admin.header')
      
     @include('admin.sidebar')


     <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

          <div >
            <h1 class="fs-2 text-white fw-bold">Add Room</h1>
         
             <form action="{{url('add_room')}}" method="Post" enctype="multipart/form-data">
                @csrf
                <div class="div_deg d-flex align-items-center">
                    <label>Room Title</label>
                    <input type="text" name="title" class="rounded">
                </div>

                <div class="div_deg d-flex align-items-center">
                    <label>Description</label>
                    <textarea name="description" class="rounded"></textarea>
                </div>

                <div class="div_deg d-flex align-items-center">
                    <label>Price</label>
                    <input type="number" name="price" class="rounded">
                </div>

                <div class="div_deg d-flex align-items-center">
                    <label>Room Type</label>
                    <select name="type" class="rounded">
                        <option selected value="regular">Regular</option>
                        <option value="premium">Premium</option>
                        <option value="deluxe">Deluxe</option>
                    </select>
                </div>

                <div class="div_deg d-flex align-items-center">
                    <label>Free Wifi</label>
                    <select name="wifi" class="rounded">
                        <option selected value="yes">Yes</option>
                        <option value="no">No</option>
                        
                    </select>
                </div>

                <div class="div_deg d-flex align-items-center">
                    <label>Upload Image</label>
                    <input type="file" name="image" class="rounded">
                </div>

                <div class="div_deg">
                    <input type="submit" class="btn btn-primary" value="Add Room">
                </div>
             </form>

          </div>

          </div>
        </div>
     </div>
   
    
      @include('admin.footer')
  </body>
</html>