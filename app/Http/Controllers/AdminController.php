<?php

namespace App\Http\Controllers;
use App\Models\MeetingRoom;


class AdminController extends Controller
{
    public function index()
    {
        // Get all meeting rooms
        $meetingRooms = MeetingRoom::all();

        // Pass them to the view
        return view('admindashboard', compact('meetingRooms'));
    }
}