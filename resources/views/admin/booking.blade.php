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
        padding: 12px;
        font-size: 13px;
        text-transform: uppercase;
        border: none;
        }

        .table td {
        padding: 13px;
        border: none;
        color: gray;
        vertical-align: middle;
        }

        .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f8f9fa;
        }

    .room-image {
      width: 100px;
      height: auto;
      border-radius: 3px;
    }

        </style>
  </head>
  <body>
     @include('admin.header')
      
     @include('admin.sidebar')
   

     <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

               @if(session()->has('message'))
                    <div class="alert alert-success">
                     <button type="button" class="close" data-bs-dismiss="alert">x</button>
                         {{session()->get('message')}}
                    </div>
                  @endif

            <div class="table-container">

            <table class="table table-striped">
            <tr>
            <th>Room_id</th>
            <th>Customer name</th>
            <th>Email</th>
            <th>phone</th>
            <th>Arrival Date</th>
            <th>Leaving Date</th>
            <th>Room Title</th>
            <th>price</th>
            <th>Room image</th>
            <th>Status</th>
            <th>Status Update</th>
            <th>Delete</th>
            </tr>

           @foreach ($data as $data )
            <tr>
                <td>{{$data->room_id}}</td>
                <td>{{$data->name}}</td>
                <td>{{$data->email}}</td>
                <td>{{$data->phone}}</td>
                <td>{{$data->start_date}}</td>
                <td>{{$data->end_date}}</td>
                <td>{{$data->room->room_title}}</td>
                <td>{{$data->room->price}}</td>
                <td>
                    <img src="/room/{{$data->room->image}}" class="room-image" />
                </td>
                <td>
                 @if($data->status == 'approve')
                  <span class="text-success" >Approved</span>

                  @endif

                  @if ($data->status == 'rejected')
                  <span class="text-danger">Rejected</span>
                  @endif

                  @if ($data->status == 'pending')
                  <span class="text-primary">pending</span>
                  @endif
                
                </td>

                <td>
                    <a onclick="return confirm('Are you sure to delete this Booking entry')" class="btn btn-danger" href="{{url('delete_booking', $data->id)}}">Delete</a>
                </td>

                <td>
                    <a class="btn btn-success mb-2" href="{{url('approve_book', $data->id)}}">Approve</a>
                    <a class="btn btn-danger" href="{{url('reject_book', $data->id)}}">Rejected</a>
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