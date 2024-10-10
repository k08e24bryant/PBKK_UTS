<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar</title>

    
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css" rel="stylesheet">

    
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>

    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        #calendar {
            max-width: 100%;
            margin: 0 auto;
            padding: 10px;
        }

        
        .fc {
            max-width: 100%;
        }

        
        #color-picker-container {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #f9f9f9;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            display: none; 
        }

        #color-picker-container label {
            display: block;
            margin-bottom: 5px;
        }

        #color-picker-container input[type="color"] {
            width: 100px;
            height: 50px;
        }

    </style>
</head>
<body>
    <div id="calendar"></div>

    
    <div id="color-picker-container">
        <label>Pilih warna untuk agenda kamu:</label>
        <input type="color" id="color-picker">
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var colorPickerContainer = document.getElementById('color-picker-container');
        var colorPicker = document.getElementById('color-picker');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            editable: true,
            selectable: true,
            selectHelper: true,

           
            events: '/events',

            
            select: function(info) {
                var eventName = prompt('masukkan nama agenda:');

                if (eventName) {
                    
                    colorPickerContainer.style.display = 'block';

                    
                    colorPicker.addEventListener('change', function() {
                        $.ajax({
                            url: '/events',
                            type: 'POST',
                            data: {
                                name: eventName,
                                start_time: info.startStr,
                                end_time: info.endStr,
                                color: colorPicker.value,  
                                _token: '{{ csrf_token() }}'
                            },
                            success: function() {
                                calendar.refetchEvents();
                                alert('agenda berhasil ditambahkan');
                            },
                            error: function() {
                                alert('terjadi kesalahan saat menambahkan agenda');
                            }
                        });

                    
                        colorPickerContainer.style.display = 'none';
                    });
                }
            },

          
            eventClick: function(info) {
                if (confirm('kamu mau menghapus agenda ini?')) {
                    $.ajax({
                        url: '/events/' + info.event.id,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function() {
                            calendar.refetchEvents();
                            alert('agenda berhasil dihapus');
                        },
                        error: function() {
                            alert('terjadi kesalahan saat menghapus agenda');
                        }
                    });
                }
            }
        });

        calendar.render();
    });
</script>

</body>
</html>
