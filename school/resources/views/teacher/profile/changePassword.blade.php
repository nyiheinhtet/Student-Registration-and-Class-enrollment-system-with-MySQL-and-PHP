@extends('layouts.teacherDesign')


@section('content')
<h1>Profile</h1>
@if(Session::has('authError'))
<p style="color:red">{{Session::get('authError')}}</p>
@endif
<!-- teacher form -->
<!-- course form open -->

<div class="container mt-5">
    @include('teacher.profile.changePasswordError')
    <form method="post" action="{{ route('changePassword') }}">
        @csrf
        <legend class="mb-3">Change Password</legend>
        <div class="form-group">
            <label>Old Password</label>
            <input type="password" class="form-control" name="old_password" aria-describedby="emailHelp" placeholder="Enter Old Password" value="{{ old('old_password') }}">
            @if($errors->has('old_password'))
            <p style="color:red;back-ground:black;">{{ $errors->first('old_password') }}</p>
            @endif
        </div>
        <div class="form-group">
            <label>New Password</label>
            <input type="password" class="form-control" name="new_password" aria-describedby="emailHelp" placeholder="Enter New Password" value="{{ old('new_password') }}">
            @if($errors->has('new_password'))
            <p style="color:red;back-ground:black;">{{ $errors->first('new_password') }}</p>
            @endif
        </div>
        <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" class="form-control" name="confirm_password" aria-describedby="emailHelp" placeholder="Enter Confirm Password" value="{{ old('confirm_password') }}">
            @if($errors->has('confirm_password'))
            <p style="color:red;back-ground:black;">{{ $errors->first('confirm_password') }}</p>
            @endif
        </div>
        <button type="submit" class="btn btn-primary mt-3">Change Password</button>
    </form>
</div>

<!-- course form close -->



@endsection