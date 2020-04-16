<?php

namespace App\Http\Controllers\Author;

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
    public function storeCommment(Request $request, $id_student, $tutor_id){
        $comment =new Comment;
        if($request -> comment != null) {
            $comment -> student_id = $id_student;
            $comment -> user_id = $tutor_id;
            $comment -> comment = $request -> get('comment')    ;
            $comment -> save();
        }
        return redirect()->back();
    }

    public function editComment(Request $request, $id_comment){

        $comment = Comment::find($id_comment);
        // $result = 'Cannot access redirect with this route';

        if(auth()->id() == $comment['user_id']){
            $comment->comment = $request ->get('comment');
            $comment -> save();
        }
        return back();
    }

    public function showComment($id){
        $students = Student::find($id);
        return view('author.comment')->with('students',$students);
    }

    public function back(){
        return redirect('author/dashboard');
    } 


    public function deleteComment($id){
        $comment = Comment::find($id);
        if(auth()->id() == $comment['user_id']){
            $comment -> delete();
        }
        return back();

    }

}