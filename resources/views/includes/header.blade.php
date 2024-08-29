<div class="w-100 md:h-15 flex justify-center bg-primary py-4 sm:h-auto">
    <span class="mx-auto text-center align-middle font-medium text-white">
        <span class="ml-5 text-sm lg:ml-28">
            The United Republic of Tanzania | Ministry of Information,
            Communication and Information Technology | Information and Communication Technologies Commission
        </span>
    </span>
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

<div class="flex flex-wrap bg-[#0b1224] py-4 align-baseline">
    <div class="container mx-auto grid grid-cols-1 md:grid-cols-2">
        <a href="/">
            <div class="flex justify-center divide-x-2 md:justify-start">
                <img width="74px" src="{{ Vite::asset('resources/images/white_logo.png') }}" alt=""
                    srcset="">
                <p class="place-self-center px-5 text-sm font-medium text-secondary lg:text-2xl">Events Management
                    System
                </p>
            </div>
        </a>

        <div class="text-nowrap inline-flex justify-center gap-2 py-2 align-middle md:gap-4 lg:justify-end">
            @foreach ($latestEvents as $latestEvent)
                <a href="{{ $latestEvent['url'] }}"
                    class="{{ $event && $event?->id == $latestEvent['id'] ? 'text-secondary' : 'text-white' }} my-auto text-xs underline lg:text-xl">
                    {{ $latestEvent['title'] }}
                </a>
            @endforeach
        </div>

    </div>
</div>

<hr class="bg-white text-white">
<div class="hidden bg-brand py-4 text-white md:block">
    <div class="container mx-auto grid grid-cols-1 gap-2 lg:grid-cols-5">
        <div class="grid grid-cols-2 gap-4 lg:col-span-2">
            <p class="text-sm font-semibold lg:text-3xl">
                {{ $event->title }}
            </p>
            <p class="grid grid-cols-1 place-content-center text-4xl font-semibold text-primary">
                <span>8th</span><span class="text-sm font-light text-secondary">Edition</span>
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
                {{ $event->startsOn->format('jS') }} - {{ $event->endsOn->format('jS F Y') }}
            </p>
        </div>
        {{-- <div class="place-content-center ml-auto justify-end">
            <a href="/login"><button class="ml-auto px-5 py-3 font-medium bg-secondary rounded-lg text-black">Register
                    Now</button></a>
        </div> --}}
        <div class="ml-auto place-content-center justify-end">
            <button data-modal-target="register-event-modal" data-modal-toggle="register-event-modal"
                class="ml-auto rounded-lg bg-secondary px-5 py-3 font-medium text-black ring-1 ring-secondary">Attend this event</button>
            <a href="{{ route('login') }}"><button
                    class="ml-2 rounded-lg px-5 py-3 font-medium text-white ring-1 ring-white">Login</button></a>
        </div>
    </div>
</div>
<hr class="bg-white text-white">

<nav class="mx-auto bg-brand">

    <button data-collapse-toggle="navbar-default" type="button"
        class="inline-flex h-10 w-10 items-center justify-center rounded-lg p-2 text-sm text-white md:hidden"
        aria-controls="navbar-default" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M1 1h15M1 7h15M1 13h15" />
        </svg>
    </button>

    <div class="container mx-auto hidden w-full px-4 py-3 md:block md:w-auto" id="navbar-default">
        <div class="flex md:place-content-center md:text-center">
            <ul
                class="mt-0 grid grid-cols-1 space-x-8 overflow-hidden text-lg font-normal rtl:space-x-reverse md:flex">
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
                    <a href="#" class="text-white hover:underline">Sponsor</a>
                </li>
                <li>
                    <a href="#" class="text-white hover:underline">Buyer</a>
                </li>
                <li>
                    <a href="#" class="text-white hover:underline">Media</a>
                </li>
                <li>
                    <a href="#" class="text-white hover:underline">Hospitality</a>
                </li>
                <li>
                    <a href="#" class="text-white hover:underline">Tours</a>
                </li>
                <li>
                    <a href="#" class="text-white hover:underline">Help</a>
                </li>
                <a href="{{ route('login') }}" class="text-white hover:underline md:hidden">
                    Login
                </a>

            </ul>
        </div>
    </div>
</nav>

