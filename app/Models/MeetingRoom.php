<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetingRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_name',
        'capacity',
        'status',
        'room_code',
    ];

     // Define the relationship to Equipment
     public function equipment()
     {
         return $this->hasMany(Equipment::class, 'meeting_room_id'); // Use the correct foreign key ('meeting_room_id')
     }
}