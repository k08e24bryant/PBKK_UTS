<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        // Ambil semua catatan untuk ditampilkan di /notes
        $notes = Note::all();
        return view('notes', compact('notes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Simpan catatan ke database
        Note::create($validated);

        return redirect()->route('notes.index')->with('success', 'Note has been added!');
    }

    public function edit($id)
    {
        $note = Note::findOrFail($id);
        return view('edit-note', compact('note'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $note = Note::findOrFail($id);
        $note->update($validated);

        return redirect()->route('notes.index')->with('success', 'Note has been updated!');
    }

    public function destroy($id)
    {
        $note = Note::findOrFail($id);
        $note->delete();

        return redirect()->route('notes.index')->with('success', 'Note has been deleted!');
    }

    public function recent()
    {
        // Ambil catatan terakhir dalam 7 hari
        $recentNotes = Note::where('updated_at', '>=', now()->subDays(7))->get();
        return view('home', compact('recentNotes'));
    }
}
