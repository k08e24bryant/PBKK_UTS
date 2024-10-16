<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Calendar App')</title>

    <!-- FullCalendar CSS -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css" rel="stylesheet">

    <!-- FullCalendar JS -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>

    <!-- jQuery for AJAX -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="{{ asset('js/app.js') }}"></script>


    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #007bff;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
            font-weight: bold;
        }

        .navbar a:hover {
            text-decoration: underline;
        }

        #calendar {
            max-width: 100%;
            margin: 20px auto;
            padding: 10px;
        }

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
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="navbar-left">
            <a href="/">Home</a>
            <a href="/calendar">Calendar</a>
            <a href="/notes">Notes</a>
        </div>
    </div>

    <!-- Content Section -->
    <div class="content">
        @yield('content')
    </div>
</body>
</html>
