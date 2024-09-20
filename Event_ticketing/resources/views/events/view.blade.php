@extends('layouts.app')

@section('content')
<div class="container">
    <h1>My Events</h1>

    <!-- Success message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Table to display the events -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Location</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Ticket Price</th>
                <th>Total Tickets</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
            <tr>
                <td>{{ $event->title }}</td>
                <td>{{ $event->description }}</td>
                <td>{{ $event->location }}</td>
                <td>{{ $event->start_time }}</td>
                <td>{{ $event->end_time }}</td>
                <td>{{ $event->ticket_price }}</td>
                <td>{{ $event->total_tickets }}</td>
                <td>
                    <!-- Edit button -->
                    <a href="{{ route('events.edit', $event->id) }}" class="btn btn-primary btn-sm">Edit</a>

                    <!-- Delete form with confirmation -->
                    <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this event?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Link to create a new event -->
    <a href="{{ route('events.create') }}" class="btn btn-success">Create New Event</a>
</div>
@endsection
