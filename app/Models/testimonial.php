<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class testimonial extends Model
{
    use HasFactory;

    protected $fillable =[
        'boarding_house_id',
        'photo',
        'name',
        'rating',
    ];
}
