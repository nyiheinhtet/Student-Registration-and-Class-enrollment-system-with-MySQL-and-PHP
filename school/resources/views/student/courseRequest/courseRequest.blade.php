@extends('layouts.studentDesign')


@section('content')
<h1>Profile</h1>
@if(Session::has('authError'))
<p style="color:red">{{Session::get('authError')}}</p>
@endif
<!-- teacher form -->
<!-- course form open -->

<div class="container mt-5">
    @if(Session::has('createSuccess'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{Session::get('createSuccess')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <form method="post" action="{{ route('requestCourse') }}">
        @csrf
        <legend class="mb-3">Course Request</legend>
        <div class="form-group">
            <label>Request Course Title</label>
            <input type="text" class="form-control" name="course_request_title" aria-describedby="emailHelp" placeholder="Enter Course Title" value="">
            @if($errors->has('course_request_title'))
            <p style="color:red">{{ $errors->first('course_request_title')}}</p>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Request Course Detail</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="course_request_details" rows="3"></textarea>
        </div>
        @if($errors->has('course_request_details'))
        <p style="color:red">{{ $errors->first('course_request_details')}}</p>
        @endif

        <button type="submit" class="btn btn-primary mt-3">Request</button>
    </form>
</div>

<!-- course form close -->



@endsection