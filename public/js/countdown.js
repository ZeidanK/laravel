// countdown.js

//countdown.js

function printHelloWorld(input) {
    const message = `Hello World ${input}`;
    const displayElement = document.getElementById('hello-world-display');
    if (displayElement) {
        displayElement.textContent = message;
    } else {
        console.log(message);
    }
}

function displayCountdown(input, date_time) {
    const displayElement = document.getElementById('countdown-display');
    const targetDate = new Date(date_time.replace(' ', 'T')).toISOString();
    if(input==='simple'){
        countdown(targetDate, 'html', input);
    }else{
    countdown1(targetDate, 'html', input);}
}

function countdown(targetDate, format, input) {
    const displayElement = document.getElementById('countdown-display');
    const target = new Date(targetDate).getTime();

    const interval = setInterval(() => {
        const now = new Date().getTime();
        const distance = target - now;

        if (distance < 0) {
            clearInterval(interval);
            displayElement.textContent = "Countdown finished";
            return;
        }

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        displayElement.textContent = `${days}d ${hours}h ${minutes}m ${seconds}s ${input}`;
    }, 1000);
}

function countdown1(targetDate,format,input){
    const displayElement = document.getElementById('countdown-display');
    const target = new Date(targetDate).getTime();

    const interval = setInterval(() => {
        const now = new Date().getTime();
        const distance = target - now;

        if (distance < 0) {
            clearInterval(interval);
            displayElement.textContent = "Countdown finished";
            return;
        }

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        displayElement.innerHTML = `
            <div style="font-weight: bold; color: green; font-size: 1.5em;">${days}<span> Days</span></div>
            <div style="font-weight: bold; color: green; font-size: 1.5em;">${hours}<span> Hours</span></div>
            <div style="font-weight: bold; color: green; font-size: 1.5em;">${minutes}<span> Minutes</span></div>
            <div style="font-weight: bold; color: green; font-size: 1.5em;">${seconds}<span> Seconds</span></div>
            <div style="font-weight: bold; color: green; font-size: 1.5em;">${input}</div>
        `;
    }, 1000);
}
