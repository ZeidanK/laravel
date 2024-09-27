@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        $events = \App\Models\Event::all();

?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Edit</title>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <header>

    </header>
    <div>




        @inject('event', 'App\Models\Event')

        @livewireStyles
        <button id="toggle-pie-chart" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">
            عرض الرسم البياني الدائري
        </button>
        <div id="pie-chart-container">
            <livewire:guest-pie-chart :events="$events" />
        </div>

            <livewire:guest-table-display :events="$events" />
        </div>
        @livewireScripts
        @stack('scripts')
        @livewireScripts
    </div>
</body>
</html>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggleButton = document.getElementById('toggle-pie-chart');
        const pieChartContainer = document.getElementById('pie-chart-container');

        toggleButton.addEventListener('click', function () {
            pieChartContainer.classList.toggle('hidden');
        });
    });
</script>
@endsection
