<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Toursite;
use App\Models\Tourpackage;
use App\Models\Booknow;


class HomeController extends Controller
{
    public function redirect()
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == '0') {
                $tourpacks = Tourpackage::all();
                $toursites= Toursite::all();

                return view('user.home', compact('toursites', 'tourpacks'));
            } else {
                return view('admin.home');
            }
        } else {
            return redirect()->back();
        }
    }

    public function index()
    {
        if (Auth::id()) {
            return redirect('home');
        } else {
            $tourpacks = Tourpackage::all();
            $toursites = Toursite::all();

            return view('user.home', compact('toursites', 'tourpacks'));
        }
    }
    public function booknow(Request $request)
{
    // Create a new instance of the Booknow model
    $data = new Booknow();

    // Fill in the fields from the form data
    $data->name = $request->name;
    $data->email = $request->email;
    $data->from_date = $request->from_date;
    $data->to_date = $request->to_date;
    $data->phone = $request->phone;
    $data->message = $request->message;
    $data->package = $request->package;

    // Check if the user is authenticated and set the user_id accordingly
    if (Auth::check()) {
        $data->user_id = Auth::user()->id;
    } else {
      
        $data->user_id = null; // Change this as needed
    }

    
    $data->status = 'pending';

 
    $data->save();

  
    return redirect()->back()->with('message', 'Booking request submitted successfully.We will contact you soon');
}
public function reservation ()
    {
        if (Auth::check()) {
          
            $userid = Auth::id();

          
            $reserve = Booknow::where('user_id', $userid)->get();

            return view('user.reservation', compact('reserve'));
        } else {
          
            return redirect()->route('login')->with('error', 'You must be logged in to view reservations.');
        }
    }
    public function cancel_reservation($id)
    {
        $data = Booknow::find($id);

        if (!$data) {
            return redirect()->back()->with('error', 'Reservation not found.');
        }

        // Check if the authenticated user is the owner of the reservation
        if (Auth::id() === $data->user_id) {
            $data->delete();
            return redirect()->back()->with('message', 'Reservation canceled successfully.');
        } else {
            return redirect()->back()->with('error', 'You do not have permission to cancel this reservation.');
        }
    }
}

