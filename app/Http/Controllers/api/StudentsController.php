<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Student::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // validate input before creation
           $data = request()->validate([
               'FirstName'=>'required|string|max:255',
               'LastName'=>'required|string|max:255',
               'School'=>'required|string|max:255'
           ]);
   
           // create new student
           $student = Student::create($data);
   
           return response()->json([
               'messsage' => 'Success, Student Created.',
               'data' => $student
           ], 201);
   
       } catch (ValidationException $e) {
           // catch validation error
           return response()->json([
               'status' => 'error',
               'message' => 'Validation Error.',
               'errors' => $e->errors()
           ], 422);
   
       } catch (\Exception $e) {
           // catch an error
           return response()->json([
               "status" => "error",
               "message" => "Error creating student"
           ], 500);
       }
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return $student;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        try{
            $data = request()->validate([
                'FirstName' => 'required|string|max:255',
                'LastName' => 'required|string|max:255',
                'School' => 'required|string|max:255'
            ]);
    
            $student->update($data);
    
            return response()->json([
                'message' => 'Updated Successfully.',
                'data' => $student
            ], 200);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation Error.'
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error updating student.'
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
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
    }
}
