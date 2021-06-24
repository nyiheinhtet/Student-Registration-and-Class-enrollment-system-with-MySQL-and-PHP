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
                <th scope="col">Course Title</th>
                <th scope="col">Course Explanation</th>
                <th scope="col">Course Details</th>
            </tr>
        </thead>
        <tbody>
            @foreach($course as $item)
            <tr>
                <th scope="row">{{ $item['course_id'] }}</th>
                <td>{{ $item['course_title'] }}</td>
                <td>{{ $item['course_explanation'] }}</td>
                <td>{{ $item['course_details'] }}</td>
                <td>
                    <a href="{{ route('updatePage',$item['course_id']) }}"><button class="btn btn-sm btn-secondary">Update</button></a>
                </td>
                <td>
                    <a href="{{ route('deleteCourse',$item['course_id']) }}"><button class="btn btn-sm btn-danger">Delete</button></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>



@endsection