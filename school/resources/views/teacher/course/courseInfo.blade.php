@extends('layouts.teacherDesign')


@section('content')

@if(Session::has('authError'))
<p style="color:red">{{Session::get('authError')}}</p>
@endif



<!-- course form open -->

<div class="container mt-5">
    @if(Session::has('courseSuccess'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{Session::get('courseSuccess')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <form method="post" action="{{ route('createCourse') }}">
        @csrf
        <legend class="mb-3">Create Course</legend>
        <div class="form-group">
            <label>Course Title</label>
            <input type="text" class="form-control" name="course_title" aria-describedby="emailHelp" placeholder="Enter Course Title" value="{{ $sessionData['course_title'] }}">
            @if($errors->course_check->has('course_title'))
            <p style="color:red;back-ground:black;">{{ $errors->course_check->first('course_title') }}</p>
            @endif
        </div>
        <div class="form-group">
            <label>Course Explanation</label>
            <textarea class="form-control" name="course_explanation" id="exampleFormControlTextarea1" rows="3" placeholder="Enter Course Explanation">{{ $sessionData['course_explanation'] }}</textarea>
            @if($errors->course_check->has('course_explanation'))
            <p style="color:red;back-ground:black;">{{ $errors->course_check->first('course_explanation') }}</p>
            @endif
        </div>
        <div class="form-group">
            <label>Course Details</label>
            <textarea class="form-control" name="course_details" id="exampleFormControlTextarea1" rows="3" placeholder="Enter Course Details">{{ $sessionData['course_explanation'] }}</textarea>
            @if($errors->course_check->has('course_details'))
            <p style="color:red;back-ground:black;">{{ $errors->course_check->first('course_details') }}</p>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Create Course</button>
    </form>
</div>

<!-- course form close -->

@endsection