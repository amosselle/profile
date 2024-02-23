<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


// register model

use App\Models\University;

class UniversityController extends Controller
{
    //

    public function show(){
        $uni = University::all();
        return view('admin.Education.university', ['uni'=>$uni]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'abbreviation' => 'required|string|max:10',
        ]);

        University::create([
            'name' => $request->name,
            'location' => $request->location,
            'abbreviation' => $request->abbreviation,
        ]);

        // dd($request);

        return redirect()->back()->with('succes', 'universities added successfully');
    }
}
