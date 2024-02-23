<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


use App\Models\User;

class UserController extends Controller
{
    public function index(){

        $users = User::all(); 
        $data=[
            'title'=>'Users',
            'users'=> $users
        ];

     
        return view('admin.users.index',$data);
    }

    public function add(){
        return view('admin.users.add-user');
    }

    public function submit(Request $request){
        // Retrieve form data
        $request->validate([
            'name' => 'required|string|max:255',     
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'is_admin'=>'',
        ]);
          
        $is_admin = $request->input('is_admin', 0);

       

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $is_admin,
        ]);


        // Redirect back or to a thank you page
        return redirect()->back()->with('success', 'Form submitted successfully!');
    
    }
}
