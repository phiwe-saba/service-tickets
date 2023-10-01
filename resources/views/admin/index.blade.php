@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Tickets Logged</h1>
    <table class="admin table table-hover">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Surname</th>
                <th scope="col">Email</th>
                <th scope="col">Department</th>
                <th scope="col">Status</th>
                <th scope="col">Description</th>
                <th scope="col">Date Logged</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tickets as $ticket)
                <tr>
                    <td>{{ $ticket->user->name }}</td>
                    <td>{{ $ticket->user->surname }}</td>
                    <td>{{ $ticket->user->email }}</td>
                    <td>{{ $ticket->description }}</td>
                    <td>{{ $ticket->department->dep_name }}</td>
                    <td>{{ $ticket->status->status_name }}</td>
                    <td>{{ $ticket->date_logged }}</td>
                    <td>
                        <a href="{{ route('admin.show', ['id' => $ticket->id] )}}" class="btn btn-primary">View</a>                        
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
</div>
@endsection