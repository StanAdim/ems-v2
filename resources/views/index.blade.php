<?php
/**
 * @var \App\Models\EventModel $event
 */
?>

@use('Illuminate\Support\Number')
@extends('layouts.event')

@section('content')
    <div>
        <!-- The only way to do great work is to love what you do. - Steve Jobs -->
    </div>

    @include('includes.hero')

    <div class="container mx-auto grid grid-cols-1 gap-10 py-10 md:grid-cols-2 md:gap-0">
        <div class="mx-2 md:h-[40rem]">
            <p class="ml-10 text-5xl font-extralight text-primary md:text-7xl"> {!! $event->aboutTitle !!}
            </p>
            <img class="object-fit h-full w-full p-10 md:object-cover"
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

                                                                                                                <p class="my-5 text-4xl font-semibold text-black">
                                                                                                                    <span class="text-primary">The launching of African Youth in</span> Artificial Intelligence and Robotics
                                                                                                                    Competition. -->


        </div>
    </div>

    <div class="container mx-auto grid grid-cols-1 py-10 md:grid-cols-3">

        <div class="bg-primary p-10 md:col-span-2 md:rounded-s-lg lg:p-32">
            <h4 class="mb-5 text-4xl font-light text-secondary">
                MAIN THEME:
            </h4>
            <p class="mb-5 text-2xl font-bold text-white md:text-6xl">
                {{ $event->theme }}
            </p>

            <h4 class="mb-5 text-lg font-semibold text-white">
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
                <div class="col-span-3 grid grid-cols-1 text-white">
                    <div class="flex grid-cols-2 flex-wrap align-top md:grid md:gap-10 lg:grid-cols-3">
                        @foreach ($event->subThemes as $subTheme)
                            <div class="m-2 grid max-w-sm gap-1 p-6">
                                @svg($subTheme['icon'], 'w-24 h-24 text-secondary')
                                <p class="mb-3 text-lg">{{ $subTheme['message'] }}</p>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>

            @if ($event->isOpenForRegistration())
                <a href="{{ route('register_for_event', ['event' => $event]) }}"
                    class="mx-auto mb-10 rounded-lg bg-secondary px-4 py-3 font-medium text-black md:px-10">
                    Participate
                </a>
            @endif



        </div>
        <div class="grid bg-primary md:rounded-e-lg">
            <img class="h-full w-full object-cover"
                src="{{ $event->getThemeBannerUrl() ?: Vite::asset('resources/images/theme.svg') }}" alt=""
                srcset="">
        </div>
    </div>

    <div class="container mx-auto grid grid-cols-1 gap-10 py-10 md:gap-0 xl:grid-cols-2">
        <div class="mx-auto flex w-[70%] flex-col space-y-4 rounded-lg p-5 text-lg">
            <span class="text-5xl font-semibold text-primary">
                Drive Progress with your Ideas
            </span>
            <span>The tech world is constantly evolving, and your voice can be a catalyst for change. Join TAIC as a
                speaker, and drive the conversation forward!</span>
            <div class="flex justify-items-start">
                <a href="{{ $event->getCallForSpeakersDocumentUrl() }}" target="_blank"
                    class="rounded-lg bg-primary px-4 py-3 font-medium text-white md:px-10">
                    Become a Speaker
                </a>
            </div>
        </div>

        <div class="mx-2 h-full w-full text-left">
            <img class="object-fit h-full w-full p-1"
                src="{{ Vite::asset('resources/images/drive_progress_with_your_ideas.png') }}" alt=""
                srcset="">
        </div>
    </div>


    <div class="container my-5 rounded-lg bg-brand md:mx-auto md:my-24">
        <div class="grid grid-cols-1 md:grid-cols-2">
            <img class="w-100" src="{{ Vite::asset('resources/images/fee.svg') }}" alt="" srcset="">
            <div class="justify-end p-10 text-4xl font-light md:p-20 xl:text-7xl">
                <p class="text-end text-secondary">Conference</p>
                <p class="text-end text-primary">Fees</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3">
            @foreach ($event->fees as $feeItem)
                @php
                    $amount = Number::format($feeItem['amount']);
                @endphp
                @switch($feeItem['package_type'])
                    @case($event::FEE_REGISTERED)
                        <div class="grid grid-cols-1 gap-10">
                            <div class="grid grid-cols-1 bg-alt-green py-10">
                                <div class="mx-auto my-5 w-56 place-content-center"><img class="w-full"
                                        src="{{ Vite::asset('resources/images/fee-1.svg') }}" alt="" srcset=""></div>
                                <p class="my-2 text-center text-2xl text-white">For registered ict<br> Professionals.</p>
                                <p class="mb-4 text-center text-5xl font-extrabold text-white"><sup
                                        class="align-top text-sm font-light">TZS</sup>{{ $amount }}</p>
                            </div>
                            @if ($event->isOpenForRegistration())
                                <a href="{{ route('register_for_event', ['event' => $event]) }}"
                                    class="mx-auto mb-10 rounded-lg bg-alt-green px-8 py-3 font-medium text-black md:px-20">Register
                                    Now</a>
                            @endif
                        </div>
                    @break

                    @case($event::FEE_NON_REGISTERED)
                        <div class="grid grid-cols-1 gap-10">
                            <div class="grid grid-cols-1 bg-primary py-10">
                                <div class="mx-auto my-5 w-56 place-content-center"><img class="w-full"
                                        src="{{ Vite::asset('resources/images/fee-2.svg') }}" alt="" srcset=""></div>
                                <p class="my-2 text-center text-2xl text-white">Per person for Non-<br> Registered ICT
                                    Professionals.
                                </p>
                                <p class="mb-4 text-center text-5xl font-extrabold text-white"><sup
                                        class="align-top text-sm font-light">TZS</sup>{{ $amount }}</p>
                            </div>
                            @if ($event->isOpenForRegistration())
                                <a href="{{ route('register_for_event', ['event' => $event]) }}"
                                    class="mx-auto mb-10 rounded-lg bg-primary px-8 py-3 font-medium text-black md:px-20">Register
                                    Now</a>
                            @endif
                        </div>
                    @break

                    @case($event::FEE_FOREIGNER)
                        <div class="grid grid-cols-1 gap-10">
                            <div class="grid grid-cols-1 bg-secondary py-10">
                                <div class="mx-auto my-5 w-56 place-content-center"><img class="w-full"
                                        src="{{ Vite::asset('resources/images/fee-3.svg') }}" alt="" srcset=""></div>
                                <p class="my-2 text-center text-2xl text-black">Foreign participants.<br><br></p>
                                <p class="mb-4 text-center text-5xl font-extrabold text-black"><sup
                                        class="align-top text-sm font-light">TZS</sup>{{ $amount }}</p>
                            </div>
                            @if ($event->isOpenForRegistration())
                                <a href="{{ route('register_for_event', ['event' => $event]) }}"
                                    class="mx-auto mb-10 rounded-lg bg-secondary px-8 py-3 font-medium text-black md:px-20">Register
                                    Now</a>
                            @endif
                        </div>
                    @break

                    @default
                @endswitch
            @endforeach
        </div>



    </div>

    <div class="container mx-auto grid grid-cols-1 py-10">
        <div class="mb-4 text-center text-5xl font-light text-primary">
            Location
        </div>
        <div class="mx-1 w-full px-8">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.620685390495!2d39.28306061109716!3d-6.81590489315331!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x185c4b08b878c235%3A0x97ce84be8f44a00a!2sInformation%20and%20Communication%20Technologies%20Commission!5e0!3m2!1sen!2stz!4v1723132106635!5m2!1sen!2stz"
                width="100%" height="500" style="border:0; border-radius: 9px;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>

    <div>
        <div class="container mx-auto py-10">
            <div class="grid grid-cols-3 py-10">
                <div></div>

                <h4 class="text-center text-3xl md:text-4xl font-bold">Testimonials from Past Stakeholders</h4>

                <div class="justify-self-end">
                    @auth
                        <button data-modal-target="review-modal" data-modal-toggle="review-modal"
                            class="rounded-lg bg-primary px-2 py-3 font-medium text-white xl:px-5" type="button">
                            Leave A Review
                        </button>
                    @endauth
                </div>
            </div>
            <div class="grid grid-cols-1 gap-5 border-y py-10 lg:grid-cols-3">
                <div class="mx-auto flex-1 border-b xl:border-none">
                    <div class="text-2xl font-semibold">Total Reviews</div>
                    <div class="text-center text-7xl font-black text-gray-400">
                        {{ Number::abbreviate($reviewStats['total_reviews']) }}
                    </div>
                </div>
                <div class="mx-auto flex-1">
                    <div class="text-2xl font-semibold">Average Rating</div>
                    <div class="inline-flex text-7xl font-black text-gray-400">
                        {{ $reviewStats['average_rating'] }}
                        @for ($i = 0; $i < $reviewStats['average_rating']; $i++)
                            <x-heroicon-o-star class="w-8 rounded-none fill-primary stroke-none pb-5" />
                        @endfor
                        @for ($i = 0; $i < 5 - $reviewStats['average_rating']; $i++)
                            <x-heroicon-o-star class="w-8 rounded-none fill-gray-300 stroke-none pb-5" />
                        @endfor
                    </div>
                </div>
                <div class="mx-auto flex-1">
                    <ul class="grid grid-cols-1 gap-1">
                        <li class="inline-flex place-items-center gap-2">
                            <div><x-heroicon-o-star class="w-6 rounded-none fill-gray-300 stroke-none" /></div>
                            5
                            <div class="h-5 bg-primary" style="width: {{ $reviewStats['five_stars_percent'] }}%"></div>
                            {{ $reviewStats['five_stars'] }}
                        </li>
                        <li class="inline-flex place-items-center gap-2">
                            <div><x-heroicon-o-star class="w-6 rounded-none fill-gray-300 stroke-none" /></div>
                            4
                            <div class="h-5 bg-secondary" style="width: {{ $reviewStats['four_stars_percent'] }}%"></div>
                            {{ $reviewStats['four_stars'] }}
                        </li>
                        <li class="inline-flex place-items-center gap-2">
                            <div><x-heroicon-o-star class="w-6 rounded-none fill-gray-300 stroke-none" /></div>
                            3
                            <div class="h-5 bg-alt-green" style="width: {{ $reviewStats['three_stars_percent'] }}%">
                            </div>
                            {{ $reviewStats['three_stars'] }}
                        </li>
                        <li class="inline-flex place-items-center gap-2">
                            <div><x-heroicon-o-star class="w-6 rounded-none fill-gray-300 stroke-none" /></div>
                            2
                            <div class="h-5 bg-gray-400" style="width: {{ $reviewStats['two_stars_percent'] }}%"></div>
                            {{ $reviewStats['two_stars'] }}
                        </li>
                        <li class="inline-flex place-items-center gap-2">
                            <div><x-heroicon-o-star class="w-6 rounded-none fill-gray-300 stroke-none" /></div>
                            1
                            <div class="h-5 bg-black" style="width: {{ $reviewStats['one_stars_percent'] }}%"></div>
                            {{ $reviewStats['one_stars'] }}
                        </li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="container mx-auto pb-28 pt-10">
            <div class="grid grid-cols-1 gap-10 lg:grid-cols-3">
                @php
                    $colors = ['fill-primary', 'fill-alt-green', 'fill-secondary'];
                @endphp
                @foreach ($reviews as $index => $review)
                    @php
                        $bgColor = $colors[$index % 3];
                    @endphp
                    <div class="inline-flex gap-5">
                        {{-- <img class="mb-auto ml-2 mt-1 place-self-end overflow-clip rounded-full"
                            src="{{ Vite::asset('resources/images/doreen.svg') }}" alt=""> --}}
                        <x-heroicon-o-user
                            class="{{ $bgColor }} mb-auto ml-2 mt-1 w-12 place-self-end rounded-full border p-1" />
                        <div>
                            <h4 class="font-bold">{{ $review->full_name }}</h4>
                            <h5 class="text-xs text-gray-500">{{ $review->company_name }}</h5>
                            <div x-data="{
                                starsGiven: {{ $review->rating }},
                                starsRemaining: {{ 5 - $review->rating }},
                            }" class="inline-flex">
                                <template x-for="i in starsGiven" :key="i">
                                    <x-heroicon-o-star class="{{ $bgColor }} w-4 rounded-none stroke-none" />
                                </template>
                                <template x-for="i in starsRemaining" :key="i">
                                    <x-heroicon-o-star class="w-4 rounded-none fill-gray-300 stroke-none" />
                                </template>
                            </div>
                            <p class="text-sm font-light">
                                {{ $review->comment }}
                            </p>
                        </div>
                    </div>
                @endforeach

                {{-- <div class="inline-flex gap-5">
                    <img class="mb-auto ml-2 mt-1 place-self-end overflow-clip rounded-full"
                        src="{{ Vite::asset('resources/images/david.svg') }}" alt="">
                    <div>
                        <h4 class="font-bold">David Bilosha</h4>
                        <h5 class="text-xs text-gray-500">ICT Researcher, Mapigo Tech. Ltd</h5>
                        <div x-data="{ counta: 3, countb: 2 }" class="inline-flex">
                            <template x-for="i in counta" :key="i">
                                <x-heroicon-o-star class="w-4 rounded-none fill-alt-green stroke-none" />
                            </template>
                            <template x-for="i in countb" :key="i">
                                <x-heroicon-o-star class="w-4 rounded-none fill-gray-300 stroke-none" />
                            </template>
                        </div>
                        <p class="text-sm font-light">
                            TAIC 2024 was a fantastic experience! The diversity of participants and the depth of knowledge
                            shared made it a unique learning opportunity. I was particularly drawn to the panel discussions,
                            where industry leaders shared their vision for the future of AI in Africa.
                        </p>
                    </div>
                </div>
                <div class="inline-flex gap-5">
                    <img class="mb-auto ml-2 mt-1 place-self-end overflow-clip rounded-full"
                        src="{{ Vite::asset('resources/images/skylar.svg') }}" alt="">
                    <div>
                        <h4 class="font-bold">Skylar Brooks</h4>
                        <h5 class="text-xs text-gray-500">ICT Consultant, London Footura</h5>
                        <div x-data="{ counta: 3, countb: 2 }" class="inline-flex">
                            <template x-for="i in counta" :key="i">
                                <x-heroicon-o-star class="w-4 rounded-none fill-secondary stroke-none" />
                            </template>
                            <template x-for="i in countb" :key="i">
                                <x-heroicon-o-star class="w-4 rounded-none fill-gray-300 stroke-none" />
                            </template>
                        </div>
                        <p class="text-sm font-light">
                            The conference provided a platform to discuss not only the technical aspects but also the
                            ethical
                            and socio-economic implications of AI and robotics. Overall, it was a very enriching experience.
                        </p>
                    </div>
                </div> --}}
            </div>
            <div class="flex justify-center gap-5 py-10 text-center">
                <x-heroicon-o-chevron-left class="w-8" />
                <p class="my-auto text-xl">1</p>
                <x-heroicon-o-chevron-right class="w-8" />
            </div>

        </div>

        <div id="review-modal" tabindex="-1" aria-hidden="true"
            class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0">
            <div class="relative max-h-full w-full max-w-2xl p-4">
                <!-- Modal content -->
                <div class="relative rounded-lg bg-white px-8 py-12 shadow dark:bg-gray-700">
                    <livewire:make-event-review :eventId="$event->id" />
                </div>
            </div>
        </div>

    </div>
@endsection
