<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        html, body {
            height: 100%;
        }
        body {
            display: flex;
            flex-direction: column;
        }
        .content {
            flex: 1;
        }
        .footer {
            background-color: #f8f9fa;
            border-top: 1px solid #dee2e6;
        }
        .footer a {
            color: #6c757d;
            margin: 0 10px;
            text-decoration: none;
        }
        .footer a:hover {
            color: #343a40;
        }
    </style>
</head>
<body>
    <div class="content">
        <!-- Your page content goes here -->
    </div>
    <footer class="footer py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="text-muted">&copy; {{ date('Y') }} Your Company. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook"></i></a>
                    <a href="https://www.linkedin.com" target="_blank"><i class="fab fa-linkedin"></i></a>
                    <a href="https://www.tiktok.com" target="_blank"><i class="fab fa-tiktok"></i></a>
                    <a href="" class="text-muted">Privacy Policy</a>
                    <a href="" class="text-muted">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>


{{-- <div>
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
                <img src="{{ asset('images/logo.screenshot.jpg') }}" alt="Home" style=" padding: 5px; border-radius: 5px; width: 40px; height: 40px;">
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
    </body> --}}
