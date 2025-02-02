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
                <div class="max-w-sm overflow-hidden rounded-lg border border-gray-500 bg-[#F7F7F7] p-5 shadow-lg">
                    <div>
                        <img class="w-full rounded-lg" src="{{ $e->imageUrl }}" alt="{{ $e->title }}">
                    </div>
                    <div class="lg:px-6 lg:py-4">
                        <div class="mb-2 text-xl font-medium">{{ $e->title }}</div>
                        <p class="text-sm text-gray-700">
                            {{ $e->location }}
                        </p>
                    </div>

                    <div class="flex w-full">
                        @can('askQuestion', $e->model)
                            <x-primary-link-button href="{{ $e->route }}"
                                class="w-full items-center rounded-md border border-transparent bg-primary px-4 py-2 text-center text-sm font-normal tracking-widest text-white transition duration-150 ease-in-out hover:bg-brand focus:bg-brand focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 active:bg-brand">
                                See Q&A
                            </x-primary-link-button>
                        @endcan
                    </div>
                </div>
            @endforeach

            @if ($numOfEvents < 1)
                <div id="alert-border-1"
                    class="col-span-2 mb-4 flex items-center border-t-4 border-primary-300 bg-blue-50 p-4 text-primary-800 dark:border-primary-800 dark:bg-gray-800 dark:text-primary-400 xl:col-span-4"
                    role="alert">
                    <svg class="h-4 w-4 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <div class="ms-3 text-sm font-medium">
                        <span class="font-medium">There are no events you can participate in currently. To do so:</span>
                        <ul class="mt-1.5 list-inside list-disc">
                            <li>Find an active event</li>
                            <li>Book and pay for it</li>
                        </ul>
                    </div>
                </div>
            @endif
        </div>
    @endif
@endsection
