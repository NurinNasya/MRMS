<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//for dashboard user booking 
class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        //'user_id',
        'meeting_room_id',
        'start_time',
        'end_time',
        'status',
        'participant',
        'meeting_agenda',
    ];

    public function meetingRoom()
    {
        return $this->belongsTo(MeetingRoom::class);
    }
}
