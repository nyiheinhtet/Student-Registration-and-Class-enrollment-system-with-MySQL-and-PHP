@extends('layouts.adminDesign')


@section('content')

@if(Session::has('authError'))
<p style="color:red">{{Session::get('authError')}}</p>
@endif

<h1>Add Admin</h1>



@endsection