<hr class="bg-white text-white">
<div id="register-event-modal" tabindex="-1" aria-hidden="register-event-modal" data-modal-backdrop="static"
    class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0">
    <div class="relative max-h-full w-full max-w-2xl p-4">
        <!-- Modal content -->
        <div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between rounded-t">
                <button type="button"
                    class="m-1 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="register-event-modal">
                    <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <livewire:create-event-booking :event="$event" parentId='register-event-modal'>

        </div>
    </div>
</div>


<!-- Register Event Modal -->
{{-- <div x-data={registeredPrice:420000,nonRegisteredPrice:500000,foreignPrice:750000,singleTicketPrice:0,ticketCounts:1}
    x-init="$data.singleTicketPrice = (document.getElementById('registration-status').value === 'registered') ? $data.registeredPrice : $data.nonRegisteredPrice;" id="register-event-modal" tabindex="-1" aria-hidden="register-event-modal"
    data-modal-backdrop="static"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <form action="{{ route('event-bookings.store') }}" method="POST">
            @csrf
            <!-- Add hidden inputs for the event ID and total amount -->
            <input type="hidden" name="event_id" value="{{ $event->id }}">
            <input type="hidden" name="total_amount" x-model="singleTicketPrice * ticketCounts">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between  rounded-t">
                    <button type="button"
                        class="text-gray-400 bg-transparent m-1 hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="register-event-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <div
                    class="grid grid-cols-1 items-center justify-between py-1 px-4 md:px-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl text-primary mx-auto font-semibold">
                        Register for {{ $event->title }}
                    </h3>
                    <p class="text-sm my-2 mx-auto text-center">Happening from
                        {{ date_format($event->startsOn, 'd') . ' ' . 'to' . ' ' . date_format($event->endsOn, 'd') . ' ' . date_format($event->startsOn, 'M' . ', ' . date_format($event->startsOn, 'Y')) }}
                        at {{ $event->locationDescription }}</p>
                </div>
                <!-- Modal body -->
                <div x-data="{ count: 1 }" class="p-4 md:p-5 space-y-1">
                    <p class="pl-6 ml-4 font-semibold" x-text="'Attendees' + ' Details'"></p>
                    <template x-for="i in count" :key="i">
                        <div :id="'attendee-' + i" class="p-4 md:px-10 space-y-1">
                            <p class=" font-semibold" x-text="'Attendee #' + i + ' Details'"></p>
                            <x-attendees-input required="1" placeholder="Name: Karim Salkim"></x-attendees-input>
                            <x-attendees-input required="1" placeholder="Phone Number: +255 714 474 336"></x-attendees-input>
                            <x-attendees-input required="1" placeholder="Email: karimsalmik@gmail.com"></x-attendees-input>
                        </div>
                    </template>

                    <div class="flex p-4 md:px-10  space-y-1 place-items-center">
                        <p class="font-semibold">Number of Tickets</p>
                        <div class="ml-auto flex items-center border rounded-lg overflow-hidden">
                            <button type="button" @click="if(count>1) count--;if(ticketCounts>1)ticketCounts--;"
                                class="bg-primary text-white font-bold px-3 py-2 hover:bg-brand">-</button>
                            <span class="px-4 py-2 bg-white text-black font-semibold" x-text="count"></span>
                            <button type="button" @click="count++;ticketCounts++"
                                class="bg-primary text-white font-bold px-3 py-2 hover:bg-brand">+</button>
                        </div>
                    </div>
                </div>
                <!-- Extra attendees Details -->
                <div class="pl-4 md:pl-5 mt-2 md:mx-8 py-2">
                    <p class="font-semibold text-md text-gray-500 pt-2 place-self-center">Extra Details</p>
                </div>


                <!-- Extra attendees Details Form -->
                <div class="grid m-2 md:mx-8 my-2 p-2 md:p-5">

                    <div class="grid gap-2 grid-cols-1 lg:grid-cols-2 my-2">
                        <div class="">
                            <label for="institution_name" class="block mb-1 font-normal text-gray-500 text-sm">
                                Organization/Company</label>
                            <input id="institution_name" required name="institution_name" autocomplete="institution_name"
                                type="text" placeholder="Organization/Company" id="institution_name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-gray-900 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div>
                            <label for="nationality"
                                class="block mb-1 font-normal text-gray-500 text-sm">Nationality</label>
                            <select id="nationality" required name="nationality" autocomplete="nationality"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Choose a country</option>
                                <option value="TZ" @selected(true)>Tanzania</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-2 lg:grid-cols-2 my-2">
                        <div>
                            <label for="registration-status"
                                class="block mb-1 font-normal text-gray-500 text-sm">Registration
                                Status</label>
                            <select id="registration-status" required
                                x-on:change="$el.value=='registered' ? $data.singleTicketPrice=$data.registeredPrice : ($el.value=='foreigner' ? $data.singleTicketPrice=750000 : $data.singleTicketPrice=$data.nonRegisteredPrice)"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Select Status</option>
                                <option value="registered" @selected(true)>Registered</option>
                                <option value="not-registered">Not Registered</option>
                                <option value="foreigner">Foreigner</option>
                            </select>
                        </div>
                        <div class="">
                            <label for="reg-number" class="block mb-1 font-normal text-gray-500 text-sm">Registration
                                Number</label>
                            <input type="text" required placeholder="1274793-123" id="reg-number" name="reg-number"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-gray-900 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                    </div>

                </div>
                <!-- Modal footer -->
                <div
                    class="flex items-end place-content-between mx-5 gap-10 p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <p class="text-md">Total</p>

                    <div class="place-items-end">
                        <p class="text-end font-sm text-gray-500" x-text="ticketCounts + ' ticket(s)'"></p>
                        <p class="font-semibold text-3xl" x-text="singleTicketPrice*ticketCounts"></p>
                    </div>

                </div>
                <div
                    class="grid grid-cols-1 items-end  gap-5 p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">

                    <div class="inline-flex gap-2">
                        <input type="checkbox" class="my-auto border border-primary text-primary rounded-sm"
                            name="terms-conditions" id="terms-conditions">
                        <p>Agree to <a class="text-primary underline" href="">term &amp; conditions </a></p>
                    </div>

                    <div class="flex place-content-end gap-10">
                        <x-primary-button data-modal-hide="register-event-modal"
                            class="!py-2 !font-normal bg-white !text-gray-500 border border-gray-500 !text-sm">
                            Cancel
                        </x-primary-button>

                        <x-primary-button type="submit" class="text-sm items-center px-4 py-2 bg-primary border border-transparent rounded-md font-normal text-white tracking-widest hover:bg-brand focus:bg-brand active:bg-brand focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Register
                            to Pay</x-primary-button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div> --}}

