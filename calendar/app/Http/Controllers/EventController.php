<?php

namespace App\Http\Controllers;
use App\Models\Note;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function dashboard()
    {
    // Hapus agenda yang sudah lewat
    Event::where('end_time', '<', now())->delete();

    // Ambil semua event dan urutkan berdasarkan tanggal
    $events = Event::orderBy('start_time')->get();

    // Ambil catatan yang diupdate dalam 7 hari terakhir
    $recentNotes = Note::where('updated_at', '>=', now()->subDays(7))->get();

    // Kirim data ke view
    return view('home', compact('events', 'recentNotes'));
    }

    public function addNote(Request $request, $id)
    {
    $event = Event::findOrFail($id);

    // Hitung jumlah catatan yang ada untuk event ini (untuk menambah index catatan)
    $noteCount = $event->notes()->count();

    // Buat catatan baru dengan judul "Catatan <nama agenda> <i>"
    $note = new Note([
        'title' => 'Catatan ' . $event->name . ' ' . ($noteCount + 1),
        'content' => $request->input('content'),
        'event_id' => $event->id
    ]);

    $note->save();

    return response()->json(['success' => 'Catatan berhasil ditambahkan']);
    }



    public function store(Request $request)
{
    Log::info('Request Data:', $request->all());

    // Validasi data, termasuk pengecekan apakah waktu mulai di masa lalu
    $request->validate([
        'name' => 'required|string|max:255',
        'start_time' => 'required|date|after_or_equal:now',  // Cegah event di masa lalu
        'end_time' => 'required|date|after_or_equal:start_time',
        'category' => 'required|string',
        'color' => 'required|string',
        'description' => 'nullable|string'
    ]);

    // Buat event jika validasi berhasil
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
