<?php
/**
 * @var \App\Models\EventModel $event
 */
?>

@extends('layouts.event')

@section('content')
<div>
    <!-- Waste no more time arguing what a good man should be, be one. - Marcus Aurelius -->
</div>

<div class="md:mx-auto grid grid-cols-1 gap-1 bg-primary-50 mb-10" style="background-image: url({{  $event->getParticipateBannerUrl() ?: Vite::asset('resources/images/p-hero.svg') }});background-size:cover; background-repeat:no-repeat; background-position-x: center;
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

            <div class="lg:my-64  text-center">
                <h1 class="text-3xl md:text-5xl  font-light text-primary my-20">
                    Participate
                    in <span class="text-secondary"><br>{!! $event->linkTitle !!}</span>
                </h1>
                <div class="mt-auto mb-20 mx-1">
                    <div class="place-content-center inline-flex gap-8 ml-auto justify-end">
                        <a href="/login">
                            <button class="ml-auto px-5 py-3 font-medium bg-secondary rounded-lg text-black">Register
                                Now</button>
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

<div class="container mx-auto">
    <div class="text-5xl font-light text-center my-20 text-black">
        Why participate
    </div>
    <div class="py-10 grid grid-cols-1 md:grid-cols-3 gap-10 mx-auto">
        <?php
$whyParticipates = [
    [
        'icon' => 'resources/images/p-why-1.svg',
        'title' => 'Networking Opportunities',
        'description' => 'Attending TAIC-2024 offers a chance to connect with ICT professionals, industry leaders, and innovators, facilitating valuable collaborations and partnerships in the rapidly growing fields of AI and robotics.',
    ],
    [
        'icon' => 'resources/images/p-why-2.svg',
        'title' => 'Knowledge Sharing',
        'description' => 'The event provides access to cutting-edge research, practices, and insights on AI and robotics, which can be instrumental in staying updated with the latest trends and technological advancements.',
    ],
    [
        'icon' => 'resources/images/p-why-3.svg',
        'title' => 'Strategic Influence',
        'description' => 'Being part of discussions and initiatives at TAIC-2024 allows participants to contribute to and influence the strategic direction of digital transformation in Tanzania and across Africa, aligning with broader socio-economic goals.',
    ],
];
            ?>


        @foreach ($whyParticipates as $why)
            <div class="max-w-sm p-2 m-2 text-center">
                <img class="w-10 mx-auto object-cover" src="{{ Vite::asset($why['icon']) }}" alt="" srcset="">
                <a href="#">
                    <h5 class="mb-2 mt-2 text-2xl font-semibold tracking-tight text-gray-900">
                        {{ $why['title'] }}
                    </h5>
                </a>
                <p class="mb-3 font-normal text-gray-500">{{ $why['description'] }}</p>
            </div>
        @endforeach


    </div>
</div>
@endsection
