<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //teacher Lista
    public function index()
    {
        $teacher=User::where('role','=','teacher')
        ->orderBy('created_at','desc')
        ->get();
        // dd($teacher->toArray());
        return view('admin.teacher.list')->with(['teacher'=>$teacher]);
    }

    //student list
    public function studentList()
    {
        $student=User::where('role','=','student')
        ->orderBy('created_at','desc')
        ->get();
        return view('admin.student.list')->with(['student'=>$student]);
    }

    //send Notification
    public function sendNotification()
    {
        return view('admin.notification.notification');
    }

    //add admin
    public function addAdmin()
    {
        return view('admin.addAdmin.create');
    }
}
