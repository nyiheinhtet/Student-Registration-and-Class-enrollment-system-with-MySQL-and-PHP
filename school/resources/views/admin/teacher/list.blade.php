@extends('layouts.adminDesign')


@section('content')

@if(Session::has('authError'))
<p style="color:red">{{Session::get('authError')}}</p>
@endif

<h1>Teacher</h1>
<div class="container mt-4">
    <button class="btn btn-sm btn-success mb-4">Download CSV</button>
<table class="table table-hover  mt-20">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Gender</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Student Count</th>
        </tr>
    </thead>
    <tbody>
        @foreach($teacher as $item)
        <tr>
            <th scope="row">{{ $item['id'] }}</th>
            <td>{{ $item['name'] }}</td>
            <td>{{ $item['email'] }}</td>
            <td>{{ $item['gender'] }}</td>
            <td>{{ $item['phone_number_one'] }}</td>
            <td></td>
            <td>
                <a href=""><button class="btn btn-sm btn-secondary">More Detail</button></a>
            <!-- </td>
            <td> -->
                <a href=""><button class="btn btn-sm btn-danger">Delete</button></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection