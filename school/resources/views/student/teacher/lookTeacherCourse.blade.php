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
        <legend class="ml-4">Teacher - </legend>

        <!-- card start -->
        <div class="col-sm-4 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="alert alert-success" role="alert">
                        <h5 class="card-title"><label>Teacher Name - {{ $teacher[0]->name }}</label></h5>
                    </div>
                    <hr>
                    <p class="card-text">Phone - {{ $teacher[0]->phone_number_one }}</p>
                    <hr>
                    <p class="card-text">Region - {{ $teacher[0]->region }}</p>
                    <hr>
                    <!-- <div class="alert alert-success" role="alert">
                        <label></label>
                    </div> -->

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
        @if($class!=null)
        @foreach($class as $item)
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
            There is no related class for this teacher..
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