<?php

use App\Http\Middleware\AdminCheckMiddleware;
use App\Http\Middleware\StudentCheckMiddleware;
use App\Http\Middleware\TeacherCheckMiddleware;
use App\Mail\TeacherResponseMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('sendMail',function(){
    $data=[
        'message'=>"Hello, this is testing mail."
    ];
    Mail::to('famestar046@gmail.com')->send(new TeacherResponseMail($data));
});


//mail test



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    if (Auth::check()) {
        if (Auth::user()->role == 'admin') {
            return redirect()->route('lookTeacherList');
            // return redirect('admin/dashboard');
        } else if (Auth::user()->role == 'teacher') {
            return redirect()->route('teacherCourse');
        } else if (Auth::user()->role == 'student') {
            return redirect()->route('studentCourseList');
        }
    }
    // return view('dashboard');
})->name('dashboard');


Route::group(['prefix' => 'admin', 'namespace' => 'Admin','middleware'=>[AdminCheckMiddleware::class]], function () {
    //teacher
    Route::get('lookTeacherList', 'AdminController@index')->name('lookTeacherList');

    //student
    Route::get('studentList','AdminController@studentList')->name('studentList');

    //notification
    Route::get('sendNotification','AdminController@sendNotification')->name('sendNotification');

    //add admin
    Route::get('addAdmin','AdminController@addAdmin')->name('addAdmin');

});

Route::group(['prefix' => 'teacher', 'namespace' => 'Teacher','middleware'=>[TeacherCheckMiddleware::class]], function () {
    //course
    Route::get('course', 'TeacherController@course')->name('teacherCourse');
    Route::get('courseList','TeacherController@courseList')->name('courseList');
    Route::post('createCourse','TeacherController@createCourse')->name('createCourse');
    Route::get('deleteCourse/{course_id}','TeacherController@deleteCourse')->name('deleteCourse');
    Route::get('updatepage/{course_id}','TeacherController@updatePage')->name('updatePage');
    Route::post('courseUpdate/{course_id}','TeacherController@courseUpdate')->name('courseUpdate');


    //class
    Route::get('class','TeacherController@classInfo')->name('teacherClass');
    Route::post('createClass','TeacherController@createClass')->name('createClass');
    Route::get('classList','TeacherController@classList1')->name('classList1');
    Route::get('deleteClass/{class_id}','TeacherController@deleteClass')->name('deleteClass');
    Route::get('updateClassPage/{class_id}','TeacherController@updateClassPage')->name('updateClassPage');
    Route::post('updateClass/{class_id}','TeacherController@updateClass')->name('updateClass');

    Route::get('classStudent','TeacherController@classStudentInfo')->name('teacherClassStudent');
    Route::get('changeStatus/{class_student_id}/{status}','TeacherController@changeStatus')->name('changeStatus');

    //profile
    Route::get('profile','TeacherController@profileInfo')->name('teacherProfile');
    Route::post('updateProfile/{user_id}','TeacherController@updateProfile')->name('updateProfile');
    Route::get('changePassword','TeacherController@changePasswordForm')->name('changePassword');
    Route::post('changePassword','TeacherController@changePassword')->name('changePassword');

    Route::get('news','TeacherController@newsInfo')->name('teacherNews');
    Route::get('notification','TeacherController@notificationInfo')->name('teacherNotification');

});

Route::group(['prefix' => 'student', 'namespace' => 'Student','middleware'=>[StudentCheckMiddleware::class]], function () {
    Route::get('courseList', 'StudentController@index')->name('studentCourseList');
    Route::get('lookCourse/{course_id}','StudentController@lookCourse')->name('lookCourse');
    Route::get('enrollClass/{class_id}/{teacher_id}','StudentController@enrollClass')->name('enrollClass');

    //class
    Route::get('classList','StudentController@classList')->name('classList');
    Route::get('lookClassInformation/{class_id}','StudentController@lookClassInformation')->name('lookClassInformation');

    //teacher
    Route::get('teacherList','StudentController@teacherList')->name('teacherList');
    Route::get('teacherRelatedCourse/{teacher_id}','StudentController@teacherRelatedCourse')->name('teacherRelatedCourse');

    //course request
    Route::get('courseRequest','StudentController@courseRequest')->name('courseRequest');
    Route::post('requestCourse','StudentController@requestCourse')->name('requestCourse');
});
