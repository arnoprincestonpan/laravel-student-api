<?php
// use Student Model for route
use App\Models\Student;
// use StudentsController for routes
use App\Http\Controllers\Api\StudentsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use this to catch validation for request()->validate([])
use Illuminate\Validation\ValidationException;

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
Route::get("students", [StudentsController::class, 'index']);

// Get student by id (implicit model binding)
Route::get("students/{student}", [StudentsController::class, 'show']);

// Get student by id (original)
// Route::get("students/{id}", function($id){
//     $student = Student::findOrFail($id);
//     return $student;
// });

// Post (create) student by parameters, using create()
Route::post('students', [StudentsController::class, "store"]);

// Post (create) student by parameters, using save()
// Route::post('students', function(){
//     // validate input before creation
//     $data = request()->validate([
//         'FirstName'=>'required|string|max:255',
//         'LastName'=>'required|string|max:255',
//         'School'=>'required|string|max:255'
//     ]);
//     $student = new Student($data);
//     $student->save();
//     return $student;
// });

// You can add response messages with...
// return response()->json([]);

// PUT (update) student by id, implicit model binding
Route::put("students/{student}", [StudentsController::class, 'update']);

// DEL (delete) student by id, implicit model binding
Route::delete("students/{student}", [StudentsController::class, 'destroy']);