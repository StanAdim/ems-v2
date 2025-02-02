@use('Illuminate\Support\Number')

@php
    $event = $this->exhibitionBooking->event;
@endphp

<div>
    <div class="grid grid-cols-1 items-center justify-between rounded-t border-b px-4 py-1 dark:border-gray-600 md:px-5">
        <h3 class="mx-auto text-xl font-semibold text-primary">
            Add your team
        </h3>
        <p class="mx-auto my-2 text-center text-sm">Happening from
            {{ date_format($event->startsOn, 'd') . ' ' . 'to' . ' ' . date_format($event->endsOn, 'd') . ' ' . date_format($event->startsOn, 'M' . ', ' . date_format($event->startsOn, 'Y')) }}
            at {{ $event->locationDescription }}</p>
    </div>
    @if ($submitted)
        <livewire:create-payment-order wire:transition.in :billable="$attendeeList" />
    @else
        <form wire:submit='store' wire.transition.out>
            <div class="space-y-1 py-4 md:py-5">
                <p class="ml-4 pl-6 font-semibold">Attendees</p>

                @foreach ($emails as $index => $e)
                    @php
                        $attendee = $this->attendees()[$e] ?? null;
                    @endphp
                    <div id="attendee-{{ $index }}" wire:key="attendee-{{ $index }}"
                        class="space-y-1 rounded-b border-b border-gray-200 dark:border-gray-600 md:px-10">

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
                                    <x-styled-disabled-input id="email-{{ $index }}" value="{{ $e }}"
                                        label="Email" />
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
                                    @if ($this->ticketCount() > 0)
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

                @error('email')
                    <div class="mx-4 my-4 flex items-center rounded-lg bg-red-50 p-4 text-sm text-red-800 dark:bg-gray-800 dark:text-red-400 md:mx-10"
                        role="alert">
                        <svg class="me-3 inline h-4 w-4 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
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
                        class="bg-primary px-3 py-2 font-bold text-white hover:bg-brand">-</button> --}}
                        {{-- <span class="bg-white px-4 py-2 font-semibold text-black">{{ $this->ticketCount }}</span> --}}
                        <button type="button" wire:click="addAttendee"
                            class="bg-primary px-4 py-2 text-sm font-bold text-white hover:bg-brand">Add Email</button>
                    </div>
                </div>
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
                        name="terms-conditions" id="terms-conditions">
                    <p>Agree to <a class="text-primary underline" href="">term &amp; conditions </a>
                    </p>
                </div>

                <div class="flex place-content-end gap-10">
                    <x-primary-link-button href="{{ route('event.about', ['event' => $event]) }}"
                        class="border border-gray-500 bg-white !py-2 !text-sm !font-normal !text-gray-500">
                        Cancel
                    </x-primary-link-button>
                    <x-primary-button wire:loading.attr="disabled" wire:loading.class="animate-pulse" type="submit"
                        class="items-center rounded-md border border-transparent bg-primary px-4 py-2 text-sm font-normal tracking-widest text-white transition duration-150 ease-in-out hover:bg-brand focus:bg-brand focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 active:bg-brand">
                        Proceed to Pay
                    </x-primary-button>
                </div>
            </div>
        </form>
    @endif
</div>
