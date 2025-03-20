<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class bonus extends Model
{
    use HasFactory;

    protected $fillable =[
        'boarding_house_id',
        'image',
        'name',
        'description',
    ];

    public function boardinghouse()
    {
        return $this->belongsTo(Boardinghouse::class);
    }
    
}


