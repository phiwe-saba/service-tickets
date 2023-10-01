@extends('layouts.app')
@section('content')
<div class="container">
    <form method="POST" action="{{ route('admin.update', $ticket->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $users->name) }}" disabled>
            
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="surname">Surname:</label>
            <input type="text" name="surname" id="surname" class="form-control" value="{{ old('surname', $users->surname) }}" disabled>
        
            @error('surname')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" class="form-control" value="{{ old('email', $users->email) }}" disabled>
        
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="department_id">Department:</label>
            <select name="department_id" id="department_id" class="form-control">
                @foreach($departments as $department)
                    <option value="{{ $department->id }}" {{ $department == $department->id ? 'selected' : '' }}>{{ $department->dep_name }}</option>
                @endforeach
            </select>
        </div>
    

        <div class="form-group">
            <label for="description">Description:</label>
            <input type="text" name="description" id="description" class="form-control" value="{{ old('description', $ticket->description) }}" disabled>
        
            @error('description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="date_logged">Date:</label>
            <input type="date" name="date_logged" id="date_logged" class="form-control" value="{{ old('date_logged', $ticket->date_logged) }}" disabled>
        
            @error('date_logged')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection