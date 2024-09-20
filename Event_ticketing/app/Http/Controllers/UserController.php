<?php
namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        // Retrieve all events
        $events = Event::all(); // or use pagination if needed

        return view('user.events.index', compact('events'));
    }

    public function viewTickets($eventId)
    {
        $event = Event::findOrFail($eventId);
        $tickets = Ticket::where('event_id', $eventId)->get();
    
        return view('user.events.tickets', compact('event', 'tickets'));
    }
    

    
}
