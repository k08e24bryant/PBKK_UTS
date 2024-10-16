@extends('layouts.app')

@section('title', 'Edit Note')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Edit Note</h1>

    <form action="{{ route('notes.update', $note->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ $note->title }}" required class="border rounded p-2 w-full">
        </div>
        <div>
            <label for="content">Content</label>
            <textarea name="content" id="content" required class="border rounded p-2 w-full">{{ $note->content }}</textarea>
        </div>
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection
