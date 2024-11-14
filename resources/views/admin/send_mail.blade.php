<!DOCTYPE html>
<html>
  <head> 
    <base href="/public">
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
   
      <!-- Sidebar Navigation end-->
     
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

             <h1 class="fs-2 fw-bold text-center">Mail send to {{$data->name}}</h1>


             <form action="{{url('mail',$data->id)}}" method="Post">
                @csrf
                <div class="div_deg d-flex align-items-center">
                    <label>Greetings</label>
                    <input type="text" name="greeting" class="rounded">
                </div>

                <div class="div_deg d-flex align-items-center">
                    <label>Mail Body</label>
                    <textarea name="body" class="rounded"></textarea>
                </div>

                <div class="div_deg d-flex align-items-center">
                    <label>Action Text</label>
                    <input type="text" name="action_text" class="rounded">
                </div>

                <div class="div_deg d-flex align-items-center">
                    <label>Action Url</label>
                    <input type="text" name="action_url" class="rounded">
                </div>

                <div class="div_deg d-flex align-items-center">
                    <label>End Line</label>
                    <input type="text" name="endline" class="rounded">
                </div>

                <div class="div_deg">
                    <input type="submit" class="btn btn-primary" value="Send mail">
                </div>
             </form>

          </div>
        </div>
      </div>


      @include('admin.footer')

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
  </body>
</html>