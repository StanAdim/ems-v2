@extends('layouts.index')

@section('content')
    <div>
        <!-- The only way to do great work is to love what you do. - Steve Jobs -->
    </div>

    @include('includes.hero')

    <div class="container mx-auto py-10 grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-0">
        <div class="md:h-[40rem] mx-2 ">
            <p class="text-7xl ml-10 font-extralight text-primary">About<br> <span class="text-secondary">TAIC</span> 2024</p>
            <img class="w-full h-full p-10 object-fit md:object-cover " src="{{ Vite::asset('resources/images/about.svg') }}"
                alt="" srcset="">
        </div>
        <div class="m-4 place-content-evenly text-lg">
            <p class="my-5 text-justify">
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
                Competition.
            </p>

        </div>
    </div>

    <div class="container mx-auto py-10 grid grid-cols-1 md:grid-cols-3 ">

        <div class="bg-primary p-10 lg:p-32 md:col-span-2 md:rounded-s-lg">
            <h4 class="font-light text-4xl text-secondary mb-5">
                2024 MAIN THEME:
            </h4>
            <p class="text-white font-bold text-2xl md:text-6xl mb-5">
                Unleashing the Power of Artificial Intelligence and Robotics for Socio-Economic Transformation
            </p>

            <h4 class="font-semibold text-lg mb-5 text-white">
                SUB THEMES
            </h4>
            <div>
                <?php
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
                ?>
                <div class="col-span-3 text-white grid grid-cols-1">
                    <div class="md:gap-10 flex flex-wrap  md:grid grid-cols-2 align-top lg:grid-cols-3">
                        {{-- @for ($i = 0; $i < 6; $i++) --}}
                        @foreach ($sub_themes as $theme)
                            <div class="max-w-sm p-6 m-2 grid gap-1 ">
                                <img class="w-10 object-cover" src="{{ Vite::asset($theme['icon']) }}" alt=""
                                    srcset="">
                                <p class="mb-3 text-lg">{{ $theme['description'] }}</p>
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
            <img class="w-full h-full object-cover" src="{{ Vite::asset('resources/images/theme.svg') }}" alt=""
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
                            class="font-light text-sm align-top">USD</sup>300</p>
                </div>
                <button class="mx-auto mb-10 px-8 md:px-20  py-3 font-medium bg-secondary rounded-lg text-black">Register
                    Now</button>
            </div>

        </div>



    </div>

    <div class="container mx-auto grid grid-cols-1 pt-10 pb-28">
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
@endsection
