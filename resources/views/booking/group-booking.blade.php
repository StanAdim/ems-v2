@extends('layouts.app')
@use ('App\Enums\BookingType')
@php
    $title = 'Group Bookings';
@endphp

@section('content')
    <div class="container mx-auto mt-10 rounded-lg bg-white p-5 shadow-inner lg:px-16">
        <div class="my-10 justify-start">
            <h4 class="text-3xl font-medium">List of group bookings</h4>
        </div>
        <div class="">
            @livewire('booked-events-list', ['bookingType' => BookingType::Group])
        </div>

    </div>
@endsection
