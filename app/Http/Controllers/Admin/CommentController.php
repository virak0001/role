<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Student;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    // Create new data in table comment
    public function storeCommment(Request $request, $id_student, $id_tutor){

        $comment =new Comment;
        if($request -> comment != null) {
            $comment -> student_id = $id_student;
            $comment -> user_id = $id_tutor;
            $comment -> comment = $request -> get('comment')    ;
            $comment -> save();
        }
        return redirect()->back();
    }

    public function editComment(Request $request, $id_comment, $id_student){

        $comment = Comment::find($id_comment);
        $result = 'Cannot access redirect with this route';
        if($comment->student_id == $id_student && auth()->id() == $comment->user_id){
            $result = $comment;
        }
        return $result;
    }

    public function showComment($id){
        $student = Student::find($id);
        return view('admin.comment')->with('student',$student);
    }

    public function back(){
        return redirect('admin/followUpStudent');
    }
}