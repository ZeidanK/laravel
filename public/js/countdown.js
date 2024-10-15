let countdownInterval;
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

// countdown functions
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

function countdown2(targetDate, displayElement) {
    // Similar logic for countdown2
}

function countdown3(targetDate, displayElement) {
    // Similar logic for countdown3
}

function countdown4(targetDate, displayElement) {
    // Similar logic for countdown4
}









// // countdown.js

// //countdown.js

// function printHelloWorld(input) {
//     const message = `Hello World ${input}`;
//     const displayElement = document.getElementById('hello-world-display');
//     if (displayElement) {
//         displayElement.textContent = message;
//     } else {
//         console.log(message);
//     }
// }

// function displayCountdown(input, date_time) {
//     const displayElement = document.getElementById('countdown-display');
//     const targetDate = new Date(date_time.replace(' ', 'T')).toISOString();
//     if(input==='simple'){
//         countdown(targetDate, 'html', input);
//     }else if (input==='flip') {
//     countdown2(targetDate, 'html', input);
//   } else if (input==='fade'){
//     countdown3(targetDate, 'html', input);
//   } else if (input==='slide'){
//     countdown4(targetDate, 'html', input);
//   }
// }

// // countdown functions
// function countdown(targetDate, format, input) {
//     const displayElement = document.getElementById('countdown-display');
//     const target = new Date(targetDate).getTime();

//     const interval = setInterval(() => {
//         const now = new Date().getTime();
//         const distance = target - now;

//         if (distance < 0) {
//             clearInterval(interval);
//             displayElement.textContent = "Countdown finished";
//             return;
//         }

//         const days = Math.floor(distance / (1000 * 60 * 60 * 24));
//         const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
//         const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
//         const seconds = Math.floor((distance % (1000 * 60)) / 1000);

//         displayElement.textContent = `${days}d ${hours}h ${minutes}m ${seconds}s ${input}`;
//     }, 1000);
// }

// function countdown1(targetDate,format,input){
//     const displayElement = document.getElementById('countdown-display');
//     const target = new Date(targetDate).getTime();

//     const interval = setInterval(() => {
//         const now = new Date().getTime();
//         const distance = target - now;

//         if (distance < 0) {
//             clearInterval(interval);
//             displayElement.textContent = "Countdown finished";
//             return;
//         }

//         const days = Math.floor(distance / (1000 * 60 * 60 * 24));
//         const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
//         const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
//         const seconds = Math.floor((distance % (1000 * 60)) / 1000);

//         displayElement.innerHTML = `
//             <div style="font-weight: bold; color: green; font-size: 1.5em;">${days}<span> Days</span></div>
//             <div style="font-weight: bold; color: green; font-size: 1.5em;">${hours}<span> Hours</span></div>
//             <div style="font-weight: bold; color: green; font-size: 1.5em;">${minutes}<span> Minutes</span></div>
//             <div style="font-weight: bold; color: green; font-size: 1.5em;">${seconds}<span> Seconds</span></div>
//             <div style="font-weight: bold; color: green; font-size: 1.5em;">${input}</div>
//         `;
//     }, 1000);
// }
// function countdown2(targetDate1, format, input) {

//   // Create and append style
//   const style = document.createElement('style');
//   style.textContent = `
// :root {
//   --font-size-large: 50px; /* Increased font size for digits */
//   --font-size-medium: 20px; /* Increased font size for labels */
//   --width-segment: 100%; /* Adjust width to fit larger numbers */
// }

// * {
//   box-sizing: border-box;
// }

// .countdown {
//   margin: 20px auto;
//   width: 89%;
//   display: flex;
//   gap: 30px;
//   font-family: sans-serif;
//   align-items: center; /* Vertically center the countdown */
//   justify-content: center; /* Horizontally center the countdown */
// }

// .time-section {
//   text-align: center;
//   font-size: var(--font-size-medium);

// }

// .time-group {
//   display: flex;
//   gap: 10px;
// }

// .time-segment {
//   display: block;
//   font-size: var(--font-size-large);
//   font-weight: 700;
//   width: var(--width-segment);
// }

// .segment-display {
//   position: relative;
//   height: 100%;
// }

