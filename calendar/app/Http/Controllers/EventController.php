<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; 

class EventController extends Controller
{

    public function store(Request $request)
    {
        Log::info('Request Data:', $request->all()); 
        
        $request->validate([
            'name' => 'required|string|max:255',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after_or_equal:start_time',
            'color' => 'required|string',
        ]);

        Event::create([
            'name' => $request->name,
            'description' => $request->description,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'color' => $request->color,
        ]);

        return response()->json(['success' => 'Event created successfully']);
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return response()->json(['success' => 'Event deleted successfully']);
    }

    public function index()
    {
        $events = Event::all();

        $eventsArray = [];

        foreach ($events as $event) {
            $eventsArray[] = [
                'id' => $event->id,
                'title' => $event->name,
                'start' => $event->start_time,
                'end' => $event->end_time,
                'backgroundColor' => $event->color,
            ];
        }

        return response()->json($eventsArray);
    }
}
