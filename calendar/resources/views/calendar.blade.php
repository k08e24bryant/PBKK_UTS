@extends('layouts.app')

@section('title', 'Calendar')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Calendar</h1>

    <div id="calendar"></div>

    <!-- Container untuk kategori dan konfirmasi -->
    <div id="category-container">
        <label>Pilih kategori untuk agenda kamu:</label>
        <select id="category-select">
            <option value="Tugas">Tugas</option>
            <option value="Rapat">Rapat</option>
            <option value="Kelas">Kelas</option>
            <option value="Lainnya">Lainnya</option>
        </select>
        <button id="submit-category">Konfirmasi</button>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var categoryContainer = document.getElementById('category-container');
    var categorySelect = document.getElementById('category-select');
    var submitCategoryButton = document.getElementById('submit-category');
    var selectedEventInfo = {};

    // Mapping kategori ke warna
    var categoryColors = {
        'Tugas': 'blue',
        'Rapat': 'yellow',
        'Kelas': 'gray',
        'Lainnya': 'beige'
    };

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',  // Default ke tampilan bulan
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'  // Opsi tampilan
        },
        editable: true,
        selectable: true,
        selectHelper: true,
        events: '/events',  // Ambil event dari server

        // Saat memilih slot waktu untuk menambah event
        select: function(info) {
            var eventName = prompt('Masukkan nama agenda:');
            var eventDescription = prompt('Masukkan deskripsi agenda:');

            if (eventName && eventDescription) {
                selectedEventInfo = {
                    name: eventName,
                    description: eventDescription,
                    start_time: info.startStr,
                    end_time: info.endStr
                };

                categoryContainer.style.display = 'flex';  // Tampilkan form kategori
            }
        },

        // Event untuk menghapus agenda
        eventClick: function(info) {
            if (confirm('Apakah kamu yakin ingin menghapus agenda ini?')) {
                $.ajax({
                    url: '/events/' + info.event.id,
                    type: 'DELETE',
                    data: { _token: '{{ csrf_token() }}' },
                    success: function() {
                        info.event.remove();  // Hapus langsung dari UI kalender
                        alert('Agenda berhasil dihapus');
                    },
                    error: function() {
                        alert('Terjadi kesalahan saat menghapus agenda');
                    }
                });
            }
        }
    });

    // Konfirmasi kategori setelah memilih event
submitCategoryButton.addEventListener('click', function () {
    var selectedCategory = categorySelect.value;

    if (!selectedCategory) {
        alert('Pilih kategori terlebih dahulu');
        return;
    }

    var eventColor = categoryColors[selectedCategory];

    console.log({
        name: selectedEventInfo.name,
        description: selectedEventInfo.description,
        start_time: selectedEventInfo.start_time,
        end_time: selectedEventInfo.end_time,
        category: selectedCategory,
        color: eventColor
    });

    $.ajax({
        url: '/events',
        type: 'POST',
        data: {
            name: selectedEventInfo.name,
            description: selectedEventInfo.description,
            start_time: selectedEventInfo.start_time,
            end_time: selectedEventInfo.end_time,
            category: selectedCategory,
            color: eventColor,
            _token: '{{ csrf_token() }}'
        },
        success: function (response) {
            console.log('Response:', response);
            calendar.addEvent({
                id: response.id,
                title: selectedEventInfo.name,
                start: selectedEventInfo.start_time,
                end: selectedEventInfo.end_time,
                backgroundColor: eventColor
            });

            alert('Agenda berhasil ditambahkan');
        },
        error: function (xhr) {
            console.log('Error:', xhr.responseText);
            alert('Terjadi kesalahan saat menambahkan agenda');
        }
    });

    categoryContainer.style.display = 'none'; // Sembunyikan form kategori
    categorySelect.value = ''; // Reset kategori
});

    

    calendar.render();
});
</script>

<style>
    #category-container {
        width: 100%;
        padding: 15px;
        position: fixed;
        bottom: 0;
        left: 0;
        background-color: #f9f9f9;
        box-shadow: 0 -2px 8px rgba(0, 0, 0, 0.1);
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        display: none;
    }

    select {
        padding: 5px;
    }

    button {
        padding: 5px 10px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    button:hover {
        background-color: #0056b3;
    }
</style>
@endsection
