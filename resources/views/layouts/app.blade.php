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
        <main class="mb-auto px-2 xl:px-64">
            @yield('content')
        </main>
        <footer>
            @include('includes.footer')
        </footer>

    </div>

    @vite('resources/js/app.js')

</body>

</html>
