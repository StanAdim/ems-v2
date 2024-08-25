<?php
/**
 * @var \App\Models\EventModel $event
 */
?>

@extends('layouts.event')

@section('content')
    <div>
        <!-- The only way to do great work is to love what you do. - Steve Jobs -->
    </div>

    @include('includes.hero')

    <div class="container mx-auto py-10 grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-0">
        <div class="md:h-[40rem] mx-2 ">
            <p class="text-7xl ml-10 font-extralight text-primary"> {!! $event->aboutTitle !!}
            </p>
            <img class="w-full h-full p-10 object-fit md:object-cover "
                src="{{ $event->getEventLogoUrl() ?: Vite::asset('resources/images/about.svg') }}" alt=""
                srcset="">
        </div>

        <div class="m-4 place-content-evenly text-lg">
            @if ($event)
                {!! $event->aboutDescription !!}
            @endif


            <!-- <p class="my-5 text-justify">
                                The 8th Tanzania Annual ICT Conference 2024 (TAIC-2024), first Africa Edition, organized by the ICT
                                Commission (ICTC), in collaboration with ELEVATE and the African Union Development Agency-NEPAD
                                (AUDA-NEPAD), is scheduled to take place in Dar es Salaam, Tanzania at the Julius Nyerere International
                                Conference Centre (JNICC) from October 13th to October 17th, 2024. Pre-conference events, including the
                                African AI Competition, are planned for October 13th and 14th, and will be open to public participation.
                            </p>
                            <p class="my-5 text-justify">
                                Building on the success of previous conferences, TAIC-2024 will gather a broad spectrum of participants,
                                including ICT professionals, practitioners, academics, researchers, development partners, industry leaders,
                                and innovators in digital technology. This year’s theme, “Unleashing the Power of Artificial Intelligence
                                and Robotics for Socio-economic Transformation”, focuses on the transformative impact of these technologies
                                across various sectors.
                            </p>

                            <p class="my-5 text-justify">
                                At a pivotal time when the global economy is embracing digital transformation, Tanzania is strategically
                                advanc- ing its economic policies to exploit the full potential of AI and robotics. This effort is aimed at
                                transitioning into a higher middle-income economy. TAIC-2024 will provide an invaluable platform for sharing
                                innovative ideas, practices, and research findings among ICT profession- als, academia, government and
                                private institutions, and development partners. This gathering is essential for steering Tanzania towards a
                                digitally empowered economy, characterized by enhanced ICT accessibility, affordability, and availability.
                            </p>

                            <p class="text-black my-5 font-semibold text-4xl">
                                <span class="text-primary">The launching of African Youth in</span> Artificial Intelligence and Robotics
                                Competition. -->


        </div>
    </div>

    <div class="container mx-auto py-10 grid grid-cols-1 md:grid-cols-3 ">

        <div class="bg-primary p-10 lg:p-32 md:col-span-2 md:rounded-s-lg">
            <h4 class="font-light text-4xl text-secondary mb-5">
                MAIN THEME:
            </h4>
            <p class="text-white font-bold text-2xl md:text-6xl mb-5">
                {{ $event->theme }}
            </p>

            <h4 class="font-semibold text-lg mb-5 text-white">
                SUB THEMES
            </h4>
            <div>
                @php
                    $sub_themes = [
                        [
                            'icon' => 'resources/images/sub-theme-1.svg',
                            'description' => 'Emerging technology for job creation',
                        ],
                        [
                            'icon' => 'resources/images/sub-theme-2.svg',
                            'description' => 'Digital Transformation',
                        ],
                        [
                            'icon' => 'resources/images/sub-theme-3.svg',
                            'description' => 'Artificial Intelligence for socio - economic development',
                        ],
                    ];
                @endphp
                <div class="col-span-3 text-white grid grid-cols-1">
                    <div class="md:gap-10 flex flex-wrap  md:grid grid-cols-2 align-top lg:grid-cols-3">
                        @foreach ($event->subThemes as $subTheme)
                            <div class="max-w-sm p-6 m-2 grid gap-1 ">
                                @svg($subTheme['icon'], 'w-24 h-24 text-secondary')
                                <p class="mb-3 text-lg">{{ $subTheme['message'] }}</p>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>

            <button class="mx-auto mb-10 px-4 md:px-10  py-3 font-medium bg-secondary rounded-lg text-black">
                Participate
            </button>



        </div>
        <div class="bg-primary grid md:rounded-e-lg">
            <img class="w-full h-full object-cover"
                src="{{ $event->getThemeBannerUrl() ?: Vite::asset('resources/images/theme.svg') }}" alt=""
                srcset="">
        </div>
    </div>

    <div class="container mx-auto py-10 grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-0">
        <div class="w-full h-96 mx-2 text-left">
            <p class="text-7xl font-extralight text-primary">About<br> <span class="text-secondary">TAIC</span> 2024</p>
            <img class="w-full h-full p-1 object-fit" src="{{ Vite::asset('resources/images/about.svg') }}" alt=""
                srcset="">
        </div>
        <div class="flex flex-wrap bg-secondary p-5 m-8  rounded-lg  text-lg">
            @php
                $taicSpeakers = [
                    [
                        'name' => 'John Doe',
                        'position' => 'Position 1',
                        'organization' => 'Organization 1',
                        'image' => 'resources/images/speaker.svg',
                        'sequence' => '1',
                    ],
                    [
                        'name' => 'John Doe',
                        'position' => 'Position 1',
                        'organization' => 'Organization 1',
                        'image' => 'resources/images/speaker.svg',
                        'sequence' => '1',
                    ],
                    [
                        'name' => 'John Doe',
                        'position' => 'Position 1',
                        'organization' => 'Organization 1',
                        'image' => 'resources/images/speaker.svg',
                        'sequence' => '1',
                    ],
                    [
                        'name' => 'John Doe',
                        'position' => 'Position 1',
                        'organization' => 'Organization 1',
                        'image' => 'resources/images/speaker.svg',
                        'sequence' => '1',
                    ],
                ];
            @endphp

            @foreach ($taicSpeakers as $speaker)
                <div role="status" class=" w-full flex-1 px-4 md:px-6">
                    <div class="flex items-center justify-center mb-4">
                        <img class="w-full h-full object-cover" src="{{ Vite::asset($speaker['image']) }}" alt=""
                            srcset="">

                        {{-- TODO: Link on top of the Image --}}
                        {{-- <a href="#"
                        class="bg-primary  text-white font-semibold px-10 py-2 rounded-3xl inline-flex gap-2 align-middle">Register
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                            <path fill-rule="evenodd"
                                d="M2 10a.75.75 0 0 1 .75-.75h12.59l-2.1-1.95a.75.75 0 1 1 1.02-1.1l3.5 3.25a.75.75 0 0 1 0 1.1l-3.5 3.25a.75.75 0 1 1-1.02-1.1l2.1-1.95H2.75A.75.75 0 0 1 2 10Z"
                                clip-rule="evenodd" />
                        </svg>
                        </i></a> --}}
                    </div>
                    <div class="text-start font-bold">{{ $speaker['name'] }}</div>
                    <div class="text-start">{{ $speaker['position'] }}</div>
                    <div class="text-start">{{ $speaker['organization'] }}</div>
                </div>
            @endforeach

        </div>
    </div>


    <div class="container md:mx-auto  rounded-lg bg-brand my-5 md:my-24">
        <div class="grid grid-cols-1 md:grid-cols-2">
            <img class="w-100" src="{{ Vite::asset('resources/images/fee.svg') }}" alt="" srcset="">
            <div class="justify-end p-10 md:p-20 text-2xl md:text-7xl font-light">
                <p class="text-end text-secondary">Conference</p>
                <p class="text-end text-primary">Fees</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3">
            <div class="grid grid-cols-1 gap-10">
                <div class="grid grid-cols-1 py-10 bg-alt-green">
                    <div class="place-content-center  w-56 mx-auto my-5"><img class="w-full"
                            src="{{ Vite::asset('resources/images/fee-1.svg') }}" alt="" srcset=""></div>
                    <p class="text-center text-2xl my-2  text-white">For registered ict<br> Professionals.</p>
                    <p class="text-center text-5xl mb-4 font-extrabold text-white"><sup
                            class="font-light text-sm align-top">TZS</sup>420,000</p>
                </div>
                <button class="mx-auto mb-10 px-8 md:px-20  py-3 font-medium bg-alt-green rounded-lg text-black">Register
                    Now</button>
            </div>

            <div class="grid grid-cols-1 gap-10">
                <div class="grid grid-cols-1 py-10  bg-primary">
                    <div class="place-content-center  w-56 mx-auto my-5"><img class="w-full"
                            src="{{ Vite::asset('resources/images/fee-2.svg') }}" alt="" srcset=""></div>
                    <p class="text-center text-2xl my-2  text-white">Per person for Non-<br> Registered ICT Professionals.
                    </p>
                    <p class="text-center text-5xl mb-4 font-extrabold text-white"><sup
                            class="font-light text-sm align-top">TZS</sup>500,000</p>
                </div>
                <button class="mx-auto mb-10 px-8 md:px-20  py-3 font-medium bg-primary rounded-lg text-black">Register
                    Now</button>
            </div>


            <div class="grid grid-cols-1 gap-10">
                <div class="grid grid-cols-1 py-10 bg-secondary">
                    <div class="place-content-center  w-56 mx-auto my-5"><img class="w-full"
                            src="{{ Vite::asset('resources/images/fee-3.svg') }}" alt="" srcset=""></div>
                    <p class="text-center text-2xl my-2  text-black">Foreign participants.<br><br></p>
                    <p class="text-center text-5xl mb-4 font-extrabold text-black"><sup
                            class="font-light text-sm align-top">TZS</sup>750,000</p>
                </div>
                <button class="mx-auto mb-10 px-8 md:px-20  py-3 font-medium bg-secondary rounded-lg text-black">Register
                    Now</button>
            </div>

        </div>



    </div>

    <div class="container mx-auto grid grid-cols-1 py-10">
        <div class="text-5xl font-light text-center mb-4 text-primary">
            Location
        </div>
        <div class="w-full mx-1 px-8">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.620685390495!2d39.28306061109716!3d-6.81590489315331!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x185c4b08b878c235%3A0x97ce84be8f44a00a!2sInformation%20and%20Communication%20Technologies%20Commission!5e0!3m2!1sen!2stz!4v1723132106635!5m2!1sen!2stz"
                width="100%" height="500" style="border:0; border-radius: 9px;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>

    <div class="container mx-auto py-10">
        <div class="py-10">
            <h4 class="text-center text-4xl font-bold">What people say about TAIC</h4>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 border-y py-10">
            <div class="flex-1 mx-auto">
                <div class="font-semibold text-2xl">Total Reviews</div>
                <div class="text-gray-400 text-center text-7xl font-black">
                    3K
                </div>
            </div>
            <div class="flex-1 mx-auto">
                <div class="font-semibold text-2xl">Average Rating</div>
                <div class="inline-flex text-gray-400 text-7xl font-black">
                    4.0K
                    <x-heroicon-o-star class="w-8 pb-5 rounded-none fill-primary stroke-none" />
                    <x-heroicon-o-star class="w-8 pb-5 rounded-none fill-primary stroke-none" />
                    <x-heroicon-o-star class="w-8 pb-5 rounded-none fill-primary stroke-none" />
                    <x-heroicon-o-star class="w-8 pb-5 rounded-none fill-primary stroke-none" />
                    <x-heroicon-o-star class="w-8 pb-5 rounded-none fill-gray-300 stroke-none" />
                </div>
            </div>
            <div class="flex-1 mx-auto">
                <ul class="grid grid-cols-1 gap-1">
                    <li class="inline-flex gap-2 place-items-center">
                        <x-heroicon-o-star class="w-6 rounded-none fill-gray-300 stroke-none" />
                        5
                        <div class="h-5 w-52 bg-primary"></div>
                        2.2K
                    </li>
                    <li class="inline-flex gap-2 place-items-center">
                        <x-heroicon-o-star class="w-6 rounded-none fill-gray-300 stroke-none" />
                        4
                        <div class="h-5 w-40 bg-secondary"></div>
                        1K
                    </li>
                    <li class="inline-flex gap-2 place-items-center">
                        <x-heroicon-o-star class="w-6 rounded-none fill-gray-300 stroke-none" />
                        3
                        <div class="h-5 w-32 bg-alt-green"></div>
                        300
                    </li>
                    <li class="inline-flex gap-2 place-items-center">
                        <x-heroicon-o-star class="w-6 rounded-none fill-gray-300 stroke-none" />
                        2
                        <div class="h-5 w-20 bg-gray-400"></div>
                        12
                    </li>
                    <li class="inline-flex gap-2 place-items-center">
                        <x-heroicon-o-star class="w-6 rounded-none fill-gray-300 stroke-none" />
                        1
                        <div class="h-5 w-10 bg-black"></div>
                        3
                    </li>
                </ul>
            </div>

        </div>
    </div>

    <div class="container mx-auto pt-10 pb-28">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            <div class="grid grid-cols-2 gap-5">
                <img class="place-self-end mb-auto mt-1 rounded-full overflow-clip" src="{{ Vite::asset('resources/images/doreen.svg') }}"
                    alt="">
                <div>
                    <h4 class="font-bold">Doreen Mushi</h4>
                    <h5 class="text-xs text-gray-500">Toolboksi Technologies</h5>
                    <div x-data="{ count: 5 }" class="inline-flex">
                        <template x-for="i in count" :key="i">
                            <x-heroicon-o-star class="w-4  rounded-none fill-primary stroke-none" />
                        </template>
                    </div>
                    <p class="text-sm font-light">
                        I was truly impressed by the organization and the quality of discussions at TAIC 2024. The sessions
                        on AI and robotics were particularly insightful, offering practical applications that I can
                        implement in my work. The networking opportunities were invaluable, and I made several connections
                        that will undoubtedly lead to future collaborations. The event exceeded my expectations, and I'm
                        already looking forward to next year!
                    </p>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-5">
                <img class="place-self-end mb-auto mt-1 rounded-full overflow-clip" src="{{ Vite::asset('resources/images/david.svg') }}"
                    alt="">
                <div>
                    <h4 class="font-bold">David Bilosha</h4>
                    <h5 class="text-xs text-gray-500">ICT Researcher, Mapigo Tech. Ltd</h5>
                    <div x-data="{ counta: 3,countb:2 }" class="inline-flex">
                        <template x-for="i in counta" :key="i">
                            <x-heroicon-o-star class="w-4  rounded-none fill-alt-green stroke-none" />
                        </template>
                        <template x-for="i in countb" :key="i">
                            <x-heroicon-o-star class="w-4  rounded-none fill-gray-300 stroke-none" />
                        </template>
                    </div>
                    <p class="text-sm font-light">
                        TAIC 2024 was a fantastic experience! The diversity of participants and the depth of knowledge
                        shared made it a unique learning opportunity. I was particularly drawn to the panel discussions,
                        where industry leaders shared their vision for the future of AI in Africa.
                    </p>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-5">
                <img class="place-self-end mb-auto mt-1 rounded-full overflow-clip" src="{{ Vite::asset('resources/images/skylar.svg') }}"
                    alt="">
                <div>
                    <h4 class="font-bold">Skylar Brooks</h4>
                    <h5 class="text-xs text-gray-500">ICT Consultant, London Footura</h5>
                    <div x-data="{ counta: 3,countb:2 }" class="inline-flex">
                        <template x-for="i in counta" :key="i">
                            <x-heroicon-o-star class="w-4  rounded-none fill-secondary stroke-none" />
                        </template>
                        <template x-for="i in countb" :key="i">
                            <x-heroicon-o-star class="w-4  rounded-none fill-gray-300 stroke-none" />
                        </template>
                    </div>
                    <p class="text-sm font-light">
                        The conference provided a platform to discuss not only the technical aspects but also the ethical
                        and socio-economic implications of AI and robotics. Overall, it was a very enriching experience.
                    </p>
                </div>
            </div>
        </div>
        <div class="flex py-10 gap-5 text-center justify-center">
            <x-heroicon-o-chevron-left class="w-8"/>
            <p class="my-auto text-xl">2/15</p>
            <x-heroicon-o-chevron-right class="w-8"/>
        </div>

    </div>
@endsection