{{-- <x-primary-button data-modal-hide="register-event-modal"
                            data-modal-target="order-details-modal" data-modal-toggle="order-details-modal"
                            class="hidden !py-2 !font-normal !text-sm">
                            Continue
                        </x-primary-button> --}}

<!-- Order Details Event Modal -->
{{-- <div id="order-details-modal" tabindex="-1" aria-hidden="order-details-modal"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between  rounded-t">
                <button type="button"
                    class="text-gray-400 bg-transparent m-1 hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="order-details-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div
                class="grid grid-cols-1 items-center justify-between py-1 px-4 md:px-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-2xl text-primary mx-auto font-semibold">
                    Order Details
                </h3>
                <p class="text-sm my-2 mx-auto">
                    Happening from 13th -17th October, 2024 at JNICC, Dar es Salaam
                </p>
            </div>
            <!-- Modal body -->
            <div
                class="grid grid-cols-1 items-end place-content-between mx-5 p-4 md:p-5 border-y  border-gray-200 rounded-b dark:border-gray-600">

                <table class="table w-full">
                    <tr>
                        <td class="font-medium">Ticket Number</td>
                        <td class="text-end">81845532</td>
                    </tr>
                    <tr>
                        <td class="font-medium">Event:</td>
                        <td class="text-end">Tanzania Annual ICT Conference 2024</td>
                    </tr>
                    <tr>
                        <td class="font-medium">Ticket type:</td>
                        <td class="text-end">Single</td>
                    </tr>
                    <tr>
                        <td class="font-medium">Total</td>
                        <td class="text-end">500,000</td>
                    </tr>
                </table>
            </div>

            <!-- Payment Options -->
            <div class="text-center mt-2">
                <p class="mx-auto font-semibold text-md pt-2 place-self-center">Payment Options</p>
            </div>
            <div class="grid border m-2 md:mx-10 p-2 md:p-4 rounded-xl border-gray-400">
                <div class="flex justify-between">
                    <p class="font-semibold lg:pl-4 text-sm mt-2">Mobile Money Push (Tanzanians)</p>
                    <img class="w-1/2" src="{{ Vite::asset('resources/images/mobile-money.svg') }}" alt="">
                </div>
                <p class="ml-5 mt-2 font-normal text-gray-500 text-sm py-2">Confirm your mobile number to pay with</p>

                <form class="mx-4">
                    <div class="flex items-center">
                        <button id="dropdown-phone-button" data-dropdown-toggle="dropdown-phone"
                            class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600"
                            type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 me-2" viewBox="0 0 32 32">
                                <path
                                    d="M2.316,26.947L29.684,5.053c-.711-.648-1.647-1.053-2.684-1.053H5C2.791,4,1,5.791,1,8v16c0,1.172,.513,2.216,1.316,2.947Z"
                                    fill="#55b44b"></path>
                                <path
                                    d="M29.684,5.053L2.316,26.947c.711,.648,1.647,1.053,2.684,1.053H27c2.209,0,4-1.791,4-4V8c0-1.172-.513-2.216-1.316-2.947Z"
                                    fill="#4aa2d9"></path>
                                <path
                                    d="M27,4h-1.603L1,23.518v.482c0,2.209,1.791,4,4,4h1.603L31,8.482v-.482c0-2.209-1.791-4-4-4Z"
                                    fill="#f6d44a"></path>
                                <path
                                    d="M27,4h-.002L1.074,24.739c.347,1.855,1.97,3.261,3.926,3.261h.002L30.926,7.261c-.347-1.855-1.97-3.261-3.926-3.261Z">
                                </path>
                                <path
                                    d="M27,4H5C2.791,4,1,5.791,1,8v16c0,2.209,1.791,4,4,4H27c2.209,0,4-1.791,4-4V8c0-2.209-1.791-4-4-4Zm3,20c0,1.654-1.346,3-3,3H5c-1.654,0-3-1.346-3-3V8c0-1.654,1.346-3,3-3H27c1.654,0,3,1.346,3,3v16Z"
                                    opacity=".15"></path>
                                <path
                                    d="M27,5H5c-1.657,0-3,1.343-3,3v1c0-1.657,1.343-3,3-3H27c1.657,0,3,1.343,3,3v-1c0-1.657-1.343-3-3-3Z"
                                    fill="#fff" opacity=".2"></path>
                            </svg>
                            +255 <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <div id="dropdown-phone"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-52 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdown-phone-button">
                                <li>
                                    <button type="button"
                                        class="inline-flex w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white"
                                        role="menuitem">
                                        <span class="inline-flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 me-2"
                                                viewBox="0 0 32 32">
                                                <path
                                                    d="M2.316,26.947L29.684,5.053c-.711-.648-1.647-1.053-2.684-1.053H5C2.791,4,1,5.791,1,8v16c0,1.172,.513,2.216,1.316,2.947Z"
                                                    fill="#55b44b"></path>
                                                <path
                                                    d="M29.684,5.053L2.316,26.947c.711,.648,1.647,1.053,2.684,1.053H27c2.209,0,4-1.791,4-4V8c0-1.172-.513-2.216-1.316-2.947Z"
                                                    fill="#4aa2d9"></path>
                                                <path
                                                    d="M27,4h-1.603L1,23.518v.482c0,2.209,1.791,4,4,4h1.603L31,8.482v-.482c0-2.209-1.791-4-4-4Z"
                                                    fill="#f6d44a"></path>
                                                <path
                                                    d="M27,4h-.002L1.074,24.739c.347,1.855,1.97,3.261,3.926,3.261h.002L30.926,7.261c-.347-1.855-1.97-3.261-3.926-3.261Z">
                                                </path>
                                                <path
                                                    d="M27,4H5C2.791,4,1,5.791,1,8v16c0,2.209,1.791,4,4,4H27c2.209,0,4-1.791,4-4V8c0-2.209-1.791-4-4-4Zm3,20c0,1.654-1.346,3-3,3H5c-1.654,0-3-1.346-3-3V8c0-1.654,1.346-3,3-3H27c1.654,0,3,1.346,3,3v16Z"
                                                    opacity=".15"></path>
                                                <path
                                                    d="M27,5H5c-1.657,0-3,1.343-3,3v1c0-1.657,1.343-3,3-3H27c1.657,0,3,1.343,3,3v-1c0-1.657-1.343-3-3-3Z"
                                                    fill="#fff" opacity=".2"></path>
                                            </svg> Tanzania (+255)
                                        </span>
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <label for="phone-input"
                            class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Phone
                            number:</label>
                        <div class="relative w-full">
                            <input type="text" id="phone-input"
                                class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-0 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                                pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}" placeholder="123-456-789" required />
                        </div>
                    </div>
                </form>

                <div
                    class="grid grid-cols-1 items-end  gap-5 p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">

                    <div class="flex place-content-between gap-10">
                        <x-primary-button
                            class="!py-2 !font-normal bg-white !text-gray-500 border !border-gray-500 !text-sm">
                            Cancel
                        </x-primary-button>
                        <x-primary-button data-modal-target="gepg-modal" data-modal-toggle="gepg-modal"
                            class="!py-2 !font-normal !text-sm">
                            Pay Now (500,000)
                        </x-primary-button>
                    </div>
                </div>
            </div>

            <!-- Payment with cards -->
            <div class="grid border m-2 md:m-10 p-2 md:p-4 rounded-xl border-gray-400">
                <div class="flex justify-between">
                    <p class="font-semibold lg:pl-4 text-sm mt-1">Pay with Card (Tanzanians & Foreigners)</p>
                    <img class="w-1/3" src="{{ Vite::asset('resources/images/pay-cards.svg') }}" alt="">
                </div>


                <form class="mx-4">
                    <div class="grid gap-2 grid-cols-1 lg:grid-cols-2">
                        <div class="">
                            <label for="default-input" class="block mb-1 font-normal text-gray-500 text-sm">Card
                                Holder’s names</label>
                            <input type="text" placeholder="Names" id="default-input"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-gray-900 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div>
                            <label for="countries" class="block mb-1 font-normal text-gray-500 text-sm">Select an
                                option</label>
                            <select id="countries"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Choose a country</option>
                                <option value="US">United States</option>
                                <option value="CA">Canada</option>
                                <option value="FR">France</option>
                                <option value="DE">Germany</option>
                            </select>
                        </div>
                    </div>
                    <label for="card-number-input" class="font-normal text-gray-500 text-sm">Card number</label>
                    <div class="relative">
                        <input type="text" id="card-number-input"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pe-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="4242 4242 4242 4242" pattern="^4[0-9]{12}(?:[0-9]{3})?$" required />
                        <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                            <svg fill="none" class="h-6 text-[#1434CB] dark:text-white" viewBox="0 0 36 21">
                                <path fill="currentColor"
                                    d="M23.315 4.773c-2.542 0-4.813 1.3-4.813 3.705 0 2.756 4.028 2.947 4.028 4.332 0 .583-.676 1.105-1.832 1.105-1.64 0-2.866-.73-2.866-.73l-.524 2.426s1.412.616 3.286.616c2.78 0 4.966-1.365 4.966-3.81 0-2.913-4.045-3.097-4.045-4.383 0-.457.555-.957 1.708-.957 1.3 0 2.36.53 2.36.53l.514-2.343s-1.154-.491-2.782-.491zM.062 4.95L0 5.303s1.07.193 2.032.579c1.24.442 1.329.7 1.537 1.499l2.276 8.664h3.05l4.7-11.095h-3.043l-3.02 7.543L6.3 6.1c-.113-.732-.686-1.15-1.386-1.15H.062zm14.757 0l-2.387 11.095h2.902l2.38-11.096h-2.895zm16.187 0c-.7 0-1.07.37-1.342 1.016L25.41 16.045h3.044l.589-1.68h3.708l.358 1.68h2.685L33.453 4.95h-2.447zm.396 2.997l.902 4.164h-2.417l1.515-4.164z" />
                            </svg>
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-4 my-4">
                        <div class="relative max-w-sm col-span-2">
                            <div
                                class="absolute sm:mt-5 inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <label for="card-expiration-input" class="font-normal text-gray-500 text-sm">Expiration
                                Date</label>
                            <input datepicker datepicker-format="mm/yy" id="card-expiration-input" type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="12/23" required />
                        </div>
                        <div class="col-span-1">
                            <label for="cvv-input" class="font-normal text-gray-500 text-sm">Security Code</label>
                            <input type="number" id="cvv-input" aria-describedby="helper-text-explanation"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="CVV" required />
                        </div>
                    </div>
                </form>



                <div class="grid grid-cols-1 items-end  gap-5 p-4 border-gray-200 rounded-b dark:border-gray-600">

                    <div class="grid">
                        <x-primary-button data-modal-target="gepg-modal" data-modal-toggle="gepg-modal"
                            class="!py-2 !font-normal !text-sm">
                            Continue to Pay
                        </x-primary-button>
                    </div>
                </div>

            </div>
            <div class="h-4 p-3"></div>
        </div>
    </div>
</div> --}}

