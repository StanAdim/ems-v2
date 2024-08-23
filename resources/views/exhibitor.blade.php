@extends('layouts.index')

@section('content')
    <div>
        <!-- Nothing worth having comes easy. - Theodore Roosevelt -->
    </div>
    <div class="md:mx-auto grid grid-cols-1 gap-1 bg-primary-50"
        style="background-image: url({{ Vite::asset('resources/images/exhibitor.svg') }});background-size:cover; background-repeat:no-repeat; background-position-x: center;
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
                    <h1 class="text-3xl md:text-5xl font-black text-white mt-20">Showcase your<br>
                        innovations and<br>
                        connect with<br>
                        industry leaders </h1>
                    <div class="mt-5 mb-20 mx-1">
                        <div class="place-content-center inline-flex gap-8 ml-auto justify-end">
                            <a href="/register">
                                <button class="ml-auto px-5 py-3 font-medium bg-secondary rounded-lg text-black">Exhibit Now</button>
                            </a>
                            {{-- <button class="ml-auto px-5 py-3 font-medium ring-1 ring-white rounded-lg text-white">More
                                Details</button> --}}
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
        <p class="my-8 lg:py-4 text-xl text-center">
            TAIC 2024 will be featured by ICT products exhibition from multinationals,<br>
            institutions, innovators and local ICT based service companies.
        </p>
    </div>

    <div class="container mx-auto">
        <div class="text-5xl font-light text-center my-20 text-black">
            Why exhibit at TAIC?
        </div>
        <div class="py-10 grid grid-cols-1 md:grid-cols-3 gap-10 mx-auto">
            <?php
            $whyParticipates = [
                [
                    'icon' => 'resources/images/e-why-1.svg',
                    'title' => 'Increased Visibility',
                    'description' => 'Exhibiting at TAIC-2024 puts your brand in front of a targeted audience of ICT professionals, industry leaders, and potential clients, enhancing your visibility and reputation in the rapidly growing African digital market.',
                ],
                [
                    'icon' => 'resources/images/e-why-2.svg',
                    'title' => 'Direct Engagement',
                    'description' => 'Exhibitors have the opportunity to engage directly with key decision-makers, demonstrate their products or services in real-time, and receive immediate feedback, which can be invaluable for refining offerings and closing deals.',
                ],
                [
                    'icon' => 'resources/images/e-why-3.svg',
                    'title' => 'Networking Opportunities',
                    'description' => 'The event provides a platform to build relationships with potential partners, collaborators, and clients, leading to new business opportunities and partnerships in the AI and robotics sectors.',
                ],
            ];
            ?>


            @foreach ($whyParticipates as $why)
                <div class="max-w-sm p-2 m-2 text-center">
                    <img class="w-10 mx-auto object-cover" src="{{ Vite::asset($why['icon']) }}" alt=""
                        srcset="">
                    <a href="#">
                        <h5 class="mb-2 mt-2 text-2xl font-semibold tracking-tight text-gray-900">
                            {{ $why['title'] }}</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-500">{{ $why['description'] }}</p>
                </div>
            @endforeach


        </div>
    </div>
@endsection
