@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Upcoming Events</h1>

    @if($events->isEmpty())
        <p class="text-gray-600">Tidak ada event yang akan datang.</p>
    @else
        <div class="grid grid-cols-1 gap-6">
            @foreach($events as $event)
            <div class="bg-white shadow-lg rounded-lg p-6">
                <div class="flex items-center mb-4">
                    <span class="inline-block w-4 h-4 rounded-full mr-2"
                          style="background-color: {{ $event->color ?? '#000000' }};"></span>
                    <h2 class="text-xl font-semibold text-gray-700">{{ $event->name }}</h2>
                </div>

                <p class="text-gray-600">
                    <span class="font-semibold">Tanggal:</span> 
                    @if(\Carbon\Carbon::parse($event->start_time)->isSameDay($event->end_time))
                        {{ \Carbon\Carbon::parse($event->start_time)->format('d M Y') }}
                        ({{ \Carbon\Carbon::parse($event->start_time)->format('h:i A') }} - 
                        {{ \Carbon\Carbon::parse($event->end_time)->format('h:i A') }})
                    @else
                        {{ \Carbon\Carbon::parse($event->start_time)->format('d M Y, h:i A') }} - 
                        {{ \Carbon\Carbon::parse($event->end_time)->format('d M Y, h:i A') }}
                    @endif
                </p>

                <p class="text-gray-600">
                    <span class="font-semibold">Deskripsi:</span> 
                    {{ $event->description ?? 'Tidak ada deskripsi' }}
                </p>

                <div class="flex items-center">
    <span class="inline-block w-3 h-3 rounded-full mr-2"
          style="background-color: {{ $event->color ?? '#000000' }};"></span>
    <span class="text-sm font-semibold text-gray-700">
        Kategori: {{ ucfirst($event->category) }}
    </span>
</div>


            </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
