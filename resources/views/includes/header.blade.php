<div class="w-100 md:h-15 flex justify-between bg-primary py-4 sm:h-auto">
    <p class="mx-1 text-center align-middle text-xs font-medium text-white md:text-sm lg:mx-auto">

        The United Republic of Tanzania | Ministry of Information,
        Communication and Information Technology | Information and Communication Technologies Commission

    </p>
    <div class="hidden justify-center space-x-5 divide-x-2 md:flex">
        <div class="flex space-x-1">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white"
                class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-1.605.42-3.113 1.157-4.418" />
            </svg>

            <a href="#" class="inline-flex text-white">English
                <svg class="-mr-1 h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                        clip-rule="evenodd" />
                </svg>
            </a>
        </div>
        <div>
            <a class="mx-5 text-white" href="#">FAQs</a>
        </div>
    </div>
</div>

<div class="flex flex-wrap bg-[#0b1224] px-3 py-4 align-baseline">
    <div class="container mx-auto grid grid-cols-1 md:grid-cols-2">
        <a href="/">
            <div class="flex justify-center divide-x-2 divide-gray-400 md:justify-start">
                <img width="74px" class="me-2" src="{{ Vite::asset('resources/images/white_logo.png') }}"
                    alt="" srcset="">
                <p class="mt-2 place-content-center px-3 text-sm font-medium text-secondary sm:text-lg lg:text-2xl">
                    Events Management
                    System
                </p>
            </div>
        </a>

        <div
            class="mt-2 inline-flex place-content-center justify-center gap-2 text-nowrap py-2 align-middle md:gap-4 lg:justify-end">
            @foreach ($latestEvents as $latestEvent)
                <a href="{{ $latestEvent['url'] }}"
                    class="{{ $event && $event?->id == $latestEvent['id'] ? 'text-secondary' : 'text-white' }} my-auto text-xs underline sm:text-base lg:text-xl">
                    {{ $latestEvent['title'] }}
                </a>
            @endforeach
        </div>

    </div>
</div>

