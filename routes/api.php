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

// Post (create) student by parameters, using create()
Route::post('students', function(){
    // validate input before creation
    $data = request()->validate([
        'FirstName'=>'required|string|max:255',
        'LastName'=>'required|string|max:255',
        'School'=>'required|string|max:255'
    ]);

    try {
        $isSuccess = Student::create($data);
    } catch (\Exception $e) {
        // catch an error
        return response()->json([
            "status" => "error",
            "message" => "Error creating student"
        ], 500);
    }
    return Student::create($data);
});

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
Route::update("student", function(Student $student){
    request()->validate([
        'FirstName' => 'required|string|max:255',
        'LastName' => 'required|string|max:255',
        'School' => 'required|string|max:255'
    ]);


});

// DEL (delete) student by id, implicit model binding
Route::delete("students/{student}", function(Student $student){
    $deleted = $student;
    $isSuccess = $student->delete();
    if($isSuccess){
        return response()->json([
            'message' => 'Deleted Successfully.',
            'data' => $deleted,
        ]);
    } else {
        return response()->json([
            'message' => 'Deleted Successfully.',
            'data' => $deleted,
        ]);
    }
});