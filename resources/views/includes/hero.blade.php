<!-- component -->
<!-- This is an example component -->


{{-- Hero Begins --}}
<div class="mb-10 grid grid-cols-1 gap-1 bg-primary-50 md:mx-auto"
    style="background-image: url({{ $event->getMainBannerUrl() ?: Vite::asset('resources/images/hero.svg') }});background-size:cover; background-repeat:no-repeat; background-position-x: center;
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
                <h1 class="mt-20 text-3xl font-black text-white md:text-5xl">{{ $event->theme }}</h1>
                <div class="mx-1 mb-10 mt-5 lg:mb-16">
                    <div class="ml-auto inline-flex place-content-center justify-end gap-5">
                        @if ($event->isOpenForRegistration())
                            <a href="{{ route('register_for_event', ['event' => $event]) }}"
                                class="ml-auto rounded-lg bg-secondary px-2 py-3 font-medium text-black xl:px-5">
                                Register Now
                            </a>
                        @endif
                        <a href="{{ route('event.about', ['event' => $event]) }}"
                            class="ml-auto rounded-lg border border-white px-2 py-3 font-medium text-white xl:px-5">More
                            Details</a>
                    </div>
                </div>
                <div class="w-full overflow-clip">
                    <x-countdown-timer :endsOn="$event->endsOn" />
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
{{-- Hero Ends --}}
