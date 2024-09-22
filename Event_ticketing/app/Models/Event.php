<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $primaryKey = 'id'; 
    protected $table='orgevents';

    protected $fillable=[

        'title',
        'description',
        
        'start_time',
        'end_time',
        'ticket_price',
        'total_tickets',
        'tickets_sold',
        'organizer_id',
     
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
    

}
