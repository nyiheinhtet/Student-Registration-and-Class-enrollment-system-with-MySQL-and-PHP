@extends('layouts.adminDesign')


@section('content')

@if(Session::has('authError'))
<p style="color:red">{{Session::get('authError')}}</p>
@endif

<h1>Notification</h1>
<div class="container mt-4">
    <form method="post" action="">
        @csrf
        <legend class="mb-3">Send Notification To All</legend>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Message</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="course_request_details" rows="3"></textarea>
        </div>
        @if($errors->has('course_request_details'))
        <p style="color:red">{{ $errors->first('course_request_details')}}</p>
        @endif

        <button type="submit" class="btn btn-primary mt-3">Request</button>
    </form>
</div>

@endsection