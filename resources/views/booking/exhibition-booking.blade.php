@extends('layouts.app')
@php
$title = 'Exhibition Bookings';
@endphp

@section('content')
<div class="container mx-auto bg-white shadow-inner rounded-lg mt-10 p-5 lg:px-16">
    <div class="justify-start my-10">
        <h4 class="text-3xl font-medium">My exhibition bookings list</h4>
    </div>
    <div class="">
        <livewire:list-booked-exhibitions />
    </div>


</div>

@endsection
