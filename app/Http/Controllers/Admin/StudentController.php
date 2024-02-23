<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


//register model
use App\Models\University;
use App\Models\Program;
use App\Models\Department;
use App\Models\College;
use App\Models\Student;
use App\Models\Place;
use App\Models\Area;



class StudentController extends Controller
{
    //

    public function show(){
        $student = Student::all();
        return view('admin.student.students', ['student'=>$student]);
    }


    public function form(){
        $university = University::pluck('name','id');
        $college = College::pluck('name','id');
        $dept = Department::pluck('name','id');
        $program = Program::pluck('name','id');
        return view('admin.student.add-student',['university'=>$university, 'college'=>$college, 'dept'=>$dept, 'program'=>$program ]);
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'regno' => 'required|string|unique:students',
            'email' => 'required|string|email|max:255|unique:students',
            'phone' => 'required|string',
            'gender' => 'required|in:male,female,other',
            'yos' => 'required|integer|min:1|max:4', // Adjust maximum year based on your system
            'password' => 'required|string|min:4',

            // Additional validations for foreign keys
            'uni_id' => 'required|exists:universities,id',
            'college_id' => 'required|exists:colleges,id',
            'dept_id' => 'required|exists:departments,id',
            'program_id' => 'required|exists:programs,id',

        ]);



        // dd($request);

       // $password = Hash::make($request->password);


        $student = Student::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'middle_name' => $request->middle_name,
            'regno' => $request->regno,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'yos' => $request->yos,
            'password'=> Hash::make($request->password),
             // Foreign key relationships
            'uni_id' => $request->uni_id,
            'college_id' => $request->college_id,
            'dept_id' => $request->dept_id,
            'program_id' => $request->program_id,


        ]);

        return redirect()->back()->with('success', 'Form submitted successfully!');
        
}

public function place(){
    $places = Place::all();
    return view('admin.student.place', ['places'=>$places]);
}

public function create(Request $request){
    $validator = $request->validate( [
        
        'place_name' => 'required|string|max:255',
        'category' => 'required|string|max:255',
        'capacity' => 'nullable|numeric',
        'branch' => 'nullable|string|max:255',
        'area' => 'required|string|max:255',
        'region' => 'required|string|max:255',
        'district' => 'required|string|max:255',
    ]);

   // dd($validator);

    $place = Place::create([
        // Add additional fields from request to User model
        'place_name' => $request->place_name,
        'category' => $request->category,
        'capacity' => $request->capacity,
        'branch' => $request->branch,
        'area' => $request->area,
        'region' => $request->region,
        'district' => $request->district,
    ]);

    return redirect()->back()->with('success', 'Place added successfully!');
}



public function area(){
    $areas = Area::all();
    return view('admin.student.area-selected',['areas'=> $areas]);
}


}