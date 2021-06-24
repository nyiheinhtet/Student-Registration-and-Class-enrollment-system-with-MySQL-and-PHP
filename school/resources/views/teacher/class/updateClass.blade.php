@extends('layouts.teacherDesign')


@section('content')

@if(Session::has('authError'))
<p style="color:red">{{Session::get('authError')}}</p>
@endif



<!-- course form open -->

<div class="container mt-5">
    <form method="post" action="{{ route('updateClass',$class[0]['class_id']) }}">
        @if(Session::has('updateSuccess'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{Session::get('updateSuccess')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        @csrf
        <legend class="mb-3">Update Class</legend>
        <div class="form-group">
            <label>Class Name</label>
            <input type="text" class="form-control" name="class_name" aria-describedby="emailHelp" value="{{ old('class_name',$class[0]['class_name']) }}">
            @if($errors->class_check->has('class_name'))
            <p style="color:red;back-ground:black;">{{ $errors->class_check->first('class_name') }}</p>
            @endif
        </div>
        <div class="form-group">
            <label>Class Fee</label>
            <input type="text" class="form-control" name="class_fee" aria-describedby="emailHelp" value="{{ old('class_fee',$class[0]['fee']) }}">
            @if($errors->class_check->has('class_fee'))
            <p style="color:red;back-ground:black;">{{ $errors->class_check->first('class_fee') }}</p>
            @endif
        </div>
        <div class="form-group">
            <label>Start Time</label>
            <input type="time" class="form-control" name="start_time" aria-describedby="emailHelp" value="{{ old('start_time',$class[0]['start_time']) }}">
            @if($errors->class_check->has('start_time'))
            <p style="color:red;back-ground:black;">{{ $errors->class_check->first('start_time') }}</p>
            @endif
        </div>
        <div class="form-group">
            <label>End Time</label>
            <input type="time" class="form-control" name="end_time" aria-describedby="emailHelp" value="{{ old('end_time',$class[0]['end_time']) }}">
            @if($errors->class_check->has('end_time'))
            <p style="color:red;back-ground:black;">{{ $errors->class_check->first('end_time') }}</p>
            @endif
        </div>
        <div class="form-group">
            <label>Start Date</label>
            <input type="date" class="form-control" name="start_date" aria-describedby="emailHelp" value="{{ old('start_date',$class[0]['start_date']) }}">
            @if($errors->class_check->has('start_date'))
            <p style="color:red;back-ground:black;">{{ $errors->class_check->first('start_date') }}</p>
            @endif
        </div>
        <div class="form-group">
            <label>End Date</label>
            <input type="date" class="form-control" name="end_date" aria-describedby="emailHelp" value="{{ old('end_date',$class[0]['end_date']) }}">
            @if($errors->class_check->has('end_date'))
            <p style="color:red;back-ground:black;">{{ $errors->class_check->first('end_date') }}</p>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Class Type</label>
            <select class="form-control" name="class_type">
                @if($class[0]['class_type']=='weekday' || old('class_type')=='weekday')
                <option value="weekday" selected>Weekday Class</option>
                <option value="weekend">Weekend Class</option>
                @elseif($class[0]['class_type']=='weekend' || old('class_type')=='weekend')
                <option value="weekday">Weekday Class</option>
                <option value="weekend" selected>Weekend Class</option>
                @endif
            </select>
            @if($errors->class_check->has('class_type'))
            <p style="color:red;back-ground:black;">{{ $errors->class_check->first('class_type') }}</p>
            @endif
        </div>
        <div class="form-check form-check-inline">
            @if( old('monday')=='1' || $class[0]['monday']=='1')
            <input class="form-check-input" type="checkbox" name="monday" value="1" checked>
            @else
            <input class="form-check-input" type="checkbox" name="monday" value="1">
            @endif
            <label class="form-check-label mr-4" for="inlineRadio1">Monday</label>

            @if($class[0]['tuesday']=='1' || old('tuesday')=='1')
            <input class="form-check-input" type="checkbox" name="tuesday" value="1" checked>
            @else
            <input class="form-check-input" type="checkbox" name="tuesday" value="1">
            @endif
            <label class="form-check-label mr-4" for="inlineRadio1">Tuesday</label>

            @if($class[0]['wednesday']=='1' || old('wednesday')=='1')
            <input class="form-check-input" type="checkbox" name="wednesday" value="1" checked>
            @else
            <input class="form-check-input" type="checkbox" name="wednesday" value="1">
            @endif
            <label class="form-check-label mr-4" for="inlineRadio1">Wednesday</label>

            @if($class[0]['thursday']=='1' || old('thursday')=='1')
            <input class="form-check-input" type="checkbox" name="thursday" value="1" checked>
            @else
            <input class="form-check-input" type="checkbox" name="thursday" value="1">
            @endif
            <label class="form-check-label mr-4" for="inlineRadio1">Thursday</label>

            @if($class[0]['friday']=='1' || old('friday')=='1')
            <input class="form-check-input" type="checkbox" name="friday" value="1" checked>
            @else
            <input class="form-check-input" type="checkbox" name="friday" value="1">
            @endif
            <label class="form-check-label mr-4" for="inlineRadio1">Friday</label>

            @if($class[0]['saturday']=='1' || old('saturday')=='1')
            <input class="form-check-input" type="checkbox" name="saturday" value="1" checked>
            @else
            <input class="form-check-input" type="checkbox" name="saturday" value="1">
            @endif
            <label class="form-check-label mr-4" for="inlineRadio1">Saturday</label>

            @if($class[0]['sunday']=='1' || old('sunday')=='1')
            <input class="form-check-input" type="checkbox" name="sunday" value="1" checked>
            @else
            <input class="form-check-input" type="checkbox" name="sunday" value="1">
            @endif
            <label class="form-check-label mr-4" for="inlineRadio1">Sunday</label>
        </div><br><br>
        <button type="submit" class="btn btn-primary">Update Class</button>
    </form>
</div>

<!-- course form close -->

@endsection