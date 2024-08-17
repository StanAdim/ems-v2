<!doctype html>
<html>

<head>
    @include('includes.head')
</head>

<body>
    <div class="flex flex-col h-screen justify-between">
        <header>
            @include('includes.app-header')
        </header>
        <main class="w-full">
            @yield('content')
            {{$slot}}
        </main>
        <footer>
            @include('includes.app-footer')
        </footer>

    </div>

    @vite('resources/js/app.js')

</body>

</html>

{{-- <body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</body> --}}
