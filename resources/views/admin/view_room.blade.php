<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <style type="text/css">
    .table-container {
      margin: auto;
      width: 100%;
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

    .room-image {
      width: 100px;
      height: auto;
      border-radius: 6px;
    }
  </style>
  </head>
  <body>
     @include('admin.header')
      
     @include('admin.sidebar')
   
     <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
             <div class="table-container">

             <table class="table table-striped">
               <tr>
                <th>Room Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>Wifi</th>
                <th>Room Type</th>
                <th>Image</th>
                <th>Add Room Images</th>
                <th>Delete</th>
                <th>Edit</th>
               </tr>

               @foreach ( $data as $roomdata )
                <tr>
                    <td>{{$roomdata->room_title}}</td>
                    <td>{!! Str::limit($roomdata->description, 150)!!}</td>
                    <td>{{$roomdata->price}}$</td>
                    <td>{{$roomdata->wifi}}</td>
                    <td>{{$roomdata->room_type}}</td>
                    <td>
                        <img src="room/{{$roomdata->image}}" class="room-image" />
                    </td>

                    <td>
                        <a class="btn btn-primary" href="{{url('room_images', $roomdata->id)}}">Add Room Images</a>
                    </td>

                    <td>
                        <a onclick="return confirm('Are you sure to delete this');" class="btn btn-danger" href="{{url('room_delete', $roomdata->id)}}">Delete</a>
                    </td>

                    <td>
                        <a  class="btn btn-warning" href="{{url('room_update', $roomdata->id)}}">Edit</a>
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