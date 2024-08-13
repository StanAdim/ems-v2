@php
    $eventLinks = [
        [
            'title' => 'About',
            'url' => route('event.about', $event->id),
        ],
        [
            'title' => 'Participant',
            'url' => route('event.participant', $event->id),
        ],
    ];
@endphp

@extends('layouts.app')

@section('header')
    <header class="bg-brand">
        <nav class="mx-auto flex  items-center justify-between p-4 lg:px-8" aria-label="Global">
            <div class="flex lg:flex-1">
                <a href="/" class="-m-1.5 p-1.5">
                    <span class="sr-only">ICT Commission</span>
                </a>
            </div>
            <div class="flex flex-1 lg:hidden " x-data="{ menuOpen: false }">
                <a href="/" class="text-sm font-semibold leading-6 mr-auto">Home</a>
                <button @click="$store.menu.toggle()" type="button" aria-controls="mobile-menu"
                    class="-my-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>

            <x-event-navbar :items="$eventLinks" />

            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
            </div>
        </nav>

        <!-- Mobile menu, show/hide based on menu open state. -->
        <div id="mobile-menu" x-show="$store.menu.open" x-data role="dialog" aria-modal="true">
            <!-- Background backdrop, show/hide based on slide-over state. -->
            <div class="fixed inset-0 z-10"></div>
            <div
                class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                <div class="flex items-center justify-between">
                    <a href="/" class="-m-1.5 p-1.5">
                        <span class="sr-only">ICT COMMISSION</span>
                        <img class="h-12 w-auto" src="{{ Vite::asset('resources/images/ictc_logo.png') }}" alt="">
                    </a>
                    <button @click="$store.menu.close()" type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                        <span class="sr-only">Close menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="mt-6 flow-root">
                    <div class="-my-6 divide-y divide-gray-500/10">
                        <div class="space-y-2 py-6">

                            <a href="/contact-us"
                                class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Contact
                                Us</a>
                            <a href="/invest/invest-in-tanzania"
                                class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Invest
                                In Tanzania</a>

                        </div>
                        {{-- <div class="py-6">
                        <a href="#"
                            class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Log
                            in</a>
                    </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </header>
    <hr>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('menu', {
                open: false,
                toggle() {
                    this.open = !this.open;
                },
                close() {
                    this.open = false;
                }
            });
        });
    </script>
@endsection

