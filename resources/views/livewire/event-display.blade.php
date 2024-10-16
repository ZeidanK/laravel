<div>
    <div class="event-display">
        <h3>Event {{ $eventId }}</h3>
        <p>This is the display for Event {{ $eventId }}.</p>
    </div>
    

    <head>
    <meta charset="UTF-8">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> --}}
    <title>Wedding Invitation</title>
    <link rel="stylesheet" href="{{ asset('css/event.css') }}">
    </head>

    {{-- <style>
        .event-display-container {
            background-color: #f3f4e7;
            color: black;
            font-family: 'Amiri', serif;
            display: flex;
            flex-direction: column; /* Stack child elements vertically */
            justify-content: center;
            height: 100%;
            margin: 0;
            padding: 20px;
            direction: rtl;
            min-height: 100vh;
            flex-wrap: wrap;
        }

        .event-display-container .container {
            text-align: center;
            width: 500px;
            min-height: 100vh;
            overflow: auto;
            border-radius: 35px;
            border: 2px solid #333;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1s;
        }

        .event-display-container .content-wrapper {
            padding: 20px;
            border-radius: 35px;
        }

        .event-display-container .image-wrapper {
            background: url('background_gifs/{{$event->GifSelect}}') center/cover;
            border-radius: 35px;
            padding: 20px;
        }

        .event-display-container .button-wrapper {
            margin-top: 20px;
            background-color: transparent;
        }

        .event-display-container #countdown {
            font-size: 3em;
            text-align: center;
        }

        .event-display-container @keyframes fadeIn {
            0% {opacity: 0;}
            100% {opacity: 1;}
        }

        .event-display-container .labels {
            font-size: 1.5em;
            display: flex;
            justify-content: space-between;
            width: 100%;
            margin-bottom: 10px;
        }

        .event-display-container .label-item {
            flex: 1;
            text-align: center;
        }

        .event-display-container h1 {
            font-size: 20px;
            color: #63666A;
            background-color: rgba(255, 255, 255, 0);
            border-radius: 50%;
            backdrop-filter: blur(5px);
            padding: 10px 10px;
            text-align: center;
            display: inline-block;
        }

        .event-display-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 35px;
        }

        .event-display-container .button {
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

        .event-display-container .button:hover {
            background-color: #3e8e41;
        }

        .event-display-container .button:active {
            background-color: #3e8e41;
            box-shadow: 0 5px #666;
            transform: translateY(4px);
        }

        .event-display-container #countdown {
            font-size: 24px;
            margin-top: 20px;
        }
    </style> --}}
<div class="event-display-container" style="background-color: {{ $event->background_color }};">
    <div class="event-display-content">
        <div class="event-display-image-wrapper" style="background: url('{{ $event->Gif ? asset('background_gifs/' . $event->GifSelect) : '' }}') center/cover; padding: 0 20px 20px 20px;">
            <h1>{{$event->event_description}} {{ $guest->first_name }} {{ $guest->last_name }}</h1>
            <p>You have been invited to {{ $event->event_name }}'s wedding!</p>
            <p>{{ $user->name }}</p>

            @if ($event->image)
            <img src="data:image/jpeg;base64,{{ base64_encode($event->event_image) }}" alt="Wedding Image">
            @endif
        </div>

        <div class="event-display-button-wrapper">
            <!-- Display the RSVP buttons if the RSVP option is enabled -->
            @if ($event->rsvp)
                <div>
                    <button class="event-display-button" onclick="rsvp('yes')">Yes</button>
                    <button class="event-display-button" onclick="rsvp('no')">No</button>
                </div>
            @endif
        </div>
<div id="countdown-display-{{$event->id}}" class="event-display-countdown"></div>
        <div>
            <!-- Include the JavaScript file -->
            {{-- <script src="{{ asset('js/countdown.js') }}"></script> --}}
            @if ($event->countdown)
                <!-- Element to display the countdown -->


                <!-- Include the JavaScript file -->
                {{-- <script src="{{ asset('js/countdown.js') }}"></script> --}}
                <script>

                    document.addEventListener('DOMContentLoaded', function() {
                        // Example date and time in ISO format
                        const randomDate = "{{$event->countdown_time}}"; // Replace with your desired date and time
                        const input = "{{$event->countdown_option}}"; // Replace with your desired input
console.log('randomDate', randomDate);
                        // Call the displayCountdown function with the random date and input
                        displayCountdown(input, randomDate,'countdown-display-{{$event->id}}');
                        const elementId = 'countdown-display-{{$event->id}}';

                        setInterval(() => {
                    displayCountdown(input, randomDate, elementId);
                }, 1000);
                    });

                    function attachLivewireListeners() {
                if (window.Livewire) {
                    window.Livewire.on('eventSwitched', (eventId, countdownTime, countdownOption) => {
                        console.log('eventSwitched triggered');
                        console.log('eventId:', eventId);
                        console.log('countdownTime:', countdownTime);
                        console.log('countdownOption:', countdownOption);

                        const countdownDisplay = document.getElementById('countdown-display-' + eventId);
                        console.log('countdownDisplay:', countdownDisplay);

                        if (countdownDisplay) {
                            displayCountdown(countdownOption, countdownTime, 'countdown-display-' + eventId);
                            console.log('displayCountdown called');
                        } else {
                            console.log('countdownDisplay not found');
                        }
                    });
                } else {
                    console.error('Livewire is not loaded');
                }
            }

            // Polling mechanism to ensure Livewire is loaded
            const livewireCheckInterval = setInterval(() => {
                if (window.Livewire) {
                    clearInterval(livewireCheckInterval);
                    attachLivewireListeners();
                }
            }, 100);



