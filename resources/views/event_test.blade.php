<!DOCTYPE html>
<head>
    <title>Event Test</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
<?php
use App\Models\Guest;
use App\Models\Event;

$guest = App\Models\Guest::createTestGuest();
$guest->event = App\Models\Event::createTestEvent();
//$event = App\Models\Event::createTestEvent();
$event = App\Models\Event::find(1);
$user = App\Models\User::find($event->user_id);
$guest= App\Models\Guest::find(1);
?>




<!--
// v0 by Vercel.
// https://v0.dev/t/4YUHLt60EPc
-->

<!--
// v0 by Vercel.
// https://v0.dev/t/wzAwOoss31m
-->


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wedding Invitation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }
        h1 {
            color: #333;
        }
        img {
            max-width: 100%;
            height: auto;
            margin: 20px 0;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            outline: none;
            color: #fff;
            background-color: #4CAF50;
            border: none;
            border-radius: 15px;
            box-shadow: 0 9px #999;
        }
        .button:hover {background-color: #3e8e41}
        .button:active {
            background-color: #3e8e41;
            box-shadow: 0 5px #666;
            transform: translateY(4px);
        }
        #countdown {
            font-size: 24px;
            margin-top: 20px;
        }
    </style>
</head>
<body style="background-color: {{ $event->background_color }};">
    <h1>Hello {{ $guest->first_name }} {{ $guest->last_name }}</h1>
    <p>You have been invited to {{ $event->event_name }}'s wedding!</p>
    <p>{{ $user->name }}</p>
    <img src="data:image/jpeg;base64,{{ base64_encode($event->event_image) }}" alt="Wedding Image">

    <div>
        <button class="button" onclick="rsvp('yes')">Yes</button>
        <button class="button" onclick="rsvp('no')">No</button>
    </div>

    <div id="countdown"></div>
</body>
<?php echo "$event->event_date"; ?>
     <!-- Include the JavaScript file -->
     {{-- <script src="{{ asset('js/event.js') }}"></script> --}}


    <script>
        // Set the guest name and couple name
        document.getElementById('guestName').textContent = 'John';
        document.getElementById('coupleName').textContent = 'Alice and Bob\'s';

        // RSVP function
        function rsvp(response) {
            alert('You have responded: ' + response);
        }

        // Countdown timer
        const weddingDate = new Date('2023-12-31T00:00:00').getTime();

        const timer = setInterval(function() {
            const now = new Date().getTime();
            const distance = weddingDate - now;

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById('countdown').innerHTML = `Wedding in: ${days}d ${hours}h ${minutes}m ${seconds}s`;

            if (distance < 0) {
                clearInterval(timer);
                document.getElementById('countdown').innerHTML = 'The wedding has started!';
            }
        }, 1000);
    </script>

<body>
    <div>
        <button class="button" onclick="toggleEditOptions()">Edit</button>
    </div>

    <div id="editOptions" style="display: none; margin-top: 20px;">
        <h2>Edit Invitation</h2>
        <form id="editForm" action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="eventImage">Upload New Image:</label>
                <input type="file" id="eventImage" name="eventImage">
            </div>
            <div>
                <label for="rsvpOption">RSVP:</label>
                <input type="checkbox" id="rsvpOption" name="rsvpOption" checked>
            </div>
            <div>
                <label for="mapOption">Include Map:</label>
                <input type="checkbox" id="mapOption" name="mapOption">
            </div>
            <div>
                <label for="bgColor">Background Color:</label>
                <input type="color" id="bgColor" name="bgColor" value="#ffffff">
            </div>
            <button type="submit" class="button">Save Changes</button>
        </form>
    </div>
</body>
</html>

<script>
    function toggleEditOptions() {
        const editOptions = document.getElementById('editOptions');
        editOptions.style.display = editOptions.style.display === 'none' ? 'block' : 'none';
    }
</script>
