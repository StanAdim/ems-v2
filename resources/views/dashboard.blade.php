@php
    $title = 'Home';
@endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
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
        <div class="grid grid-cols-2 gap-10 lg:grid-cols-4">
            {{-- @livewire('dashboard-card') --}}
            @if (Auth::user()->canExhibit())
                @livewire('dashboard-card', ['title' => 'Exhibited Events', 'description' => 'The numbers of events you have exhibited so far', 'route' => 'exhibition-booking', 'count' => $myExhibitionsCount])
            @else
                @livewire('dashboard-card', ['title' => 'Booked events', 'description' => 'The numbers of events you have booked so far', 'route' => 'my-booking', 'count' => $myBookingCount])
            @endif
            @livewire('dashboard-card', ['title' => 'Planned events', 'description' => 'Here are the events saved in your calendar', 'route' => 'my-booking', 'count' => $activeEvents])
            @livewire('dashboard-card', ['title' => 'Pending payments', 'description' => 'The number of bookings you have not paid yet.', 'route' => Auth::user()->canExhibit() ? 'exhibition-booking' : 'event-booking', 'count' => $pendingPaymentsCount])
            @livewire('dashboard-card', ['title' => 'Invoices ', 'description' => 'Here are your invoices.', 'route' => 'event-booking', 'count' => $pendingPaymentsCount])

        </div>
    </div>
    <div class="snap-y container mx-auto mt-10 rounded-lg bg-white p-5 px-10">
        <div class="my-10 justify-start">
            <h4 class="text-3xl font-medium">Upcoming Events</h4>
        </div>
        <div class="grid grid-cols-2 gap-10 xl:grid-cols-4">
            @foreach ($upcomingEvents as $event)
                <x-event-card title="{{ $event['title'] }}" location="{{ $event['location'] }}"
                    imageUrl="{{ $event['imageUrl'] }}" route="{{ $event['route'] }}" :event="$event['model']" />
            @endforeach
        </div>
    </div>
</x-app-layout>
