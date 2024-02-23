<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use App\Models\Place;
use App\Models\Student;
use App\Models\Area;

class ArrivalNoteController extends Controller
{
    //

    public function index(){

       // $areas = Area::all();

        $studentId = Auth::guard('student')->id();

           $areas = Area::where('student_id', $studentId)->get();
            // ->orderBy('created_at', 'desc') // Optionally sort by creation date
            // ->paginate(10); // Example pagination (adjust as needed)
    
        return view('student.arrival-note', ['areas'=>$areas]);
    }
}
