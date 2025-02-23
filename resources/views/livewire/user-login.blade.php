<div class="container mx-auto grid grid-cols-1 gap-10 py-10 md:gap-0 lg:grid-cols-2">
    <div class="order-2 mx-2 rounded-xl bg-brand lg:order-1">

        @if(isset($currentEvent))
            {{-- @dd($currentEvent->linkTitle) --}}
            <div class="md:mx-auto grid grid-cols-1 my-8 ">
                <div id="default-carousel" class="relative w-full" data-carousel="slide">
                    <!-- Carousel wrapper -->
                    <div class="relative overflow-hidden h-56 md:h-[46rem]">
                        <!-- Item 1 -->
                        @php
                            $transitionTime = 2000;
                            $transitionTime = $transitionTime + 4000;
                        @endphp
                        <div class="hidden duration-[{{ $transitionTime . 'ms' }}] ease-in-out" data-carousel-item
                            style="background-image: url({{ $currentEvent->getMainBannerUrl() }});background-size:cover; background-repeat:no-repeat; background-position-x: center; background-position-y: center;">
                            <div class="text-left mx-12 place-content-center">
                                <div class="lg:my-40 text-center bg-white bg-opacity-70 p-2 rounded-xl">
                                    @if ($currentEvent['title'])
                                        <h1
                                            class="text-sm md
                                        :text-xl font-black mt-10">
                                            {!! $currentEvent['linkTitle'] !!}
                                        </h1>
                                        <h1 class="text-sm md:text-xl font-black mt-2">
                                            {!! $currentEvent['title'] !!}
                                        </h1>
                                        <div class="grid grid-cols-2 gap-4 mt-4">
                                            <p
                                                class="text-xs md
                                            :text-sm font-base mt-2">
                                                <strong>Commence Date:</strong> {!! date_format($currentEvent['startsOn'], 'Y-m-d') !!}
                                            </p>
                                            <p
                                                class="text-xs md
                                            :text-sm font-base mt-2">
                                                <strong>End Date:</strong> {!! date_format($currentEvent['endsOn'], 'Y-m-d') !!}
                                            </p>
                                        </div>
                                        <p class="text-xs md:text-sm font-base mt-4 mb-10">
                                            <strong>Theme:</strong> {!! $currentEvent['theme'] !!}
                                        </p>
                                        <div class="text-xs md:text-sm font-light ml-12 mt-4 mb-10 flex flex-1 gap-1 mx-auto" >
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                              </svg>
                                               <span>{!! $currentEvent['locationDescription'] !!}</span>
                                        </div>
                                    @endif

                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Slider indicators -->
                    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="true"
                            aria-label="Slide {{ $currentEvent['sequence'] }}"
                            data-carousel-slide-to="{{ $currentEvent['sequence'] }}"></button>
                    </div>

                    <!-- Slider controls -->
                    <button type="button"
                        class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-prev>
                        <img class="w-8 object-cover" src="{{ Vite::asset('resources/images/icons/arrow_left.svg') }}"
                            alt="" srcset="">
                    </button>
                    <button type="button"
                        class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-next>
                        <img class="w-10 object-cover" src="{{ Vite::asset('resources/images/icons/arrow_right.svg') }}"
                            alt="" srcset="">
                    </button>
                </div>
            </div>
        @elseif (isset($allEvents))

            <div class="md:mx-auto grid grid-cols-1 my-8 ">
                <div id="default-carousel" class="relative w-full" data-carousel="slide">
                    <!-- Carousel wrapper -->
                    <div class="relative overflow-hidden h-56 md:h-[46rem]">
                        <!-- Item 1 -->
                        @php
                            $transitionTime = 2000;
                            $transitionTime = $transitionTime + 4000;
                        @endphp
                        @foreach ($allEvents as $event)
                            <div class="hidden duration-[{{ $transitionTime . 'ms' }}] ease-in-out" data-carousel-item
                                style="background-image: url({{ $event->getMainBannerUrl() }});background-size:cover; background-repeat:no-repeat; background-position-x: center; background-position-y: center;">
                                <div class="text-left mx-12 place-content-center">
                                    <div class="lg:my-40 text-center bg-white bg-opacity-70 p-2 rounded-xl">
                                        @if ($event['title'])
                                            <h1
                                                class="text-sm md
                                        :text-xl font-black mt-10">
                                                {!! $event['linkTitle'] !!}
                                            </h1>
                                            <h1 class="text-sm md:text-xl font-black mt-2">
                                                {!! $event['title'] !!}
                                            </h1>
                                            <div class="grid grid-cols-2 gap-4 mt-4">
                                                <p
                                                    class="text-xs md
                                            :text-sm font-base mt-2">
                                                    <strong> Commence Date: </strong> {!! date_format($event['startsOn'], 'Y-m-d') !!}
                                                </p>
                                                <p
                                                    class="text-xs md
                                            :text-sm font-base mt-2">
                                                   <strong> End Date: </strong> {!! date_format($event['endsOn'], 'Y-m-d') !!}
                                                </p>
                                            </div>
                                            <p class="text-xs md:text-sm font-base mt-4 mb-10">
                                                <strong>Theme:</strong> {!! $event['theme'] !!}
                                            </p>
                                            <div class="text-xs md:text-sm font-light ml-12 mt-4 mb-10 flex flex-1 gap-1 mx-auto" >
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                                  </svg>
                                                   <span>{!! $event['locationDescription'] !!}</span>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Slider indicators -->
                    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="true"
                            aria-label="Slide {{ $event['sequence'] }}"
                            data-carousel-slide-to="{{ $event['sequence'] }}"></button>
                    </div>

                    <!-- Slider controls -->
                    <button type="button"
                        class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-prev>
                        <img class="w-8 object-cover" src="{{ Vite::asset('resources/images/icons/arrow_left.svg') }}"
                            alt="" srcset="">
                    </button>
                    <button type="button"
                        class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-next>
                        <img class="w-10 object-cover"
                            src="{{ Vite::asset('resources/images/icons/arrow_right.svg') }}" alt=""
                            srcset="">
                    </button>
                </div>
            </div>
        @else
            <img class="object-fit h-full w-full p-10" src="{{ Vite::asset('resources/images/about.svg') }}"
                alt="" srcset="">
        @endif


    </div>
    <div class="order-1 m-4 place-content-evenly rounded-xl border p-2 text-lg lg:order-2 lg:ml-auto">
        <div class="grid grid-cols-1 flex-wrap gap-4 lg:m-20">
            <div class="mx-auto text-2xl font-semibold lg:text-4xl">Login to Continue</div>
            {{-- <button
                class="inline-flex h-auto place-content-center gap-2 rounded-md border border-gray-500 py-3 align-middle font-semibold xl:px-20 xl:text-xl"
                type="submit">
                <svg class="w-6" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M10.9999 4.58333C12.482 4.58333 13.8428 5.09073 14.9291 5.93456L18.2631 2.75375C16.3247 1.04496 13.7872 0 10.9999 0C6.77631 0 3.11356 2.38326 1.27026 5.8757L4.97766 8.80255C5.87575 6.34276 8.2293 4.58333 10.9999 4.58333Z"
                        fill="#F44336" />
                    <path
                        d="M21.9047 12.3767C21.962 11.926 22 11.4663 22 11C22 10.2136 21.9141 9.44792 21.7573 8.70833H11V13.2917H16.9457C16.4647 14.5418 15.6083 15.5996 14.5182 16.3345L18.2393 19.2723C20.2119 17.5408 21.5618 15.1162 21.9047 12.3767Z"
                        fill="#2196F3" />
                    <path
                        d="M4.58333 11C4.58333 10.2268 4.72712 9.48899 4.97772 8.80255L1.27032 5.8757C0.462306 7.40668 0 9.14848 0 11C0 12.8308 0.453802 14.5533 1.24503 16.0719L4.95713 13.1413C4.7194 12.4707 4.58333 11.7521 4.58333 11Z"
                        fill="#FFC107" />
                    <path
                        d="M11.0001 17.4167C8.20835 17.4167 5.83964 15.6306 4.95721 13.1413L1.24512 16.0719C3.0794 19.5924 6.75575 22 11.0001 22C13.7755 22 16.3064 20.9689 18.2394 19.2723L14.5183 16.3345C13.5129 17.0123 12.3095 17.4167 11.0001 17.4167Z"
                        fill="#00B060" />
                    <path opacity="0.1"
                        d="M11.0001 21.7708C7.76275 21.7708 4.85178 20.4351 2.7937 18.307C4.80836 20.568 7.73354 22 11.0001 22C14.2365 22 17.1374 20.5962 19.1476 18.3707C17.0956 20.4643 14.2067 21.7708 11.0001 21.7708Z"
                        fill="black" />
                    <path opacity="0.1" d="M11 13.0625V13.2917H16.9457L17.0385 13.0625H11Z" fill="black" />
                    <path
                        d="M21.9949 11.1348C21.9957 11.0896 22 11.0453 22 11C22 10.9872 21.998 10.9748 21.998 10.962C21.9973 11.0197 21.9944 11.0768 21.9949 11.1348Z"
                        fill="#E6E6E6" />
                    <path opacity="0.2"
                        d="M11 8.70833V8.9375H21.8034C21.789 8.86186 21.7732 8.78342 21.7573 8.70833H11Z"
                        fill="white" />
                    <path
                        d="M21.7573 8.70833H11V13.2917H16.9457C16.0211 15.6948 13.7291 17.4167 11 17.4167C7.4562 17.4167 4.58333 14.5438 4.58333 11C4.58333 7.45614 7.4562 4.58333 11 4.58333C12.285 4.58333 13.4694 4.97811 14.4728 5.62896C14.6264 5.72878 14.7848 5.82249 14.9291 5.93456L18.2632 2.75375L18.188 2.6959C16.2589 1.02398 13.7532 0 11 0C4.92485 0 0 4.92485 0 11C0 17.0751 4.92485 22 11 22C16.6079 22 21.2258 17.8005 21.9047 12.3767C21.962 11.926 22 11.4663 22 11C22 10.2136 21.9141 9.44792 21.7573 8.70833Z"
                        fill="url(#paint0_linear_753_2371)" />
                    <path opacity="0.1"
                        d="M14.4727 5.3998C13.4693 4.74894 12.285 4.35417 10.9999 4.35417C7.45612 4.35417 4.58325 7.22698 4.58325 10.7708C4.58325 10.8095 4.58377 10.8397 4.58444 10.8783C4.64627 7.38789 7.49478 4.58333 10.9999 4.58333C12.285 4.58333 13.4693 4.97811 14.4727 5.62896C14.6263 5.72878 14.7847 5.82249 14.929 5.93456L18.2631 2.75375L14.929 5.70539C14.7847 5.59332 14.6263 5.49961 14.4727 5.3998Z"
                        fill="black" />
                    <path opacity="0.2"
                        d="M11 0.229167C13.7271 0.229167 16.2093 1.23602 18.131 2.8798L18.2632 2.75375L18.1623 2.66592C16.2332 0.993996 13.7532 0 11 0C4.92485 0 0 4.92485 0 11C0 11.0387 0.00537112 11.076 0.00576272 11.1146C0.067866 5.09286 4.96351 0.229167 11 0.229167Z"
                        fill="white" />
                    <defs>
                        <linearGradient id="paint0_linear_753_2371" x1="0" y1="11" x2="22"
                            y2="11" gradientUnits="userSpaceOnUse">
                            <stop stop-color="white" stop-opacity="0.2" />
                            <stop offset="1" stop-color="white" stop-opacity="0" />
                        </linearGradient>
                    </defs>
                </svg>
                Continue with Google
            </button>

            <button
                class="inline-flex h-auto place-content-center gap-2 rounded-md border border-gray-500 py-3 align-middle font-semibold xl:px-20 xl:text-xl"
                type="submit">
                <svg class="w-6" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M17.5565 0C18.9051 0 20 1.09492 20 2.44352V17.5565C20 18.9051 18.9051 20 17.5565 20H13.3976V12.4643H15.9991L16.4941 9.23688H13.3976V7.14246C13.3976 6.25953 13.8301 5.39887 15.2171 5.39887H16.625V2.65121C16.625 2.65121 15.3473 2.43316 14.1257 2.43316C11.5754 2.43316 9.90852 3.97883 9.90852 6.77707V9.23688H7.07363V12.4643H9.90852V20H2.44352C1.09492 20 0 18.9051 0 17.5565V2.44352C0 1.09492 1.09488 0 2.44352 0L17.5565 0Z"
                        fill="#1777F2" />
                </svg>

                Continue with Facebook
            </button>

            <button
                class="inline-flex h-auto place-content-center gap-2 rounded-md border border-gray-500 py-3 align-middle font-semibold xl:px-20 xl:text-xl"
                type="submit">
                <svg class="w-6" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M18.4224 13.4571C18.3951 10.709 20.6634 9.39093 20.7649 9.32434C19.49 7.46035 17.5039 7.20459 16.797 7.17549C15.1081 7.00395 13.4998 8.17032 12.643 8.17032C11.788 8.17032 10.4642 7.20062 9.06367 7.22532C7.22129 7.25266 5.52311 8.29688 4.57502 9.94611C2.66164 13.2653 4.08554 18.1843 5.94997 20.8782C6.86146 22.195 7.94845 23.6766 9.37456 23.6224C10.7491 23.5682 11.2676 22.7334 12.9292 22.7334C14.5908 22.7334 15.0574 23.6224 16.5112 23.5946C17.9894 23.5677 18.9264 22.2527 19.8304 20.9307C20.8769 19.401 21.3077 17.9198 21.3333 17.8448C21.3011 17.8298 18.452 16.7384 18.4224 13.4571Z"
                        fill="black" />
                    <path
                        d="M15.6905 5.39264C16.4467 4.47454 16.9591 3.19881 16.8198 1.92881C15.7284 1.97291 14.4072 2.65421 13.6236 3.57143C12.9216 4.38546 12.3078 5.68148 12.4723 6.92854C13.6898 7.02291 14.9316 6.30898 15.6905 5.39264Z"
                        fill="black" />
                </svg>

                Continue with Apple
            </button> --}}



            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <div wire:loading class="mx-auto" role="status">
                <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                    viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                        fill="currentColor" />
                    <path
                        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                        fill="currentFill" />
                </svg>
                <span class="sr-only">Loading...</span>
            </div>

            <form wire:submit='login'>
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="mt-1 block w-full" type="email" name="email"
                        wire:model='email' required autofocus autocomplete="email" />
                    @error('email')
                        <x-input-error :messages="$message" class="mt-2" />
                    @enderror
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="mt-1 block w-full" type="password" name="password" required
                        wire:model='password' autocomplete="current-password" />

                    @error('password')
                        <x-input-error :messages="$message" class="mt-2" />
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="mt-4 block">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                            name="remember" wire:remember>
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="mt-4 grid grid-cols-1">
                    <x-primary-button wire:loading.attr="disabled" wire:loading.class="animate-pulse"
                        class="h-auto bg-primary py-2 text-lg font-medium">
                        {{ __('Login') }}
                    </x-primary-button>
                </div>

                <div class="mt-4">
                    @if (Route::has('password.request'))
                        <a class="rounded-md text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                            href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>
                <p class="mt-4">Don't have an account
                    @if ($registration_action)
                        <button @click="{!! $registration_action !!}" class="text-blue-500 underline hover:text-blue-700">
                            Register Here
                        </button>
                    @else
                        <a href="{{ route('register') }}"
                            class="text-blue-500 hover:text-blue-700 underline">Register
                            Here</a>
                    @endif
                </p>

            </form>
        </div>

    </div>
</div>
