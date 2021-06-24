@extends('layouts.teacherDesign')


@section('content')

@if(Session::has('authError'))
<p style="color:red">{{Session::get('authError')}}</p>
@endif



<!-- course form open -->

<div class="container mt-2">
    @if(Session::has('createClassSuccess'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{Session::get('createClassSuccess')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <form method="post" action="{{ route('createClass') }}">
        @csrf
        <legend class="mb-3">Create Class</legend>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Course Name</label>
            <select class="form-control" name="course_id">
                @foreach($course as $item)
                <option value="{{ $item['course_id'] }}">{{ $item['course_title'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Class Name</label>
            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter Class Name" name="class_name" value="{{ old('class_name') }}">
            @if($errors->class_check->has('class_name'))
            <p style="color:red;back-ground:black;">{{ $errors->class_check->first('class_name') }}</p>
            @endif
        </div>
        <div class="form-group">
            <label>Class Fees</label>
            <input type="number" class="form-control" aria-describedby="emailHelp" placeholder="Enter Class Fees" name="class_fee" value="{{ old('class_fee') }}">
            @if($errors->class_check->has('class_fee'))
            <p style="color:red;back-ground:black;">{{ $errors->class_check->first('class_fee') }}</p>
            @endif
        </div>
        <div class="form-group">
            <label>Start Time</label>
            <input type="time" class="form-control" aria-describedby="emailHelp" placeholder="Enter Start Time" name="start_time" value="{{ old('start_time') }}">
            @if($errors->class_check->has('start_time'))
            <p style="color:red;back-ground:black;">{{ $errors->class_check->first('start_time') }}</p>
            @endif
        </div>
        <div class="form-group">
            <label>End Time</label>
            <input type="time" class="form-control" aria-describedby="emailHelp" placeholder="Enter End Time" name="end_time" value="{{ old('end_time') }}">
            @if($errors->class_check->has('end_time'))
            <p style="color:red;back-ground:black;">{{ $errors->class_check->first('end_time') }}</p>
            @endif
        </div>
        <div class="form-group">
            <label>Start Date</label>
            <input type="date" class="form-control" aria-describedby="emailHelp" placeholder="Enter Start Date" name="start_date" value="{{ old('start_date') }}">
            @if($errors->class_check->has('start_date'))
            <p style="color:red;back-ground:black;">{{ $errors->class_check->first('start_date') }}</p>
            @endif
        </div>
        <div class="form-group">
            <label>End Date</label>
            <input type="date" class="form-control" aria-describedby="emailHelp" placeholder="Enter End Date" name="end_date" value="{{ old('end_date') }}">
            @if($errors->class_check->has('end_date'))
            <p style="color:red;back-ground:black;">{{ $errors->class_check->first('end_date') }}</p>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Class Type</label>
            <select class="form-control" name="class_type" value="{{ old('class_type') }}">
                @if(old('class_type')=='weekday')
                <option value="weekday" selected>Weekday Class</option>
                <option value="weekend">Weekend Class</option>
                @else
                <option value="weekday">Weekday Class</option>
                <option value="weekend" selected>Weekend Class</option>
                @endif

            </select>
            @if($errors->class_check->has('class_type'))
            <p style="color:red;back-ground:black;">{{ $errors->class_check->first('class_type') }}</p>
            @endif
        </div>
        <div class="form-check form-check-inline">

            @if(old('monday')!=null)
            <input class="form-check-input" type="checkbox" name="monday" value="1" checked>
            @else
            <input class="form-check-input" type="checkbox" name="monday" value="1">
            @endif
            <label class="form-check-label mr-4" for="inlineRadio1">Monday</label>

            @if(old('tuesday')!=null)
            <input class="form-check-input" type="checkbox" name="tuesday" value="1" checked>
            @else
            <input class="form-check-input" type="checkbox" name="tuesday" value="1">
            @endif

            <label class="form-check-label mr-4" for="inlineRadio1">Tuesday</label>

            @if(old('wednesday')!=null)
            <input class="form-check-input" type="checkbox" name="wednesday" value="1" checked>
            @else
            <input class="form-check-input" type="checkbox" name="wednesday" value="1">
            @endif
            <label class="form-check-label mr-4" for="inlineRadio1">Wednesday</label>

            @if(old('thursday')!=null)
            <input class="form-check-input" type="checkbox" name="thursday" value="1" checked>
            @else
            <input class="form-check-input" type="checkbox" name="thursday" value="1">
            @endif
            <label class="form-check-label mr-4" for="inlineRadio1">Thursday</label>

            @if(old('friday')!=null)
            <input class="form-check-input" type="checkbox" name="friday" value="1" checked>
            @else
            <input class="form-check-input" type="checkbox" name="friday" value="1">
            @endif
            <label class="form-check-label mr-4" for="inlineRadio1">Friday</label>

            @if(old('saturday')!=null)
            <input class="form-check-input" type="checkbox" name="saturday" value="1" checked>
            @else
            <input class="form-check-input" type="checkbox" name="saturday" value="1">
            @endif
            <label class="form-check-label mr-4" for="inlineRadio1">Saturday</label>

            @if(old('sunday')!=null)
            <input class="form-check-input" type="checkbox" name="sunday" value="1" checked>
            @else
            <input class="form-check-input" type="checkbox" name="sunday" value="1">
            @endif

            <label class="form-check-label mr-4" for="inlineRadio1">Sunday</label>
        </div><br><br>
        <button type="submit" class="btn btn-primary">Create Class</button>
    </form>
    <br><br><br><br><br>
</div>

<!-- course form close -->

@endsection