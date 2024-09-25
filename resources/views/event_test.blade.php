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
$guest= App\Models\Guest::find(3);
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
    background-size: cover; /* Ensures the image covers the whole background */
    background-color: #f3f4e7; 
    color: black; /* Change this to your preferred text color */
    
    /* font-family: 'Cairo', sans-serif; Use the Google Font */
    /* font-family: 'Noto Nastaliq Urdu', serif; Use the Noto Nastaliq Urdu Font */
    font-family: 'Amiri', serif; /* Use the Amiri Font */

    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
    margin: 0;
    padding: 20px;
    direction: rtl;
}
.container {
    text-align: center;
    width : 500px;
    border-radius: 35px;
    border: 2px solid #333;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    animation: fadeIn 1s;
}

.content-wrapper {
    padding: 20px;
    border-radius: 35px;
}

.image-wrapper {
    background: url('background_gifs/{{$event->GifSelect}}') center/cover;
    /* background: asset('background_gifs/tia_gif.webp'); */

    /* <img class="h-16 w-auto max-w-full" src="{{ asset('background_gifs/tia_gif.webp') }}" alt="da3wah"> */
    border-radius: 35px;
    padding: 20px;
}
.button-wrapper {
    margin-top: 20px;
    
    background-color: transparent; /* Make the button wrapper background transparent */
}


        #countdown {
            font-size: 3em; /* Adjust this value to change the size of the countdown */
            text-align: center;
            align-items: center; /* Vertically center the countdown */
  justify-content: center; /* Horizontally center the countdown */
            
        }
        @keyframes fadeIn { /* Define the fade in animation */
            0% {opacity: 0;}
            100% {opacity: 1;}
        }
        .labels {
            font-size: 1.5em;
            display: flex;
            justify-content: space-between;

            width: 100%;
            margin-bottom: 10px;
        }
        .label-item {
            flex: 1;
            text-align: center;
        }



        h1 {
            font-size: 20px;
    color: #63666A;
    background-color: rgba(255, 255, 255, 0);
    border-radius: 50%;
    backdrop-filter: blur(5px);
    padding: 10px 10px;
    text-align: center;
    display: inline-block;
        }
        /* aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa */

        img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 35px;
            
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
<body >

    <div style="background-color: {{ $event->background_color }};" class="container">
        <div class="content-wrapper">
            <div class="image-wrapper">

    <h1>{{$event->event_description}} {{ $guest->first_name }} {{ $guest->last_name }}</h1>
    <p>You have been invited to {{ $event->event_name }}'s wedding!</p>
    <p>{{ $user->name }}</p>

    @if ($event->image)
    
    <img src="data:image/jpeg;base64,{{ base64_encode($event->event_image) }}" alt="Wedding Image">
    </div>
    @endif


    <div class="button-wrapper">
    <!-- Display the RSVP buttons if the RSVP option is enabled -->
    @if ($event->rsvp)
        <div>
            <button class="button" onclick="rsvp('yes')">Yes</button>
            <button class="button" onclick="rsvp('no')">No</button>
        </div>
    </div>
    @endif


<div>
    <!-- Include the JavaScript file -->
    <script src="{{ asset('js/countdown.js') }}"></script>
@if ($event->countdown)
<!-- Element to display the countdown -->
<div id="countdown-display"></div>

<!-- Include the JavaScript file -->
<script src="{{ asset('js/countdown.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Example date and time in ISO format
        const randomDate = "{{$event->countdown_time}}"; // Replace with your desired date and time
        const input = "{{$event->countdown_option}}"; // Replace with your desired input

        // Call the displayCountdown function with the random date and input
        displayCountdown(input, randomDate);
    });
</script>
</div>
@endif
<div>
<!-- display the map if location is set -->
@if ($event->location)
    <iframe
      
    width="100%"
        height="300"
        frameborder="0" style="border:0"
        src="{{$event->event_location}}" allowfullscreen>
    </iframe>
</div>
@endif
</div>



</body>



