<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::list();
        return response()->json([
            'success' => true,
            'data'=> $students
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $student =  Student::store($request);
        return response()->json(['success' => true, 'message' => 'Student created successfully'], 201);
    }

    /**
     * Display the specified resource.
     */
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $student = Student::find($id);

        // if (!$student) {
        //     return response()->json(['message' => "Student with ID $id not found to show"], 404);
        // }

        return response()->json(['student' => $student], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Student::find($id);
    
        if (!$student) {
            return response()->json(['success' => false, 'message' => 'Student not found of ID '.$id], 404);
        }
    
        $updatedStudent = Student::store($request, $id);
    
        return response()->json(['success' => true, 'message' => 'Student updated successfully', 'student' => $updatedStudent], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json(['success' => false, 'message' => "Student with ID $id not found to destroy"], 404);
        }

        $studentId = $student->id; // Get the ID of the student before deleting
        $student->delete();

        return response()->json(['success' => true, 'message' => "Student with ID $studentId deleted successfully"], 200);
    }
}