// .segment-display__top,
// .segment-display__bottom {
//   overflow: hidden;
//   text-align: center;
//   width: 100%;
//   height: 50%;
//   position: relative;
// }

// .segment-display__top {
//   line-height: 1.5;
//   color: #eee;
//   background-color: #111;
// }

// .segment-display__bottom {
//   line-height: 0;
//   color: #fff;
//   background-color: #333;
// }

// .segment-overlay {
//   position: absolute;
//   top: 0;
//   perspective: 400px;
//   height: 100%;
//   width: var(--width-segment);
// }

// .segment-overlay__top,
// .segment-overlay__bottom {
//   position: absolute;
//   overflow: hidden;
//   text-align: center;
//   width: 100%;
//   height: 50%;
// }

// .segment-overlay__top {
//   top: 0;
//   line-height: 1.5;
//   color: #fff;
//   background-color: #111;
//   transform-origin: bottom;
// }

// .segment-overlay__bottom {
//   bottom: 0;
//   line-height: 0;
//   color: #eee;
//   background-color: #333;
//   border-top: 2px solid black;
//   transform-origin: top;
// }

// .segment-overlay.flip .segment-overlay__top {
//   animation: flip-top 0.8s linear;
// }

// .segment-overlay.flip .segment-overlay__bottom {
//   animation: flip-bottom 0.8s linear;
// }

// @keyframes flip-top {
//   0% {
//     transform: rotateX(0deg);
//   }
//   50%,
//   100% {
//     transform: rotateX(-90deg);
//   }
// }

// @keyframes flip-bottom {
//   0%,
//   50% {
//     transform: rotateX(90deg);
//   }
//   100% {
//     transform: rotateX(0deg);
//   }
// }

// `;

//   document.head.appendChild(style);

//   // Countdown display element
//   const displayElement = document.getElementById('countdown-display');
//   if (!displayElement) {
//       console.error('Element with ID "countdown-display" not found.');
//       return;
//   }

//   // Insert HTML structure
//   displayElement.innerHTML = `
//       <div class="countdown" dir="ltr">
//           <div class="time-section" id="days">
//               <div class="time-group">
//                   <div class="time-segment">
//                       <div class="segment-display">
//                           <div class="segment-display__top"></div>
//                           <div class="segment-display__bottom"></div>
//                           <div class="segment-overlay">
//                               <div class="segment-overlay__top"></div>
//                               <div class="segment-overlay__bottom"></div>
//                           </div>
//                       </div>
//                   </div>
//                   <div class="time-segment">
//                       <div class="segment-display">
//                           <div class="segment-display__top"></div>
//                           <div class="segment-display__bottom"></div>
//                           <div class="segment-overlay">
//                               <div class="segment-overlay__top"></div>
//                               <div class="segment-overlay__bottom"></div>
//                           </div>
//                       </div>
//                   </div>
//               </div>
//               <p>ايام</p>
//           </div>
//           <div class="time-section" id="hours">
//               <div class="time-group">
//                   <div class="time-segment">
//                       <div class="segment-display">
//                           <div class="segment-display__top"></div>
//                           <div class="segment-display__bottom"></div>
//                           <div class="segment-overlay">
//                               <div class="segment-overlay__top"></div>
//                               <div class="segment-overlay__bottom"></div>
//                           </div>
//                       </div>
//                   </div>
//                   <div class="time-segment">
//                       <div class="segment-display">
//                           <div class="segment-display__top"></div>
//                           <div class="segment-display__bottom"></div>
//                           <div class="segment-overlay">
//                               <div class="segment-overlay__top"></div>
//                               <div class="segment-overlay__bottom"></div>
//                           </div>
//                       </div>
//                   </div>
//               </div>
//               <p>ساعات</p>
//           </div>
//           <div class="time-section" id="minutes">
//               <div class="time-group">
//                   <div class="time-segment">
//                       <div class="segment-display">
//                           <div class="segment-display__top"></div>
//                           <div class="segment-display__bottom"></div>
//                           <div class="segment-overlay">
//                               <div class="segment-overlay__top"></div>
//                               <div class="segment-overlay__bottom"></div>
//                           </div>
//                       </div>
//                   </div>
//                   <div class="time-segment">
//                       <div class="segment-display">
//                           <div class="segment-display__top"></div>
//                           <div class="segment-display__bottom"></div>
//                           <div class="segment-overlay">
//                               <div class="segment-overlay__top"></div>
//                               <div class="segment-overlay__bottom"></div>
//                           </div>
//                       </div>
//                   </div>
//               </div>
//               <p>دقائق</p>
//           </div>
//           <div class="time-section" id="seconds">
//               <div class="time-group">
//                   <div class="time-segment">
//                       <div class="segment-display">
//                           <div class="segment-display__top"></div>
//                           <div class="segment-display__bottom"></div>
//                           <div class="segment-overlay">
//                               <div class="segment-overlay__top"></div>
//                               <div class="segment-overlay__bottom"></div>
//                           </div>
//                       </div>
//                   </div>
//                   <div class="time-segment">
//                       <div class="segment-display">
//                           <div class="segment-display__top"></div>
//                           <div class="segment-display__bottom"></div>
//                           <div class="segment-overlay">
//                               <div class="segment-overlay__top"></div>
//                               <div class="segment-overlay__bottom"></div>
//                           </div>
//                       </div>
//                   </div>
//               </div>
//               <p>ثواني</p>
//           </div>
//       </div>
//   `;

