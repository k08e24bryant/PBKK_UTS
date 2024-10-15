<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function dashboard()
    {
        // Ambil semua event dan urutkan berdasarkan tanggal
        $events = Event::orderBy('start_time')->get();

        return view('home', compact('events'));
    }

    public function store(Request $request)
{
    Log::info('Request Data:', $request->all());

    $request->validate([
        'name' => 'required|string|max:255',
        'start_time' => 'required|date',
        'end_time' => 'required|date|after_or_equal:start_time',
        'category' => 'required|string',
        'color' => 'required|string',
        'description' => 'nullable|string'
    ]);

    $event = Event::create([
        'name' => $request->name,
        'start_time' => $request->start_time,
        'end_time' => $request->end_time,
        'category' => $request->category,
        'color' => $request->color,
        'description' => $request->description
    ]);

    if ($event) {
        Log::info('Event Created Successfully:', $event->toArray());
        return response()->json(['success' => 'Event created successfully']);
    } else {
        Log::error('Failed to Create Event');
        return response()->json(['error' => 'Failed to create event'], 500);
    }
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

        $eventsArray = $events->map(function ($event) {
            return [
                'id' => $event->id,
                'title' => $event->name,
                'start' => $event->start_time,
                'end' => $event->end_time,
                'backgroundColor' => $event->color,
            ];
        });

        return response()->json($eventsArray);
    }
}
