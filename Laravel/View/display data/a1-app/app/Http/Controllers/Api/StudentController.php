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
    public function list()
    {
        $students = Student::all();
        return view('list', compact('students'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return $students;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $student =  Student::store($request);
        return response()->json(['success' => true, 'message' => 'Student created successfully','data'=>$student], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json(['message' => "Student with ID $id not found to show"], 404);
        }

        return response()->json(['student' => $student], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Student::store($request, $id);
        // if (!$student) {
        //     return response()->json(['success' => false, 'message' => 'Student not found'], 404);
        // }
        return response()->json(['success' => true, 'message' => 'Student updated successfully', 'student' => $student], 200);
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
