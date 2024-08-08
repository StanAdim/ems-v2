<!-- component -->
<!-- This is an example component -->


{{-- Hero Begins --}}
<div class="md:mx-auto grid grid-cols-1 gap-1 bg-primary-50 mb-10"
    style="background-image: url({{ Vite::asset('resources/images/hero_1.svg') }});background-size:cover; background-repeat:no-repeat; background-position-x: center;
background-position-y: center;">
    <div class="grid grid-cols-12 text-center py-10">
        <div class="col-span-1 place-self-center">
            <button class="">
                <img class="w-8 object-cover" src="{{ Vite::asset('resources/images/icons/arrow_left.svg') }}" alt=""
                            srcset="">
            </button>
        </div>

        <div class="col-span-10 text-left mx-1 place-content-center">
            {{-- <img class="w-full" src="{{ Vite::asset('resources/images/events_1.png') }}" alt="" srcset=""> --}}

            <div class="lg:my-40 lg:ml-16">
                <h1 class="text-4xl md:text-6xl font-black mt-20">Driving <span class="text-primary">Digital</span><br>
                    Transformation<br>
                    in Tanzania.</h1>
                <div class="mt-5 mb-20 mx-1">
                    <a href="#"
                    class="bg-primary text-white font-semibold px-10 py-2 rounded-3xl inline-flex gap-2 align-middle">Register
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                        <path fill-rule="evenodd"
                            d="M2 10a.75.75 0 0 1 .75-.75h12.59l-2.1-1.95a.75.75 0 1 1 1.02-1.1l3.5 3.25a.75.75 0 0 1 0 1.1l-3.5 3.25a.75.75 0 1 1-1.02-1.1l2.1-1.95H2.75A.75.75 0 0 1 2 10Z"
                            clip-rule="evenodd" />
                    </svg>
                    </i></a>
                </div>
            </div>
        </div>

        <div class="col-span-1 mx-1 place-self-center">
            <button class="">
                <img class="w-10 object-cover" src="{{ Vite::asset('resources/images/icons/arrow_right.svg') }}" alt=""
                            srcset="">
            </button>
        </div>
    </div>
</div>
{{-- Hero Ends --}}


{{-- <div class="w-full h-screen overflow-hidden mx-auto bg-cover object-cover"
    style="background-image: url({{ Vite::asset('resources/images/hero.png') }})"> --}}
{{-- <img class="w-full h-screen" src="{{ Vite::asset('resources/images/hero.png') }}" alt=""> --}}
{{-- <div class="">Driving Digital
        Transformation
        in Tanzania.</div> --}}
{{-- </div> --}}

{{-- <div class="w-full mx-auto"> --}}

{{-- <div id="default-carousel" class="relative" data-carousel="static">
        <!-- Carousel wrapper -->
        <div class="overflow-hidden relative  h-56 sm:h-64 xl:h-80 2xl:h-96">
            <!-- Item 1 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <div className="w-full absolute top-0 left-0 text-center mt-10">
                    <h2 className="text-4xl font-bold text-red-500 text-center">
                       TailwindCSS + React
                    </h2>
                    <button className="mt-10 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Test Button
                    </button>
                  </div>
                <span class="absolute top-1/2 left-1/2 text-2xl font-semibold text-red -translate-x-1/2 -translate-y-1/2 sm:text-3xl dark:text-gray-800">First Slide</span> --}}
{{-- <img class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" src="{{ Vite::asset('resources/images/hero.png') }}" alt=""> --}}
{{-- <img src="https://flowbite.com/docs/images/carousel/carousel-1.svg" class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="..."> --}}
{{-- </div>
            <!-- Item 2 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" src="{{ Vite::asset('resources/images/hero.png') }}" alt="">
            </div>
            <!-- Item 3 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" src="{{ Vite::asset('resources/images/hero.png') }}" alt="">
            </div>
        </div>
        <!-- Slider indicators -->
        <div class="flex absolute bottom-5 left-1/2 z-30 space-x-3 -translate-x-1/2">
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 1" data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
        </div>
        <!-- Slider controls -->
        <button type="button" class="flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-5 h-5 text-primary sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                <span class="hidden">Previous</span>
            </span>
        </button>
        <button type="button" class="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-5 h-5 text-primary sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                <span class="hidden">Next</span>
            </span>
        </button>
    </div>
    <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
</div> --}}