//   // Event Date (static example for now)
//   // var eventDate = '2024-10-31T23:59:59';
//   // var targetDate = new Date(eventDate).getTime();

//   // const displayElement = document.getElementById('countdown-display');
//   const targetDate = new Date(targetDate1).getTime();

//   function getTimeSegmentElements(segmentElement) {
//       const segmentDisplay = segmentElement.querySelector('.segment-display');
//       const segmentDisplayTop = segmentDisplay.querySelector('.segment-display__top');
//       const segmentDisplayBottom = segmentDisplay.querySelector('.segment-display__bottom');

//       const segmentOverlay = segmentDisplay.querySelector('.segment-overlay');
//       const segmentOverlayTop = segmentOverlay.querySelector('.segment-overlay__top');
//       const segmentOverlayBottom = segmentOverlay.querySelector('.segment-overlay__bottom');

//       return {
//           segmentDisplayTop,
//           segmentDisplayBottom,
//           segmentOverlay,
//           segmentOverlayTop,
//           segmentOverlayBottom,
//       };
//   }

//   function updateSegmentValues(displayElement, overlayElement, value) {
//       displayElement.textContent = value;
//       overlayElement.textContent = value;
//   }

//   function updateTimeSegment(segmentElement, timeValue) {
//     const segmentElements = getTimeSegmentElements(segmentElement);

//     // Prevent animation if the value hasn't changed
//     if (parseInt(segmentElements.segmentDisplayTop.textContent, 10) === timeValue) {
//         return;
//     }

//     segmentElements.segmentOverlay.classList.add('flip');

//     // Update the top and bottom values for smooth flipping
//     updateSegmentValues(segmentElements.segmentDisplayTop, segmentElements.segmentOverlayBottom, timeValue);

//     setTimeout(function() {
//         segmentElements.segmentOverlay.classList.remove('flip');
//         updateSegmentValues(segmentElements.segmentDisplayBottom, segmentElements.segmentOverlayTop, timeValue);
//     }, 800);  // Ensure this timing matches the flip animation duration
// }



//   function updateCountdown() {
//       const currentDate = new Date().getTime();
//       const remainingTime = targetDate - currentDate;

//       const seconds = Math.floor((remainingTime / 1000) % 60);
//       const minutes = Math.floor((remainingTime / 1000 / 60) % 60);
//       const hours = Math.floor((remainingTime / (1000 * 60 * 60)) % 24);
//       const days = Math.floor(remainingTime / (1000 * 60 * 60 * 24));

//       const daysElement = document.getElementById('days').querySelectorAll('.time-segment');
//       const hoursElement = document.getElementById('hours').querySelectorAll('.time-segment');
//       const minutesElement = document.getElementById('minutes').querySelectorAll('.time-segment');
//       const secondsElement = document.getElementById('seconds').querySelectorAll('.time-segment');

//       updateTimeSegment(daysElement[0], Math.floor(days / 10));
//       updateTimeSegment(daysElement[1], days % 10);

