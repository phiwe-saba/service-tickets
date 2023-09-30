@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Departments</h1>
    <button class="btn btn-primary">
        <a href="{{route('department.create')}}">Create Job</a>
    </button>
</div>
@endsection