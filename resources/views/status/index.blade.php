@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Status</h1>
    <button class="btn btn-primary">
        <a href="{{route('status.create')}}">Create Job</a>
    </button>
</div>
@endsection