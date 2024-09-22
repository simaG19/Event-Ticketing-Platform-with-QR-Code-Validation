<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\Ticket;
class StripeController extends Controller
{
    //
    public function index()
    {
        return view('user.events.tickets');
    }
    public function checkout()
    {
        // Fetch the secret key from the config/stripe.php file
        \Stripe\Stripe::setApiKey(config('stripe.sk'));  
    
        $session = \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'gbp',
                        'product_data' => [
                            'name' => 'Send me money',
                        ],
                        'unit_amount' => 500,
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('success'),
            'cancel_url' => route('index'),
        ]);
    
        return redirect()->away($session->url);
    }
    

    public function success()
    {
        return view('user.events.tickets');
   
    }

}
