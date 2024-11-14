<div  class="our_room">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Our Room</h2>
                     <p>Rooms are available, Book Now!</p>
                  </div>
               </div>
            </div>
            <div class="row">
               @foreach ($room as $rooms )

               <div class="col-md-4 col-sm-6">
                  <div id="serv_hover" class="room">
                   <a href="{{url('room_details' , $rooms->id)}}" style="text-decoration: none;">
                     <div class="room_img">
                        <figure><img src="room/{{$rooms->image}}" alt="#" width="100" style="height: 250px"/></figure>
                     </div>
                     <div class="bed_room">
                        <h3>{{$rooms->room_title}}</h3>
                        <p style="padding: 10px;">{!! Str::limit($rooms->description, 100)!!}</p>
                       </div>
                     </a>
                  </div>
               </div>

               @endforeach
            </div>
         </div>
      </div>