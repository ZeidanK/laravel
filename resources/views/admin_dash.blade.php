<!--
  This example requires updating your template:

  ```
  <html class="h-full bg-gray-100">
  <body class="h-full">
  ```
-->
{{-- <style>
    .content-section.hidden {
        display: none;
    }
.hidden {
    display: none;
}
</style> --}}
@extends('layouts.app')

@section('content')
<?php


use Illuminate\Support\Facades\DB;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

$user = Auth::user();
//$events = collect();

if ($user) {
    if ($user && $user->isAdmin()) {
        $events = Event::where('user_id', 3)->get();
    } else {
        $events = Event::where('user_id', 3)->get();
    }
} else {
    $events = Event::where('user_id', 3)->get();
}

$event = $events->first() ?? null;



?>
<!DOCTYPE html>
<html class="h-full bg-beige-700">
<head>
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.2/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="h-full">
<div class="min-h-full">
    <nav class="bg-gray-300">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
          <div class="flex items-center">
            <div class="flex-shrink-0">
                <img class="h-16 w-auto max-w-full" src="{{ asset('images/logo.png') }}" alt="da3wah">
            </div>
                        <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-4">
                    <a href="#" id="dashboard-link" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-yellow-600 hover:bg-gray-700 hover:text-white" aria-current="page">Dashboard</a>
                    <a href="#" id="team-link" class="rounded-md px-3 py-2 text-sm font-medium text-blue-600 hover:bg-gray-700 hover:text-white">contact us</a>
                    <a href="#" id="projects-link" class="rounded-md px-3 py-2 text-sm font-medium text-red-600 hover:bg-gray-700 hover:text-white">Projects</a>
                    <a href="#" id="calendar-link" class="rounded-md px-3 py-2 text-sm font-medium text-green-600 hover:bg-gray-700 hover:text-white">Events</a>
                    <a href="#" id="reports-link" class="rounded-md px-3 py-2 text-sm font-medium text-brown-600 hover:bg-gray-700 hover:text-white">Reports</a>
                    <a href="#" id="calendar-link" class="rounded-md px-3 py-2 text-sm font-medium text-green-600 hover:bg-gray-700 hover:text-white">Events2</a>

                    @if(auth()->check() && auth()->user()->isAdmin())
                    <a href="#" id="contact-request-link" class="rounded-md px-3 py-2 text-sm font-medium text-purple-600 hover:bg-gray-700 hover:text-white">Contact Request</a>
                @endif
                </div>
            </div>
          </div>
          <div>
            @if(auth()->check())
            <span class="ml-2 text-black text-sm">{{ auth()->user()->name }}</span>
        @endif                            </div>
          <div class="hidden md:block">

            <div class="ml-4 flex items-center md:ml-6">
              <button type="button" class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                <span class="absolute -inset-1.5"></span>
                <span class="sr-only">View notifications</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                </svg>

              </button>

              <!-- Profile dropdown -->
              <div class="relative ml-3">
                <div>
                  <button type="button" class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                    <span class="absolute -inset-1.5"></span>
                    <span class="sr-only">Open user menu</span>
                    <img class="h-8 w-8 rounded-full" src="{{ asset('images/user-profile-icon.jpg') }}" alt="">
                  </button>

                </div>

                <!--
                  Dropdown menu, show/hide based on menu state.

                  Entering: "transition ease-out duration-100"
                    From: "transform opacity-0 scale-95"
                    To: "transform opacity-100 scale-100"
                  Leaving: "transition ease-in duration-75"
                    From: "transform opacity-100 scale-100"
                    To: "transform opacity-0 scale-95"
                -->
                <div class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                  <!-- Active: "bg-gray-100", Not Active: "" -->
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
                  <!-- Sign out form -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</button>
        </form>
                    </div>
              </div>
            </div>
          </div>
          <div class="-mr-2 flex md:hidden">
            <!-- Mobile menu button -->
            <button type="button" class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" aria-controls="mobile-menu" aria-expanded="false">
              <span class="absolute -inset-0.5"></span>
              <span class="sr-only">Open main menu</span>
              <!-- Menu open: "hidden", Menu closed: "block" -->
              <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
              </svg>
              <!-- Menu open: "block", Menu closed: "hidden" -->
              <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
        </div>
      </div>

      <!-- Mobile menu, show/hide based on menu state. -->
      <div class="md:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
          <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
          <a href="#" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white" aria-current="page">Dashboard</a>
          <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Team</a>
          <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Projects</a>
          <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Calendar</a>
          <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Reports</a>
        </div>
        <div class="border-t border-gray-700 pb-3 pt-4">
          <div class="flex items-center px-5">
            <div class="flex-shrink-0">
              <img class="h-10 w-10 rounded-full" src="{{ asset('images/user-profile-icon.jpg') }}" alt="">
            </div>
            <div class="ml-3">
              <div class="text-base font-medium leading-none text-white">Tom Cook</div>
              <div class="text-sm font-medium leading-none text-gray-400">tom@example.com</div>
            </div>
            <button type="button" class="relative ml-auto flex-shrink-0 rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
              <span class="absolute -inset-1.5"></span>
              <span class="sr-only">View notifications</span>
              <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
              </svg>
            </button>
          </div>
          <div class="mt-3 space-y-1 px-2">
            <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Your Profile</a>
            <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Settings</a>
            <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Sign out</a>
          </div>
        </div>
      </div>
    </nav>

    <header class="bg-white shadow">
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">Dashboard</h1>
      </div>
    </header>
    <main>
          <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <!-- Dashboard Content -->
        <div id="dashboard-content" class="content-section">
            <h1>Dashboard Content</h1>
            <!-- Your dashboard content here -->
            {{-- <?php
                // try {
                //     $pdo = DB::connection()->getPdo();
                //     echo "<p>Database connection successful!</p>";
                // } catch (\Exception $e) {
                //     echo "<p>Database connection failed: " . $e->getMessage() . "</p>";
                // }
                // $users = DB::table('users')->get();
                // echo "<p>Users:</p>";

                // foreach ($users as $user) {
                //     echo "<p>$user->name</p>";
                // }







            ?> --}}


            {{-- <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Password</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>phone</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->password }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>{{ $user->updated_at }}</td>
                            <td>{{ $user->phone_number }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table> --}}
            @guest
                <livewire:user-log-in />
            @else
                @if(auth()->user()->role === 'admin')
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Admin Button
                    </button>
                @endif
            @endguest


        </div>

        <!-- Team Content -->
        <div id="team-content" class="content-section hidden">
            <h1>contact us</h1>
            <livewire:hello-world />
            <livewire:contact-request />

            <!-- Your team content here -->
        </div>

        <!-- Projects Content -->
        <div id="projects-content" class="content-section hidden">
            <h1>Projects Content</h1>
            <!-- Your projects content here -->

            <?php

            echo "<p>Events:</p>";
            ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User ID</th>
                        <th>Event date</th>
                        <th>Location</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($events as $event)
                    <tr>
                        <td>{{ $event->id }}</td>
                        <td>{{ $event->event_slug}}</td>
                        <td>{{ $event->event_date }}</td>
                        <td>{{ $event->event_location }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>



        </div>

        <!-- Calendar Content -->
        <div id="calendar-content" class="content-section hidden">

            @inject('event', 'App\Models\Event')
            <?php



            $userId = Auth::check() ? Auth::id() : 1;
            //$events = Event::where('user_id', $userId)->get();

            // echo "$events";
            ?>


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

            <!-- Your calendar content here -->
        </div>

        <!-- Reports Content -->
        <div id="reports-content" class="content-section hidden">

            <!-- Your reports content here -->
            <div class="container mt-5">


                <!-- Your contact request content here -->
                @livewireStyles
                {{-- <livewire:import-guests-file :event="$events[0]"/> --}}
                @if($event!=null)
                <livewire:guest-table-edit :event="$events[0]"  />
                @endif

                {{-- <livewire:contact-request-table-display /> --}}


                @livewireScripts

            </div>
        </div>

        <!-- Contact Request Content -->
        <div id="contact-request-content" class="content-section hidden">
        </div>

    </div>
    </main>
  </div>
<div id="bottom-header-container" class="bg-white shadow-lg">
    <livewire:bottom-header />
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get all links
        const links = document.querySelectorAll('.ml-10 a');

        // Add click event listener to each link
        links.forEach(link => {
            link.addEventListener('click', function (event) {
                event.preventDefault();

                // Hide all content sections
                document.querySelectorAll('.content-section').forEach(section => {
                    section.classList.add('hidden');
                });

                // Remove active class from all links
                links.forEach(link => {
                    link.classList.remove('bg-gray-900', 'text-white');
                    link.classList.add('text-gray-300', 'hover:bg-gray-700', 'hover:text-white');
                });

                // Add active class to the clicked link
                this.classList.add('bg-gray-900', 'text-white');
                this.classList.remove('text-gray-300', 'hover:bg-gray-700', 'hover:text-white');

                // Show the corresponding content section
                const contentId = this.id.replace('-link', '-content');
                document.getElementById(contentId).classList.remove('hidden');
            });
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Example function to toggle visibility
        function toggleVisibility(id) {
            var element = document.getElementById(id);
            if (element.classList.contains('hidden')) {
                element.classList.remove('hidden');
            } else {
                element.classList.add('hidden');
            }
        }

        // Example usage: Toggle visibility of calendar-content
        document.getElementById('toggle-calendar').addEventListener('click', function () {
            toggleVisibility('calendar-content');
        });

        // Example usage: Toggle visibility of reports-content
        document.getElementById('toggle-reports').addEventListener('click', function () {
            toggleVisibility('reports-content');
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const userMenuButton = document.getElementById('user-menu-button');
        const userMenu = document.querySelector('[aria-labelledby="user-menu-button"]');

        userMenuButton.addEventListener('click', function () {
            userMenu.classList.toggle('hidden');
        });

        // Close the menu if clicked outside
        document.addEventListener('click', function (event) {
            if (!userMenuButton.contains(event.target) && !userMenu.contains(event.target)) {
                userMenu.classList.add('hidden');
            }
        });
    });
</script>

@endsection
