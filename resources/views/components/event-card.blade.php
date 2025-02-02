@props(['imageUrl', 'title', 'location', 'event'])

<div class="max-w-sm overflow-hidden rounded-lg border border-gray-500 bg-[#F7F7F7] p-5 shadow-lg"
    x-data="{ open: false }">
    <div>
        <img class="w-full rounded-lg" src="{{ $imageUrl }}" alt="{{ $title }}">
    </div>
    <a href="{{ route('event.index', $event->id) }}" target="_blank">
        <div class="lg:px-6 lg:py-4">
            <div class="mb-2 text-sm md:text-xl font-medium">{{ $title }}</div>
            <p class="text-xs md:text-sm text-gray-700">
                {{ $location }}
            </p>
        </div>
    </a>
    <div class="h-2"></div>

    @if ($event->isOpenForRegistration())
        <x-primary-link-button href="{{ route('register_for_event', ['event' => $event]) }}"
            wire:loading.attr="disabled" wire:loading.class="animate-pulse"
            class="items-center rounded-md border border-transparent bg-primary px-4 py-2 text-sm font-normal tracking-widest text-white transition duration-150 ease-in-out hover:bg-brand focus:bg-brand focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 active:bg-brand">
            @if (Auth::user()->canExhibit())
                Exhibit
            @else
                Book
            @endif
        </x-primary-link-button>

    @endif

    {{-- <div id="register-event-modal" tabindex="-1" aria-hidden="register-event-modal" data-modal-backdrop="static"
        class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0">
        <div class="relative max-h-full w-full max-w-4xl p-4">
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
                @if ($event->isOpenForRegistration())
                    @if (Auth::user()->canExhibit())
                        <livewire:make-event-exhibition-booking :eventId="$event->id" parentId='register-event-modal'
                            :lazy="true" />
                    @else
                        <livewire:create-event-booking :event="$event" parentId='register-event-modal'
                            :lazy="true">
                    @endif
                @endif
            </div>
        </div>
    </div> --}}
</div>
