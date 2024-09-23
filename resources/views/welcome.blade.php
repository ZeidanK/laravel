<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Laravel</title>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.2/dist/tailwind.min.css" rel="stylesheet">
    </head>
    <body>
        <!--
// v0 by Vercel.
// https://v0.dev/t/kuyZYMfZQKp
-->
@if($errors->any())

    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            <p>Invalid email or password</p>
        @endforeach
    </ul>
    </div>
@endif

<style>:root{--background:0 0% 100%;--foreground:240 10% 3.9%;--card:0 0% 100%;--card-foreground:240 10% 3.9%;--popover:0 0% 100%;--popover-foreground:240 10% 3.9%;--primary:240 5.9% 10%;--primary-foreground:0 0% 98%;--secondary:240 4.8% 95.9%;--secondary-foreground:240 5.9% 10%;--muted:240 4.8% 95.9%;--muted-foreground:240 3.8% 45%;--accent:240 4.8% 95.9%;--accent-foreground:240 5.9% 10%;--destructive:0 72% 51%;--destructive-foreground:0 0% 98%;--border:240 5.9% 90%;--input:240 5.9% 90%;--ring:240 5.9% 10%;--chart-1:173 58% 39%;--chart-2:12 76% 61%;--chart-3:197 37% 24%;--chart-4:43 74% 66%;--chart-5:27 87% 67%;--radius:0.5rem;}img[src="/placeholder.svg"],img[src="/placeholder-user.jpg"]{filter:sepia(.3) hue-rotate(-60deg) saturate(.5) opacity(0.8) }</style>
<style>h1, h2, h3, h4, h5, h6 { font-family: 'Inter', sans-serif; --font-sans-serif: 'Inter'; }
</style>
<style>body { font-family: 'Inter', sans-serif; --font-sans-serif: 'Inter'; }
</style>
<div class="flex items-center justify-center h-screen">
  <div class="rounded-lg border bg-card text-card-foreground shadow-sm w-full max-w-md p-6" data-v0-t="card">
    <div class="flex flex-col space-y-1.5 p-6">
      <h3 class="whitespace-nowrap tracking-tight text-2xl font-bold">Welcome to Our Wedding</h3>
      <p class="text-sm text-muted-foreground">Please log in to access our wedding website.</p>
    </div>
    <div class="p-6 space-y-4">
    <form action="{{ url('login') }}" method="post">
      @csrf
      <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" name="email" id="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
      </div>
      <div class="mb-4">
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <input type="password" name="password" id="password" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
      </div>
      <div class="flex items-center justify-end">
        <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 active:bg-indigo-700 focus:outline-none focus:border-indigo-700 focus:ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">Log in</button>
      </div>
    </form>
    </div>
    </div>
    </div>
    </body>
    <body>
        <div>
            <livewire:hello-world />
        </div>
    </body>
</html>
