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
    <form method="post" action="{{ route('courseUpdate',$courseData[0]->course_id) }}">
        @csrf
        <legend class="mb-3">Update Course</legend>
        <div class="form-group">
            <label>Course Title</label>
            <input type="text" class="form-control" name="course_title" aria-describedby="emailHelp" value="{{ $courseData[0]->course_title }}">
            @if($errors->has('course_title'))
            <p style="color:red;back-ground:black;">{{ $errors->first('course_title') }}</p>
            @endif
        </div>
        <div class="form-group">
            <label>Course Explanation</label>
            <textarea class="form-control" name="course_explanation" id="exampleFormControlTextarea1" rows="3">{{ $courseData[0]->course_explanation}}</textarea>
            @if($errors->has('course_explanation'))
            <p style="color:red;back-ground:black;">{{ $errors->first('course_explanation') }}</p>
            @endif
        </div>
        <div class="form-group">
            <label>Course Details</label>
            <textarea class="form-control" name="course_details" id="exampleFormControlTextarea1" rows="3" >{{ $courseData[0]->course_details}}</textarea>
            @if($errors->has('course_details'))
            <p style="color:red;back-ground:black;">{{ $errors->first('course_details') }}</p>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update Course</button>
    </form>
</div>

<!-- course form close -->

@endsection