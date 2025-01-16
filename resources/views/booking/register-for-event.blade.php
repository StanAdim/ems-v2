@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-10 rounded-lg bg-white p-5 shadow-inner lg:px-16">
        @if (Auth::user()->canExhibit())
            <livewire:make-event-exhibition-booking :eventId="$event->id" :lazy="true" />
        @else
            <livewire:create-event-booking :event="$event" :lazy="true">
        @endif
    </div>
@endsection
