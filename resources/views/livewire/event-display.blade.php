<div>
    

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
    min-height: 100vh;
    flex-wrap: wrap; /* Allow wrapping if the content exceeds the page height */

 }
 .container {
    text-align: center;
    width : 500px;
    min-height: 100vh; /* Make sure the container takes up the full viewport height */
    overflow: auto; /* Ensure scrolling is allowed if the content overflows */

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
</div>
</div>









