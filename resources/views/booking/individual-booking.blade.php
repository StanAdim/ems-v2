@extends('layouts.app')

@php
$title = 'Individual Bookings';
@endphp

@section('content')
<div class="container mx-auto bg-white shadow-inner rounded-lg mt-10 p-5 lg:px-16">
    <div class="justify-start my-10">
        <h4 class="text-3xl font-medium">List of individual bookings</h4>
    </div>
    <div class="">
        {{-- @livewire('booked-events-table') --}}
        @livewire('booked-events-list', ['bookingType' => 'single'])
    </div>


</div>

@endsection
