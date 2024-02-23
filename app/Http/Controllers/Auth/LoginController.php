<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\Student;


class LoginController extends Controller
{
    //

    public function login(){
        return view('student.Auth.login');
    }

    public function getLogin(){
        return view('student.Auth.login');
    }

    public function loginpost(Request $request){
        $credentials = [
            'regno' => $request->regno,
            'password' => $request->password,
        ];

        
         if (Auth::guard('student')->attempt($credentials)) {
        //     // Authentication successful for student
        
       
        return redirect()->intended('/dashboard');
        } 
        return back()->with('error', 'registration number or password is wrong');
    }

    public function studentLogout(Request $request){
         // Logout the student using the specified guard
    Auth::guard('student')->logout();

    // Invalidate the session
    $request->session()->invalidate();

    // Regenerate the session ID for security
    $request->session()->regenerateToken();

    // Redirect to the appropriate location after logout
    return redirect('/login')->with('success',''); // Replace with your desired redirect URL
}
}
