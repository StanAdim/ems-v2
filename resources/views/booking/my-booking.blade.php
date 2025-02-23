@extends('layouts.app')


@php
$title = 'My Bookings';
@endphp

@section('content')
<style>
    [x-cloak] {
        display: none !important;
    }
    /* .fi-btn-label {
        @apply text-primary bg-brand !important;
    } */
</style>

<div class="container mx-auto bg-white shadow-inner rounded-lg mt-10 p-5 lg:px-16">
    <div class="justify-start my-10">
        <h4 class="text-3xl font-medium">List of Tickets for Booked Events</h4>
    </div>
    <div class="">
        {{-- @livewire('booked-events-table') --}}
        @livewire('booked-events-list')
    </div>


</div>
@endsection

