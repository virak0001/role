<?php

namespace App\Http\Controllers\Admin;

use App\Student;
use App\Http\Controllers\Controller;
use App\User;
// use App\Student::setHidden();
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Builder\Stub;

class DashboardController extends Controller
{

   
    public function index(){
        

        $numbers_tutors = [
            [
                'title' => 'Tutors',
                'numberOfTutors' => User::all()->count(),
            ],
        ];
        $number_student = [
            [
                'title' => 'Total Studenns',
                'numberStudent' => Student::all()->count(),
            ],
        ];
        $number_student_follow_up = [
            [
                'title' => 'Follow Up',
                'numberStudentFollowUp' => Student::all()->where('status', 1)->count(),
            ],
        ];
        $number_student_achive = [
            [
                'title' => 'Achive',
                'numberStudentAchive' => Student::all()->where('status', 0)->count(),
            ],
        ];
        $gender = [
            [
                'male' => Student::all()->where('gender', 'Male')->count(),
                'female' => Student::all()->where('gender', 'Female')->count(), 
            ]
        ];
        $students = Student::all();
        return view('admin.dashboard')
                ->with(array(
                    'numbers_tutors'=>$numbers_tutors,
                    'numbers_student' => $number_student,
                    'number_student_follow_up'=> $number_student_follow_up,
                    'number_student_achive' => $number_student_achive,
                    'gender' => $gender,
                    'students' => $students,
        ));
    }
}



