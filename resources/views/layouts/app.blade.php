<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">

            <x-jocko::preview-alert />

            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <main>
                @if(!request()->routeIs('search.*'))
                    <form method="GET" action="{{ route('search.index', absolute: false) }}">
                        <label for="search">Search posts</label>
                        <input type="search" name="query" id="search" :value="searchParams.get('query')" autocomplete="off">

                        <input type="submit" value="Search">
                    </form>
                @endif

                {{ $slot }}
            </main>

            <footer class="mt-6">
                <a href="{{ app(\App\Settings\Settings::class)->fb_url }}">Facebook</a>
            </footer>
        </div>
    </body>
</html>
