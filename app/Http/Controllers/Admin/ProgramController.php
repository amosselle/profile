<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//register model
use App\Models\Program;
use App\Models\Department;

class ProgramController extends Controller
{
    //

    public function show(){
        $program = Program::all();
        $dept = Department::pluck('name','id');
        return view('admin.Education.program', ['dept'=>$dept, 'program'=>$program]);
    }

    public function create(Request $request){
        $request->validate([
            'dept_id' => 'required', // Add any other validation rules as needed
            'name' => 'required',
            'abbreviation' => 'required',
        ]);
    
        
        //Create a new college record
        $program = new Program();
        $program->dept_id = $request->input('dept_id');
        $program->name = $request->input('name');
        $program->abbreviation = $request->input('abbreviation');
        
        // Save the new Education record
        $program->save();

        // $program = Program::create([
        //     'dept_id' => $request->dept_id,
        //     'name' => $request->name,
        //     'abbreviation' => $request->abbreviation,
        // ]);


        return redirect()->back()->with('succes', 'college added successfully');
    
    }
}
