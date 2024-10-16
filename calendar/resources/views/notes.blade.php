@extends('layouts.app')

@section('title', 'Notes')

@section('content')
<h1>Notes Page</h1>

<form action="{{ route('notes.store') }}" method="POST">
    @csrf
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" id="title" required>
    </div>
    
    <div>
        <label for="content">Content</label>
        <textarea name="content" id="editor" required></textarea>
    </div>
    
    <button type="submit">Submit</button>
</form>
@endsection
