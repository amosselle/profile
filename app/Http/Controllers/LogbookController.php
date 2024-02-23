<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use App\Models\Student;
use App\Models\Logbook;

class LogbookController extends Controller
{
    //

    public function index(){
        $studentId = Auth::guard('student')->id();

    // Fetch the logbook entries for the student, filtering by student_id
       $logbookData = Logbook::where('student_id', $studentId)->get();
        // ->orderBy('created_at', 'desc') // Optionally sort by creation date
        // ->paginate(10); // Example pagination (adjust as needed)

    // Pass the fetched data to the view
       return view('student.logbook', ['logbookData' => $logbookData]);
             //   return view('student.logbook');
    }

    public function submitForm(Request $request)
    {
        // Validate the form input
       $validatedData = $request->validate([
           // 'student_id' => 'required',
            'hours' => 'required|numeric',
            'week' => 'required|integer|between:1,52', // adjust maximum based on your calendar year
            'task' => 'required|string',
          ]);
          
       // $studentId = Auth::id();
      //  $studentId = auth()->id();
        $studentId = Auth::guard('student')->id();

        // $studentId = session('student_id');
         // dd($studentId);
          $currentTime = Carbon::now();

          // Check if the current time is before 00:00 AM and adjust if needed
          if ($currentTime->greaterThanOrEqualTo($currentTime->copy()->endOfDay())) {
              $currentTime->addDay()->startOfDay();
          }
          
          // Save the data to the database with the timestamp
          Logbook::create([
             'student_id'=>$studentId,
              'hours' => $validatedData['hours'],
              'week' => $validatedData['week'],
              'task' => $validatedData['task'],
             // 'created_at' => $currentTime,
              // Other fields...
          ]);
           return redirect()->back()->with('success', 'Form submitted successfully!');

      //return redirect()->back()->with('error', 'Form submission time has passed (after 23:00 / 11:00 PM).');
        
    }
}
