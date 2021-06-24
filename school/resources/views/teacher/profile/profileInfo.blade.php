@extends('layouts.teacherDesign')


@section('content')
<h1>Profile</h1>
@if(Session::has('authError'))
<p style="color:red">{{Session::get('authError')}}</p>
@endif
<!-- teacher form -->
<!-- course form open -->

<div class="container mt-5">
    @if(Session::has('updateSuccess'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{Session::get('updateSuccess')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <form method="post" action="{{ route('updateProfile',$teacherInfo[0]['id']) }}">
        @csrf
        <legend class="mb-3">Edit Profile</legend>
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" aria-describedby="emailHelp" placeholder="Enter Course Title" value="{{ old('name',$teacherInfo[0]['name']) }}">
            @if($errors->has('name'))
            <p style="color:red;back-ground:black;">{{ $errors->first('name') }}</p>
            @endif
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter Course Title" value="{{ old('email',$teacherInfo[0]['email']) }}">
            @if($errors->has('email'))
            <p style="color:red;back-ground:black;">{{ $errors->first('email') }}</p>
            @endif
        </div>
        <div class="form-group">
            <label>Date of Birth</label>
            <input type="date" class="form-control" name="date_of_birth" aria-describedby="emailHelp" placeholder="Enter " value="{{ old('date_of_birth',$teacherInfo[0]['date_of_birth']) }}">
            @if($errors->has('date_of_birth'))
            <p style="color:red;back-ground:black;">{{ $errors->first('date_of_birth') }}</p>
            @endif
        </div>
        <div class="form-group">
            <label>Gender</label>
            <select class="form-control" name="gender">
                @if($teacherInfo[0]['gender']=='male')
                <option value="male" selected>Male</option>
                <option value="female">Female</option>
                @else
                <option value="male">Male</option>
                <option value="female" selected>Female</option>
                @endif
            </select>
            @if($errors->has('gender'))
            <p style="color:red;back-ground:black;">{{ $errors->first('gender') }}</p>
            @endif
        </div>
        <div class="form-group">
            <label>Primary Phone Number</label>
            <input type="number" class="form-control" name="phone_number_one" aria-describedby="emailHelp" placeholder="Enter " value="{{ old('phone_number_one',$teacherInfo[0]['phone_number_one']) }}">
            @if($errors->has('phone_number_one'))
            <p style="color:red;back-ground:black;">{{ $errors->first('phone_number_one') }}</p>
            @endif
        </div>
        <div class="form-group">
            <label>Secondary Phone Number</label>
            <input type="number" class="form-control" name="phone_number_two" aria-describedby="emailHelp" placeholder="Enter " value="{{ old('phone_number_two',$teacherInfo[0]['phone_number_two']) }}">
            @if($errors->has('phone_number_two'))
            <p style="color:red;back-ground:black;">{{ $errors->first('phone_number_two') }}</p>
            @endif
        </div>
        <div class="form-group">
            <label>Region</label>
            <input type="text" class="form-control" name="region" aria-describedby="emailHelp" placeholder="Enter " value="{{ old('region',$teacherInfo[0]['region']) }}">
            @if($errors->has('region'))
            <p style="color:red;back-ground:black;">{{ $errors->first('region') }}</p>
            @endif
        </div>
        <div class="form-group">
            <label>Town</label>
            <input type="text" class="form-control" name="town" aria-describedby="emailHelp" placeholder="Enter " value="{{ old('town',$teacherInfo[0]['town']) }}">
            @if($errors->has('town'))
            <p style="color:red;back-ground:black;">{{ $errors->first('town') }}</p>
            @endif
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" class="form-control" name="address" aria-describedby="emailHelp" placeholder="Enter " value="{{ old('address',$teacherInfo[0]['address']) }}">
            @if($errors->has('address'))
            <p style="color:red;back-ground:black;">{{ $errors->first('address') }}</p>
            @endif
        </div>
        <a href="{{ route('changePassword') }}">Change Password</a><br>
        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
</div>

<!-- course form close -->



@endsection