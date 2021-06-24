<?php

namespace App\Http\Controllers\Teacher;

use Carbon\Carbon;
use App\Models\Course;
use App\Models\Classes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Mail\TeacherResponseMail;
use App\Models\ClassStudent;
use App\Models\CourseRequest;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class TeacherController extends Controller
{
    //
    public function course()
    {
        //AA// $session_data=Session::get('COURSE_DATA');
        //AA //Session::forget('COURSE_DATA');
        // $session_data=[
        //     'course_title'=>"",
        //     'course_explanation'=>null,
        //     'course_details'=>null,
        // ];
        //AA// return view('teacher.course.courseInfo')->with(['session_data'=>$session_data]);
        if (Session::has('CREATE_COURSE')) {
            $sessionData = Session::get('CREATE_COURSE');
        } else {
            $sessionData = [];
            $sessionData['course_title'] = "";
            $sessionData['course_explanation'] = "";
            $sessionData['course_details'] = "";
        }
        Session::forget('CREATE_COURSE');
        return view('teacher.course.courseInfo')->with('sessionData', $sessionData);
    }

    public function courseList()
    {
        $id = auth()->user()->id;
        //--> auntheticated logged in user--> THISS
        // $courseData = Course::where('user_id','=',auth()->user()->id)->get();

        //OR--> auntheticated logged in user--> THISS

        // dd($courseData->toArray());
        $courseData = Course::where('user_id', '=', $id)->orderBy('course_id', 'desc')->get();
        // $courseData = DB::table('courses')->where('user_id', '=', $id)->orderBy('course_id', 'desc')->get();
        // dd($courseData->toArray());
        // return view('teacher.course.courseList')->with(['course' => $courseData]);
        return view('teacher.course.courseList')->with(['course' => $courseData]);
    }

    public function deleteCourse($course_id)
    {
        // dd($course_id);
        Course::where('course_id', '=', $course_id)->delete();
        return back()->with(['deleteSuccess' => 'Course Deleted!']);
    }

    public function updatePage($course_id)
    {
        // dd($course_id);
        $courseData = Course::where('course_id', '=', $course_id)->get();
        // dd($courseData);
        return view('teacher.course.updateCourse')->with(['courseData' => $courseData]);
    }

    public function courseUpdate($course_id, Request $request)
    {

        $validator = $this->requestCourseValidation($request);
        $courseData = $this->getCourseData($request, "update");
        Session::put('UPDATE_COURSE', $courseData);
        $sessionData = Session::get('UPDATE_COURSE');
        if ($validator->fails()) {
            return back()->with('sessionData', $sessionData)
                ->withErrors($validator)
                ->withInput();
        }

        // dd($courseData);
        Course::where('course_id', '=', $course_id)->update($courseData);
        // return redirect()->route('courseList')->with('updateSuccess', "Updated Course Successfully!");
        return redirect()->route('courseList')->with(['updateSuccess' => "Updated Course Successfully!", 'sessionData' => $sessionData]);
        // return view('teacher.course.courseList')->with(['course' => $courseData, 'updateSuccess'=> "Updated Course Successfully!"]);
    }

    public function classInfo()
    {
        $id = auth()->user()->id;
        $course = Course::where('user_id', '=', $id)->get();
        return view('teacher.class.classInfo')->with(['course' => $course]);
    }

    public function classStudentInfo()
    {
        $id = auth()->user()->id;
        $classStudent = ClassStudent::select('users.name', 'classes.class_name', 'class_students.*', 'courses.course_title')
            ->orderBy('class_students.created_at', 'desc')
            ->join('users', 'users.id', '=', 'class_students.student_id')
            ->join('classes', 'classes.class_id', '=', 'class_students.class_id')
            ->join('courses', 'classes.course_id', '=', 'courses.course_id')
            ->where('teacher_id', '=', $id)
            ->get();
        // dd($classStudent->toArray());
        return view('teacher.classStudent.classStudentInfo')->with(['classStudent' => $classStudent]);
    }


    //change status
    public function changeStatus($class_student_id, $status)
    {
        //2 accept
        //3 full student
        //4 reject
        $data = [
            'status' => $status
        ];

        $email = ClassStudent::join('users', 'users.id', '=', 'class_students.student_id')
            ->where('class_students.class_student_id', '=', $class_student_id)
            ->select('users.email')
            ->get();
        // dd($email[0]['email']);

        $mail = [];
        if ($status != 5) {
            if ($status == 2) {
                $mail = [
                    'message' => 'Teacher Accept This Class!'
                ];
            } elseif ($status == 3) {
                $mail = [
                    'message' => "Student is full for this Class!"
                ];
            } else {
                $mail = [
                    'message' => 'Teacher Reject This Class!'
                ];
            }
            $mail['email'] = $email[0]['email'];

            Mail::to($email[0]['email'])->send(new TeacherResponseMail($mail));
        }
        // Mail::to('famestar046@gmail.com')->send(new TeacherResponseMail($mail));
        ClassStudent::where('class_student_id', '=', $class_student_id)->update($data);
        // dd($class_student_id.$status);
        return back()->with(['changeStatusSuccess' => "Change Status Success!"]);
    }

    public function profileInfo()
    {
        $id = auth()->user()->id;
        $teacherInfo = User::where('id', '=', $id)->get();
        // dd($teacherInfo->toArray());
        return view('teacher.profile.profileInfo')->with(['teacherInfo' => $teacherInfo]);
    }

    //update profile
    public function updateProfile($user_id, Request $request)
    {
        // dd($request->all());
        // dd($user_id);
        // $id=auth()->user()->get();

        $validator = $this->requestUserProfileValidation($request);

        //AA// Session::put('COURSE_DATA', $data);
        if ($validator->fails()) {
            //  return back()->with('session_data', $data)
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $userData = $this->getUserProfileData($request);
        // dd($userData);

        User::where('id', '=', $user_id)->update($userData);
        return back()->with(['updateSuccess' => "Update Success"]);
    }

    public function newsInfo()
    {
        $news = CourseRequest::join('users','course_requests.student_id','=','users.id')
        ->orderBy('course_requests.created_at', 'desc')
        ->select('course_requests.*','users.name')
        ->paginate(7);
        // dd($news->toArray());
        return view('teacher.news.newsInfo')->with(['news'=>$news]);
    }

    public function notificationInfo()
    {
        return view('teacher.notification.notificationInfo');
    }

    //create course
    public function createCourse(Request $request)
    {
        $validator = $this->requestCourseValidation($request);
        $data = $this->getCourseData($request, "create");
        Session::put('CREATE_COURSE', $data);
        $sessionData = Session::get('CREATE_COURSE');
        //AA// Session::put('COURSE_DATA', $data);
        if ($validator->fails()) {
            return back()->with(['session_data' => $sessionData, 'session_data' => $sessionData])
                // return back()
                ->withErrors($validator, 'course_check')
                ->withInput();
        }
        // dd(auth()->user()->id);

        Course::create($data);
        return back()->with(['courseSuccess' => "Course created successfully!"]);
        // return back()->with(['courseSuccess' => "Course created successfully!", 'session_data' => $sessionData]);
    }

    //create class
    public function createClass(Request $request)
    {


        $classData = $this->getClassData($request);
        // dd($request->course_id);
        // dd($classData);
        Classes::create($classData);
        return back()->with(['createClassSuccess' => "Class Created Successfully"]);
    }

    //classList
    public function classList1()
    {
        // dd('1');
        $classData = Classes::select('classes.*', 'courses.*')
            ->leftJoin('courses', 'courses.course_id', '=', 'classes.course_id')
            ->where('classes.user_id', '=', auth()->user()->id)
            ->orderBy('classes.class_id', 'desc')
            ->get();
        // dd($classData->toArray());
        return view('teacher.class.classList')->with(['classData' => $classData]);
    }

    //change password page
    public function changePasswordForm()
    {
        return view('teacher.profile.changePassword');
    }

    //change password
    public function changePassword(Request $request)
    {
        // dd($request->all());
        $validator = $this->changeProfilePassword($request);

        //AA// Session::put('COURSE_DATA', $data);
        if ($validator->fails()) {
            //  return back()->with('session_data', $data)
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        //to update password
        $db_password = auth()->user()->password;
        // dd($db_password);
        if (Hash::check($request->old_password, $db_password)) {
            // The passwords match...
            // dd("password Match");
            if (strlen($request->new_password) >= 8 && strlen($request->confirm_password) >= 8) {
                if ($request->new_password == $request->confirm_password) {
                    // dd("ok");
                    // $password=Hash::make($request->new_password);
                    $data = [
                        'password' => Hash::make($request->new_password)
                    ];
                    $id = auth()->user()->id;
                    User::where('id', '=', $id)->update($data);
                    return back()->with(['success' => "Change Password Success"]);
                } else {
                    // dd("password do not match");
                    return back()->with(['notSameBoth' => "New Password do not match with Confirm Password"]);
                }
            } else {
                // dd("password length less than 8");
                return back()->with(['errorLength' => "New Password & Confirm Password length less than 8! Try again!"]);
            }
        } else {
            // dd("password do not match");
            return back()->with(['notMatch' => "Old Password do not Match! Try Again!"]);
        }
    }


    //delete class
    public function deleteClass($class_id)
    {
        Classes::where('class_id', $class_id)->delete();
        return back()->with(['deleteSuccess' => "Class Deleted Successfully"]);
    }

    //update class page
    public function updateClassPage($class_id)
    {
        // dd($class_id);
        $data = Classes::where('class_id', '=', $class_id)->get();
        // dd($data->toArray());
        return view('teacher.class.updateClass')->with(['class' => $data]);
    }

    //update class
    public function updateClass($class_id, Request $request)
    {
        // dd($request->all());
        $validator = $this->requestClassValidation($request);

        //AA// Session::put('COURSE_DATA', $data);
        if ($validator->fails()) {
            //  return back()->with('session_data', $data)
            return back()
                ->withErrors($validator, 'class_check')
                ->withInput();
        }
        $classData = $this->getClassData($request);
        Classes::where('class_id', '=', $class_id)->update($classData);
        return back()->with(['updateSuccess' => "Class Updated Successfully"]);
        // dd($classData);
    }

    //get course data from client
    private function getCourseData($request, $status)
    {
        if ($status == "create") {
            $response = [
                'course_title' => $request->course_title,
                //add user_id column in course table
                'user_id' => auth()->user()->id,
                'course_explanation' => $request->course_explanation,
                'course_details' => $request->course_details,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];
        } else if ($status == "update") {
            $response = [
                'course_title' => $request->course_title,
                'course_explanation' => $request->course_explanation,
                'course_details' => $request->course_details,
                'updated_at' => Carbon::now()
            ];
        }
        return $response;
    }

    //get user profile data
    private function getUserProfileData($request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'phone_number_one' => $request->phone_number_one,
            'phone_number_two' => $request->phone_number_two,
            'region' => $request->region,
            'town' => $request->town,
            'address' => $request->address,
        ];
        return $data;
    }

    //request course validation
    private function requestCourseValidation($request)
    {
        $validator = Validator::make($request->all(), [
            'course_title' => 'required',
            'course_explanation' => 'required',
            'course_details' => 'required',
        ], [
            'course_title.required' => 'Course title needed',
            'course_explanation.required' => 'Course explanation needed',
            'course_details.required' => 'Course details neeeded'
        ]);
        return $validator;
    }

    //request Class validation
    private function requestClassValidation($request)
    {
        $validator = Validator::make($request->all(), [
            'class_name' => 'required',
            'class_fee' => 'required',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
            'start_date' => 'required',
            'end_date' => 'required|after:start_date',
            'class_type' => 'required',
        ], [
            'class_name.required' => 'Class Name needed',
            'class_fee.required' => 'Class Fee needed',
            'start_time.required' => 'Start Time neeeded',
            'end_time.required' => 'End Time neeeded',
            'end_time.after' => 'End Time is before Start Time',
            'start_date.required' => 'Start Date neeeded',
            'end_date.required' => 'End Date neeeded',
            'end_date.after' => 'End Date is before Start Date',
            'class_type.required' => 'Class Type neeeded',
        ]);
        return $validator;
    }

    //request Class validation
    private function requestUserProfileValidation($request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'date_of_birth' => 'required',
            'gender' => 'required',
            'phone_number_one' => 'required',
            'phone_number_two' => 'required',
            'region' => 'required',
            'town' => 'required',
            'address' => 'required',

        ]);
        return $validator;
    }

    //request change profile passwrd
    private function changeProfilePassword($request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required',
        ]);
        return $validator;
    }

    //get class data from client
    private function getClassData($request)
    {
        $data = [];
        if (isset($request->course_id)) {
            $data['course_id'] = $request->course_id;
        }
        if (isset($request->class_name)) {
            $data['class_name'] = $request->class_name;
        }
        if (isset($request->class_fee)) {
            $data['fee'] = $request->class_fee;
        }
        if (isset($request->start_date)) {
            $data['start_date'] = $request->start_date;
        }
        if (isset($request->end_date)) {
            $data['end_date'] = $request->end_date;
        }
        if (isset($request->start_time)) {
            $data['start_time'] = $request->start_time;
        }
        if (isset($request->end_time)) {
            $data['end_time'] = $request->end_time;
        }
        if (isset($request->class_type)) {
            $data['class_type'] = $request->class_type;
        }
        if (isset($request->monday)) {
            $data['monday'] = 1;
        } else {
            $data['monday'] = 0;
        }
        if (isset($request->tuesday)) {
            $data['tuesday'] = 1;
        } else {
            $data['tuesday'] = 0;
        }
        if (isset($request->wednesday)) {
            $data['wednesday'] = 1;
        } else {
            $data['wednesday'] = 0;
        }
        if (isset($request->thursday)) {
            $data['thursday'] = 1;
        } else {
            $data['thursday'] = 0;
        }
        if (isset($request->friday)) {
            $data['friday'] = 1;
        } else {
            $data['friday'] = 0;
        }
        if (isset($request->saturday)) {
            $data['saturday'] = 1;
        } else {
            $data['saturday'] = 0;
        }
        if (isset($request->sunday)) {
            $data['sunday'] = 1;
        } else {
            $data['sunday'] = 0;
        }
        //add user_id in classes table
        $data['user_id'] = auth()->user()->id;
        return $data;
    }
}
