@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Tickets</h1>
    
    <button class="btn btn-primary">
        <a href="{{ route('ticket.create') }}">Create ticket</a>
    </button>
</div>
@endsection