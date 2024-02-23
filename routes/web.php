<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\Admin\{AuthController,ProfileController,UserController,StudentController, UniversityController};
use App\Http\Controllers\Admin\{CollegeController,DepartimentController,ProgramController};
use App\Http\Controllers\Auth\{LoginController};
use App\Http\Controllers\{HomeController,LogbookController,ArrivalNoteController};


Route::get('/', function () {
    return view('student.Auth.login');
});



Route::get('/admin',[AuthController::class,'getLogin'])->name('getLogin');

Route::get('/admin/login',[AuthController::class,'getLogin'])->name('getLogin');
Route::post('/admin/login',[AuthController::class,'postLogin'])->name('postLogin');

Route::post('/submit-form', [UserController::class, 'submit'])->name('submit_form');


//student login
Route::get('/login', [LoginController::class, 'getLogin'])->name('login');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'loginpost'])->name('login');

Route::get('/logout', [LoginController::class, 'studentLogout'])->name('student.logout');


Route::group(['middleware'=>['admin_auth']],function(){
    
    Route::get('/admin/dashboard',[ProfileController::class,'dashboard'])->name('dashboard');
    Route::get('/admin/users',[UserController::class,'index'])->name('users.index');
    Route::get('/admin/add-user',[UserController::class,'add'])->name('users.add');


    Route::get('/admin/students',[StudentController::class,'show'])->name('student.students');
    Route::get('/admin/add-student',[StudentController::class,'form'])->name('student.register');
    Route::post('/admin/add-student',[StudentController::class,'register'])->name('student.register');
    Route::get('/admin/place',[StudentController::class,'place'])->name('student.show');
    Route::post('/admin/place',[StudentController::class,'create'])->name('place.create');
    Route::get('/admin/areas',[StudentController::class,'area'])->name('area.show');


    Route::get('/admin/university',[UniversityController::class,'show'])->name('Education.university');
    //Route::get('/admin/add-student',[StudentController::class,'form'])->name('student.register');
    Route::post('/admin/university',[UniversityController::class,'store'])->name('Education.store');

    Route::get('/admin/college',[CollegeController::class,'show'])->name('Education.college');
    Route::post('/admin/college',[CollegeController::class,'create'])->name('Education.create');
    // Route::get('/admin/college/{id}', 'CollegeController@show')->name('Education.college');

    Route::get('/admin/departiment',[DepartimentController::class,'show'])->name('Education.departiment');
    Route::post('/admin/departiment',[DepartimentController::class,'create'])->name('dept.create');

    Route::get('/admin/program',[ProgramController::class,'show'])->name('Education.program');
    Route::post('/admin/program',[ProgramController::class,'create'])->name('program.create');



    Route::get('/admin/logout',[ProfileController::class,'logout'])->name('logout');
});


    Route::get('/dashboard', [HomeController::class, 'index'])->name('student.dashboard');
    Route::get('/place', [HomeController::class, 'place'])->name('student.place');
    Route::post('/store-data', [HomeController::class, 'storeAreasDetails'])->name('store-data');
    Route::post('/place', [HomeController::class, 'saveSelectedPlace'])->name('saveSelectedPlace');


    Route::get('/arrival-note', [ArrivalNoteController::class, 'index'])->name('student.arrival-note');
    Route::get('/logbook', [LogbookController::class, 'index'])->name('student.logbook');
    Route::post('/logbook', [LogbookController::class, 'submitForm'])->name('logbook');
    // Route::get('/logbook/{studentId}', [LogbookController::class, 'index'])->name('student.logbook');


Route::middleware(['auth'])->group(function () {
    // Route::get('/login', [AUthController::class, 'login']);
    // Route::get('/login', 'AuthController@login')->name('Auth.login');
    // Route::get('/settings', 'UserSettingsController@show');
    
   // Route::get('/dashboard', 'StudentController@index')->name('student.');
   
});