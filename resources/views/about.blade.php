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
<div class="md:mx-auto grid grid-cols-1 gap-1 bg-primary-50" style="background-image: url({{ Vite::asset('resources/images/about-hero.svg') }});background-size:cover; background-repeat:no-repeat; background-position-x: center;
background-position-y: center;">
    <div class="grid grid-cols-12 text-center py-10">
        <div class="col-span-1 place-self-center">
            <button class="">
                {{-- <img class="w-8 object-cover" src="{{ Vite::asset('resources/images/icons/arrow_left.svg') }}"
                    alt="" srcset=""> --}}
            </button>
        </div>

        <div class="col-span-10 text-left mx-1 place-content-center">
            {{-- <img class="w-full" src="{{ Vite::asset('resources/images/events_1.png') }}" alt="" srcset=""> --}}

            <div class="lg:my-40 lg:ml-16">
                <h1 class="text-3xl md:text-5xl font-black text-white mt-20">
                    {!! $event->theme !!}
                </h1>
                <div class="mt-5 mb-20 mx-1">
                    <div class="place-content-center inline-flex gap-8 ml-auto justify-end">
                        <button class="ml-auto px-5 py-3 font-medium bg-secondary rounded-lg text-black">Register
                            Now</button>
                        <button class="ml-auto px-5 py-3 font-medium ring-1 ring-white rounded-lg text-white">More
                            Details</button>
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

<div class="bg-alt-green">
    <div class="container mx-auto py-10 grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-0">
        <div class="md:h-[40rem] mx-2 ">
            <p class="text-7xl ml-10 font-extralight text-white">
                {!! $event->aboutTitle !!}
            </p>
        </div>
        <div class="m-4 place-content-evenly text-white text-lg space-y-5 text-justify">
            {!! $event->aboutDescription !!}
        </div>
    </div>
</div>
@endsection
