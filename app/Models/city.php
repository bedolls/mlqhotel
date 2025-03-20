<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    use HasFactory;

    protected $fillable =[
        'image',
        'name',
        'slug'
    ];

    public function boardinghouses()
    {
        return $this->hasMany(Boardinghouse::class);
    }
}