{{-- this will be the toggle eddit options that include
1) RSVP
2) map
3) update mssage
4) change background color
5) change font? (plus color and size)
6) change invite image
7) different options for rsvp buttons and the options to change the colors of the bottons
8) add different gif's for card background add uplad gif?
9)  --}}
<body >
    <div>
        <button class="button" onclick="toggleEditOptions()" >Edit</button>
    </div>

    <div id="editOptions" style="display: none; margin-top: 20px;">
        <div style="border: 2px solid #333; padding: 20px; max-width: 900px; margin: 0 auto; background-color: #e7e9d256;">
        <h2>Edit Invitation</h2>
        <form id="editForm" action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="eventImage">Upload New Image:</label>
                <input type="file" id="eventImage" name="eventImage">
            </div>
            <div>
                <label for="rsvpOption">RSVP:</label>
                <input type="checkbox" id="rsvpOption" name="rsvpOption" @if ($event->rsvp) checked @endif>
            </div>
{{-- --------------------- --}}
            <div>
                <label for="description">description:</label>
                <input type="text" id="description" name="description" value="{{  $event->event_description }}">
            </div>
{{-- --------------------------- --}}
            <div>
                <label for="mapOption">Include Map:</label>
                <input type="checkbox" id="mapOption" name="mapOption" @if ($event->location) checked @endif>
            </div>
            <div>
                <label for="countdownOption">CountDown:</label>
                <input type="checkbox" id="countdownOption" name="countdownOption" @if ($event->countdown) checked @endif>
            </div>
            
            <div id="countdownSelectContainer" style="display: none;">
                <label for="countdownSelect">CountdownSelect:</label>
                <select id="countdownSelect" name="countdownSelect">
                    <option value="NoCountdown" @if ($event->countdown_option == '') selected @endif></option>

                    <option value="simple" @if ($event->countdown_option == 'simple') selected @endif>simple</option>
                    <option value="flip" @if ($event->countdown_option == 'flip') selected @endif>flip</option>
                    <option value="fade" @if ($event->countdown_option == 'fade') selected @endif>fade</option>
                    <option value="slide" @if ($event->countdown_option == 'slide') selected @endif>slide</option>
                </select>
            </div>
                {{-- gif select --}}
                <script src="{{ asset('js/showGifPreview.js') }}"></script>
                <div>
                    <label for="Gif">Gif</label>
                    <input type="checkbox" id="Gif" name="Gif" @if ($event->countdown) checked @endif>
                </div>

                   
                        <div id="GifSelectContainer" style="display: none;">
                        <label for="GifSelect">GifSelect:</label>
                        <select id="GifSelect" name="GifSelect" onchange="showGifPreview()">
                            <option value="NoGif" data-gif=""></option>
                            <option value="زهرية رومانسيه.webp" data-gif="background_gifs/زهرية رومانسيه.webp">زهرية رومانسيه</option>
                            <option value="زرقاء ساطعه.webp" data-gif="background_gifs/زرقاء ساطعه.webp">زرقاء ساطعه</option>
                        </select>
                    </div>

                    <div id="gifPreview" style="margin-top: 10px;">
                        <img id="gifImage" src="" alt="Selected GIF" style="max-width: 100px; display: none;" />
                    </div>
                
                {{-- end gif select --}}
            <div>
                <label for="bgColor">Background Color:</label>
                <input type="color" id="bgColor" name="bgColor" value="{{ $event->background_color }}">
            </div>
            <button type="submit" class="button">Save Changes</button>
        </form>
    </div>
    </div>
</body>
</html>

<script>
    function toggleEditOptions() {
        const editOptions = document.getElementById('editOptions');
        editOptions.style.display = editOptions.style.display === 'none' ? 'block' : 'none';
    }
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const countdownCheckbox = document.getElementById('Gif');
        const countdownSelectContainer = document.getElementById('GifSelectContainer');

        // Show or hide the select based on the checkbox state on page load
        countdownSelectContainer.style.display = countdownCheckbox.checked ? 'block' : 'none';

        // Add an event listener to toggle the select visibility
        countdownCheckbox.addEventListener('change', function () {
            countdownSelectContainer.style.display = this.checked ? 'block' : 'none';
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const countdownCheckbox = document.getElementById('countdownOption');
        const countdownSelectContainer = document.getElementById('countdownSelectContainer');

        // Show or hide the select based on the checkbox state on page load
        countdownSelectContainer.style.display = countdownCheckbox.checked ? 'block' : 'none';

        // Add an event listener to toggle the select visibility
        countdownCheckbox.addEventListener('change', function () {
            countdownSelectContainer.style.display = this.checked ? 'block' : 'none';
        });
    });
</script>