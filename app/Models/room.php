<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class room extends Model
{
    use HasFactory;

    protected $fillable =[
        'boarding_house_id',
        'name',
        'roomtype',
        'square_feet',
        'price_per_month',
        'is_available',
    ];

    public function boardinghouse()
    {
        return $this->belongsTo(Boardinghouse::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function images()
    {
        return $this->hasMany(RoomImage::class);
    }

}
