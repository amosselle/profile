<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import the Auth facade


use App\Models\University;
use App\Models\Place;
use App\Models\Student;
use App\Models\Area;


class HomeController extends Controller
{
    //
    public function index(){
        return view('student.dashboard');
    }

    public function place(){
        $places = Place::all();
        return view('student.place', ['places'=>$places]);
    }


    public function storeAreasDetails(Request $request)
  {
    // Validate request data
    $this->validate($request, [
        'place_name' => 'required|string',
        'category' => 'required|string',
        'capacity' => 'required|integer',
        'branch' => 'required|string',
        'area' => 'required|string',
        'region' => 'required|string',
        'district' => 'required|string',
      ]);

    dd($request);
  
    // Return a success response
    return response()->json([
      'message' => 'Place details saved successfully!',
    ]);
  }



  public function saveSelectedPlace(Request $request)
    {
      $selectedPlaceId = $request->input('selectedPlace');
      $selectedPlace = Place::find($selectedPlaceId);
      
      if ($selectedPlace) {
          // Decrement the capacity of the selected place
          if ($selectedPlace->capacity > 0) {
              $selectedPlace->capacity--;
              $selectedPlace->save();
      
              if (Auth::guard('student')->check()) {
                  $student = Auth::guard('student')->user(); // Retrieve the authenticated student
      
                  $studentId = $student->id;
      
                  $previousSelection = Area::where('student_id', $studentId)->first();
      
                  if ($previousSelection) {
                      if ($previousSelection->place_id == $selectedPlaceId) {
                          return redirect()->back()->with('error', 'You have already selected this place.');
                      } else {
                          $previousSelection->update([
                              'place_id' => $selectedPlaceId,
                              // Update other fields as needed
                          ]);
      
                          return redirect()->back()->with('success', 'Place selection updated successfully!');
                      }
                  } else {
                      Area::create([
                          'student_id' => $studentId,
                          'place_id' => $selectedPlaceId,
                          // Add other fields as needed
                      ]);
      
                      return redirect()->back()->with('success', 'Place selected successfully!');
                  }
              } else {
                  return redirect()->route('login')->with('error', 'Please log in as a student.');
              }
          } else {
              return redirect()->back()->with('error', 'Capacity for this place is full.');
          }
      } else {
          return redirect()->back()->with('error', 'Selected place not found!');
      }
      

}
}