<div style="display: flex; flex-wrap: wrap; justify-content: space-between; max-width: 1200px; margin: 0 auto; direction: ltr;">
    <div style="flex: 1; max-width: 100%; max-height: 600px; overflow: auto; border: 1px solid #ccc; padding: 10px;">
        <livewire:event-display :event="$event" :guest="null" :user="null" wire:key="event-display-{{ $event->id }}"/>
        @livewireScripts
        @livewireStyles
    </div>
    <div style="flex: 1; margin-right: 20px; direction: rtl; max-width: 100%; margin-top: 20px;">
        <div style="margin-left: 20px; position: relative;">
            <select wire:model="selectedEventId" wire:change="$emit('eventSelected', $selectedEventId)">
                <option value="">Select an Event</option>
                @foreach($events as $event)
                    <option value="{{ $event->id }}">{{ $event->event_name }}</option>
                @endforeach
            </select>
            <button wire:click="refreshEvent">Refresh</button>
        </div>
        <div style="border: 2px solid #333; padding: 20px; background-color: #e7e9d256;">
            <h2>تعديل الدعوة</h2>
            <form id="editForm" wire:submit.prevent="updateEvent" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="eventImage">تحميل صورة جديدة:</label>
                    <input type="file" id="eventImage" wire:model="eventImage">
                </div>
                <div>
                    <label for="rsvpOption">رد الدعوة:</label>
                    <input type="checkbox" id="rsvpOption" wire:model="rsvpOption">
                </div>
                <div>
                    <label for="description">الوصف:</label>
                    <input type="text" id="description" wire:model="description">
                </div>
                <div>
                    <label for="mapOption">تضمين الخريطة:</label>
                    <input type="checkbox" id="mapOption" wire:model="mapOption">
                </div>
                <div>
                    <label for="countdownOption">العد التنازلي:</label>
                    <input type="checkbox" id="countdownOption" wire:model="countdownOption">
                </div>
                <div id="countdownSelectContainer" style="display: {{ $countdownOption ? 'block' : 'none' }};">
                    <label for="countdownSelect">اختيار العد التنازلي:</label>
                    <select id="countdownSelect" wire:model="countdownSelect">
                        <option value="NoCountdown"></option>
                        <option value="simple">بسيط</option>
                        <option value="flip">قلب</option>
                        <option value="fade">تلاشي</option>
                        <option value="slide">انزلاق</option>
                    </select>
                </div>
                <div>
                    <label for="Gif">صورة متحركة:</label>
                    <input type="checkbox" id="Gif" wire:model="gif">
                </div>
                <div id="GifSelectContainer" style="display: {{ $gif ? 'block' : 'none' }};">
                    <label for="GifSelect">اختيار الصورة المتحركة:</label>
                    <select id="GifSelect" wire:model="gifSelect">
                        <option value="NoGif" data-gif=""></option>
                        <option value="زهرية رومانسيه.webp" data-gif="background_gifs/زهرية رومانسيه.webp">زهرية رومانسيه</option>
                        <option value="زرقاء ساطعه.webp" data-gif="background_gifs/زرقاء ساطعه.webp">زرقاء ساطعه</option>
                    </select>
                    <div id="gifPreview" style="margin-top: 10px;">
                        <img id="gifImage" src="{{ $gifSelect ? asset('background_gifs/' . $gifSelect) : '' }}" alt="الصورة المتحركة المختارة" style="max-width: 100px; display: {{ $gifSelect ? 'block' : 'none' }};" />
                    </div>
                </div>
                <div>
                    <label for="bgColor">لون الخلفية:</label>
                    <input type="color" id="bgColor" wire:model="bgColor">
                </div>
                <button type="submit" class="button">حفظ التغييرات</button>
            </form>
        </div>
    </div>
</div>
<style>
    @media (max-width: 750px) {
        div[style*="display: flex; flex-wrap: wrap; justify-content: space-between; max-width: 1200px; margin: 0 auto; direction: ltr;"] {
            flex-direction: column;
        }
        div[style*="flex: 1; max-width: 100%; max-height: 600px; overflow: auto; border: 1px solid #ccc; padding: 10px;"] {
            margin-bottom: 20px;
        }
        div[style*="flex: 1; margin-right: 20px; direction: rtl; max-width: 100%; margin-top: 20px;"] {
            margin-right: 0;
        }
    }
</style>
<style scoped>
        .event-display-container {
    /* background-size: cover; Ensures the image covers the whole background */
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
    .event-display-container .container{
    text-align: center;
    width : 500px;
    min-height: 100vh; Make sure the container takes up the full viewport height
    overflow: auto; /* Ensure scrolling is allowed if the content overflows */

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
        @if(isset($event) && $event->GifSelect)
            background: url('background_gifs/{{$event->GifSelect}}') center/cover;
        @endif
        border-radius: 35px;
        padding: 20px;
    }

    .event-display-container .button-wrapper {
        margin-top: 20px;
        background-color: transparent; /* Make the button wrapper background transparent */
    }

    .event-display-container #countdown {
        font-size: 3em; /* Adjust this value to change the size of the countdown */
        text-align: center;
        align-items: center; /* Vertically center the countdown */
        justify-content: center; /* Horizontally center the countdown */
    }

    .event-display-container @keyframes fadeIn { /* Define the fade in animation */
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

    </style>
