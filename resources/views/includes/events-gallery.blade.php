<div class="mx-auto flex w-full flex-col bg-brand px-4">
    <div id="topContainer" class="relative hidden md:block">
        <div class="px-32 pt-10 text-start text-2xl font-semibold text-white">
            <span>Upcoming Events</span>
        </div>
        <!-- Buttons on top -->
        <div class="absolute left-0 right-0 top-1/3 z-10 flex justify-center space-x-2 px-12 py-16">
            <div class="flex w-full justify-between">
                <div class="flex items-center">
                    <div class="w-full">
                        <button id="prevBtn"
                            class="hidden rounded-full bg-primary-500 p-2 text-white shadow-md hover:bg-primary-600 disabled:opacity-50">
                            <x-heroicon-o-chevron-left class="h-6 w-6" />
                            <span class="sr-only">Previous</span>
                        </button>
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="w-full">
                        <button id="nextBtn"
                            class="hidden rounded-full bg-primary-500 p-2 text-white shadow-md hover:bg-primary-600 disabled:opacity-50">
                            <x-heroicon-o-chevron-right class="h-6 w-6" />
                            <span class="sr-only">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scrollable Cards -->
        <div id="cardContainer" class="scrollbar-hide overflow-x-auto scroll-smooth whitespace-nowrap px-32 py-10">
            <div class="inline-flex space-x-12">
                @foreach ($latestEvents as $latestEvent)
                    @php
                        /** @var \App\Models\JSON\EventModelConfiguration $config **/
                        $config = $latestEvent->configuration;
                    @endphp
                    <div class="flex flex-col">
                        <div class="{{ $latestEvent->id == $event->id ? 'border-2 border-brand-500' : '' }} relative flex h-[366px] w-[548px] flex-shrink-0 items-end rounded-2xl bg-brand bg-cover bg-center p-4 shadow-lg"
                            @if ($latestEvent->getMainBannerUrl()) style="background-image: url('{{ $latestEvent->getMainBannerUrl() }}')" @endif>
                            @if ($config->upcomingCardLayout === $config::UPCOMING_CARD_LAYOUT_MAIN_BANNER_WITH_TEXT)
                                <div class="absolute inset-0 rounded-2xl bg-black/30"></div>
                                <div class="relative z-10 flex flex-col text-wrap text-white">
                                    <div class="flex w-full gap-2 xl:col-span-2">
                                        <p class="text-sm font-semibold lg:text-xl xl:w-1/2">
                                            {{ $latestEvent->title }}
                                        </p>
                                        <p
                                            class="grid grid-cols-1 place-content-center text-4xl font-semibold text-primary">
                                            @if ($latestEvent->edition)
                                                <span>{!! $latestEvent->edition !!}</span>
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
                                            {{ $latestEvent->locationDescription }}
                                        </p>
                                        <p class="inline-flex gap-2">
                                            <svg width="18" height="19" viewBox="0 0 18 19" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_442_32)">
                                                    <path
                                                        d="M15.2585 2.15754H13.0788V0.704346H11.6256V2.15754H5.81278V0.704346H4.35958V2.15754H2.17979C1.60168 2.15754 1.04724 2.3872 0.638446 2.79599C0.229656 3.20478 0 3.75922 0 4.33733L0 18.1427H17.4383V4.33733C17.4383 3.75922 17.2087 3.20478 16.7999 2.79599C16.3911 2.3872 15.8367 2.15754 15.2585 2.15754ZM1.45319 4.33733C1.45319 4.14463 1.52975 3.95981 1.66601 3.82355C1.80227 3.68729 1.98709 3.61073 2.17979 3.61073H15.2585C15.4512 3.61073 15.6361 3.68729 15.7723 3.82355C15.9086 3.95981 15.9851 4.14463 15.9851 4.33733V6.51712H1.45319V4.33733ZM1.45319 16.6895V7.97032H15.9851V16.6895H1.45319Z"
                                                        fill="#F7D31D" />
                                                    <path d="M12.3521 10.1501H10.8989V11.6033H12.3521V10.1501Z"
                                                        fill="#F7D31D" />
                                                    <path d="M9.44588 10.1501H7.99268V11.6033H9.44588V10.1501Z"
                                                        fill="#F7D31D" />
                                                    <path d="M6.53925 10.1501H5.08606V11.6033H6.53925V10.1501Z"
                                                        fill="#F7D31D" />
                                                    <path d="M12.3521 13.0566H10.8989V14.5098H12.3521V13.0566Z"
                                                        fill="#F7D31D" />
                                                    <path d="M9.44588 13.0566H7.99268V14.5098H9.44588V13.0566Z"
                                                        fill="#F7D31D" />
                                                    <path d="M6.53925 13.0566H5.08606V14.5098H6.53925V13.0566Z"
                                                        fill="#F7D31D" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_442_32">
                                                        <rect width="17.4383" height="17.4383" fill="white"
                                                            transform="translate(0 0.704346)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            {{ $latestEvent->getDateRangeDescription() }}
                                        </p>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="inline-flex items-center justify-between space-x-4 py-4">
                            <div class="w-full overflow-clip">
                                @if ($latestEvent->isOpenForRegistration())
                                    <x-countdown-timer :endsOn="$latestEvent->endsOn" />
                                @endif
                            </div>
                            <div class="ml-auto flex place-content-center justify-end gap-4 text-sm">
                                @if ($latestEvent->isOpenForRegistration())
                                    <a href="{{ route('register_for_event', ['event' => $latestEvent]) }}"
                                        class="ml-auto rounded-lg bg-secondary px-4 py-2 font-semibold text-black">
                                        Attend this event
                                    </a>
                                @endif
                                <a href="{{ route('event.index', ['event' => $latestEvent]) }}"
                                    class="ml-auto rounded-lg border border-white px-4 py-2 text-white">More
                                    Details</a>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="relative block w-full justify-center py-10 md:hidden" data-carousel="static">
        <div class="mb-8 text-center text-2xl font-semibold text-white">
            <span>Upcoming Events</span>
        </div>

        <!-- Carousel wrapper -->
        <div class="relative h-72 overflow-hidden rounded-lg md:h-96">
            @foreach ($latestEvents as $latestEvent)
                @php
                    /** @var \App\Models\JSON\EventModelConfiguration $config **/
                    $config = $latestEvent->configuration;
                @endphp
                <!-- Item 1 -->
                <div class="hidden duration-700 ease-in-out"
                    data-carousel-item={{ $latestEvent->id === $event->id ? 'active' : '' }}>
                    <img src="{{ $latestEvent->getMainBannerUrl() }}"
                        class="absolute left-1/2 top-1/2 block w-full -translate-x-1/2 -translate-y-1/2" alt="...">

                    @if ($config->upcomingCardLayout === $config::UPCOMING_CARD_LAYOUT_MAIN_BANNER_WITH_TEXT)
                        <div
                            class="absolute left-1/2 top-1/2 flex w-full -translate-x-1/2 -translate-y-1/2 flex-col px-4 text-center text-white">
                            <p class="text-normal font-semibold">
                                {{ $latestEvent->title }}
                                @if ($latestEvent->edition)
                                    <span>{!! $latestEvent->edition !!}</span>
                                    <span class="text-sm font-light text-secondary">Edition</span>
                                @endif
                            </p>
                            <p class="text-normal">
                                {{ $latestEvent->getDateRangeDescription() }}
                            </p>
                            <div class="inline-flex items-center justify-center space-x-4 py-4 text-xs">
                                @if ($latestEvent->isOpenForRegistration())
                                    <a href="{{ route('register_for_event', ['event' => $latestEvent]) }}"
                                        class="rounded-lg bg-secondary px-4 py-2 font-semibold text-black">
                                        Attend this event
                                    </a>
                                @endif
                                <a href="{{ route('event.index', ['event' => $latestEvent]) }}"
                                    class="rounded-lg border border-white px-4 py-2 text-white">More
                                    Details</a>
                            </div>
                        </div>
                    @endif

                </div>
            @endforeach
        </div>
        <!-- Slider indicators -->
        <div class="absolute bottom-5 left-1/2 z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse">
            @foreach ($latestEvents as $latestEvent)
                <button type="button" class="h-3 w-3 rounded-full" aria-current="true" aria-label="Slide 1"
                    data-carousel-slide-to="0"></button>
            @endforeach
        </div>
        <!-- Slider controls -->
        <button type="button"
            class="group absolute start-0 top-9 z-30 flex h-full cursor-pointer items-center justify-center px-4 focus:outline-none"
            data-carousel-prev>
            <span
                class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-primary-500 group-hover:bg-primary-600 group-focus:outline-none group-focus:ring-4 group-focus:ring-white dark:bg-gray-800/30 dark:group-hover:bg-gray-800/60 dark:group-focus:ring-gray-800/70">
                <svg class="h-4 w-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 1 1 5l4 4" />
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button"
            class="group absolute end-0 top-9 z-30 flex h-full cursor-pointer items-center justify-center px-4 focus:outline-none"
            data-carousel-next>
            <span
                class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-primary-500 group-hover:bg-primary-600 group-focus:outline-none group-focus:ring-4 group-focus:ring-white dark:bg-gray-800/30 dark:group-hover:bg-gray-800/60 dark:group-focus:ring-gray-800/70">
                <svg class="h-4 w-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 9 4-4-4-4" />
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>

