@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ticket Sales for Event: {{ $event->title }}</h1>

    @if($tickets->isEmpty())
        <p>No tickets sold yet for this event.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Ticket Number</th>
                    <th>Customer</th>
                    <th>Purchase Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tickets as $ticket)
                    <tr>
                        <td>{{ $ticket->ticket_number }}</td>
                        <td>{{ $ticket->customer->name }}</td>
                        <td>{{ $ticket->created_at->format('Y-m-d H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
