<h1>{{ $event->name }}</h1>

@foreach($event->notes as $note)
    <div class="note">
        <h3>{{ $note->title }}</h3>
        <p>{{ $note->content }}</p>
    </div>
@endforeach
