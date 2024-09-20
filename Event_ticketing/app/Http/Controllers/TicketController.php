<?php

namespace App\Http\Controllers;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    //

    public function store(Request $request)
{
    // Validate and create the ticket
    $ticket = Ticket::create([
        'event_id' => $request->event_id,
        'customer_id' => $request->customer_id,
        'ticket_number' => uniqid('ticket_'), // Example ticket number
    ]);

    // Generate QR code for the ticket
    $qrCodeData = $ticket->generateQRCode();

    // You can now pass this QR code data to your view or store it as needed

    return redirect()->route('tickets.index')->with('qr_code', $qrCodeData);
}


}
