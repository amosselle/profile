<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//register model
use App\Models\College;
use App\Models\Department;

class DepartimentController extends Controller
{
    //
    public function show(){
        $dept = Department::all();
        $college = College::pluck('name','id');
        return view('admin.Education.departiment', ['dept'=>$dept, 'college'=>$college]);
    }

    
    public function create(Request $request){
        $request->validate([
            'college_id' => 'required', // Add any other validation rules as needed
            'name' => 'required',
            'abbreviation' => 'required',
        ]);
    
        
        //Create a new college record
        $dept = new Department();
        $dept->college_id = $request->input('college_id');
        $dept->name = $request->input('name');
        $dept->abbreviation = $request->input('abbreviation');
        
        // Save the new Education record
        $dept->save();

  

        return redirect()->back()->with('succes', 'college added successfully');
    
    }
}