//       updateTimeSegment(hoursElement[0], Math.floor(hours / 10));
//       updateTimeSegment(hoursElement[1], hours % 10);

//       updateTimeSegment(minutesElement[0], Math.floor(minutes / 10));
//       updateTimeSegment(minutesElement[1], minutes % 10);

//       updateTimeSegment(secondsElement[0], Math.floor(seconds / 10));
//       updateTimeSegment(secondsElement[1], seconds % 10);

//       if (remainingTime < 0) {
//           clearInterval(intervalId);
//       }
//   }

//   const intervalId = setInterval(updateCountdown, 1000);
//   updateCountdown();
// }

// function countdown3(targetDate1, format, input) {


//   // Create and append style
//   const style = document.createElement('style');
//   style.textContent = `
// :root {
//   --font-size-large: 50px; /* Increased font size for digits */
//   --font-size-medium: 20px; /* Increased font size for labels */
//   --width-segment: 100%; /* Adjust width to fit larger numbers */
// }

// * {
//   box-sizing: border-box;
// }

// .countdown {
//   margin: 20px auto;
//   width: 89%;
//   display: flex;
//   gap: 30px;
//   font-family: sans-serif;
//   align-items: center; /* Vertically center the countdown */
//   justify-content: center; /* Horizontally center the countdown */
// }

// .time-section {
//   text-align: center;
//   font-size: var(--font-size-medium);

// }

// .time-group {
//   display: flex;
//   gap: 10px;
// }

// .time-segment {
//   display: block;
//   font-size: var(--font-size-large);
//   font-weight: 700;
//   width: var(--width-segment);
// }

// .segment-display {
//   position: relative;
//   height: 100%;
// }

// .segment-display__top,
// .segment-display__bottom {
//   overflow: hidden;
//   text-align: center;
//   width: 100%;
//   height: 50%;
//   position: relative;
// }

// .segment-display__top {
//   line-height: 1.5;
//   color: #eee;
//   background-color: #111;
// }

// .segment-display__bottom {
//   line-height: 0;
//   color: #fff;
//   background-color: #333;
// }

// .segment-overlay {
//   position: absolute;
//   top: 0;
//   perspective: 400px;
//   height: 100%;
//   width: var(--width-segment);
// }

// .segment-overlay__top,
// .segment-overlay__bottom {
//   position: absolute;
//   overflow: hidden;
//   text-align: center;
//   width: 100%;
//   height: 50%;
// }

// .segment-overlay__top {
//   top: 0;
//   line-height: 1.5;
//   color: #fff;
//   background-color: #111;
//   transform-origin: bottom;
// }

// .segment-overlay__bottom {
//   bottom: 0;
//   line-height: 0;
//   color: #eee;
//   background-color: #333;
//   border-top: 2px solid black;
//   transform-origin: top;
// }

// .segment-overlay.fade .segment-overlay__top {
//   animation: fade-out 0.8s linear;
// }

// .segment-overlay.fade .segment-overlay__bottom {
//   animation: fade-in 0.8s linear;
// }

// @keyframes fade-out {
//   0% {
//     opacity: 1;
//   }
//   100% {
//     opacity: 0;
//   }
// }

// @keyframes fade-in {
//   0% {
//     opacity: 0;
//   }
//   100% {
//     opacity: 1;
//   }
// }

// `;

//   document.head.appendChild(style);

//   // Countdown display element
//   const displayElement = document.getElementById('countdown-display');
//   if (!displayElement) {
//       console.error('Element with ID "countdown-display" not found.');
//       return;
//   }

//   // Insert HTML structure
//   displayElement.innerHTML = `
//       <div class="countdown" dir="ltr">
//           <div class="time-section" id="days">
//               <div class="time-group">
//                   <div class="time-segment">
//                       <div class="segment-display">
//                           <div class="segment-display__top"></div>
//                           <div class="segment-display__bottom"></div>
//                           <div class="segment-overlay">
//                               <div class="segment-overlay__top"></div>
//                               <div class="segment-overlay__bottom"></div>
//                           </div>
//                       </div>
//                   </div>
//                   <div class="time-segment">
//                       <div class="segment-display">
//                           <div class="segment-display__top"></div>
//                           <div class="segment-display__bottom"></div>
//                           <div class="segment-overlay">
//                               <div class="segment-overlay__top"></div>
//                               <div class="segment-overlay__bottom"></div>
//                           </div>
//                       </div>
//                   </div>
//               </div>
//               <p>ايام</p>
//           </div>
//           <div class="time-section" id="hours">
//               <div class="time-group">
//                   <div class="time-segment">
//                       <div class="segment-display">
//                           <div class="segment-display__top"></div>
//                           <div class="segment-display__bottom"></div>
//                           <div class="segment-overlay">
//                               <div class="segment-overlay__top"></div>
//                               <div class="segment-overlay__bottom"></div>
//                           </div>
//                       </div>
//                   </div>
//                   <div class="time-segment">
//                       <div class="segment-display">
//                           <div class="segment-display__top"></div>
//                           <div class="segment-display__bottom"></div>
//                           <div class="segment-overlay">
//                               <div class="segment-overlay__top"></div>
//                               <div class="segment-overlay__bottom"></div>
//                           </div>
//                       </div>
//                   </div>
//               </div>
//               <p>ساعات</p>
//           </div>
//           <div class="time-section" id="minutes">
//               <div class="time-group">
//                   <div class="time-segment">
//                       <div class="segment-display">
//                           <div class="segment-display__top"></div>
//                           <div class="segment-display__bottom"></div>
//                           <div class="segment-overlay">
//                               <div class="segment-overlay__top"></div>
//                               <div class="segment-overlay__bottom"></div>
//                           </div>
//                       </div>
//                   </div>
//                   <div class="time-segment">
//                       <div class="segment-display">
//                           <div class="segment-display__top"></div>
//                           <div class="segment-display__bottom"></div>
//                           <div class="segment-overlay">
//                               <div class="segment-overlay__top"></div>
//                               <div class="segment-overlay__bottom"></div>
//                           </div>
//                       </div>
//                   </div>
//               </div>
//               <p>دقائق</p>
//           </div>
//           <div class="time-section" id="seconds">
//               <div class="time-group">
//                   <div class="time-segment">
//                       <div class="segment-display">
//                           <div class="segment-display__top"></div>
//                           <div class="segment-display__bottom"></div>
//                           <div class="segment-overlay">
//                               <div class="segment-overlay__top"></div>
//                               <div class="segment-overlay__bottom"></div>
//                           </div>
//                       </div>
//                   </div>
//                   <div class="time-segment">
//                       <div class="segment-display">
//                           <div class="segment-display__top"></div>
//                           <div class="segment-display__bottom"></div>
//                           <div class="segment-overlay">
//                               <div class="segment-overlay__top"></div>
//                               <div class="segment-overlay__bottom"></div>
//                           </div>
//                       </div>
//                   </div>
//               </div>
//               <p>ثواني</p>
//           </div>
//       </div>
//   `;

//   // Event Date (static example for now)
//   // var eventDate = '2024-10-31T23:59:59';
//   // var targetDate = new Date(eventDate).getTime();

//   // const displayElement = document.getElementById('countdown-display');
//   const targetDate = new Date(targetDate1).getTime();

//   function getTimeSegmentElements(segmentElement) {
//       const segmentDisplay = segmentElement.querySelector('.segment-display');
//       const segmentDisplayTop = segmentDisplay.querySelector('.segment-display__top');
//       const segmentDisplayBottom = segmentDisplay.querySelector('.segment-display__bottom');

//       const segmentOverlay = segmentDisplay.querySelector('.segment-overlay');
//       const segmentOverlayTop = segmentOverlay.querySelector('.segment-overlay__top');
//       const segmentOverlayBottom = segmentOverlay.querySelector('.segment-overlay__bottom');

//       return {
//           segmentDisplayTop,
//           segmentDisplayBottom,
//           segmentOverlay,
//           segmentOverlayTop,
//           segmentOverlayBottom,
//       };
//   }

//   function updateSegmentValues(displayElement, overlayElement, value) {
//       displayElement.textContent = value;
//       overlayElement.textContent = value;
//   }

//   function updateTimeSegment(segmentElement, timeValue) {
//     const segmentElements = getTimeSegmentElements(segmentElement);

//     // Prevent animation if the value hasn't changed
//     if (parseInt(segmentElements.segmentDisplayTop.textContent, 10) === timeValue) {
//         return;
//     }

//     segmentElements.segmentOverlay.classList.add('fade');

//     // Update the top and bottom values for smooth flipping
//     updateSegmentValues(segmentElements.segmentDisplayTop, segmentElements.segmentOverlayBottom, timeValue);

//     setTimeout(function() {
//         segmentElements.segmentOverlay.classList.remove('fade');
//         updateSegmentValues(segmentElements.segmentDisplayBottom, segmentElements.segmentOverlayTop, timeValue);
//     }, 800);  // Ensure this timing matches the flip animation duration
// }

//   function updateCountdown() {
//       const currentDate = new Date().getTime();
//       const remainingTime = targetDate - currentDate;

//       const seconds = Math.floor((remainingTime / 1000) % 60);
//       const minutes = Math.floor((remainingTime / 1000 / 60) % 60);
//       const hours = Math.floor((remainingTime / (1000 * 60 * 60)) % 24);
//       const days = Math.floor(remainingTime / (1000 * 60 * 60 * 24));

//       const daysElement = document.getElementById('days').querySelectorAll('.time-segment');
//       const hoursElement = document.getElementById('hours').querySelectorAll('.time-segment');
//       const minutesElement = document.getElementById('minutes').querySelectorAll('.time-segment');
//       const secondsElement = document.getElementById('seconds').querySelectorAll('.time-segment');

//       updateTimeSegment(daysElement[0], Math.floor(days / 10));
//       updateTimeSegment(daysElement[1], days % 10);

//       updateTimeSegment(hoursElement[0], Math.floor(hours / 10));
//       updateTimeSegment(hoursElement[1], hours % 10);

//       updateTimeSegment(minutesElement[0], Math.floor(minutes / 10));
//       updateTimeSegment(minutesElement[1], minutes % 10);

//       updateTimeSegment(secondsElement[0], Math.floor(seconds / 10));
//       updateTimeSegment(secondsElement[1], seconds % 10);

//       if (remainingTime < 0) {
//           clearInterval(intervalId);
//       }
//   }

//   const intervalId = setInterval(updateCountdown, 1000);
//   updateCountdown();


// }

// function countdown4(targetDate1, format, input) {


//   // Create and append style
//   const style = document.createElement('style');
//   style.textContent = `
// :root {
//   --font-size-large: 50px; /* Increased font size for digits */
//   --font-size-medium: 20px; /* Increased font size for labels */
//   --width-segment: 100%; /* Adjust width to fit larger numbers */
// }

// * {
//   box-sizing: border-box;
// }

// .countdown {
//   margin: 20px auto;
//   width: 89%;
//   display: flex;
//   gap: 30px;
//   font-family: sans-serif;
//   align-items: center; /* Vertically center the countdown */
//   justify-content: center; /* Horizontally center the countdown */
// }

// .time-section {
//   text-align: center;
//   font-size: var(--font-size-medium);

// }

// .time-group {
//   display: flex;
//   gap: 10px;
// }

// .time-segment {
//   display: block;
//   font-size: var(--font-size-large);
//   font-weight: 700;
//   width: var(--width-segment);
// }

// .segment-display {
//   position: relative;
//   height: 100%;
// }

// .segment-display__top,
// .segment-display__bottom {
//   overflow: hidden;
//   text-align: center;
//   width: 100%;
//   height: 50%;
//   position: relative;
// }

// .segment-display__top {
//   line-height: 1.5;
//   color: #eee;
//   background-color: #111;
// }

// .segment-display__bottom {
//   line-height: 0;
//   color: #fff;
//   background-color: #333;
// }

// .segment-overlay {
//   position: absolute;
//   top: 0;
//   perspective: 400px;
//   height: 100%;
//   width: var(--width-segment);
// }

// .segment-overlay__top,
// .segment-overlay__bottom {
//   position: absolute;
//   overflow: hidden;
//   text-align: center;
//   width: 100%;
//   height: 50%;
// }

// .segment-overlay__top {
//   top: 0;
//   line-height: 1.5;
//   color: #fff;
//   background-color: #111;
//   transform-origin: bottom;
// }

// .segment-overlay__bottom {
//   bottom: 0;
//   line-height: 0;
//   color: #eee;
//   background-color: #333;
//   border-top: 2px solid black;
//   transform-origin: top;
// }

