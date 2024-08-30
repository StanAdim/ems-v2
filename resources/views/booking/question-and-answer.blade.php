@extends('layouts.app')

@section('content')
    @php
        $title = 'Questions & Answers';
    @endphp
    <div class="container mx-auto  bg-white shadow-inner rounded-lg mt-10 p-5 lg:px-16">
        <livewire:event-conversations :eventId='$eventId' >
    </div>
@endsection
