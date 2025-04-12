<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBooking extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'room_id',
        'start_time',
        'end_time',
        'participant',
        'agenda',
        'status'
    ];
}