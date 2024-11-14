<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\RoomImages;

class HomeController extends Controller
{
    public function room_details($id) {
         
        $room = Room::find($id);
        $images = RoomImages::where('room_id', $id)->get();

        return view('home.room_details', compact('room', 'images'));
    }


    public function add_booking($id, Request $request){
     
        $request->validate([
            
            'startDate' => 'required|date',
            'endDate' => 'date|after:startDate',
        ]);

        $data = new Booking;

        $data->room_id = $id;

        $data->name = $request->name;

        $data->email = $request->email;

        $data->phone = $request->phone;

// checking the date before booking ,that is checking if that particular home has already been booked at that time or not

        $startDate = $request->startDate;

        $endDate = $request->endDate;

        $isBooked = Booking::where('room_id', $id)
        ->where('start_date', '<=',$endDate)
        ->where('end_date','>=',$startDate)->exists();

        if ($isBooked) {
            return redirect()->back()->with('message', 'Room Already Booked, Please try different date');
        }

        else 
        {
            
            $data->start_date = $request->startDate;

            $data->end_date = $request->endDate;

            $data->save();

            return redirect()->back()->with('message', 'Room Booked Successfully');
        } 

    }

    public function contact(Request $request) {
         $contact = new Contact;

         $contact->name = $request->name;

         $contact->email = $request->email;

         $contact->phone = $request->phone;

         $contact->message = $request->message;

         $contact->save();

         return redirect()->back()->with('message', ' message send successfully');
    }

    public function our_rooms(){
        $room = Room::all();
        return view('home.our_rooms', compact('room'));
    }



    public function hotel_gallary(){
        $gallary = Gallery::all();
        return view('home.hotel_gallary', compact('gallary'));
    }


    public function contact_us(){
       
        return view('home.contact_us');
    }
    

    public function about_us(){
       
        return view('home.about_us');
    }
}
