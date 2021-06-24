<?php

namespace App\Http\Controllers\Student;

use App\Models\User;
use App\Models\Course;
use App\Models\Classes;
use App\Models\ClassStudent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CourseRequest;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    //direct course page
    public function index()
    {
        // $courses = Course::orderBy('created_at', 'desc')->get();
        $courses = Course::select('courses.*', 'users.*')
            ->join('users', 'users.id', '=', 'courses.user_id')
            ->orderBy('courses.created_at', 'desc')
            // ->get();
            ->paginate(3);
        // dd($courses->toArray());
        return view('student.course.list')->with(['course' => $courses]);
    }

    //look course
    public function lookCourse($course_id)
    {
        $id = auth()->user()->id;
        // dd($course_id);
        $courseData = Course::select('courses.*', 'users.name', 'users.id')
            // ,'classes.class_name','classes.fee','classes.start_date','classes.end_date','classes.class_type')
            ->join('users', 'users.id', '=', 'courses.user_id')
            // ->leftjoin('classes','classes.course_id','=','courses.course_id')
            ->where('courses.course_id', $course_id)
            ->get();
        // dd($courseData->toArray());
        // $relatedClass = Course::select('classes.*', 'class_students.status', 'class_students.student_id')
        $relatedClass = Course::select('classes.*')
            ->join('classes', 'courses.course_id', '=', 'classes.course_id')
            // ->leftJoin('class_students', 'classes.class_id', '=', 'class_students.class_id')
            // ->where('class_students.student_id','!=',$id)
            ->where('courses.course_id', $course_id)
            ->get();
        // dd($relatedClass->toArray());
        if (empty($relatedClass->toArray())) {
            //     if(empty($relatedClass[0]['fee'])){
            //     dd("empty");
            $relatedClass = null;
        }

        return view('student.course.lookCourse')->with(['courseData' => $courseData, 'relatedClass' => $relatedClass]);
        // dd($courseData->toArray());
    }

    public function enrollClass($class_id, $teacher_id, Request $request)
    {
        // request('title');
        // $_REQUEST['title'];
        // dd($class_id);
        // $request->title
        $data = [
            'class_id' => $class_id,
            'student_id' => auth()->user()->id,
            'teacher_id' => $teacher_id,
            'status' => 1
        ];
        // dd($data['teacher_id']);

        ClassStudent::create($data);
        return back()->with(['classAttendSuccess' => "Enrolled successfully"]);
    }

    //class list
    public function classList()
    {
        $class = Classes::orderBy('classes.created_at', 'desc')
            ->join('users', 'classes.user_id', '=', 'users.id')
            ->select('classes.*', 'users.name', 'users.id')
            ->paginate(6);
        // dd($class->toArray());
        return view('student.class.classList')->with(['class' => $class]);
    }

    //look class information
    public function lookClassInformation($class_id)
    {
        $class = Classes::where('class_id', '=', $class_id)
            ->get();

        $id = auth()->user()->id;
        $attend_status = Classes::leftJoin('class_students', 'classes.class_id', '=', 'class_students.class_id')
            ->where('class_students.class_id', '=', $class_id)
            ->where('class_students.student_id', '=', $id)
            ->select('class_students.status')
            ->get();
        if (empty($attend_status->toArray())) {
            $status = null;
        } else {
            $status = $attend_status[0]['status'];
        }
        return view('student.class.lookClassInformation')->with(['class' => $class, 'status' => $status]);
    }

    // teacher list
    public function teacherList()
    {
        $teacher = User::orderBy('created_at', 'desc')
            ->where('role', '=', 'teacher')
            ->paginate(6);
        // dd($teacher->toArray());
        return view('student.teacher.teacherList')->with(['teacher' => $teacher]);
    }

    //teacher related course
    public function teacherRelatedCourse($teacher_id)
    {
        $teacher = User::where('id', '=', $teacher_id)->get();
        // dd($teacher->toArray());

        $class = Classes::where('classes.user_id', '=', $teacher_id)
            ->select('classes.*')
            ->get();
        // dd($class->toArray());
        return view('student.teacher.lookTeacherCourse')->with(['teacher' => $teacher, 'class' => $class]);
    }

    //course Request
    public function courseRequest()
    {
        return view('student.courseRequest.courseRequest');
    }

    //request course
    public function requestCourse(Request $request)
    {

        $validator = $this->requestCourseValidation($request);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        // dd($request->all());
        $data=[
            'student_id'=>auth()->user()->id,
            'course_request_title'=>$request->course_request_title,
            'course_request_details'=>$request->course_request_details
        ];
        // dd($data);
        CourseRequest::create($data);
        return back()->with(['createSuccess'=>"Course Request created successfully!"]);
    }

    public function requestCourseValidation($request)
    {

        $validator = Validator::make($request->all(), [
            'course_request_title' => 'required',
            'course_request_details' => 'required',
        ]);
        return $validator;
    }
}
