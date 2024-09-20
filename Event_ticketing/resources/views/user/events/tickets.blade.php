@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tickets for {{ $event->title }}</h1>
    
    <h3>Available Tickets</h3>
    
        <ul class="list-group mb-4">
            @foreach ($event as $events)
                <li class="list-group-item">
                    Ticket Number: {{ $event->id }} 
                    <span class="badge bg-primary">Price: ${{ $event->price }}</span>
                </li>
            @endforeach
        </ul>
  

    <h3>Purchase Tickets</h3>
    <form id="ticketPurchaseForm">
        <div class="mb-3">
            <label for="ticket_amount" class="form-label">Ticket Amount:</label>
            <input type="number" name="ticket_amount" id="ticket_amount" class="form-control" min="1" required>
        </div>

        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#paymentModal">
            Buy Tickets
        </button>
    </form>
</div>

<!-- Payment Modal -->
<div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <!-- Modal content as before -->
</div>

@section('scripts')
<script>
// JavaScript for handling ticket purchase as before
</script>
@endsection
@endsection
