@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Event</h1>
    
    <!-- Display validation errors if any -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form to edit the event -->
    <form action="{{ route('events.update', $event->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Event Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $event->title) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required>{{ old('description', $event->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="start_time">Start Time</label>
            <input type="datetime-local" name="start_time" id="start_time" class="form-control"  value="{{ old('start_time', $event->start_time ? $event->start_time->format('Y-m-d\TH:i') : '') }}" required>
       </div>

        <div class="form-group">
            <label for="end_time">End Time</label>
            <input type="datetime-local" name="end_time" id="end_time" class="form-control" value="{{ old('end_time', $event->end_time ? $event->end_time->format('Y-m-d\TH:i') : '') }}" required>
        </div>

        <div class="form-group">
            <label for="ticket_price">Ticket Price</label>
            <input type="number" step="0.01" name="ticket_price" id="ticket_price" class="form-control" value="{{ old('ticket_price', $event->ticket_price) }}" required>
        </div>

        <div class="form-group">
            <label for="total_tickets">Total Tickets</label>
            <input type="number" name="total_tickets" id="total_tickets" class="form-control" value="{{ old('total_tickets', $event->total_tickets) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Event</button>
        <a href="{{ route('events.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
