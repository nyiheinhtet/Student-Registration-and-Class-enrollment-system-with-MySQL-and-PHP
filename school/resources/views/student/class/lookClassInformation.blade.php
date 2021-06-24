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
        <legend class="ml-4"></legend>

        <!-- card start -->
        <div class="col-sm-4 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="alert alert-success" role="alert">
                        <h5 class="card-title"><label>Class Title - {{$class[0]->class_name}}</label></h5>
                    </div>
                    <hr>
                    <p class="card-text">Class Fee -{{ $class[0]['fee'] }}</p>
                    <hr>
                    <p class="card-text">Start Time - {{ $class[0]['start_time']}}</p>
                    <hr>
                    <p class="card-text">End Time - {{ $class[0]->end_time}}</p>
                    <hr>
                    <p class="card-text">Start Date - {{ $class[0]['start_date']}}</p>
                    <hr>
                    <p class="card-text">End Date - {{ $class[0]->end_date}}</p>
                    <hr>
                    <p class="card-text">Class Type - {{ $class[0]['class_type']}}</p>
                    <hr>
                    @if($status==2)
                    <p style="color:green;">You can joint this class</p>
                    @elseif($status==3)
                    <p style="color:red;">Student Full for this class</p>
                    @elseif($status==4)
                    <p style="color:red;">Teacher Reject this class</p>
                    @elseif($status==0)
                    <a href="{{ route('enrollClass',[$class[0]->class_id,$class[0]->user_id]) }}" class="btn btn-success float-right">Enroll </a>
                    @else
                    <p style="color:orange;">Wait Teacher Response</p>
                    @endif

                </div>
            </div>
        </div>
        <!-- card end -->

    </div>
    <button class="btn btn-sm btn-warning mt-2" onclick="goBack()">Back</button>
    <hr>


</div>


<!-- course form close -->

@endsection
<script>
    function goBack() {
        window.history.back();
    }
</script>