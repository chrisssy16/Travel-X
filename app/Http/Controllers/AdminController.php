<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Toursite;
use App\Models\Tourpackage;
use App\Models\Booknow;

class AdminController extends Controller
{
    public function addview()
    {
        return view('admin.add_toursite');
    }
    public function upload(Request $request)
  {
      // Validate the file upload
      $request->validate([
          'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file type and size as needed
      ]);
  
      // Handle the file upload
      if ($request->hasFile('file')) {
          $image = $request->file('file');
          $imageName = time() . '.' . $image->getClientOriginalExtension();
          $image->move('toursitesimage', $imageName);
  
       
          $toursites= new  Toursite;
          $toursites->destination= $request->input('destination');
          $toursites->description = $request->input('description');
          $toursites->price = $request->input('price');
          $toursites->image = $imageName; // Set the image file name
          $toursites->save();
  
          return redirect()->back()->with('message', 'Destination added SUCCESSFULLY');
      } else {
          return redirect()->back()->with('error', 'No file uploaded.');
      }
}
public function addTourpackView()
{
    return view('admin.add_tourpacks'); 
}
public function uploadTourpacks(Request $request)
{
    // Validate the file upload and form data
    $request->validate([
        'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file type and size as needed
        'packagename' => 'required|string', // Corrected field name
        'destination' => 'required|string', // Corrected field name
        'date' => 'required|date', // Added validation for date
    ]);

    // Handle the file upload
    if ($request->hasFile('file')) {
        $image = $request->file('file');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move('tourpackimages', $imageName);

        // Create a new Tourpacks instance
        $tourpack = new Tourpackage;
        $tourpack->packagename = $request->input('packagename');
        $tourpack->destination = $request->input('destination'); // Corrected field name
        $tourpack->date = $request->input('date');
        $tourpack->image = $imageName; // Set the image file name
        $tourpack->save();

        return redirect()->back()->with('message', 'Tourpack added successfully');
    } else {
        return redirect()->back()->with('error', 'No file uploaded.');
    }
}
public function showreservations()
    {
        $data = Booknow::all();
        return view('admin.showreservation', compact('data'));
    }

    public function approved($id)
    {
        // Logic to change the status of the reservation to 'approved'
        $data = Booknow::find($id);
        $data->status = 'approved';
        $data->save();

        // Redirect back to the reservation management page
        return redirect()->back();
    }

    public function canceled($id)
    {
        // Logic to change the status of the reservation to 'approved'
        $data = Booknow::find($id);
        $data->status = 'canceled';
        $data->save();

}
public function showtoursite(){
    $data=Toursite::all();
    return view('admin.showtoursite',compact('data'));
}

public function deletedtoursite(){
    $data=Toursite::all();
    return view('admin.showtoursite',compact('data'));
}
}