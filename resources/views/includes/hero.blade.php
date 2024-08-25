<!-- component -->
<!-- This is an example component -->


{{-- Hero Begins --}}
<div class="md:mx-auto grid grid-cols-1 gap-1 bg-primary-50 mb-10"
    style="background-image: url({{ $event->getMainBannerUrl() ?: Vite::asset('resources/images/hero.svg') }});background-size:cover; background-repeat:no-repeat; background-position-x: center;
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
                <h1 class="text-3xl md:text-5xl font-black text-white mt-20 w-5/12">{{ $event->theme }}</h1>
                <div class="mt-5 mb-20 mx-1">
                    <div class="place-content-center inline-flex gap-8 ml-auto justify-end">
                        <button data-modal-target="register-event-modal" data-modal-toggle="register-event-modal" class="ml-auto px-5 py-3 font-medium bg-secondary rounded-lg text-black">Register Now</button>
                        <button class="ml-auto px-5 py-3 font-medium ring-1 ring-white rounded-lg text-white">More Details</button>
                    </div>
                </div>
                <x-countdown-timer :endsOn="$event->endsOn" />
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


