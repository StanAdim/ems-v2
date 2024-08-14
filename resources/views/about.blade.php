@extends('layouts.index')

@section('content')
    <div>
        <!-- Nothing worth having comes easy. - Theodore Roosevelt -->
    </div>
    <div class="md:mx-auto grid grid-cols-1 gap-1 bg-primary-50"
        style="background-image: url({{ Vite::asset('resources/images/about-hero.svg') }});background-size:cover; background-repeat:no-repeat; background-position-x: center;
background-position-y: center;">
        <div class="grid grid-cols-12 text-center py-10">
            <div class="col-span-1 place-self-center">
                <button class="">
                    <img class="w-8 object-cover" src="{{ Vite::asset('resources/images/icons/arrow_left.svg') }}"
                        alt="" srcset="">
                </button>
            </div>

            <div class="col-span-10 text-left mx-1 place-content-center">
                {{-- <img class="w-full" src="{{ Vite::asset('resources/images/events_1.png') }}" alt="" srcset=""> --}}

                <div class="lg:my-40 lg:ml-16">
                    <h1 class="text-3xl md:text-5xl font-black text-white mt-20">Unleashing the Power of<br> Artificial
                        Intelligence<br> and
                        Robotics for Socio-<br>Economic Transformation</h1>
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
                    <img class="w-10 object-cover" src="{{ Vite::asset('resources/images/icons/arrow_right.svg') }}"
                        alt="" srcset="">
                </button>
            </div>
        </div>
    </div>

    <div class="bg-alt-green">
        <div class="container mx-auto py-10 grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-0">
            <div class="md:h-[40rem] mx-2 ">
                <p class="text-7xl ml-10 font-extralight text-white">
                    About<br>
                    Cybersecurity<br>
                    Summit
                </p>
            </div>
            <div class="m-4 place-content-evenly text-white text-lg">
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
                
            </div>
        </div>
    </div>
@endsection
