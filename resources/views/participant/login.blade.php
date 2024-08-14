@extends('layouts.index')

@section('content')
    <div>
        <!-- Let all your things have their places; let each part of your business have its time. - Benjamin Franklin -->
    </div>

    <div class="container mx-auto py-10 grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-0">
        <div class="mx-2 bg-brand rounded-xl">
            <img class="w-full h-full p-10 object-fit md:object-cover " src="{{ Vite::asset('resources/images/about.svg') }}"
                alt="" srcset="">
        </div>
        <div class="m-4 place-content-evenly ml-auto rounded-xl text-lg p-2 border">
            <div class="grid grid-cols-1 flex-wrap gap-4 m-20">
                <div class="font-bold text-4xl mx-auto">Login to Continue</div>
                <button class="ring-1 place-content-center align-middle ring-black inline-flex gap-2 rounded-md px-20 py-4 h-auto text-xl font-semibold" type="submit">
                    <svg class="w-6" viewBox="0 0 22 22" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
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

                <button class="ring-1 place-content-center align-middle ring-black inline-flex gap-2 rounded-md px-20 py-4 h-auto text-xl font-semibold" type="submit">
                    <svg class="w-6" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M17.5565 0C18.9051 0 20 1.09492 20 2.44352V17.5565C20 18.9051 18.9051 20 17.5565 20H13.3976V12.4643H15.9991L16.4941 9.23688H13.3976V7.14246C13.3976 6.25953 13.8301 5.39887 15.2171 5.39887H16.625V2.65121C16.625 2.65121 15.3473 2.43316 14.1257 2.43316C11.5754 2.43316 9.90852 3.97883 9.90852 6.77707V9.23688H7.07363V12.4643H9.90852V20H2.44352C1.09492 20 0 18.9051 0 17.5565V2.44352C0 1.09492 1.09488 0 2.44352 0L17.5565 0Z" fill="#1777F2"/>
                        </svg>

                    Continue with Facebook
                </button>

                <button class="ring-1 place-content-center align-middle ring-black inline-flex gap-2 rounded-md px-20 py-4 h-auto text-xl font-semibold" type="submit">
                    <svg class="w-6" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18.4224 13.4571C18.3951 10.709 20.6634 9.39093 20.7649 9.32434C19.49 7.46035 17.5039 7.20459 16.797 7.17549C15.1081 7.00395 13.4998 8.17032 12.643 8.17032C11.788 8.17032 10.4642 7.20062 9.06367 7.22532C7.22129 7.25266 5.52311 8.29688 4.57502 9.94611C2.66164 13.2653 4.08554 18.1843 5.94997 20.8782C6.86146 22.195 7.94845 23.6766 9.37456 23.6224C10.7491 23.5682 11.2676 22.7334 12.9292 22.7334C14.5908 22.7334 15.0574 23.6224 16.5112 23.5946C17.9894 23.5677 18.9264 22.2527 19.8304 20.9307C20.8769 19.401 21.3077 17.9198 21.3333 17.8448C21.3011 17.8298 18.452 16.7384 18.4224 13.4571Z" fill="black"/>
                        <path d="M15.6905 5.39264C16.4467 4.47454 16.9591 3.19881 16.8198 1.92881C15.7284 1.97291 14.4072 2.65421 13.6236 3.57143C12.9216 4.38546 12.3078 5.68148 12.4723 6.92854C13.6898 7.02291 14.9316 6.30898 15.6905 5.39264Z" fill="black"/>
                        </svg>

                    Continue with Apple
                </button>

                <label for="email" class="text-gray-500">Email</label>
                <input class="h-auto py-4 px-4 text-lg text-black rounded-md placeholder-black" placeholder="Email"
                    type="email" name="email" id="email">
                <label for="password" class="text-gray-500">Password</label>
                <input class="h-auto py-4 px-4 text-lg text-black rounded-md placeholder-black" placeholder="********" type="password"
                    name="password" id="password">
                <a href="#" class="underline">Forgot your password?</a>
                <button class="bg-primary rounded-md px-20 py-4 h-auto font-medium text-lg" type="submit">Login</button>
                <p>Don't have an account? <a href="#" class="underline">Forgot your password?</a></p>
            </div>

        </div>
    </div>
@endsection
