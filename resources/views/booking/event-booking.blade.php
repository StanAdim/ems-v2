@extends('layouts.app')

@php
    $title = 'Event Bookings';
@endphp

@section('content')
    <div class="container mx-auto mt-10 rounded-lg bg-white p-5 shadow-inner lg:px-16">
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
@endsection
