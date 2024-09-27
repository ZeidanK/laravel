@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <?php


    $event = \App\Models\Event::find(1);
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Edit</title>
</head>
<body>
    <header>

    </header>
    <div>

        <livewire:guest-table-edit :event="$event"/>
    </div>
    @livewireScripts
</body>
</html>

@endsection
