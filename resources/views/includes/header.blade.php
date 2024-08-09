@php
    use App\Models\Post;
    $aboutUsSubMenus = [
        ['link' => '/about-us/who-we-are', 'title' => 'Who we Are'],
        ['link' => '/about-us/what-we-do', 'title' => 'What we Do'],
        ['link' => '/about-us/board-of-directors', 'title' => 'Board of Directors'],
        ['link' => '/about-us/organization-structure', 'title' => 'Organization Structure'],
        ['link' => '/about-us/management-team', 'title' => 'Management Team'],
    ];

    $ourServicesSubMenus = [
        [
            'link' => '/our-services/professional-registration',
            'title' => 'Professional Registration',
        ],
        [
            'link' => '/our-services/professional-development',
            'title' => 'Professional Development',
        ],
        ['link' => '/our-services/ict-promotion', 'title' => 'ICT Promotion'],
        ['link' => '/our-services/ict-research', 'title' => 'ICT Research'],
        ['link' => '/our-services/e-services', 'title' => 'e-Services'],
    ];

    $ictRegisterSubMenus = [
        [
            'link' => '/ict-register/ict-professionals',
            'title' => 'ICT Professionals',
        ],
        [
            'link' => '/ict-register/ict-innovation',
            'title' => 'ICT Innovation',
        ],
        ['link' => '/ict-register/ict-service-providers', 'title' => 'ICT Service Providers'],
    ];

    $mediaCentreSubMenus = [];
@endphp

<div class="w-100 sm:h-auto md:h-15 py-4  bg-primary flex justify-center">
    <span class="mx-auto text-center align-middle text-white font-medium">
        <span class="ml-5 lg:ml-28 text-sm">
            The United Republic of Tanzania | Ministry of Information,
            Communication and Information Technology | Information and Communication Technologies Commission
        </span>
    </span>
    <div class="hidden md:flex divide-x-2 justify-center space-x-5 ">
        <div class="flex space-x-1">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white"
                class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-1.605.42-3.113 1.157-4.418" />
            </svg>

            <a href="#" class="text-white inline-flex">English
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
<a href="/">
    <div class=" flex bg-brand  align-baseline justify-start py-4">
        <div class="container mx-auto flex divide-x-2">
            <img width="128.3px" class="mx-5" src="{{ Vite::asset('resources/images/white_logo.png') }}"
                alt="" srcset="">
                <p class="px-5 place-self-center text-5xl text-secondary font-bold">Events Management System</p>
        </div>

    </div>
</a>

<hr class="bg-white text-white">

<header class="bg-brand">
    <nav class="mx-auto flex  items-center justify-between p-4 lg:px-8" aria-label="Global">
        <div class="flex lg:flex-1">
            <a href="/" class="-m-1.5 p-1.5">
                <span class="sr-only">ICT Commission</span>
            </a>
        </div>
        <div class="flex flex-1 lg:hidden " x-data="{ menuOpen: false }">
            <a href="/" class="text-sm font-semibold leading-6 mr-auto">Home</a>
            <button @click="$store.menu.toggle()" type="button" aria-controls="mobile-menu"
                class="-my-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                <span class="sr-only">Open main menu</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
        </div>
        <div class="hidden lg:flex lg:gap-x-5 xl:gap-x-20 text-white">
            <a href="/" class="text-lg font-regular leading-6">About</a>
            <a href="/" class="text-lg font-semibold leading-6">Participant</a>
            <a href="/" class="text-lg font-semibold leading-6">Exhibitor</a>
            <a href="/" class="text-lg font-semibold leading-6">Sponsor</a>
            <a href="/" class="text-lg font-semibold leading-6">Buyer</a>
            <a href="/" class="text-lg font-semibold leading-6">Media</a>
            <a href="/" class="text-lg font-semibold leading-6">Help</a>

            {{-- <x-drop-down-menu title="About Us" :items=$aboutUsSubMenus /> --}}
            {{-- <x-drop-down-menu title="Our Services" :items=$ourServicesSubMenus /> --}}
            {{-- <x-drop-down-menu title="ICT Register" :items=$ictRegisterSubMenus /> --}}
            {{-- <x-drop-down-menu title="Events" :items=$latestEvents /> --}}
            {{-- <x-drop-down-menu title="Publications" :items=$publicationCategories /> --}}
            {{-- <x-drop-down-menu title="Media Centre" :items=$mediaCentreSubMenus /> --}}
        </div>
        <div class="hidden lg:flex lg:flex-1 lg:justify-end">
        </div>
    </nav>

    <!-- Mobile menu, show/hide based on menu open state. -->
    <div id="mobile-menu" x-show="$store.menu.open" x-data role="dialog" aria-modal="true">
        <!-- Background backdrop, show/hide based on slide-over state. -->
        <div class="fixed inset-0 z-10"></div>
        <div
            class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
            <div class="flex items-center justify-between">
                <a href="/" class="-m-1.5 p-1.5">
                    <span class="sr-only">ICT COMMISSION</span>
                    <img class="h-12 w-auto" src="{{ Vite::asset('resources/images/ictc_logo.png') }}" alt="">
                </a>
                <button @click="$store.menu.close()" type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">Close menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="mt-6 flow-root">
                <div class="-my-6 divide-y divide-gray-500/10">
                    <div class="space-y-2 py-6">

                        {{-- About Us Menu --}}
                        {{-- <x-side-bar-menu title="About Us" :items=$aboutUsSubMenus /> --}}
                        {{-- End of About Us Menu --}}

                        {{-- Our Service Menu --}}
                        {{-- <x-side-bar-menu title="Our Services" :items=$ourServicesSubMenus /> --}}
                        {{-- End of Our Services Menu --}}

                        {{-- ICT Register Menu --}}
                        {{-- <x-side-bar-menu title="ICT Register" :items=$ictRegisterSubMenus /> --}}
                        {{-- End of ICT Register Menu --}}

                        {{-- Events Menu --}}
                        {{-- <x-side-bar-menu title="Events" :items=$latestEvents /> --}}
                        {{-- End of Events Menu --}}

                        {{-- Publications Menu --}}
                        {{-- <x-side-bar-menu title="Publications" :items=$publicationCategories /> --}}
                        {{-- End of Publications Menu --}}

                        {{-- Media Centre Menu --}}
                        {{-- <x-side-bar-menu title="Media Centre" :items=$mediaCentreSubMenus /> --}}
                        {{-- End of Media Centre Menu --}}

                        <a href="/contact-us"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Contact
                            Us</a>
                        <a href="/invest/invest-in-tanzania"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Invest
                            In Tanzania</a>

                    </div>
                    {{-- <div class="py-6">
                        <a href="#"
                            class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Log
                            in</a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</header>
<hr>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.store('menu', {
            open: false,
            toggle() {
                this.open = !this.open;
            },
            close() {
                this.open = false;
            }
        });
    });
</script>
