@extends('layouts.studentDesign')


@section('content')

@if(Session::has('authError'))
<p style="color:red">{{Session::get('authError')}}</p>
@endif



<!-- course form open -->
<div class="container-fluid">
    <div class="mt-4">
        {{$class->links()}}
    </div>
    @if(Session::has('classAttendSuccess'))
    <div class="alert alert-success ml-4" role="alert">
        {{Session::get('classAttendSuccess')}}
    </div>
    @endif
    <div class="row mt-3">

        <!-- card start -->
        @foreach($class as $item)
        <div class="col-sm-4 mt-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$item->class_name}}</h5>
                    <hr>
                    <p class="card-text">Fee - {{$item->fee}}</p>
                    <p>ClassType : <b>{{$item->class_type }}</b></p>
                    <p>Time : {{ $item->start_date }} - {{ $item->end_date }}</p>
                    <p>Teacher - {{ $item->name }}</p>
                    <a href="{{ route('lookClassInformation',[$item->class_id]) }}" class="btn btn-success float-right">Look Class Information </a>
                </div>
            </div>
        </div>
        @endforeach
        <!-- card end -->

    </div>
</div>


<!-- course form close -->

@endsection