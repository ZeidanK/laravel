// public/js/event.js

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
