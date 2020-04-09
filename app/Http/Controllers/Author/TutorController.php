<?php

namespace App\Http\Controllers\Author;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class TutorController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = new User();
        $tutors = $user::all();
        return view('author.tutor')->with('tutors',$tutors);
    }

   /**
     * Show the form for chnage prifile of user.
     *
     * @return \Illuminate\Http\Response    
     */

    public function changeProfilePicture(){

        $auth = Auth::user();
        request()->validate([
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time().'.'.request()->picture->getClientOriginalExtension();
        request()->picture->move(public_path('/assets/img/'), $imageName);

        $auth -> profile = $imageName;

        $auth -> save();
        return back();
    }

}