// window.addEventListener('load', function () {
//             if (window.Livewire) {
//                 window.Livewire.on('applyStyles', () => {
//                     const countdownDisplay = document.getElementById('countdown-display-{{ $event->id }}');
//                     console.log('applyStyles triggered');
//                     if (countdownDisplay) {
//                         const randomDate = @json($event->countdown_time);
//                         const input = @json($event->countdown_option);
//                         displayCountdown(input, randomDate, 'countdown-display-{{ $event->id }}');
//                     }
//                 });

//                 window.Livewire.on('eventSwitched', (eventId, countdownTime, countdownOption) => {
//                     console.log('eventSwitched triggered');
//                     console.log('eventId:', eventId);
//                     console.log('countdownTime:', countdownTime);
//                     console.log('countdownOption:', countdownOption);

//                     const countdownDisplay = document.getElementById('countdown-display-' + eventId);
//                     console.log('countdownDisplay:', countdownDisplay);

//                     if (countdownDisplay) {
//                         displayCountdown(countdownOption, countdownTime, 'countdown-display-' + eventId);
//                         console.log('displayCountdown called');
//                     } else {
//                         console.log('countdownDisplay not found');
//                     }
//                 });
//             } else {
//                 console.error('Livewire is not loaded');
//             }
//         });











            //         document.addEventListener('livewire:load', function () {
            //     Livewire.on('applyStyles', () => {
            //         const countdownDisplay = document.getElementById('countdown-display-{{ $event->id }}');
            //         console.log('applyStyles triggered');
            //         if (countdownDisplay) {
            //             const randomDate = @json($event->countdown_time);
            //             const input = @json($event->countdown_option);
            //             displayCountdown(input, randomDate, 'countdown-display-{{ $event->id }}');
            //         }
            //     });

            // Livewire.on('eventSwitched', (eventId, countdownTime, countdownOption) => {
            //         const countdownDisplay = document.getElementById('countdown-display-' + eventId);
            //         console.log('eventSwitched triggered');
            //         if (countdownDisplay) {
            //             displayCountdown(countdownOption, countdownTime, 'countdown-display-' + eventId);
            //         }
            //     });
            // });

                    // document.addEventListener('livewire:load', function () {
                    //     Livewire.on('applyStyles', () => {
                    //         if (document.getElementById('countdown-display')) {
                    //             const randomDate = @json($event->countdown_time);
                    //             const input = @json($event->countdown_option);
                    //             displayCountdown(input, randomDate);
                    //         }
                    //     });
                    // });
                </script>
            @endif
        </div>

        <div>
            <!-- Display the map if location is set -->
            @if ($event->location)
                <iframe
                    width="100%"
                    height="300"
                    frameborder="0" style="border:0"
                    src="{{$event->event_location}}" allowfullscreen>
                </iframe>
            @endif
        </div>
    </div>
</div>
</div>


<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('applyStyles', function () {
            // Re-apply your styles here if necessary
            console.log('applyStyles triggered');
            const container = document.querySelector('.event-display-container');
            if (container) {
                // Example: Re-apply background image
                container.style.backgroundImage = `url('background_gifs/${@this.event.GifSelect}')`;
            }
        });
    });
</script>
<script>
    function countdown(targetDate, displayElement) {
    const target = new Date(targetDate).getTime();

    const interval = setInterval(() => {
        const now = new Date().getTime();
        const distance = target - now;

        if (distance < 0) {
            clearInterval(interval);
            displayElement.textContent = "Countdown finished";
            return;
        }

        // Calculate time remaining
        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result
        displayElement.textContent = `${days}d ${hours}h ${minutes}m ${seconds}s`;
    }, 1000);
}
function displayCountdown(input, date_time, elementId) {
    const displayElement = document.getElementById(elementId);
    const targetDate = new Date(date_time.replace(' ', 'T')).toISOString();

    // Clear any existing countdown interval
    if (countdownInterval) {
        clearInterval(countdownInterval);
    }
    if (input === 'simple') {
        countdown(targetDate, displayElement);
    } else if (input === 'flip') {
        countdown2(targetDate, displayElement);
    } else if (input === 'fade') {
        countdown3(targetDate, displayElement);
    } else if (input === 'slide') {
        countdown4(targetDate, displayElement);
    }
}
</script>