<hr class="bg-white text-white">
<div class="hidden bg-brand px-3 py-4 text-white md:block">
    <div class="container mx-auto grid grid-cols-1 gap-4 xl:grid-cols-5">
        <div class="flex gap-2 xl:col-span-2">
            <p class="text-sm font-semibold lg:text-3xl xl:w-1/2">
                {{ $event->title }}
            </p>
            <p class="grid grid-cols-1 place-content-center text-4xl font-semibold text-primary">
                @if ($event->edition)
                    <span>{!! $event->edition !!}</span>
                    <span class="text-sm font-light text-secondary">Edition</span>
                @endif
            </p>
        </div>
        <div class="grid grid-cols-1 place-content-center lg:col-span-2">
            <p class="inline-flex gap-2">
                <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_442_51)">
                        <path
                            d="M14.5317 10.9038C14.5317 10.067 14.3253 9.24311 13.9308 8.50519C13.5362 7.76727 12.9657 7.1381 12.2698 6.67345C11.5739 6.20879 10.7741 5.92302 9.94128 5.84145C9.10848 5.75988 8.26843 5.88505 7.49558 6.20585C6.72274 6.52665 6.04099 7.03317 5.51075 7.68051C4.98052 8.32786 4.6182 9.09602 4.4559 9.91691C4.2936 10.7378 4.33634 11.5861 4.58033 12.3865C4.82433 13.1869 5.26203 13.9147 5.85465 14.5055L9.44549 18.0193L13.0422 14.5019C13.5162 14.0305 13.8919 13.4698 14.1476 12.8521C14.4033 12.2345 14.5338 11.5722 14.5317 10.9038ZM9.44549 15.9849L6.87625 13.4723C6.36841 12.9644 6.02248 12.3175 5.88216 11.6131C5.74185 10.9088 5.81344 10.1787 6.08791 9.51498C6.36237 8.8513 6.82738 8.28386 7.42419 7.88435C8.02101 7.48484 8.72284 7.27118 9.44103 7.27037C10.1592 7.26956 10.8615 7.48163 11.4593 7.87979C12.057 8.27795 12.5233 8.84434 12.7992 9.50739C13.0752 10.1704 13.1484 10.9004 13.0097 11.6051C12.871 12.3098 12.5265 12.9575 12.0198 13.4665L9.44549 15.9849ZM9.44549 8.71888C9.01437 8.71888 8.59293 8.84673 8.23447 9.08624C7.876 9.32576 7.59661 9.6662 7.43163 10.0645C7.26665 10.4628 7.22348 10.9011 7.30759 11.3239C7.39169 11.7468 7.5993 12.1352 7.90415 12.44C8.209 12.7449 8.5974 12.9525 9.02024 13.0366C9.44308 13.1207 9.88136 13.0775 10.2797 12.9125C10.678 12.7476 11.0184 12.4682 11.2579 12.1097C11.4974 11.7512 11.6253 11.3298 11.6253 10.8987C11.6253 10.3206 11.3956 9.76612 10.9868 9.35733C10.5781 8.94854 10.0236 8.71888 9.44549 8.71888ZM18.1647 8.02571V18.1646H11.3732L12.8605 16.7115H16.7115V8.02353C16.7119 7.91321 16.6869 7.80427 16.6385 7.70512C16.5902 7.60597 16.5197 7.51927 16.4325 7.4517L9.89308 2.33354C9.76528 2.23361 9.60772 2.17932 9.44549 2.17932C9.28327 2.17932 9.1257 2.23361 8.99791 2.33354L2.45853 7.45024C2.37126 7.51808 2.30072 7.60504 2.25234 7.70443C2.20397 7.80382 2.17906 7.91299 2.17952 8.02353V16.7115H6.03049L7.51638 18.1646H0.726326V8.02353C0.725455 7.6925 0.80037 7.36566 0.945332 7.06805C1.09029 6.77044 1.30146 6.50997 1.56264 6.30658L8.10202 1.18988C8.48564 0.889369 8.95891 0.726074 9.44622 0.726074C9.93354 0.726074 10.4068 0.889369 10.7904 1.18988L17.3298 6.30803C17.5907 6.51127 17.8016 6.77155 17.9463 7.06891C18.091 7.36627 18.1657 7.69282 18.1647 8.02353V8.02571Z"
                            fill="#F7D31D" />
                    </g>
                    <defs>
                        <clipPath id="clip0_442_51">
                            <rect width="17.4383" height="17.4383" fill="white"
                                transform="translate(0.726562 0.726562)" />
                        </clipPath>
                    </defs>
                </svg>
                {{ $event->locationDescription }}
            </p>
            <p class="inline-flex gap-2">
                <svg width="18" height="19" viewBox="0 0 18 19" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_442_32)">
                        <path
                            d="M15.2585 2.15754H13.0788V0.704346H11.6256V2.15754H5.81278V0.704346H4.35958V2.15754H2.17979C1.60168 2.15754 1.04724 2.3872 0.638446 2.79599C0.229656 3.20478 0 3.75922 0 4.33733L0 18.1427H17.4383V4.33733C17.4383 3.75922 17.2087 3.20478 16.7999 2.79599C16.3911 2.3872 15.8367 2.15754 15.2585 2.15754ZM1.45319 4.33733C1.45319 4.14463 1.52975 3.95981 1.66601 3.82355C1.80227 3.68729 1.98709 3.61073 2.17979 3.61073H15.2585C15.4512 3.61073 15.6361 3.68729 15.7723 3.82355C15.9086 3.95981 15.9851 4.14463 15.9851 4.33733V6.51712H1.45319V4.33733ZM1.45319 16.6895V7.97032H15.9851V16.6895H1.45319Z"
                            fill="#F7D31D" />
                        <path d="M12.3521 10.1501H10.8989V11.6033H12.3521V10.1501Z" fill="#F7D31D" />
                        <path d="M9.44588 10.1501H7.99268V11.6033H9.44588V10.1501Z" fill="#F7D31D" />
                        <path d="M6.53925 10.1501H5.08606V11.6033H6.53925V10.1501Z" fill="#F7D31D" />
                        <path d="M12.3521 13.0566H10.8989V14.5098H12.3521V13.0566Z" fill="#F7D31D" />
                        <path d="M9.44588 13.0566H7.99268V14.5098H9.44588V13.0566Z" fill="#F7D31D" />
                        <path d="M6.53925 13.0566H5.08606V14.5098H6.53925V13.0566Z" fill="#F7D31D" />
                    </g>
                    <defs>
                        <clipPath id="clip0_442_32">
                            <rect width="17.4383" height="17.4383" fill="white" transform="translate(0 0.704346)" />
                        </clipPath>
                    </defs>
                </svg>
                {{ $event->getDateRangeDescription() }}
            </p>
        </div>
        {{-- <div class="place-content-center ml-auto justify-end">
            <a href="/login"><button class="ml-auto px-5 py-3 font-medium bg-secondary rounded-lg text-black">Register
                    Now</button></a>
        </div> --}}
        <div class="ml-auto place-content-center justify-end">
            <div class="flex">
                @if ($event->isOpenForRegistration())
                    <a href="{{ route('register_for_event', ['event' => $event]) }}"
                        class="ml-auto rounded-lg bg-secondary px-5 py-3 font-medium text-black ring-1 ring-secondary">Attend
                        this event</a>
                @endif
                <a class="ml-2 rounded-lg px-5 py-3 font-medium text-white ring-1 ring-white"
                    href="{{ Auth::user() ? route('dashboard') : route('login') }}">
                    {{ Auth::user() ? 'Dashboard' : 'Login' }}
                </a>
            </div>

        </div>
    </div>
