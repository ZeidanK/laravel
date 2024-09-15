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
$guest= App\Models\Guest::find(2);
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

    @if ($event->rsvp)
        <div>
            <button class="button" onclick="rsvp('yes')">Yes</button>
            <button class="button" onclick="rsvp('no')">No</button>
        </div>
    @endif
    @if ($event->countdown)
    {{-- <script src="{{ asset('js/countdown.js') }}" defer></script> --}}

    <div id="countdown">

        <div id="hello-world-display"></div>
        <div id="countdown-display"></div>

    <!-- Include the JavaScript file -->
    <script src="{{ asset('js/countdown.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Call the printHelloWorld function with an integer input
            printHelloWorld(42); // Replace 42 with any integer you want to pass
        });
    </script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Call the printHelloWorld function with an integer input
        displayCountdown(42,{{$event->countdown_time}}); // Replace 42 with any integer you want to pass
    });
</script>
    </div>
    @endif

     <!-- Pass data to JavaScript -->
     <script>
        window.eventData = {
            countdownOption: "simple",
            eventDate: "30:12:2024",
            eventTime: "00:00:00"
        };
    </script>

    <!-- Include the JavaScript file -->
    <script src="{{ asset('js/countdown.js') }}"></script>

<!-- Element to display the countdown -->
<div id="countdown-display"></div>

<!-- Include the JavaScript file -->
<script src="{{ asset('js/countdown.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Example date and time in ISO format
        const randomDate = "{{$event->countdown_time}}"; // Replace with your desired date and time
        const input = "Event"; // Replace with your desired input

        // Call the displayCountdown function with the random date and input
        displayCountdown(input, randomDate);
    });
</script>





</body>
<?php echo "$event->event_date"; ?>


{{-- this will be the toggle eddit options that include
1) RSVP
2) map
3) update mssage
4) change background color
5) change font?
6) change invite image
7) different options for rsvp buttons and the options to change the colors of the bottons
8)  --}}
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
                <label for="countdownOption">CountDown:</label>
                <input type="checkbox" id="countdonwOption" name="countdownOption" checked>
            </div>
            <div>
                <label for="bgColor">Background Color:</label>
                <input type="color" id="bgColor" name="bgColor" value="{{ $event->background_color }}">
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
