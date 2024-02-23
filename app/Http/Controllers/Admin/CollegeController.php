<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//register model

use App\Models\University;
use App\Models\College;

class CollegeController extends Controller
{
    //

    public function show(){
         $college = College::all();
         $university = University::pluck('name','id');
        return view('admin.Education.college', ['university' => $university, 'college' => $college]);
    }

    public function create(Request $request){
        $request->validate([
            'uni_id' => 'required', // Add any other validation rules as needed
            'name' => 'required',
            'abbreviation' => 'required',
        ]);
    
      
        //Create a new college record
        $college = new College();
        $college->uni_id = $request->input('uni_id');
        $college->name = $request->input('name');
        $college->abbreviation = $request->input('abbreviation');
        
        // Save the new Education record
        $college->save();

        return redirect()->back()->with('succes', 'college added successfully');

    
    }
}
