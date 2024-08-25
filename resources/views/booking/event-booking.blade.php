@extends('layouts.app')

@php
$title = 'Event Bookings';
@endphp

@section('content')
    <div class="container mx-auto bg-white shadow-inner rounded-lg mt-10 p-5 lg:px-16">
        <div class="justify-start my-10">
            <h4 class="text-3xl font-medium">Upcoming Events</h4>
        </div>
        <div class="grid grid-cols-2 xl:grid-cols-4 gap-10">
            @php
                $events = [
                    [
                        'title' => 'The Tanzania Annual ICT Conference 2024',
                        'location' => 'Tan House, 9th Floor, Victoria, Dar es Salaam',
                        'image' => 'resources/images/event-card.svg',
                        'route' => route('event-booking', ['id' => 1]),
                    ],
                    [
                        'title' => 'Zanzibar International Film Festival',
                        'location' => 'Ngome Kongwe, Stone Town, Zanzibar',
                        'image' => 'resources/images/event-card.svg',
                        'route' => route('event-booking', ['id' => 2]),
                    ],
                    [
                        'title' => 'Arusha Tourism Expo 2024',
                        'location' => 'Arusha International Conference Centre',
                        'image' => 'resources/images/event-card.svg',
                        'route' => route('event-booking', ['id' => 3]),
                    ],
                    [
                        'title' => 'Dar es Salaam Tech Meetup',
                        'location' => 'Buni Hub, Dar es Salaam',
                        'image' => 'resources/images/event-card.svg',
                        'route' => route('event-booking', ['id' => 4]),
                    ],
                    [
                        'title' => 'Kilimanjaro Music Festival',
                        'location' => 'Moshi, Kilimanjaro',
                        'image' => 'resources/images/event-card.svg',
                        'route' => route('event-booking', ['id' => 5]),
                    ],
                ];
            @endphp

            @foreach ($upcomingEvents as $event)
                <livewire:event-card title="{{ $event['title'] }}" location="{{ $event['location'] }}"
                    imageUrl="{{ $event['imageUrl'] }}" route="{{ $event['route'] }}" />
            @endforeach


        </div>


    </div>
@endsection
