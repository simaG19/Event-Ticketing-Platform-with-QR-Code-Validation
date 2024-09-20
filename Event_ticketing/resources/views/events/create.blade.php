@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create New Event</h1>
    
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
    <form action="{{ route('events.store') }}" method="POST">

        @csrf
        <div class="form-group">
            <label for="title">Event Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
    
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>

        {{-- <div class="form-group">
            <label for="location">Location</label>
            <input type="text" name="location" id="location" class="form-control" required>
        </div> --}}

        <div class="form-group">
            <label for="start_time">Start Time</label>
            <input type="datetime-local" name="start_time" id="start_time" class="form-control" required>
        </div>
    
        <div class="form-group">
            <label for="end_time">End Time</label>
            <input type="datetime-local" name="end_time" id="end_time" class="form-control" required>
        </div>
    
        <div class="form-group">
            <label for="ticket_price">Ticket Price</label>
            <input type="number" step="0.01" name="ticket_price" id="ticket_price" class="form-control" required>
        </div>
    
        <div class="form-group">
            <label for="total_tickets">Total Tickets</label>
            <input type="number" name="total_tickets" id="total_tickets" class="form-control" required>
        </div>
    
        <div class="form-group">
            <label for="organizer_id">Organizer ID</label>
            <input type="number" name="organizer_id" id="organizer_id" class="form-control" required>
        </div>
    </br>
        <button type="submit" class="btn btn-primary">Creeeeeate Event</button>
    </form>
    
</div>
@endsection
