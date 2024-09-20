@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Your Events</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Tickets Sold</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
            <tr>
                <td>{{ $event->title }}</td>
                <td>{{ $event->description }}</td>
                <td>{{ $event->start_time }}</td>
                <td>{{ $event->end_time }}</td>
                <td>{{ $event->tickets_sold }} / {{ $event->total_tickets }}</td>
                <td>
                    <!-- Button to View Ticket Sales -->
                    <a href="{{ route('events.tickets', $event->id) }}" class="btn btn-info">View Ticket Sales</a>

                    <!-- Button to Edit Event -->
                    <a href="{{ route('events.edit', $event->id) }}" class="btn btn-primary">Edit</a>

                    <!-- Button to Delete Event -->
                    <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this event?');">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
