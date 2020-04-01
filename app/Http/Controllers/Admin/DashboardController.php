<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $numbers = [
            [
                'title' => 'Tutors',
                'numberOfTutors' => User::all()->count(),
            ],
        ];
        return view('admin.dashboard')->with(array('numbers'=>$numbers));
    }
}
