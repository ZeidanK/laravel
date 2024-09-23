<!--
  This example requires updating your template:

  ```
  <html class="h-full bg-gray-100">
  <body class="h-full">
  ```
-->
<!DOCTYPE html>
<html class="h-full bg-gray-100">
<head>
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.2/dist/tailwind.min.css" rel="stylesheet">
</head>

<div class="min-h-full">
    <nav class="bg-gray-800">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
          <div class="flex items-center">
            <div class="flex-shrink-0">
              <img class="h-8 w-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
            </div>
                        <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-4">
                    <a href="#" id="dashboard-link" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white" aria-current="page">Dashboard</a>
                    <a href="#" id="team-link" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Team</a>
                    <a href="#" id="projects-link" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Projects</a>
                    <a href="#" id="calendar-link" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Calendar</a>
                    <a href="#" id="reports-link" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Reports</a>
                </div>
            </div>
          </div>
          {{-- <div class="hidden md:block">
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
                    <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
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
                <div class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                  <!-- Active: "bg-gray-100", Not Active: "" -->
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
                </div>
              </div>
            </div>
          </div> --}}
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
              <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
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
            <?php
                try {
                    $pdo = DB::connection()->getPdo();
                    echo "<p>Database connection successful!</p>";
                } catch (\Exception $e) {
                    echo "<p>Database connection failed: " . $e->getMessage() . "</p>";
                }
                $users = DB::table('users')->get();
                echo "<p>Users:</p>";

                foreach ($users as $user) {
                    echo "<p>$user->name</p>";
                }






            ?>
            <table>
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
            </table>
        </div>

        <!-- Team Content -->
        <div id="team-content" class="content-section hidden">
            <h1>Team Content</h1>





            <!--
// v0 by Vercel.
// https://v0.dev/t/AuZwBrYwwB1
-->

