<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'code',
        'boarding_house_id',
        'room_id',
        'name',
        'email',
        'phone_number',
        'payment_method',
        'payment_status',
        'start_date',
        'duration',
        'total_amount',
        'transaction_date'
    ];

    public function boardinghouse()
    {
        return $this->belongsTo(BoardingHouse::class, 'boarding_house_id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
