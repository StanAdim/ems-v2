<?php
/**
 * @var \App\Models\EventModel $event
 */
?>

@extends('layouts.event')

@section('content')
    <div>
        <!-- Nothing worth having comes easy. - Theodore Roosevelt -->
    </div>
    <div class="grid grid-cols-1 gap-1 bg-primary-50 md:mx-auto"
        style="background-image: url({{ Vite::asset('resources/images/about-hero.svg') }});background-size:cover; background-repeat:no-repeat; background-position-x: center;
background-position-y: center;">
        <div class="grid grid-cols-12 py-10 text-center">
            <div class="col-span-1 place-self-center">
                <button class="">
                    {{-- <img class="w-8 object-cover" src="{{ Vite::asset('resources/images/icons/arrow_left.svg') }}"
                    alt="" srcset=""> --}}
                </button>
            </div>

            <div class="col-span-10 mx-1 place-content-center text-left">
                {{-- <img class="w-full" src="{{ Vite::asset('resources/images/events_1.png') }}" alt="" srcset=""> --}}

                <div class="lg:my-40 lg:ml-16 lg:w-[35%]">
                    <h1 class="mt-20 text-3xl font-black text-white md:text-5xl">
                        {!! $event->theme !!}
                    </h1>
                    <div class="mx-1 mb-20 mt-5">
                        <div class="ml-auto inline-flex place-content-center justify-end gap-8">
                            @if ($event->isOpenForRegistration())
                                <a href="{{ route('register_for_event', ['event' => $event]) }}"
                                    class="ml-auto rounded-lg bg-secondary px-5 py-3 font-medium text-black">
                                    Register Now
                                </a>
                            @endif
                            <a href="{{ route('event.index', ['event' => $event]) }}"
                                class="ml-auto rounded-lg px-5 py-3 font-medium text-white ring-1 ring-white">
                                More Details
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-span-1 mx-1 place-self-center">
                <button class="">
                    {{-- <img class="w-10 object-cover" src="{{ Vite::asset('resources/images/icons/arrow_right.svg') }}"
                    alt="" srcset=""> --}}
                </button>
            </div>
        </div>
    </div>

    <div class="bg-brand">
        <div class="container mx-auto grid grid-cols-1 gap-10 py-10 md:grid-cols-2 md:gap-0">
            <div class="mx-2 md:h-[40rem]">
                <p class="ml-10 text-7xl font-extralight text-white">
                    {!! $event->aboutTitle !!}
                </p>
            </div>
            <div class="m-4 place-content-evenly space-y-5 text-justify text-lg text-white">
                {!! $event->aboutDescription !!}
            </div>
        </div>
    </div>
@endsection
