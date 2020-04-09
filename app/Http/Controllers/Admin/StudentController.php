<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use File;
use PHPUnit\Framework\MockObject\Builder\Stub;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $students = Student::all();

        $number_student_follow_up = [
            [
                'title' => 'Follow Up',
                'numberStudentFollowUp' => Student::all()->where('status', 1)->count(),
            ],
        ];
        return view('admin.followUpStudent')->with(array('students'=>$students, 'number_student_follow_up'=>$number_student_follow_up));
    }

    public function achiveStudent(){

        $students = Student::all();

        $number_student_achive = [
            [
                'title' => 'Achive List',
                'numberStudentAchive' => Student::all()->where('status', 0)->count(),
            ],
        ];

        return view('admin.AchiveStudent')->with(array('students'=>$students,'number_student_achive'=>$number_student_achive));
            
    }

    public function updateStatusAchive($id){
        $students = Student::find($id);
        $students -> status= true;
        $students -> save();
        return back();
    }

    /**
     * Add tutor name to students
     *
     * @return \Illuminate\Http\Response
     */
    
    public function addTutorToStudent($tutorID, $studentID){
        $tutor = User::find($tutorID);
        $student = Student::find($studentID);
        $student -> user_id = $tutor->id;
        $student -> save();
        return redirect('admin/followUpStudent');
    }

    public function statusFollowUp($id){
        $students = Student::find($id);
        $students -> status= false;
        $students -> save();
        return back();
    }

    public function showAddStudent(){
        return view('admin.addStudent');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addStudent');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student =new Student;

        request()->validate([
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time().'.'.request()->picture->getClientOriginalExtension();
        request()->picture->move(public_path('/img_student/'), $imageName);
        
        $student -> first_name = $request -> get('first_name');
        $student -> last_name = $request -> get('last_name');
        $student -> gender = $request -> get('gender');
        $student -> year = $request -> get('year');
        $student -> province = $request -> get('province');
        $student -> picture = $imageName;
        $student -> class = $request -> get('class');
        $student -> student_id = $request -> get('student_id');
        $student -> save();
        return redirect('admin/dashboard');
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $student = Student::find($id);
        return view('admin.editStudent')->with('student',$student);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function showSpecficStudent($id)
    {
        $student = Student::find($id);
        return view('admin.viewSpecificStudent')->with('student',$student);
    }


    public function changePictureStudent( $id){
        $student = Student::find($id);

        request()->validate([
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time().'.'.request()->picture->getClientOriginalExtension();
        request()->picture->move(public_path('/img_student/'), $imageName);

        $student -> picture = $imageName;
        $student -> save();
        return back();
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $student = Student::find($id);

        request()->validate([
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time().'.'.request()->picture->getClientOriginalExtension();
        request()->picture->move(public_path('/img_student/'), $imageName);

        $student -> first_name = $request -> get('first_name');
        $student -> last_name = $request -> get('last_name');
        $student -> gender = $request -> get('gender');
        $student -> year = $request -> get('year');
        $student -> province = $request -> get('province');
        $student -> picture = $imageName;
        $student -> student_id = $request -> get('student_id');
        $student ->  class = $request -> get('class');
        $student -> save();
        
        return redirect('admin/dashboard');

    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $student -> delete();
        return back();
    }
}
