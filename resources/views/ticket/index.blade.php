@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Tickets</h1>
    
    <button class="btn btn-primary ">
        <a href="{{ route('ticket.create') }}">Create ticket</a>
    </button>

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
                        <button class="btn btn-warning">
                            <a >View</a>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
</div>
@endsection