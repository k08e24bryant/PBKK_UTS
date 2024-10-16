@extends('layouts.app')

@section('title', 'Notes')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Notes</h1>

    @if (session('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-4">{{ session('success') }}</div>
    @endif

    <button class="bg-blue-500 text-white px-4 py-2 rounded" id="add-note-btn">Add Note</button>

    <div id="add-note-form" style="display:none;">
        <form action="{{ route('notes.store') }}" method="POST">
            @csrf
            <div>
                <label for="title">Title</label>
                <input type="text" name="title" id="title" required class="border rounded p-2 w-full">
            </div>
            <div>
                <label for="content">Content</label>
                <textarea name="content" id="content" required class="border rounded p-2 w-full"></textarea>
            </div>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Submit</button>
        </form>
    </div>

    <hr class="my-4">

    @foreach ($notes as $note)
        <div class="mb-4 border p-4 rounded">
            <h2 class="font-bold">{{ $note->title }}</h2>
            <p>{{ $note->content }}</p>
            <p class="text-gray-500 text-sm">Di edit pada: {{ $note->updated_at->format('d M Y H:i') }}</p>
            <form action="{{ route('notes.destroy', $note->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-500">Delete</button>
            </form>
            <a href="{{ route('notes.edit', $note->id) }}" class="text-blue-500">Edit</a>
        </div>
        <hr class="my-2">
    @endforeach
</div>

<script>
    document.getElementById('add-note-btn').addEventListener('click', function() {
        const form = document.getElementById('add-note-form');
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    });
</script>
@endsection
