@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{ route('status.store') }}" method="POST" encrypt="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="status_name" class="form-group">Status name:</label>
            <input type="text" name="status_name" id="status_name" class="form-control">
        </div>
        <button class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection