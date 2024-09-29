
<div>
    <div>
        <livewire:event-display />
        @livewireScripts
        @livewireStyles
    </div>
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
   @if ($event->Gif)
       
   
    background: url('background_gifs/{{$event->GifSelect}}') center/cover;
    @endif
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

      
      
   </style>
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
            <div>
                <label for="description">description:</label>
                <input type="text" id="description" name="description" value="{{  $event->event_description }}">
            </div>
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
                    <input type="checkbox" id="Gif" name="Gif" @if ($event->Gif) checked @endif onchange="toggleGifSelect()">
                </div>
                
                <div id="GifSelectContainer" style="display: none;">
                    <label for="GifSelect">GifSelect:</label>
                    <select id="GifSelect" name="GifSelect" onchange="showGifPreview()">
                        <option value="NoGif" data-gif=""></option>
                        <option value="زهرية رومانسيه.webp" data-gif="background_gifs/زهرية رومانسيه.webp" @if ($event->GifSelect == 'زهرية رومانسيه.webp') selected @endif>زهرية رومانسيه</option>
                        <option value="زرقاء ساطعه.webp" data-gif="background_gifs/زرقاء ساطعه.webp" @if ($event->GifSelect == 'زرقاء ساطعه.webp') selected @endif>زرقاء ساطعه</option>
                    </select>
                
                    <div id="gifPreview" style="margin-top: 10px;">
                        <img id="gifImage" src="" alt="Selected GIF" style="max-width: 100px; display: none;" />
                    </div>
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
<script>
    function toggleEditOptions() {
        const editOptions = document.getElementById('editOptions');
        editOptions.style.display = editOptions.style.display === 'none' ? 'block' : 'none';
    }
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const GifCheckbox = document.getElementById('Gif');
        const GifSelectContainer = document.getElementById('GifSelectContainer');

        // Show or hide the select based on the checkbox state on page load
        GifSelectContainer.style.display = GifCheckbox.checked ? 'block' : 'none';

        // Add an event listener to toggle the select visibility
        GifCheckbox.addEventListener('change', function () {
            GifSelectContainer.style.display = this.checked ? 'block' : 'none';
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
<script>
    // When the page loads, check if the Gif checkbox is checked
    document.addEventListener("DOMContentLoaded", function () {
        toggleGifSelect();
    });

    // Function to toggle the visibility of the GifSelect dropdown
    function toggleGifSelect() {
        var gifCheckbox = document.getElementById('Gif');
        var gifSelectContainer = document.getElementById('GifSelectContainer');
        var gifSelect = document.getElementById('GifSelect');

        if (gifCheckbox.checked) {
            gifSelectContainer.style.display = 'block'; // Show the GifSelect dropdown
        } else {
            gifSelectContainer.style.display = 'none'; // Hide the GifSelect dropdown
            gifSelect.value = 'NoGif'; // Set the value to 'NoGif' when the checkbox is unchecked
            showGifPreview(); // Update the preview accordingly
        }
    }

    // Function to show the GIF preview based on the selected option
    function showGifPreview() {
        var gifSelect = document.getElementById('GifSelect');
        var selectedOption = gifSelect.options[gifSelect.selectedIndex];
        var gifImage = document.getElementById('gifImage');
        var gifSrc = selectedOption.getAttribute('data-gif');

        if (gifSrc) {
            gifImage.src = gifSrc;
            gifImage.style.display = 'block'; // Show the GIF preview
        } else {
            gifImage.style.display = 'none'; // Hide the preview if no GIF is selected
        }
    }
</script>
<style>
    #gifImage {
        max-width: 100px; /* Set maximum width */
        max-height: 100px; /* Set maximum height */
        display: block; /* Display as block-level element */
        margin: 0 auto; /* Center the image horizontally */
    }
</style>