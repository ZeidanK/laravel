function showGifPreview() {
    const select = document.getElementById('GifSelect');
    const selectedOption = select.options[select.selectedIndex];
    const gifUrl = selectedOption.getAttribute('data-gif');

    const gifImage = document.getElementById('gifImage');
    
    if (gifUrl) {
        gifImage.src = gifUrl;
        gifImage.style.display = 'block'; // Show the image
    } else {
        gifImage.style.display = 'none'; // Hide the image if no gif is selected
    }
}