<!-- GEPG Modal -->
{{-- <div id="gepg-modal" tabindex="-1"
    class="hidden fixed top-0 left-0 right-0 z-50  w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-4xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-none shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between rounded-t">
                <button type="button"
                    class="text-gray-400 mt-5 me-5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="gepg-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="flex items-center justify-between px-4 pb-5 md:px-5 border-b rounded-t dark:border-gray-600">
                <img class="mx-auto" src="{{ Vite::asset('resources/images/gepg-logo.svg') }}" alt="">
            </div>
            <!-- Modal body -->
            <div class="flex gap-5 p-4 border-gray-200 ">
                <div class="grid mx-auto">
                    <p class="mx-auto font-semibold text-md pt-2 place-self-center">Your control number is:</p>
                </div>
            </div>
            <div class="flex gap-5 p-4 border-gray-200 ">
                <div class="grid mx-auto">
                    <div class="text-primary !no-underline text-3xl md:text-5xl font-extrabold"
                        style="text-decoration: none !important;">
                        992159585734
                    </div>
                </div>
            </div>
            <div class="flex gap-5 p-4 border-gray-200 ">
                <div class="grid mx-auto">
                    <p class="text-lg text-center text-gray-400">"Payments can be made anytime before October 1, 2024,
                        <br>via mobile or bank transfer."
                    </p>
                </div>
            </div>
            <div class="flex gap-5 p-4 border-gray-200 ">
                <div class="grid mx-auto">
                    <img class="mx-auto" src="{{ Vite::asset('resources/images/mobile-money.svg') }}"
                        alt="">
                </div>
            </div>
            <div class="flex gap-5 p-4 border-gray-200 ">
                <div class="grid mx-auto">
                    <x-primary-button id="gepg-modal-button" onclick="closeThis()"
                        data-modal-hide="order-details-modal" data-modal-target="extra-details-modal"
                        data-modal-toggle="extra-details-modal" class="!py-2 !font-normal !text-sm">
                        Download Invoice
                    </x-primary-button>
                </div>
            </div>
            <div class="flex gap-5 p-4 border-gray-200 rounded-b dark:border-gray-600">
                <div class="grid mx-auto">
                    <p class="text-sm mb-4">Having any trouble?<a class="text-primary underline ml-1"
                            href="#">Ask
                            help</a> </p>
                </div>
            </div>
        </div>
    </div>
</div> --}}
{{-- <script>
    function closeThis() {
        document.getElementById('gepg-modal').classList.add('hidden');
        document.getElementById('gepg-modal').classList.remove('flex');
        document.getElementById('gepg-modal').setAttribute("aria-hidden", "true");
        document.getElementById('gepg-modal').removeAttribute("role");
    }
</script> --}}

