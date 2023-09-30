@extends('layouts.app')
@section('content')
<div class="container">
    @csrf

    <form action="{{ route('ticket.store') }}" method="POST" encrypt="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>

        <div class="form-group">
            <label for="surname">Surname:</label>
            <input type="text" name="surname" id="surname" class="form-control">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" class="form-control">
        </div>

        <div class="form-group">
            <label for="department_id">Department:</label>
            <select name="department_id" id="department_id" class="form-control">
                @foreach($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->dep_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="status_id">Status:</label>
            <select name="status_id" id="status_id" class="form-control">
                @foreach($statuses as $status)
                    <option value="{{ $status->id }}">{{ $status->status_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <input type="text" name="description" id="description" class="form-control">
        </div>

        <div class="form-group">
            <label for="date_logged">Date:</label>
            <input type="date" name="date_logged" id="date_logged" class="form-control">
        </div>

        <button class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection