@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Available Events</h1>

    @if ($events->isEmpty())
        <div class="alert alert-warning">
            No events available at the moment.
        </div>
    @else
        <div class="row">
            @foreach ($events as $event)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">{{ $event->title }}</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ Str::limit($event->description, 100) }}</p>
                            <p class="card-text"><strong>Start Time:</strong> {{ $event->start_time }}</p>
                            <p class="card-text"><strong>End Time:</strong> {{ $event->end_time }}</p>
                            <p class="card-text"><strong>Ticket Price:</strong> ${{ $event->ticket_price }}</p>
                            <p class="card-text"><strong>Total Tickets:</strong> {{ $event->total_tickets }}</p>
                            <p class="card-text"><strong>Tickets Sold:</strong> {{ $event->tickets_sold }}</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('user.events.tickets', $event->id) }}" class="btn btn-primary">View Tickets</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