</div>
<hr class="bg-white text-white">

<nav class="mx-auto bg-brand">
    <div class="flex justify-between">
        <div class="ms-5 place-content-center text-white md:hidden">
            <a href="{{ route('event.index', ['event' => $event]) }}"
                class="{{ Route::is('event.index') ? 'text-secondary' : 'text-white ' }}hover:underline">Home</a>
        </div>
        <button data-collapse-toggle="navbar-default" type="button"
            class="me-2 inline-flex h-10 w-10 items-center justify-center rounded-lg p-2 text-sm text-white md:hidden"
            aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
    </div>

    <div class="container mx-auto hidden w-full px-4 py-3 md:block md:w-auto" id="navbar-default">
        <div class="flex md:place-content-center md:text-center">
            <ul
                class="mt-0 grid grid-cols-1 space-x-8 overflow-hidden text-sm font-normal md:flex lg:text-lg rtl:space-x-reverse">
                <li>
                    <a href="{{ route('event.about', ['event' => $event]) }}"
                        class="{{ Route::is('event.about') ? 'text-secondary' : 'text-white ' }} ms-8 hover:underline">About</a>
                </li>
                {{-- <li>
                    <a href="#" class="text-white hover:underline">Company</a>
                </li> --}}
                <li>
                    <a href="{{ route('event.participant', ['event' => $event]) }}"
                        class="{{ Route::is('event.participant') ? 'text-secondary' : 'text-white ' }} hover:underline">Participant</a>
                </li>
                <li>
                    <a href="{{ route('event.exhibitor', ['event' => $event]) }}"
                        class="{{ Route::is('event.exhibitor') ? 'text-secondary' : 'text-white ' }} hover:underline">Exhibitor</a>
                </li>
                <li>
                    <a href="{{ route('event.sponsor', ['event' => $event]) }}"
                        class="{{ Route::is('event.sponsor') ? 'text-secondary' : 'text-white ' }} hover:underline">Sponsor</a>
                </li>
                <li>
                    <a href="{{ route('event.hospitality-tours', ['event' => $event]) }}"
                        class="{{ Route::is('event.hospitality-tours') ? 'text-secondary' : 'text-white ' }} hover:underline">Hospitality
                        & Tours</a>
                </li>
                <li>
                    <a href="{{ route('event.help', ['event' => $event]) }}"
                        class="{{ Route::is('event.help') ? 'text-secondary' : 'text-white ' }} hover:underline">Help</a>
                </li>
                {{-- <li>
                    <a href="#" class="text-white hover:underline">Buyer</a>
                </li>
                <li>
                    <a href="#" class="text-white hover:underline">Media</a>
                </li> --}}
                <a href="{{ route('login') }}" class="text-white hover:underline md:hidden">
                    Login
                </a>

            </ul>
        </div>
    </div>
</nav>

<hr class="bg-white text-white">

@yield('header')
