<?php
// use Student Model for route
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Get All Students
Route::get('students', function(){
    return Student::all();
});

// Get student by id (implicit model binding)
Route::get("students/{student}", function(Student $student){
    return $student;
});

// Get student by id (original)
// Route::get("students/{id}", function($id){
//     $student = Student::findOrFail($id);
//     return $student;
// });

// Post (create) student by parameters
Route::post('students', function(){
    return Student::create([
        'FirstName' => request('FirstName'),
        'LastName' => request('LastName'),
        'School' => request('School')
    ]);
});