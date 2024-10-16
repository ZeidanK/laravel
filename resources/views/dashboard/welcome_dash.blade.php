@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Edit</title>
</head>
<body>
    <header>
        <h1>Main Header</h1>
    </header>
    <div>
        @if(auth()->check())
            @if(Auth::user()->role == 'admin')

                <livewire:admin-dashboard />
            @endif
            <livewire:user-dashboard />
        @endif

        Hello
        @livewirestyles
    </div>
</body>
</html>

@endsection
