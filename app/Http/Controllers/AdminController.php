<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\RoomImages;
use App\Notifications\SendEmailNotification;
use Illuminate\Console\View\Components\Alert;
use Notification;
use Illuminate\Support\Facades\Auth;



class AdminController extends Controller
{
    public function index() {
        
        if(Auth::id()){

            $usertype = Auth()->user()->usertype;
            
            if ($usertype == 'user') {

                $room  = Room::all();
                $gallary = Gallery::all();

                return view('home.index', compact('room', 'gallary'));
            }

            else if ($usertype == 'admin'){

                $messages = Contact::all();

                return view('admin.index', compact('messages'));
            }
            else {
                return redirect()->back();
            }
        }
    }

public function home(){

    $room  = Room::all();
    $gallary = Gallery::all();
    return view('home.index', compact('room', 'gallary'));
}

public function create_room(){
    return view('admin.create_room');
}


public function add_room(Request $request) {
    
    $data = new Room;

    $data->room_title = $request->title;

    $data->description = $request->description;

    $data->price = $request->price;

    $data->wifi = $request->wifi;

    $data->room_type = $request->type;

    $image= $request->image;

    if ($image) {

       $imagename = time(). '.' .$image->getClientOriginalExtension();

       $request->image->move('room', $imagename);

       $data->image = $imagename;

    }

    $data->save();

    return redirect()->back();

}

public function view_room() {

  $data = Room::all();

    return view('admin.view_room', compact('data'));
}



public function room_delete($id){
    $data = Room::find($id);

    $data->delete();

    return redirect()->back();
}

public function room_update($id) {

    $data = Room::find($id);

    return view('admin.update_room', compact('data'));
}

public function edit_room($id, Request $request) {
  
    $data = Room::find($id);

    $data->room_title = $request->title;

    $data->description = $request->description;

    $data->price = $request->price;

    $data->wifi = $request->wifi;

    $data->room_type = $request->type;

    $image = $request->image;

    if($image) {

        $imagename = time(). '.' .$image->getClientOriginalExtension();

       $request->image->move('room', $imagename);

       $data->image = $imagename;
    }

    $data->save();

    return redirect()->back();
}


public function bookings() {

    $data = Booking::all();
    return view('admin.booking', compact('data'));
}


public function delete_booking($id) {

    $data = Booking::find($id);
    
    $data->delete();
    return redirect()->back()->with('message', 'Booking entry deleted successfully');
}


public function approve_book($id) {

    $booking = Booking::find($id);

    $booking->status = 'approve';

    $booking->save();

    return redirect()->back();

}

public function reject_book($id) {
    $booking = Booking::find($id);

    $booking->status = 'rejected';

    $booking->save();

    return redirect()->back();
}

public function view_gallary() {

    $gallary = Gallery::all();

    return view('admin.gallary', compact('gallary'));
}


public function upload_gallary(Request $request) {
   
    $data  = new Gallery;

    $image = $request->image;

    if($image) {
        $imagename = time().'.' .$image->getClientOriginalExtension();

        $request->image->move('gallary', $imagename);

        $data->image = $imagename;

        $data->save();

        return redirect()->back();
    }

}

public function delete_gallary($id) {
    $data = Gallery::find($id);

    $data->delete();

    return redirect()->back()->with('message', 'Gallary image deleted successfully');
}


public function all_messages(){

    $data = Contact::all();
    return view('admin.all_messages', compact('data'));
}

public function send_mail($id) {

    $data = Contact::find($id);
    return view('admin.send_mail', compact('data'));
}

public function mail(Request $request, $id) {

    $data = Contact::find($id);

    $details = [

        'greeting' => $request->greeting,

        'body' => $request->body,

        'action_text' => $request->action_text,

        'action_url' => $request->action_url,

        'endline' => $request->endline,
    ];

  Notification::send($data, new SendEmailNotification($details));

  return redirect()->back();
    
}

public function room_images(Request $request, $id){

    $data = Room::find($id);

    $images = RoomImages::all();

   return view('admin.addRoomImages', compact('data', 'images'));
}


public function upload_images($id, Request $request) {

    $data  = new RoomImages;

    $data->room_id = $id;

    $image = $request->image;

    if($image) {
        $imagename = time().'.' .$image->getClientOriginalExtension();

        $request->image->move('room', $imagename);

        $data->image = $imagename;

        $data->save();

        return redirect()->back()->with('message', 'Image uploaded successfully');
    }
}

 public function delete_image($id) {
    $data = RoomImages::find($id);

    $data->delete();

    return redirect()->back()->with('message', ' image deleted successfully');
}

}
