<!DOCTYPE html>
<html lang="en">
   <head>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">


   <base href="/public">
      @include('home.css')
   </head>
   <!-- body -->
   <body class="main-layout">

     <style>
         .carouselImage {
            width: 100%;
            height: 500px;
         }

         
      </style>

      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
         @include('home.header')
      </header>
      <!-- end header inner -->
      <!-- end header -->

      <div  class="our_room">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Our Room</h2>
                     <p>{{$room->room_title}} available, Book now</p>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-8">
                  <div id="serv_hover" class="room">
                     <div class="room_img">
                     @if (count($images) != 0)
                     <div class="carousel slide" id="carouselDemo" data-bs-wrap="true" data-bs-ride="carousel">
                        <div class="carousel-inner">
                           @foreach ($images as $image)
                            <div class="carousel-item active" data-bs-interval="10000">
                               <img src="/room/{{$image->image}}" alt="" class="carouselImage"/>
                               <div class="carousel-caption">
                                 <h5 class="text-white fw-bold fs-3">Title of slide {{ $loop->index }}</h5>
                               </div>
                            </div>
                            @endforeach
                           
                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselDemo"
                        data-bs-slide="prev">
                           <span class="carousel-control-prev-icon"></span>
                        </button>

                        <button class="carousel-control-next" type="button" data-bs-target="#carouselDemo"
                        data-bs-slide="next">
                           <span class="carousel-control-next-icon"></span>
                        </button>

                        <div class="carousel-indicators">
                           @foreach ($images as $image)
                             <button type="button" data-bs-target="#carouselDemo" data-bs-slide-to="{{ $loop->index }}" class="active">
                             </button>
                           @endforeach
                        </div>
                     </div>
                     
                     @else
                     
                    <figure><img src="room/{{$room->image}}" alt="#" class="img-fluid"/></figure>
                    @endif

                     </div>
                     <div class="bed_room">
                        <h3>{{$room->room_title}}</h3>
                        <p style="padding: 12px;">{!! Str::limit($room->description, 100)!!}</p>

                        <h4 style="padding: 12px;">Free Wifi : {{$room->wifi}}</h4>

                        <h4 style="padding: 12px;">Room Type : {{$room->room_type}}</h4>

                        <h4 style="padding: 12px;">Price : ${{$room->price}}</h4>

                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <form action="{{url('add_booking', $room->id)}}" method="Post">
                  <h1 class="fs-2 fw-bold">Book Room</h1>

                  <div>

                  @if(session()->has('message'))
                    <div class="alert alert-success">
                     <button type="button" class="close" data-bs-dismiss="alert">x</button>
                         {{session()->get('message')}}
                    </div>
                  @endif

                  </div>



                  @if ($errors)

                  @foreach ($errors->all() as $errors)

                  <li style="color: red;">
                     {{$errors}}
                  </li>
                     
                  @endforeach
                     
                  @endif

                     @csrf

                     <div class="mb-3">
                     <label for="name" class="form-label">Name</label>
                     <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" @if(Auth::id())
                           value="{{Auth::user()->name}}"
                           @endif
                           >
                     </div>

                     <div class="mb-3">
                     <label for="email" class="form-label">Email</label>
                     <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email"
                     @if(Auth::id())
                           value="{{Auth::user()->email}}"
                           @endif
                     >
                     </div>

                     <div class="mb-3">
                     <label for="phone" class="form-label">Phone</label>
                     <input type="number" class="form-control" id="phone" name="phone" placeholder="Enter your phone number"
                     @if(Auth::id())
                           value="{{Auth::user()->phone}}"
                           @endif
                     >
                     </div>

                     <div class="mb-3">
                     <label for="startDate" class="form-label">Start Date</label>
                     <input type="date" class="form-control" id="startDate" name="startDate">
                     </div>

                     <div class="mb-3">
                     <label for="endDate" class="form-label">End Date</label>
                     <input type="date" class="form-control" id="endDate" name="endDate">
                     </div>

                     <div class="d-grid">
                     <input type="submit" value="Book Room" class="btn btn-primary">
                     </div>
                  </form>
               </div>


            </div>
         </div>
      </div>


     
      <!--  footer -->
        @include('home.footer')
        
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>



          <script type="text/javascript">
             $(function(){

                  var dtToday = new Date();
               
                  var month = dtToday.getMonth() + 1;

                  var day = dtToday.getDate();

                  var year = dtToday.getFullYear();

                  if(month < 10)
                     month = '0' + month.toString();

                  if(day < 10)
                  day = '0' + day.toString();

                  var maxDate = year + '-' + month + '-' + day;
                  $('#startDate').attr('min', maxDate);
                  $('#endDate').attr('min', maxDate);

               });
          </script>
   </body>
</html>