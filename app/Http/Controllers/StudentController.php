<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

// Referencias
// https://www.twilio.com/blog/criar-e-consumir-uma-api-restful-no-php-laravel
// https://hcode.com.br/blog/criando-api-php-com-laravel-e-postgresql

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $students = Student::get()->toJson(JSON_PRETTY_PRINT);

        $students = Student::all(); // Retorna um array de objetos

        return response($students, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = Student::create([
            "name"=>$request->input("name"),
            "course"=>$request->input("course")
        ]);

        return response()->json([
            "message" => "Student record created success!",
            "student" => $student
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     *
     * Retorna um unico objeto direto se for encontrado, senão, not found 404
     */
    public function show1(Student $student)
    {
       return response($student);
    }

    /**
     * Display the specified resource.
     *
     * @param  Int  $id
     * @return \Illuminate\Http\Response
     *
     * Retorna um array com um unico objeto
     */
    public function show($id)
    {
        if (Student::where('id', $id)->exists()) {
            // $student = Student::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            $student = Student::where('id', $id)->get();
            return response($student, 200);
        } else {
            return response()->json([
                "message" => "Student not found"
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $student->name = $request->input('name');
        $student->course = $request['course'];

        $student->save();

        return response()->json([
            "message" => "Student record updated success!",
            "student" => $student
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return response()->json([
            "message" => "Student record deleted success!",
            "student" => $student
        ], 200);
    }
}
