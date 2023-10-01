@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Ticket Details</h1>

    <div class="card">
        <div class="card-body">
            <h3>{{ $ticket->user->name }} {{ $ticket->user->surname }}</h3>
            <p>{{ $ticket->user->email }}</p>
            <p>{{ $ticket->description }}</p>
            <p>{{ $ticket->department->dep_name }}</p>
            <p>{{ $ticket->status->status_name }}</p>
            <p>{{ $ticket->date_logged }}</p>

            <a href="{{ route('admin.edit', ['id' =>$ticket->id]) }}" class="btn btn-primary">Edit</a>
        </div>
    </div>
</div>
@endsection