@use('Illuminate\Support\Number')

<div>
    <div class="grid grid-cols-1 items-center justify-between rounded-t border-b px-4 py-1 dark:border-gray-600 md:px-5">
        <h3 class="mx-auto text-xl font-semibold text-primary">
            @if ($booking)
                Order Details
            @else
                Register for {{ $event->title }}
            @endif
        </h3>
        <p class="mx-auto my-2 text-center text-sm">Happening from
            {{ date_format($event->startsOn, 'd') . ' ' . 'to' . ' ' . date_format($event->endsOn, 'd') . ' ' . date_format($event->startsOn, 'M' . ', ' . date_format($event->startsOn, 'Y')) }}
            at {{ $event->locationDescription }}</p>
    </div>
    @if ($booking)
        <livewire:create-payment-order wire:transition.in :billable="$booking" />
    @else
        @if ($bookingType)
            <form wire:submit='store' wire.transition.out>
                <div class="space-y-1 py-4 md:py-5">
                    <p class="ml-4 pl-6 font-semibold">Attendees</p>

                    @foreach ($emails as $index => $e)
                        @php
                            $attendee = $this->attendees()[$e] ?? null;
                        @endphp
                        <div id="attendee-{{ $index }}" wire:key="attendee-{{ $index }}"
                            class="space-y-1 border-gray-200 dark:border-gray-600 md:px-10">

                            <div class="my-2 grid py-2 md:py-5">
                                @if ($attendee)
                                    @php
                                        [
                                            $name,
                                            $institution,
                                            $nationality,
                                            $reg_status,
                                            $reg_number,
                                            $price,
                                        ] = array_values($attendee);
                                    @endphp

                                    <div class="my-2 grid grid-cols-1 gap-2 lg:grid-cols-3">
                                        <x-styled-disabled-input id="email-{{ $index }}"
                                            value="{{ $e }}" label="Email" />
                                        <x-styled-disabled-input id="full_name-{{ $index }}"
                                            value="{{ $name }}" label="Full Name" />
                                        <x-styled-disabled-input id="institution_name-{{ $index }}"
                                            value="{{ $institution }}" label="Organization/Company" />
                                    </div>

                                    <div class="my-2 grid grid-cols-1 gap-2 lg:grid-cols-3">
                                        <x-styled-disabled-input id="nationality-{{ $index }}"
                                            value="{{ $nationality }}" label="Nationality" />
                                        <x-styled-disabled-input id="registration_status-{{ $index }}"
                                            value="{{ $reg_status }}" label="Registration Status" />
                                        <x-styled-disabled-input id="registration_number-{{ $index }}"
                                            value="{{ $reg_number }}" label="Registration Number" />
                                    </div>
                                    <div class="flex place-content-between items-end gap-10 md:p-2">
                                        @if ($this->ticketCount() > 0 && !$this->isSingleBooking())
                                            <button type="button" wire:click="removeAttendee({{ $index }})"
                                                class="text-red-600">
                                                Remove Attendee
                                            </button>
                                        @endif
                                        <div class="place-items-end">
                                            <p class="font-sm text-end text-gray-500">Ticket Price</p>
                                            <p class="text-xl font-semibold">{{ Number::format($price) }} </p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach

                    @if (!$this->isSingleBooking())
                        @error('email')
                            <div class="mx-4 my-4 flex items-center rounded-lg bg-red-50 p-4 text-sm text-red-800 dark:bg-gray-800 dark:text-red-400 md:mx-10"
                                role="alert">
                                <svg class="me-3 inline h-4 w-4 flex-shrink-0" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                </svg>
                                <span class="sr-only">Info</span>
                                <div>
                                    {{ $message }}
                                </div>
                            </div>
                        @enderror
                        <div class="flex place-items-center space-x-4 space-y-1 p-4 md:px-10">
                            <p class="font-semibold">Email</p>
                            <div class="flex-grow">
                                <x-sm-text-input wire:model="email" wire:model.live.debounce.150ms="search"
                                    autocomplete="email" />
                            </div>
                            <div class="ml-auto flex items-center overflow-hidden rounded-lg border">
                                {{-- <button type="button" wire:click="removeAttendee({{ $count - 1 }})"
                            class="bg-primary px-3 py-2 font-bold text-white hover:bg-primary">-</button> --}}
                                {{-- <span class="bg-white px-4 py-2 font-semibold text-black">{{ $this->ticketCount }}</span> --}}
                                <button type="button" wire:click="addAttendee"
                                    class="bg-primary px-4 py-2 text-sm font-bold text-white hover:bg-primary">Add
                                    Email</button>
                            </div>
                        </div>
                    @endif
                </div>

                <div
                    class="mx-5 flex place-content-between items-end gap-10 rounded-b border-t border-gray-200 p-4 dark:border-gray-600 md:p-5">
                    <p class="text-md">Total</p>

                    <div class="place-items-end">
                        <p class="font-sm text-end text-gray-500">{{ $this->ticketCount }} ticket(s)</p>
                        <p class="text-3xl font-semibold">{{ Number::format($totalPrice ?? 0) }} </p>
                    </div>
                </div>
                <div
                    class="mx-6 grid grid-cols-1 items-end gap-5 rounded-b border-t border-gray-200 p-4 dark:border-gray-600 md:mx-4 md:p-5">

                    <div class="inline-flex gap-2">
                        <input type="checkbox" class="my-auto rounded-sm border border-primary text-primary"
                            name="terms-conditions" id="terms-conditions" wire:model='agreeTerms'>
                        <p>
                            Agree to <a class="text-primary underline" href="">term &amp; conditions </a>
                        </p>
                    </div>
                    <div>
                        @error('agreeTerms')
                            <x-input-error :messages=$message></x-input-error>
                        @enderror
                    </div>

                    <div class="flex place-content-end gap-10">
                        <x-primary-link-button href="{{ route('event.about', ['event' => $this->event]) }}"
                            class="border border-gray-500 bg-white !py-2 !text-sm !font-normal !text-gray-500">
                            Cancel
                        </x-primary-link-button>
                        <x-primary-button wire:loading.attr="disabled" wire:loading.class="animate-pulse" type="submit"
                            class="items-center rounded-md border border-transparent bg-primary px-4 py-2 text-sm font-normal tracking-widest text-white transition duration-150 ease-in-out hover:bg-primary focus:bg-primary focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 active:bg-primary">
                            Proceed to Pay
                        </x-primary-button>
                    </div>
                </div>
            </form>
        @else
            <div class="grid grid-cols-1 justify-center justify-items-center gap-2 p-2 lg:grid-cols-2 lg:p-4">
                <div
                    class="w-full max-w-sm rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-8">
                    <h5 class="mb-4 text-xl font-medium text-gray-500 dark:text-gray-400">Individual Booking</h5>
                    <div class="flex items-baseline text-gray-900 dark:text-white">
                        <span class="text-5xl font-extrabold tracking-tight">For Me</span>
                    </div>
                    <ul role="list" class="my-7 space-y-5">
                        <li class="flex items-center">
                            <x-heroicon-o-arrow-right class="h-8 w-6 shrink-0 text-primary-700 dark:text-primary-500" />
                            <span class="ms-3 text-base font-normal leading-tight text-gray-500 dark:text-gray-400">
                                A single ticket for one person
                            </span>
                        </li>
                        <li class="flex items-center">
                            <x-heroicon-o-arrow-right class="h-8 w-6 shrink-0 text-primary-700 dark:text-primary-500" />
                            <span class="ms-3 text-base font-normal leading-tight text-gray-500 dark:text-gray-400">
                                The price is calculated based on the ticket type and your registration status
                            </span>
                        </li>
                        <li class="flex items-center">
                            <x-heroicon-o-arrow-right class="h-8 w-6 shrink-0 text-primary-700 dark:text-primary-500" />
                            <span class="ms-3 text-base font-normal leading-tight text-gray-500 dark:text-gray-400">
                                Your details are filled automatically
                            </span>
                        </li>
                    </ul>
                    <button type="button"
                        class="inline-flex w-full justify-center rounded-lg bg-primary-400 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-primary-500 focus:outline-none focus:ring-4 focus:ring-primary-200 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-900"
                        wire:click="chooseBookingType('single')">
                        Make a Booking For Myself
                    </button>
                </div>
                <div
                    class="w-full max-w-sm rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-8">
                    <h5 class="mb-4 text-xl font-medium text-gray-500 dark:text-gray-400">Group Booking</h5>
                    <div class="flex items-baseline text-gray-900 dark:text-white">
                        <span class="text-5xl font-extrabold tracking-tight">For Many</span>
                    </div>
                    <ul role="list" class="my-7 space-y-5">
                        <li class="flex items-center">
                            <x-heroicon-o-arrow-right class="h-8 w-6 shrink-0 text-primary-700 dark:text-primary-500" />
                            <span class="ms-3 text-base font-normal leading-tight text-gray-500 dark:text-gray-400">
                                Multiple tickets for a group of people
                            </span>
                        </li>
                        <li class="flex items-center">
                            <x-heroicon-o-arrow-right class="h-8 w-6 shrink-0 text-primary-700 dark:text-primary-500" />
                            <span class="ms-3 text-base font-normal leading-tight text-gray-500 dark:text-gray-400">
                                Each ticket can have different details and price
                            </span>
                        </li>
                        <li class="flex items-center">
                            <x-heroicon-o-arrow-right class="h-8 w-6 shrink-0 text-primary-700 dark:text-primary-500" />
                            <span class="ms-3 text-base font-normal leading-tight text-gray-500 dark:text-gray-400">
                                Add the Emails for each attendee and search for their details
                            </span>
                        </li>
                    </ul>
                    <button type="button"
                        class="inline-flex w-full justify-center rounded-lg bg-primary-400 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-primary-500 focus:outline-none focus:ring-4 focus:ring-primary-200 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-900"
                        wire:click="chooseBookingType('group')">
                        Make a Booking For Many
                    </button>
                </div>
            </div>
        @endif


    @endif
</div>
