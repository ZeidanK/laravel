<!DOCTYPE html>
<html>
<head>
    <title>DB Connection Test</title>
</head>
<body>
    <h1>DB Connection Test</h1>

    @php
        try {
            $pdo = DB::connection()->getPdo();
            echo "<p>Database connection successful!</p>";
        } catch (\Exception $e) {
            echo "<p>Database connection failed: " . $e->getMessage() . "</p>";
        }
    @endphp
    <div>
        <livewire: event-display />
        @livewireScripts
    </div>
</body>
</html>