<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'equipment_name',
        'quantity',
        'meeting_room_id',
        'status',
    ];

    // 🔽 Add this method below to link equipment to the room
       // Define the relationship to the MeetingRoom
       public function meetingRoom()
       {
           return $this->belongsTo(MeetingRoom::class, 'meeting_room_id'); // Foreign key in Equipment model for MeetingRoom
       }
}