// .segment-overlay.slide-in {
//   animation: slide-in 0.8s forwards;
// }

// .segment-overlay.slide-out {
//   animation: slide-out 0.8s forwards;
// }

// @keyframes slide-in {
//   0% {
//     transform: translateY(100%);
//     opacity: 0;
//   }
//   100% {
//     transform: translateY(0);
//     opacity: 1;
//   }
// }

// @keyframes slide-out {
//   0% {
//     transform: translateY(0);
//     opacity: 1;
//   }
//   100% {
//     transform: translateY(-100%);
//     opacity: 0;
//   }
// }


// `;

//   document.head.appendChild(style);

//   // Countdown display element
//   const displayElement = document.getElementById('countdown-display');
//   if (!displayElement) {
//       console.error('Element with ID "countdown-display" not found.');
//       return;
//   }

//   // Insert HTML structure
//   displayElement.innerHTML = `
//       <div class="countdown" dir="ltr">
//           <div class="time-section" id="days">
//               <div class="time-group">
//                   <div class="time-segment">
//                       <div class="segment-display">
//                           <div class="segment-display__top"></div>
//                           <div class="segment-display__bottom"></div>
//                           <div class="segment-overlay">
//                               <div class="segment-overlay__top"></div>
//                               <div class="segment-overlay__bottom"></div>
//                           </div>
//                       </div>
//                   </div>
//                   <div class="time-segment">
//                       <div class="segment-display">
//                           <div class="segment-display__top"></div>
//                           <div class="segment-display__bottom"></div>
//                           <div class="segment-overlay">
//                               <div class="segment-overlay__top"></div>
//                               <div class="segment-overlay__bottom"></div>
//                           </div>
//                       </div>
//                   </div>
//               </div>
//               <p>ايام</p>
//           </div>
//           <div class="time-section" id="hours">
//               <div class="time-group">
//                   <div class="time-segment">
//                       <div class="segment-display">
//                           <div class="segment-display__top"></div>
//                           <div class="segment-display__bottom"></div>
//                           <div class="segment-overlay">
//                               <div class="segment-overlay__top"></div>
//                               <div class="segment-overlay__bottom"></div>
//                           </div>
//                       </div>
//                   </div>
//                   <div class="time-segment">
//                       <div class="segment-display">
//                           <div class="segment-display__top"></div>
//                           <div class="segment-display__bottom"></div>
//                           <div class="segment-overlay">
//                               <div class="segment-overlay__top"></div>
//                               <div class="segment-overlay__bottom"></div>
//                           </div>
//                       </div>
//                   </div>
//               </div>
//               <p>ساعات</p>
//           </div>
//           <div class="time-section" id="minutes">
//               <div class="time-group">
//                   <div class="time-segment">
//                       <div class="segment-display">
//                           <div class="segment-display__top"></div>
//                           <div class="segment-display__bottom"></div>
//                           <div class="segment-overlay">
//                               <div class="segment-overlay__top"></div>
//                               <div class="segment-overlay__bottom"></div>
//                           </div>
//                       </div>
//                   </div>
//                   <div class="time-segment">
//                       <div class="segment-display">
//                           <div class="segment-display__top"></div>
//                           <div class="segment-display__bottom"></div>
//                           <div class="segment-overlay">
//                               <div class="segment-overlay__top"></div>
//                               <div class="segment-overlay__bottom"></div>
//                           </div>
//                       </div>
//                   </div>
//               </div>
//               <p>دقائق</p>
//           </div>
//           <div class="time-section" id="seconds">
//               <div class="time-group">
//                   <div class="time-segment">
//                       <div class="segment-display">
//                           <div class="segment-display__top"></div>
//                           <div class="segment-display__bottom"></div>
//                           <div class="segment-overlay">
//                               <div class="segment-overlay__top"></div>
//                               <div class="segment-overlay__bottom"></div>
//                           </div>
//                       </div>
//                   </div>
//                   <div class="time-segment">
//                       <div class="segment-display">
//                           <div class="segment-display__top"></div>
//                           <div class="segment-display__bottom"></div>
//                           <div class="segment-overlay">
//                               <div class="segment-overlay__top"></div>
//                               <div class="segment-overlay__bottom"></div>
//                           </div>
//                       </div>
//                   </div>
//               </div>
//               <p>ثواني</p>
//           </div>
//       </div>
//   `;

