<!doctype html>
<html>

<head>
    @include('includes.head')
</head>

<body>
    <div class="flex flex-col h-screen justify-between">
        <header>
            @include('includes.header')
        </header>
        <main class="mb-auto">
            @yield('content')
        </main>
        <footer>
            @include('includes.footer')
        </footer>

    </div>

    {{-- @livewireScripts --}}
    @filamentScripts
    @vite('resources/js/app.js')

</body>

</html>