<!-- Extra Attendees Details Modal -->
{{-- <div id="extra-details-modal" tabindex="-1" aria-hidden="order-details-modal"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between  rounded-t">
                <button type="button" onclick="location.reload()"
                    class="text-gray-400 bg-transparent m-1 hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="extra-details-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div
                class="grid grid-cols-1 items-center justify-between py-1 px-4 md:px-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-2xl text-primary mx-auto font-semibold">
                    Register for {{ $event->shortTitle }}
                </h3>
                <p class="text-sm my-2 mx-auto">
                    Happening from {{ $event->startsOn->format('jS') }} - {{ $event->endsOn->format('jS F Y') }}, Dar
                    es
                    Salaam
                </p>
            </div>
            <!-- Modal body -->
            <div x-data="{ count: 1 }" class="p-4 md:p-5 space-y-1 border-b">
                <p class="pl-6 ml-4 font-semibold" x-text="'Attendees' + ' Details'"></p>

                <template x-for="i in count" :key="i">
                    <div :id="'attendee-' + i" class="p-4 md:px-10 space-y-1">
                        <x-attendees-input placeholder="Name: Karim Salkim"></x-attendees-input>
                        <x-attendees-input placeholder="Phone Number: +255 714 474 336"></x-attendees-input>
                        <x-attendees-input placeholder="Email: karimsalmik@gmail.com"></x-attendees-input>
                    </div>
                </template>

                <div class="flex p-4 md:px-10  space-y-1 place-items-center">
                    <p class="font-semibold">Number of Tickets</p>
                    <div class="ml-auto flex items-center border rounded-lg overflow-hidden">
                        <button @click="count--"
                            class="bg-primary text-white font-bold px-3 py-2 hover:bg-brand">-</button>
                        <span class="px-4 py-2 bg-white text-black font-semibold" x-text="count+1"></span>
                        <button @click="count++"
                            class="bg-primary text-white font-bold px-3 py-2 hover:bg-brand">+</button>
                    </div>
                </div>
            </div>

            <!-- Extra attendees Details -->
            <div class="pl-4 md:pl-10 mt-2 md:mx-8 py-2">
                <p class="font-semibold text-md text-gray-500 pt-2 place-self-center">Extra Attendees Details</p>
            </div>


            <!-- Extra attendees Details Form -->
            <div class="grid m-2 md:mx-10 my-2 p-2 md:p-4">
                <form class="mx-4">
                    <div class="grid gap-2 grid-cols-1 lg:grid-cols-2 my-2">
                        <div class="">
                            <label for="default-input" class="block mb-1 font-normal text-gray-500 text-sm">Card
                                Holder’s names</label>
                            <input type="text" placeholder="Names" id="default-input"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-gray-900 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="">
                            <label for="default-input-2" class="block mb-1 font-normal text-gray-500 text-sm">
                                Organization/Company</label>
                            <input type="text" placeholder="Organization/Company" id="default-input-2"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-gray-900 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-2 lg:grid-cols-2 my-2">
                        <div>
                            <label for="countries"
                                class="block mb-1 font-normal text-gray-500 text-sm">Nationality</label>
                            <select id="countries"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Choose a country</option>
                                <option value="TZ" @selected(true)>Tanzania</option>
                                <option value="CA">Canada</option>
                                <option value="FR">France</option>
                                <option value="DE">Germany</option>
                            </select>
                        </div>
                        <div class="">
                            <label for="phone" class="block mb-1 font-normal text-gray-500 text-sm">Phone
                                Number</label>
                            <input type="phone" placeholder="+255 754 333 333" id="phone"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-gray-900 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 gap-2 lg:grid-cols-2 my-2">
                        <div>
                            <label for="countries" class="block mb-1 font-normal text-gray-500 text-sm">Registration
                                Status</label>
                            <select id="countries"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Select Status</option>
                                <option value="registered" @selected(true)>Registered</option>
                                <option value="not-registered">Not Registered</option>

                            </select>
                        </div>
                        <div class="">
                            <label for="reg-number" class="block mb-1 font-normal text-gray-500 text-sm">Registration
                                Number</label>
                            <input type="text" placeholder="1274793-123" id="reg-number"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-gray-900 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                    </div>
                </form>
            </div>
            <!-- Modal footer -->
            <div
                class="flex items-end place-content-between mx-5 gap-10 p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <p class="text-md">Total</p>

                <div class="place-items-end">
                    <p class="text-end font-sm text-gray-500">2 tickets</p>
                    <p class="font-semibold text-3xl">920,000</p>
                </div>

            </div>
            <div
                class="grid grid-cols-1 items-end  gap-5 p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <div class="inline-flex gap-2 px-4">
                    <input type="checkbox" class="my-auto border border-primary text-primary rounded-sm"
                        name="terms-conditions" id="terms-conditions">
                    <p>Agree to <a class="text-primary underline" href=""> term &amp; conditions </a></p>
                </div>

                <div class="flex place-content-end gap-10">
                    <x-primary-button data-modal-hide="extra-details-modal" onclick="location.reload()"
                        class="!py-2 !font-normal  bg-white !text-gray-500 border border-gray-500 !text-sm">
                        Cancel
                    </x-primary-button>
                    <x-primary-button type="submit" onclick="location.reload()"
                        data-modal-hide="extra-details-modal" class="!py-2 !font-normal !text-sm">
                        Continue
                    </x-primary-button>
                </div>
            </div>
        </div>
    </div>
</div> --}}


@yield('header')