</div>

<style>
    /* Hide scrollbar for Webkit browsers */
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }

    /* Hide scrollbar for Firefox */
    .scrollbar-hide {
        scrollbar-width: none;
    }
</style>

<script>
    const topContainer = document.getElementById('topContainer');
    const container = document.getElementById('cardContainer');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const cardWidth = 548 + 64; // card width + gap

    function updateButtons() {
        prevBtn.disabled = container.scrollLeft === 0;
        nextBtn.disabled = container.scrollLeft + container.clientWidth >= container.scrollWidth;
    }

    function checkScrollButtons() {
        if (container.scrollWidth > container.clientWidth) {
            prevBtn.classList.remove('hidden');
            nextBtn.classList.remove('hidden');
        } else {
            prevBtn.classList.add('hidden');
            nextBtn.classList.add('hidden');
        }
    }

    nextBtn.addEventListener('click', () => {
        container.scrollBy({
            left: cardWidth,
            behavior: 'smooth'
        });
    });

    prevBtn.addEventListener('click', () => {
        container.scrollBy({
            left: -cardWidth,
            behavior: 'smooth'
        });
    });

    container.addEventListener('scroll', updateButtons);

    // Capture scroll events on topContainer and pass to cardContainer
    topContainer.addEventListener('wheel', (e) => {
        if (container.scrollWidth > container
            .clientWidth) { // allow the default event if this container is not scrollable
            // console.log(e);
            e.preventDefault();
            container.scrollBy({
                left: e.wheelDelta > 0 ? -cardWidth : cardWidth,
                behavior: 'smooth'
            });
        }
    });

    window.addEventListener('load', () => {
        updateButtons();
        checkScrollButtons();
    });

    window.addEventListener('resize', checkScrollButtons);
</script>
