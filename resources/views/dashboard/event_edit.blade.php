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

    </header>
    <div>
        <livewire:event-example />
        @livewireScripts
        @livewireStyles

    </div>
</body>
</html>

@endsection
