<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function index()
    {
        $students = DB::table('students')->get();

        return view('students.index', ['students' => $students]);
    }

    public function show($id)
    {
        $student = DB::table('students')->find($id);
        $grades = DB::table('grades')->where('student_id', $id)->first();
        $weights = [
          'quiz' => 15,
          'assignment' => 30,
          'attendance' => 10,
          'practical' => 15,
          'final_exam' => 30,
      ];

        return view('students.show', compact('student', 'grades', 'weights'));
    }

}