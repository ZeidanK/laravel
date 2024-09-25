<div>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bottom Header</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .bottom-header {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
        }
        .bottom-header a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
        }
        .bottom-header a:hover {
            color: #ddd;
        }
    </style>
</head>
<body>
    <div class="bottom-header">
        <a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
        <a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook"></i></a>
        <a href="/" target="_blank" style="display: inline-block; vertical-align: middle;">
            <img src="{{ asset('images/logo.png') }}" alt="Home" style="background-color: white; padding: 5px; border-radius: 5px; width: 30px; height: 30px;">
        </a>
        <a href="https://www.linkedin.com" target="_blank"><i class="fab fa-linkedin"></i></a>
        <a href="https://www.tiktok.com" target="_blank"><i class="fab fa-tiktok"></i></a>
    </div>
    <style>
        .bottom-header {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .bottom-header a {
            display: flex;
            align-items: center;
            margin: 0 15px;
        }
    </style>
</body>

</div>
<script>
    let lastScrollTop = 0;
    window.addEventListener('scroll', function() {
        let bottomHeader = document.querySelector('.bottom-header');
        let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        if (scrollTop > lastScrollTop) {
            // Scroll down
            bottomHeader.style.transform = 'translateY(100%)';
        } else {
            // Scroll up
            bottomHeader.style.transform = 'translateY(0)';
        }
        lastScrollTop = scrollTop;
    });
</script>
