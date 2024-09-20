<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SimpleQrcode;
class Ticket extends Model
{
    use HasFactory;

    protected $table='orgevents';
    protected $primaryKey = 'id'; 
    protected $fillable=[

        'id',
        'event_id', 
        'customer_id', 
        'ticket_number',
        'created_at', 
        'updated_at',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];


    public function generateQRCode()
    {
        $qrCode = \SimpleQrcode::format('png')
            ->size(300)
            ->generate($this->ticket_number);

        // Store or return the QR code image data
        return 'data:image/png;base64,' . base64_encode($qrCode);
    }

}