//   // Event Date (static example for now)
//   // var eventDate = '2024-10-31T23:59:59';
//   // var targetDate = new Date(eventDate).getTime();

//   // const displayElement = document.getElementById('countdown-display');
//   const targetDate = new Date(targetDate1).getTime();

//   function getTimeSegmentElements(segmentElement) {
//       const segmentDisplay = segmentElement.querySelector('.segment-display');
//       const segmentDisplayTop = segmentDisplay.querySelector('.segment-display__top');
//       const segmentDisplayBottom = segmentDisplay.querySelector('.segment-display__bottom');

//       const segmentOverlay = segmentDisplay.querySelector('.segment-overlay');
//       const segmentOverlayTop = segmentOverlay.querySelector('.segment-overlay__top');
//       const segmentOverlayBottom = segmentOverlay.querySelector('.segment-overlay__bottom');

//       return {
//           segmentDisplayTop,
//           segmentDisplayBottom,
//           segmentOverlay,
//           segmentOverlayTop,
//           segmentOverlayBottom,
//       };
//   }

//   function updateSegmentValues(displayElement, overlayElement, value) {
//       displayElement.textContent = value;
//       overlayElement.textContent = value;
//   }

//   function updateTimeSegment(segmentElement, timeValue) {
//     const segmentElements = getTimeSegmentElements(segmentElement);

//     // Prevent animation if the value hasn't changed
//     if (parseInt(segmentElements.segmentDisplayTop.textContent, 10) === timeValue) {
//         return;
//     }

//     // Start the slide-out animation
//     segmentElements.segmentOverlay.classList.add('slide-out');

//     // Update both top and bottom segments right before the animation starts
//     updateSegmentValues(segmentElements.segmentDisplayTop, segmentElements.segmentOverlayBottom, timeValue);
//     updateSegmentValues(segmentElements.segmentDisplayBottom, segmentElements.segmentOverlayTop, timeValue);

//     // Wait for the slide-out animation to finish, then remove the class
//     setTimeout(function() {
//         segmentElements.segmentOverlay.classList.remove('slide-out');

//         // Start the slide-in animation
//         segmentElements.segmentOverlay.classList.add('slide-in');

//         // Clean up after the slide-in animation completes
//         setTimeout(function() {
//             segmentElements.segmentOverlay.classList.remove('slide-in');
//         }, 800); // Match the timing of the slide-in animation
//     }, 1600);  // No delay for updating the bottom segment
// }






//   function updateCountdown() {
//       const currentDate = new Date().getTime();
//       const remainingTime = targetDate - currentDate;

//       const seconds = Math.floor((remainingTime / 1000) % 60);
//       const minutes = Math.floor((remainingTime / 1000 / 60) % 60);
//       const hours = Math.floor((remainingTime / (1000 * 60 * 60)) % 24);
//       const days = Math.floor(remainingTime / (1000 * 60 * 60 * 24));

//       const daysElement = document.getElementById('days').querySelectorAll('.time-segment');
//       const hoursElement = document.getElementById('hours').querySelectorAll('.time-segment');
//       const minutesElement = document.getElementById('minutes').querySelectorAll('.time-segment');
//       const secondsElement = document.getElementById('seconds').querySelectorAll('.time-segment');

//       updateTimeSegment(daysElement[0], Math.floor(days / 10));
//       updateTimeSegment(daysElement[1], days % 10);

//       updateTimeSegment(hoursElement[0], Math.floor(hours / 10));
//       updateTimeSegment(hoursElement[1], hours % 10);

//       updateTimeSegment(minutesElement[0], Math.floor(minutes / 10));
//       updateTimeSegment(minutesElement[1], minutes % 10);

//       updateTimeSegment(secondsElement[0], Math.floor(seconds / 10));
//       updateTimeSegment(secondsElement[1], seconds % 10);

//       if (remainingTime < 0) {
//           clearInterval(intervalId);
//       }
//   }

//   const intervalId = setInterval(updateCountdown, 1000);
//   updateCountdown();


// }

