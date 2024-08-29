@php
$title = 'Home';
@endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>


    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div> --}}
    <div class="container mx-auto mt-10">
        <h2 class="text-3xl font-medium">Welcome, {{ auth()->user()->name }}</h2>
    </div>
    <div class="container mx-auto">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-10">
            {{-- @livewire('dashboard-card') --}}
            @livewire('dashboard-card', ['title' => 'Booked events', 'description' => 'The numbers of events you have booked so far', 'route' => 'event-booking', 'count' => 4])
            @livewire('dashboard-card', ['title' => 'Planned events', 'description' => 'Here are the events saved in your calendar', 'route' => 'my-booking', 'count' => 4])
            @livewire('dashboard-card', ['title' => 'Pending payments', 'description' => 'Here are the events saved in your calendar', 'route' => 'event-booking', 'count' => 4])
            @livewire('dashboard-card', ['title' => 'Invoices ', 'description' => 'Here are the events saved in your calendar', 'route' => 'event-booking', 'count' => 4])

        </div>
    </div>
    <div class="max-h-svh bg-white container mt-10 rounded-lg h-screen mx-auto ">

    </div>
</x-app-layout>
