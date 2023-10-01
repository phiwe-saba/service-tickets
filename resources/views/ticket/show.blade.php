@extends('layouts.app')
@section('content')
<div class="container">
    <form method="POST" action="{{ route('ticket.update', $ticket->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" disabled>
        </div>

        <div class="form-group">
            <label for="surname">Surname:</label>
            <input type="text" name="surname" id="surname" class="form-control" disabled>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" class="form-control" disabled>
        </div>

        <div class="form-group">
            <label for="department_id">Department:</label>
            <select name="department_id" id="department_id" class="form-control">
                @foreach($departments as $department)
                    <option value="{{ $department->id }}" {{ $ticket->$department->id == $department->id ? 'selected' : '' }}>{{ $department->dep_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="status_id">Status:</label>
            <select name="status_id" id="status_id" class="form-control">
                @foreach($statuses as $status)
                    <option value="{{ $status->id }}" {{ $ticket->status_id == $status->id ? 'selected' : '' }}>{{ $status->status_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <input type="text" name="description" id="description" class="form-control" disabled>
        </div>

        <div class="form-group">
            <label for="date_logged">Date:</label>
            <input type="date" name="date_logged" id="date_logged" class="form-control" disabled>
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection