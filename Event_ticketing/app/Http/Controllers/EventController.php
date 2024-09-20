<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Event; // Ensure Event model exists
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Show the form for creating a new event.
     *
     * @return \Illuminate\View\View
     */

     public function index()
     {
         // Get the events organized by the logged-in user (event organizer)
         $events = Event::where('organizer_id', Auth::id())->get();
     
         // Return the view with events
         return view('events.index', compact('events'));
     }
     

  
  
     public function update(Request $request, $id)
    {
    // Validate form data
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
       
        'start_time' => 'required|date',
        'end_time' => 'required|date|after:start_time',
        'ticket_price' => 'required|numeric',
        'total_tickets' => 'required|integer',
    ]);

    // Find and update the event
    $event = Event::findOrFail($id);
    $event->update($request->all());

    return redirect()->route('events.index')->with('success', 'Event updated successfully!');
    }
     



    public function destroy($id)
    {
        // Find the event by ID
        $event = Event::findOrFail($id);
    
        // Check if the logged-in user is the organizer of the event
        if (Auth::id() != $event->organizer_id) {
            return redirect()->route('events.index')->with('error', 'Unauthorized action.');
        }
    
        // Delete the event
        $event->delete();
    
        return redirect()->route('events.index')->with('success', 'Event deleted successfully!');
    }


    public function edit($id)
    {
        // Find the event by its ID
        $event = Event::findOrFail($id);

        // Return the edit view with the event data
        return view('events.edit', compact('event'));
    }




    public function viewTickets($event_id)
{
    // Retrieve the event by ID (assuming 'id' is the primary key)
    $event = Event::findOrFail($event_id);

    // Ensure the logged-in organizer owns this event
    if (Auth::id() !== $event->organizer_id) {
        return redirect()->route('events.index')->with('error', 'You are not authorized to view ticket sales for this event.');
    }

    // Fetch tickets associated with the event
    $tickets = $event->tickets; // Assuming the Event model has a relationship with a Ticket model

    return view('events.tickets', compact('event', 'tickets'));
}

    


    public function create()
    {
        return view('events.create');  // This view will contain the event creation form
    }



// In your TicketController or wherever you handle ticket creation



    /**
     * Store a newly created event in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
       // dd($request->all());
      
      
        // Validate the form data based on the event table structure
      
      
      
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            //'location'=>'required|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'ticket_price' => 'required|numeric',
            'total_tickets' => 'required|integer',
            'organizer_id'=>'required|integer',
        ]);

        // Create the event
        Event::create([
            'title' => $request->title,
            'description' => $request->description,
           // 'location'=> $request->location,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'ticket_price' => $request->ticket_price,
            'total_tickets' => $request->total_tickets,
            'tickets_sold' => 0, // Initially, no tickets are sold
            'organizer_id' => Auth::id(),  // Associate the event with the logged-in organizer
        ]);

        // Redirect back with a success message
        return redirect()->route('events.create')->with('success', 'Event created successfully!');
    }
}
