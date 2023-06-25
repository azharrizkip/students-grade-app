<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GradeController extends Controller
{
    public function store(Request $request, $student)
    {
        $data = $request->validate([
            'quiz_score' => 'required',
            'assignment_score' => 'required',
            'attendance_score' => 'required',
            'practical_score' => 'required',
            'final_exam_score' => 'required',
        ]);

        $quizWeight = 0.15;
        $assignmentWeight = 0.3;
        $attendanceWeight = 0.1;
        $practicalWeight = 0.15;
        $finalExamWeight = 0.3;

        // Calculate the final score
        $finalScore = ($data['quiz_score'] * $quizWeight) +
                    ($data['assignment_score'] * $assignmentWeight) +
                    ($data['attendance_score'] * $attendanceWeight) +
                    ($data['practical_score'] * $practicalWeight) +
                    ($data['final_exam_score'] * $finalExamWeight);

        DB::table('grades')->insert([
            'student_id' => $student,
            'quiz' => $data['quiz_score'],
            'assignment' => $data['assignment_score'],
            'attendance' => $data['attendance_score'],
            'practical' => $data['practical_score'],
            'final_exam' => $data['final_exam_score'],
            'final_score' => $finalScore,
            'final_grade' => $this->calculateFinalGrade($finalScore),
        ]);

        return redirect()->route('students.show', $student)->with('success', 'Grades inserted successfully.');
    }

    private function calculateFinalGrade($finalScore)
    {
        if ($finalScore <= 65) {
            return 'D';
        } elseif ($finalScore <= 75) {
            return 'C';
        } elseif ($finalScore <= 85) {
            return 'B';
        } else {
            return 'A';
        }
    }
}
