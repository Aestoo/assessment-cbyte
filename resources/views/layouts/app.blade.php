<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'PassSecure') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="flex flex-col h-screen justify-between">
    <header class="h-15 bg-gray-900 text-white fixed w-full z-10">
        <div class="container mx-auto flex p-2 justify-between items-center">
            <a  href="/" class="text-xl font-bold">{{ config('app.name', 'PassSecure') }}</a>
            <nav>
                <div
                    class="flex flex-col md:flex-row my-2 me-2 border border-white hover:bg-gray-700 px-2 py-1 rounded-2xl ">
                    <a href="/share-password">Share Password</a>
                </div>
            </nav>
        </div>

    </header>
    <main class="mb-auto container mx-auto p-4 mt-14">
        @yield('content')
    </main>
    <footer class="bg-gray-900 text-white p-4 mt-4">
        <div class="container mx-auto text-center">
            &copy; {{ date('Y') }} PassSecure. All rights reserved.
        </div>
    </footer>
</div>
</body>
</html>
