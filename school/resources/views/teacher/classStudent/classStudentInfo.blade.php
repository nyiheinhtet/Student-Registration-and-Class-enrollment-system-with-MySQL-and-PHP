@extends('layouts.teacherDesign')


@section('content')

@if(Session::has('authError'))
<p style="color:red">{{Session::get('authError')}}</p>
@endif

<div class="container">
    @if(Session::has('deleteSuccess'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{Session::get('deleteSuccess')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if(Session::has('changeStatusSuccess'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{Session::get('changeStatusSuccess')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if(Session::has('updateSuccess'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{Session::get('updateSuccess')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <table class="table table-hover  mt-20">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Student Name</th>
                <th scope="col">Course Name</th>
                <th scope="col">Student Attend Class Name</th>
                <th scope="col">Request Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($classStudent as $item)
            <tr>
                <th scope="row">{{ $item['class_student_id'] }}</th>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['course_title'] }}</td>
                <td>{{ $item['class_name'] }}</td>
                <td>{{ $item['created_at'] }}</td>
                <td>
                    @if($item['status']==1 || $item['status']==5)
                    <a href="{{ route('changeStatus',[$item['class_student_id'],2]) }}"><button class="btn btn-sm btn-success">Accept</button></a>
                    <a href="{{ route('changeStatus',[$item['class_student_id'],3]) }}"><button class="btn btn-sm btn-warning">Student Full</button></a>
                    <a href="{{ route('changeStatus',[$item['class_student_id'],4]) }}"><button class="btn btn-sm btn-danger">Reject</button></a>
                    @else
                    <a href="{{ route('changeStatus',[$item['class_student_id'],5]) }}"><button class="btn btn-sm btn-secondary">Edit</button></a>
                    @endif

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>



@endsection