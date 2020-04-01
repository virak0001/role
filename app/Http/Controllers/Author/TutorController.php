<?php

namespace App\Http\Controllers\Author;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TutorController extends Controller
{
    public function changeProfilePicture(Request $request){

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
