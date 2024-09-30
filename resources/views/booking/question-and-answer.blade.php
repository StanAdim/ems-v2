@extends('layouts.app')

@section('content')
    @php
        $title = 'Questions & Answers';
    @endphp

    @if ($event)
        <div class="container mx-auto mt-10 rounded-lg bg-white p-5 shadow-inner lg:px-16">
            <livewire:event-question-and-answers :eventId='$event->id'>
        </div>
    @else
        <div class="mx-4 grid grid-cols-2 gap-10 xl:grid-cols-4">
            @foreach ($activeEvents as $e)
                <div class="max-w-sm overflow-hidden rounded-lg border border-gray-500 bg-[#F7F7F7] p-5 shadow-lg"
                    x-data="{ open: false }">
                    <div>
                        <img class="w-full rounded-lg" src="{{ $e->imageUrl }}" alt="{{ $e->title }}">
                    </div>
                    <div class="lg:px-6 lg:py-4">
                        <div class="mb-2 text-xl font-medium">{{ $e->title }}</div>
                        <p class="text-sm text-gray-700">
                            {{ $e->location }}
                        </p>
                    </div>

                    <div class="w-full flex">
                        <x-primary-link-button href="{{ $e->route }}"
                            class="text-center w-full items-center rounded-md border border-transparent bg-primary px-4 py-2 text-sm font-normal tracking-widest text-white transition duration-150 ease-in-out hover:bg-brand focus:bg-brand focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 active:bg-brand">
                            See Q&A
                        </x-primary-link-button>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
