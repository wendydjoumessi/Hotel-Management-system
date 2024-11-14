<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

        <style type="text/css">
        .table-container {
        margin: auto;
        width: 80%;
        margin-top: 40px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        overflow: hidden;
        }

        .table {
        margin-bottom: 0;
        border-collapse: separate;
        border-spacing: 0;
        }

        .table th {
        background-color:skyblue;
        color: #ffffff;
        padding: 15px;
        font-size: 16px;
        text-transform: uppercase;
        border: none;
        }

        .table td {
        padding: 15px;
        vertical-align: middle;
        border: none;
        color: gray;
        }

        .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f8f9fa;
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

          <div class="table-container">

            <table class="table table-striped">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Message</th>
                <th>Reply</th>
            </tr>

           @foreach ($data as $data)
               
            <tr>
                <td>{{$data->name}}</td>
                <td>{{$data->email}}</td>
                <td>{{$data->phone}}</td>
                <td>{{$data->message}}</td>

                <td>
                    <a href="{{url('send_mail', $data->id)}}" class="btn btn-success">Send mail</a>
                </td>
            </tr>
          
            @endforeach
            </table>
            </div>
          </div>
        </div>
      </div>
     
      @include('admin.footer')

      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
  </body>
</html>