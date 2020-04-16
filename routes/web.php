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

    Route::resource('tutor','TutorController');

    Route::resource('student','StudentController');

    Route::get('showSpecficStudent\{id}','StudentController@showSpecficStudent')->name('showSpecficStudent');

    Route::get('edit\{id}','StudentController@edit')->name('edit');
    
    Route::PUT('statusAchive/{id}','StudentController@updateStatusAchive')->name('statusAchive');

    Route::PUT('statusFollowUp/{id}','StudentController@statusFollowUp')->name('statusFollowUp');

    Route::resource('followUpStudent','StudentController');

    Route::get('showPageAddTutor\{id}', 'TutorController@showPageAddTutor')->name('showPageAddTutor');

    Route::PUT('addTutorToStudent\{tutorId}\{studentId}','StudentController@addTutorToStudent')->name('addTutorToStudent');

    Route::get('dashboard','DashboardController@index')->name('dashboard');

    Route::get('achiveStudent','StudentController@achiveStudent')->name('achiveStudent');

    Route::get('showAddStudent','StudentController@showAddStudent')->name('showAddStudent');

    Route::PUT('changeProfilePicture','TutorController@changeProfilePicture')->name('changeProfilePicture');

    Route::PUT('storeCommment/{id_student}/{tutor_id}','CommentController@storeCommment')->name('storeCommment');

    Route::get('showComment\{id}','CommentController@showComment')->name('showComment');

    Route::get('back','CommentController@back')->name('back');

    Route::PUT('editComment/{id_comment}','CommentController@editComment')->name('editComment');

    Route::get('deleteComment\{id_comment}','CommentController@deleteComment')->name('deleteComment');

    Route::PUT('changePictureStudent\{id}','StudentController@changePictureStudent')->name('changePictureStudent');

    Route::get('unserMentor','StudentController@unserMentor')->name('unserMentor');

});
Route::group(['as'=>'author.','prefix'=>'author','namespace'=>'Author','middleware'=>['auth','author']], function (){

    Route::get('dashboard','DashboardController@index')->name('dashboard');

    Route::get('tutor','TutorController@index')->name('tutor');

    Route::get('achiveStudent','StudentController@achiveStudent')->name('achiveStudent');

    Route::get('unserMentor','StudentController@unserMentor')->name('unserMentor');

    Route::get('followUpStudent','StudentController@followUpStudent')->name('followUpStudent');

    Route::PUT('changeProfilePicture','TutorController@changeProfilePicture')->name('changeProfilePicture');

    Route::get('showComment\{id}','CommentController@showComment')->name('showComment');

    Route::PUT('storeCommment/{id_student}/{tutor_id}','CommentController@storeCommment')->name('storeCommment');

    Route::PUT('editComment/{id_comment}','CommentController@editComment')->name('editComment');

    Route::get('deleteComment\{id_comment}','CommentController@deleteComment')->name('deleteComment');

});


