@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tickets for {{ $event->title }}</h1>  <!-- Use $event instead of $events -->

    <h3>Available Tickets</h3>

    <ul class="list-group mb-4">
        @foreach ($event->tickets as $ticket)  <!-- Use $ticket for each ticket -->
            <li class="list-group-item">
                Ticket Number: {{ $ticket->id }}
                <span class="badge bg-primary">Price: ${{ $ticket->price }}</span>
            </li>
        @endforeach
    </ul>

    <h3>Purchase Tickets</h3>
    <form action="/checkout" method="POST">
        ® <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="mb-3">
            <label for="ticket_amount" class="form-label">Ticket Amount:</label>
            <input type="number" name="ticket_amount" id="ticket_amount" class="form-control" min="1" required>
        </div>

        <button type="submit" class="btn btn-success">
            Buy Tickets
        </button>
    </form>
</div>
@endsection



{{-- < ">

    ® <input type="hidden" name="_token" value="{{csrf_token()}}">
    <button type="submit">Checkoyt</button>
    
    </form> --}}