<?php

use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');

Route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth','admin']], function (){

    Route::PUT('imageUploadPost', 'DashboardController@imageUploadPost')->name('imageUploadPost');

    Route::resource('tutor','TutorController');

    Route::resource('student','StudentController');

    Route::PUT('updateStudent/{id}','StudentController@updateStudent')->name('updateStudent');

    Route::get('showFormEditStudent\{id}','StudentController@showFormEditStudent')->name('showFormEditStudent');
    
    Route::PUT('statusAchive/{id}','StudentController@updateStatusAchive')->name('statusAchive');

    Route::PUT('statusFollowUp/{id}','StudentController@statusFollowUp')->name('statusFollowUp');

    Route::resource('followUpStudent','StudentController');

    Route::get('showPageAddTutor\{id}', 'TutorController@showPageAddTutor')->name('showPageAddTutor');

    Route::PUT('addTutorToStudent\{tutorId}\{studentId}','StudentController@addTutorToStudent')->name('addTutorToStudent');

    Route::get('dashboard','DashboardController@index')->name('dashboard');

    Route::get('achiveStudent','StudentController@achiveStudent')->name('achiveStudent');

    Route::get('showAddStudent','StudentController@showAddStudent')->name('showAddStudent');

    Route::PUT('changeProfilePicture','TutorController@changeProfilePicture')->name('changeProfilePicture');

});
Route::group(['as'=>'author.','prefix'=>'author','namespace'=>'Author','middleware'=>['auth','author']], function (){

    Route::get('dashboard','DashboardController@index')->name('dashboard');

    Route::PUT('changeProfilePicture','TutorController@changeProfilePicture')->name('changeProfilePicture');
});


