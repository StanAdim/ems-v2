<!doctype html>
<html>

<head>
    @include('includes.head')
</head>

<body>
    <div class="grid grid-cols-1 h-screen justify-between">
        @include('includes.app-sidebar')
        <div class="w-full bg-brand">
            <header>
                @include('includes.app-top-bar')
                {{-- @include('includes.app-header') --}}
                {{-- @include('includes.app-sidebar-new') --}}
            </header>
            <div class="relative top-16 mb-auto bg-gray-300 my-2 rounded-2xl ml-2 md:ml-64 mr-2 ">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                    type="button"
                    class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                        </path>
                    </svg>
                </button>

                @include('includes.app-header')

                <div class="h-5/6 py-4">
                    @yield('content')
                    {{ $slot }}
                </div>
            </div>
            <div class="py-5"></div>
            {{-- @include('includes.app-sidebar') --}}

            {{-- <div class="flex">
                <div class="flex-[0.3]">
                    @include('includes.app-sidebar')
                </div>
                <div>
                    @yield('content') --}}
            {{-- @include('includes.app-sidebar') --}}
            {{-- {{$slot}}
                </div>
            </div> --}}
        </div>
        {{-- <footer>
            @include('includes.app-footer')
        </footer> --}}

    </div>

    {{-- @livewireScripts --}}
    @livewireScriptConfig
    @filamentScripts
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
