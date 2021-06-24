@extends('layouts.studentDesign')


@section('content')

@if(Session::has('authError'))
<p style="color:red">{{Session::get('authError')}}</p>
@endif



<!-- course form open -->
<div class="container-fluid">
    <div class="mt-4">
    </div>
    <div class="row mt-3">
        <legend class="ml-4">Teacher - {{$courseData[0]->name }}</legend>

        <!-- card start -->
        <div class="col-sm-4 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="alert alert-success" role="alert">
                        <h5 class="card-title"><label>Course Title - </label>{{$courseData[0]->course_title}}</h5>
                    </div>
                    <hr>
                    <p class="card-text">{{$courseData[0]->course_explanation}}</p>
                    <hr>
                    <p class="card-text">{{$courseData[0]->course_details}}</p>
                    <hr>
                    <!-- <div class="alert alert-success" role="alert">
                        <label></label>
                    </div> -->

                    <!-- <a href="{{ route('lookCourse',$courseData[0]->course_id) }}" class="btn btn-success float-right">Look Info </a> -->
                </div>
            </div>
        </div>
        <!-- card end -->

    </div>
    <button class="btn btn-sm btn-warning mt-2" onclick="goBack()">Back</button>
    <hr>
    <!-- related class -->
    <legend class="ml-4">Related Class</legend>
    <hr>
    @if(Session::has('classAttendSuccess'))
    <div class="alert alert-success ml-4" role="alert">
        {{Session::get('classAttendSuccess')}}
    </div>
    @endif
    <div class="row mt-3">
        <!-- card start -->
        @if($relatedClass!=null)
        @foreach($relatedClass as $item)
        <div class="col-sm-4 mt-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$item->class_name}}</h5>
                    <hr>
                    <p class="card-text">{{$item->fee}}</p>
                    <p>ClassType : <b>{{$item->class_type }}</b></p>
                    <p>Time : {{ $item->start_date }} - {{ $item->end_date }}</p>
                    <a href="{{ route('lookClassInformation',[$item->class_id]) }}" class="btn btn-success float-right">Look Class Information </a>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <div class="alert alert-danger ml-4" role="alert">
            There is no related class for this Course..
        </div>
        @endif

        <!-- card end -->

    </div>

    <div style="height: 50vh;"></div>
</div>


<!-- course form close -->

@endsection
<script>
    function goBack() {
        window.history.back();
    }
</script>