<style>:root{--background:0 0% 100%;--foreground:240 10% 3.9%;--card:0 0% 100%;--card-foreground:240 10% 3.9%;--popover:0 0% 100%;--popover-foreground:240 10% 3.9%;--primary:240 5.9% 10%;--primary-foreground:0 0% 98%;--secondary:240 4.8% 95.9%;--secondary-foreground:240 5.9% 10%;--muted:240 4.8% 95.9%;--muted-foreground:240 3.8% 45%;--accent:240 4.8% 95.9%;--accent-foreground:240 5.9% 10%;--destructive:0 72% 51%;--destructive-foreground:0 0% 98%;--border:240 5.9% 90%;--input:240 5.9% 90%;--ring:240 5.9% 10%;--chart-1:173 58% 39%;--chart-2:12 76% 61%;--chart-3:197 37% 24%;--chart-4:43 74% 66%;--chart-5:27 87% 67%;--radius:0.5rem;}img[src="/placeholder.svg"],img[src="/placeholder-user.jpg"]{filter:sepia(.3) hue-rotate(-60deg) saturate(.5) opacity(0.8) }</style>
<style>h1, h2, h3, h4, h5, h6 { font-family: 'Inter', sans-serif; --font-sans-serif: 'Inter'; }
</style>
<style>body { font-family: 'Inter', sans-serif; --font-sans-serif: 'Inter'; }
</style>
<div class="flex min-h-screen w-full flex-col bg-muted/40">
  <header class="sticky top-0 z-30 flex h-14 items-center gap-4 border-b bg-background px-4 sm:static sm:h-auto sm:border-0 sm:bg-transparent sm:px-6">
    <button
      class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 w-10 sm:hidden"
      type="button"
      aria-haspopup="dialog"
      aria-expanded="false"
      aria-controls="radix-:rs:"
      data-state="closed"
    >
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="24"
        height="24"
        viewBox="0 0 24 24"
        fill="none"
        stroke="currentColor"
        stroke-width="2"
        stroke-linecap="round"
        stroke-linejoin="round"
        class="h-5 w-5"
      >
        <line x1="4" x2="20" y1="12" y2="12"></line>
        <line x1="4" x2="20" y1="6" y2="6"></line>
        <line x1="4" x2="20" y1="18" y2="18"></line>
      </svg>
      <span class="sr-only">Toggle Menu</span>
    </button>
    <nav aria-label="breadcrumb" class="hidden md:flex">
      <ol class="flex flex-wrap items-center gap-1.5 break-words text-sm text-muted-foreground sm:gap-2.5">
        <li class="inline-flex items-center gap-1.5">
          <a class="transition-colors hover:text-foreground" href="#" rel="ugc">
            Dashboard
          </a>
        </li>
        <li aria-hidden="true" class="[&amp;>svg]:size-3.5" role="presentation">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
            class="lucide lucide-chevron-right"
          >
            <path d="m9 18 6-6-6-6"></path>
          </svg>
        </li>
        <li class="inline-flex items-center gap-1.5">
          <span aria-current="page" aria-disabled="true" class="font-normal text-foreground" role="link">
            Orders
          </span>
        </li>
      </ol>
    </nav>
    <div class="relative ml-auto flex-1 md:grow-0">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="24"
        height="24"
        viewBox="0 0 24 24"
        fill="none"
        stroke="currentColor"
        stroke-width="2"
        stroke-linecap="round"
        stroke-linejoin="round"
        class="absolute left-2.5 top-2.5 h-4 w-4 text-muted-foreground"
      >
        <circle cx="11" cy="11" r="8"></circle>
        <path d="m21 21-4.3-4.3"></path>
      </svg>
      <input
        class="flex h-10 border border-input px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 w-full rounded-lg bg-background pl-8 md:w-[200px] lg:w-[336px]"
        placeholder="Search..."
        type="search"
      />
    </div>
    <button
      class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 w-10 overflow-hidden rounded-full"
      type="button"
      id="radix-:rv:"
      aria-haspopup="menu"
      aria-expanded="false"
      data-state="closed"
    >
      <img
        src="/placeholder.svg"
        width="36"
        height="36"
        alt="Avatar"
        class="overflow-hidden rounded-full"
        style="aspect-ratio: 36 / 36; object-fit: cover;"
      />
    </button>
  </header>
  <main class="grid flex-1 items-start gap-4 p-4 sm:px-6 sm:py-0 md:gap-8">
    <div class="grid auto-rows-max items-start gap-4 md:gap-8 lg:col-span-2">
      <div dir="ltr" data-orientation="horizontal">
        <div class="flex items-center">
          <div
            role="tablist"
            aria-orientation="horizontal"
            class="inline-flex h-9 items-center justify-center rounded-lg bg-muted p-1 text-muted-foreground"
            tabindex="0"
            data-orientation="horizontal"
            style="outline: none;"
          >
            <button
              type="button"
              role="tab"
              aria-selected="true"
              aria-controls="radix-:r11:-content-all"
              data-state="active"
              id="radix-:r11:-trigger-all"
              class="inline-flex items-center justify-center whitespace-nowrap rounded-md px-3 py-1 text-sm font-medium ring-offset-background transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 data-[state=active]:bg-background data-[state=active]:text-foreground data-[state=active]:shadow"
              tabindex="-1"
              data-orientation="horizontal"
              data-radix-collection-item=""
            >
              All
            </button>
            <button
              type="button"
              role="tab"
              aria-selected="false"
              aria-controls="radix-:r11:-content-pending"
              data-state="inactive"
              id="radix-:r11:-trigger-pending"
              class="inline-flex items-center justify-center whitespace-nowrap rounded-md px-3 py-1 text-sm font-medium ring-offset-background transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 data-[state=active]:bg-background data-[state=active]:text-foreground data-[state=active]:shadow"
              tabindex="-1"
              data-orientation="horizontal"
              data-radix-collection-item=""
            >
              Pending
            </button>
            <button
              type="button"
              role="tab"
              aria-selected="false"
              aria-controls="radix-:r11:-content-fulfilled"
              data-state="inactive"
              id="radix-:r11:-trigger-fulfilled"
              class="inline-flex items-center justify-center whitespace-nowrap rounded-md px-3 py-1 text-sm font-medium ring-offset-background transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 data-[state=active]:bg-background data-[state=active]:text-foreground data-[state=active]:shadow"
              tabindex="-1"
              data-orientation="horizontal"
              data-radix-collection-item=""
            >
              Fulfilled
            </button>
            <button
              type="button"
              role="tab"
              aria-selected="false"
              aria-controls="radix-:r11:-content-cancelled"
              data-state="inactive"
              id="radix-:r11:-trigger-cancelled"
              class="inline-flex items-center justify-center whitespace-nowrap rounded-md px-3 py-1 text-sm font-medium ring-offset-background transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 data-[state=active]:bg-background data-[state=active]:text-foreground data-[state=active]:shadow"
              tabindex="-1"
              data-orientation="horizontal"
              data-radix-collection-item=""
            >
              Cancelled
            </button>
          </div>
          <div class="ml-auto flex items-center gap-2">
            <button
              class="inline-flex items-center justify-center whitespace-nowrap font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground rounded-md px-3 h-8 gap-1 text-sm"
              type="button"
              id="radix-:r16:"
              aria-haspopup="menu"
              aria-expanded="false"
              data-state="closed"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="h-3.5 w-3.5"
              >
                <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
              </svg>
              <span class="sr-only sm:not-sr-only">Filter</span>
            </button>
            <button class="inline-flex items-center justify-center whitespace-nowrap font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground rounded-md px-3 h-8 gap-1 text-sm">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="h-3.5 w-3.5"
              >
                <path d="M12 3v12"></path>
                <path d="m8 11 4 4 4-4"></path>
                <path d="M8 5H4a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-4"></path>
              </svg>
              <span class="sr-only sm:not-sr-only">Export</span>
            </button>
          </div>
        </div>
        <div
          data-state="active"
          data-orientation="horizontal"
          role="tabpanel"
          aria-labelledby="radix-:r11:-trigger-all"
          id="radix-:r11:-content-all"
          tabindex="0"
          class="mt-2 ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2"
          style="animation-duration: 0s;"
        >
          <div class="rounded-lg border bg-card text-card-foreground shadow-sm" data-v0-t="card">
            <div class="flex flex-col space-y-1.5 p-6 px-7">
              <h3 class="whitespace-nowrap text-2xl font-semibold leading-none tracking-tight">Orders</h3>
              <p class="text-sm text-muted-foreground">Recent orders from your store.</p>
            </div>
            <div class="p-6">
              <div class="relative w-full overflow-auto">
                <table class="w-full caption-bottom text-sm">
                  <thead class="[&amp;_tr]:border-b">
                    <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                      <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                        Customer
                      </th>
                      <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0 hidden sm:table-cell">
                        Type
                      </th>
                      <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0 hidden sm:table-cell">
                        Status
                      </th>
                      <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0 hidden md:table-cell">
                        Date
                      </th>
                      <th class="h-12 px-4 align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0 text-right">
                        Amount
                      </th>
                    </tr>
                  </thead>
                  <tbody class="[&amp;_tr:last-child]:border-0">
                    <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted bg-accent">
                      <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">
                        <div class="font-medium">Liam Johnson</div>
                        <div class="hidden text-sm text-muted-foreground md:inline">liam@example.com</div>
                      </td>
                      <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 hidden sm:table-cell">Sale</td>
                      <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 hidden sm:table-cell">
                        <div
                          class="inline-flex w-fit items-center whitespace-nowrap rounded-full border px-2.5 py-0.5 font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent bg-secondary text-secondary-foreground hover:bg-secondary/80 text-xs"
                          data-v0-t="badge"
                        >
                          Fulfilled
                        </div>
                      </td>
                      <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 hidden md:table-cell">
                        2023-06-23
                      </td>
                      <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 text-right">$250.00</td>
                    </tr>
                    <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                      <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">
                        <div class="font-medium">Olivia Smith</div>
                        <div class="hidden text-sm text-muted-foreground md:inline">olivia@example.com</div>
                      </td>
                      <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 hidden sm:table-cell">
                        Refund
                      </td>
                      <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 hidden sm:table-cell">
                        <div
                          class="inline-flex w-fit items-center whitespace-nowrap rounded-full border px-2.5 py-0.5 font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 text-foreground text-xs"
                          data-v0-t="badge"
                        >
                          Cancelled
                        </div>
                      </td>
                      <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 hidden md:table-cell">
                        2023-06-24
                      </td>
                      <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 text-right">$150.00</td>
                    </tr>
                    <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                      <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">
                        <div class="font-medium">Noah Williams</div>
                        <div class="hidden text-sm text-muted-foreground md:inline">noah@example.com</div>
                      </td>
                      <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 hidden sm:table-cell">
                        Subscription
                      </td>
                      <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 hidden sm:table-cell">
                        <div
                          class="inline-flex w-fit items-center whitespace-nowrap rounded-full border px-2.5 py-0.5 font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent bg-secondary text-secondary-foreground hover:bg-secondary/80 text-xs"
                          data-v0-t="badge"
                        >
                          Fulfilled
                        </div>
                      </td>
                      <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 hidden md:table-cell">
                        2023-06-25
                      </td>
                      <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 text-right">$350.00</td>
                    </tr>
                    <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                      <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">
                        <div class="font-medium">Emma Brown</div>
                        <div class="hidden text-sm text-muted-foreground md:inline">emma@example.com</div>
                      </td>
                      <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 hidden sm:table-cell">Sale</td>
                      <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 hidden sm:table-cell">
                        <div
                          class="inline-flex w-fit items-center whitespace-nowrap rounded-full border px-2.5 py-0.5 font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent bg-secondary text-secondary-foreground hover:bg-secondary/80 text-xs"
                          data-v0-t="badge"
                        >
                          Fulfilled
                        </div>
                      </td>
                      <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 hidden md:table-cell">
                        2023-06-26
                      </td>
                      <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 text-right">$450.00</td>
                    </tr>
                    <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                      <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">
                        <div class="font-medium">Liam Johnson</div>
                        <div class="hidden text-sm text-muted-foreground md:inline">liam@example.com</div>
                      </td>
                      <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 hidden sm:table-cell">Sale</td>
                      <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 hidden sm:table-cell">
                        <div
                          class="inline-flex w-fit items-center whitespace-nowrap rounded-full border px-2.5 py-0.5 font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent bg-secondary text-secondary-foreground hover:bg-secondary/80 text-xs"
                          data-v0-t="badge"
                        >
                          Fulfilled
                        </div>
                      </td>
                      <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 hidden md:table-cell">
                        2023-06-23
                      </td>
                      <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 text-right">$250.00</td>
                    </tr>
                    <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                      <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">
                        <div class="font-medium">Olivia Smith</div>
                        <div class="hidden text-sm text-muted-foreground md:inline">olivia@example.com</div>
                      </td>
                      <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 hidden sm:table-cell">
                        Refund
                      </td>
                      <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 hidden sm:table-cell">
                        <div
                          class="inline-flex w-fit items-center whitespace-nowrap rounded-full border px-2.5 py-0.5 font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 text-foreground text-xs"
                          data-v0-t="badge"
                        >
                          Cancelled
                        </div>
                      </td>
                      <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 hidden md:table-cell">
                        2023-06-24
                      </td>
                      <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 text-right">$150.00</td>
                    </tr>
                    <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                      <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">
                        <div class="font-medium">Emma Brown</div>
                        <div class="hidden text-sm text-muted-foreground md:inline">emma@example.com</div>
                      </td>
                      <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 hidden sm:table-cell">Sale</td>
                      <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 hidden sm:table-cell">
                        <div
                          class="inline-flex w-fit items-center whitespace-nowrap rounded-full border px-2.5 py-0.5 font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent bg-secondary text-secondary-foreground hover:bg-secondary/80 text-xs"
                          data-v0-t="badge"
                        >
                          Fulfilled
                        </div>
                      </td>
                      <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 hidden md:table-cell">
                        2023-06-26
                      </td>
                      <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 text-right">$450.00</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="flex items-center p-6">
              <div class="text-xs text-muted-foreground">
                Showing <strong>1-10</strong> of <strong>32</strong>orders
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</div>




            <!-- Your team content here -->
        </div>

        <!-- Projects Content -->
        <div id="projects-content" class="content-section hidden">
            <h1>Projects Content</h1>
            <!-- Your projects content here -->

            <?php
            DB::table('events')->get();
            $events = DB::table('events')->get();
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

use App\Models\Event;

            //$events = DB::table('events')->get(where ('user_id', '=', 1));
            $events = Event::where('user_id', 1)->get();

            // echo "$events";
            ?>

            {{-- <body>
            @livewireScripts
            <livewire:guest-pie-chart :events="$events" />
            @stack('scripts')


            <livewire:guest-table-display :events="$events" />
            @livewireStyles

            </body> --}}
            {{-- @extends('layouts.app')

            @section('content')
                <h1>Admin Dashboard</h1>
                @livewire('guest-table-display')
            @endsection --}}
            @inject('event', 'App\Models\Event')


            @livewireStyles
    <livewire:guest-pie-chart :events="$events" />
    <livewire:guest-table-display :events="$events" />
    @livewireScripts
    @stack('scripts')

            <!-- Your calendar content here -->
        </div>

        <!-- Reports Content -->
        <div id="reports-content" class="content-section hidden">
            <h1>Reports Content</h1>
            <!-- Your reports content here -->
        </div>
    </div>
    </main>
  </div>

</html>


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
