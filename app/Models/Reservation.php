<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['client_id', 'room_id', 'check_in', 'check_out', 'total_price', 'status', 'notes'];

    protected $casts = [
        'check_in' => 'date',
        'check_out' => 'date',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}