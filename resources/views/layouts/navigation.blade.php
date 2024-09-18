<nav x-data="{ open: false }" class="rounded-t-2xl border-b border-gray-100 bg-white">
    <!-- Primary Navigation Menu -->
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 justify-between">
            {{-- <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
            </div> --}}
            <div class="my-auto hidden text-2xl font-medium lg:flex">
                @if (isset($title))
                    {{ $title }}
                @endif
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:ms-6 sm:flex sm:items-center">
                <x-dropdown align="right" width="64">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center gap-2 rounded-full border bg-white px-6 py-1.5 text-sm font-medium leading-4 text-black transition duration-150 ease-in-out hover:text-gray-700 focus:outline-none">
                            <x-heroicon-o-user class="w-8 rounded-full border bg-gray-300 p-1" />
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="grid grid-cols-1 justify-items-center py-8 text-center">

                            <x-heroicon-o-user class="w-12 rounded-full border bg-gray-300 p-1" />

                            <div>
                                <span class="text-xl font-medium">
                                    {{ Auth::user()->name }}
                                </span>

                                <span class="text-sm">
                                    {{ Auth::user()->profile?->position }}
                                </span>
                            </div>

                            <span class="text-sm text-primary">
                                {{ Auth::user()->email }}
                            </span>

                            @if (Auth::user()->profile)
                                <div class="my-2 grid grid-cols-1 text-sm">
                                    <span class="font-medium">Professional Status</span>
                                    <span class="text-gray-700">{{ Auth::user()->profile?->registration_status }}</span>
                                </div>

                                {{-- <div class="mx-12 my-2 mb-8 w-full border-t-2"></div>

                                <div class="my-2 grid grid-cols-1 text-sm">
                                    <span class="font-medium">Professional Status</span>
                                    <span class="text-gray-700">{{ Auth::user()->profile?->registration_status }}</span>
                                </div> --}}
                            @endif

                            <a class="mt-8 mb-2 w-full items-center rounded-md border border-transparent bg-primary py-2 text-sm font-semibold tracking-widest text-white transition duration-150 ease-in-out hover:bg-brand focus:bg-brand focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 active:bg-brand"
                                href="{{ route('profile.edit') }}">
                                {{ __('Profile') }}
                            </a>

                            @role('panel_user')
                                <x-dropdown-link class="my-2 rounded-sm" :href="route('filament.events.resources.event-models.index')">
                                    {{ __('Administration Panel') }}
                                </x-dropdown-link>
                            @endrole

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link class="my-2 flex justify-center rounded-sm text-red-500" :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">

                                    <img src="{{ Vite::asset('resources/images/icons/fi-rr-sign-out.svg') }}">
                                    <span>{{ __('Log Out') }}</span>
                                </x-dropdown-link>
                            </form>
                        </div>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 transition duration-150 ease-in-out hover:bg-gray-100 hover:text-gray-500 focus:bg-gray-100 focus:text-gray-500 focus:outline-none">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="space-y-1 pb-3 pt-2">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="border-t border-gray-200 pb-1 pt-4">
            <div class="px-4">
                <div class="text-base font-medium text-gray-800">{{ Auth::user()->name }}</div>
                <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                @role('panel_user')
                    <x-responsive-nav-link :href="route('filament.events.resources.event-models.index')">
                        {{ __('Administration Panel') }}
                    </x-responsive-nav-link>
                @endrole

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
