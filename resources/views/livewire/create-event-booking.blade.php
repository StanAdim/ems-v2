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
        <form wire:submit='store' wire.transition.out>
            <div class="space-y-1 p-4 md:p-5">
                <p class="ml-4 pl-6 font-semibold">Attendees Details</p>

                @foreach ($attendees as $index => $attendee)
                    @php
                        $name = "attendees.$index.name";
                        $email = "attendees.$index.email";
                        $phone = "attendees.$index.phone";
                    @endphp
                    <div id="attendee-{{ $index }}" wire:key="attendee-{{ $index }}"
                        class="space-y-1 p-4 md:px-10">
                        <p class="font-semibold">Attendee #{{ $index + 1 }} Details</p>
                        <x-attendees-input :model="$name" placeholder="Name: Karim Salkim"></x-attendees-input>

                        <x-attendees-input :model="$phone"
                            placeholder="Phone Number: +255 714 474 336"></x-attendees-input>

                        <x-attendees-input :model="$email"
                            placeholder="Email: karimsalmik@gmail.com"></x-attendees-input>

                        @if ($count > 1)
                            <button type="button" wire:click="removeAttendee({{ $index }})"
                                class="text-red-600">Remove
                                Attendee</button>
                        @endif
                    </div>
                @endforeach

                <div class="flex place-items-center space-y-1 p-4 md:px-10">
                    <p class="font-semibold">Number of Tickets</p>
                    <div class="ml-auto flex items-center overflow-hidden rounded-lg border">
                        <button type="button" wire:click="removeAttendee({{ $count - 1 }})"
                            class="bg-primary px-3 py-2 font-bold text-white hover:bg-brand">-</button>
                        <span class="bg-white px-4 py-2 font-semibold text-black">{{ $count }}</span>
                        <button type="button" wire:click="addAttendee"
                            class="bg-primary px-3 py-2 font-bold text-white hover:bg-brand">+</button>
                    </div>
                </div>
            </div>

            <!-- Extra attendees Details -->
            <div class="mt-2 py-2 pl-4 md:mx-8 md:pl-5">
                <p class="text-md place-self-center pt-2 font-semibold text-gray-500">Extra Attendees Details
                </p>
            </div>


            <!-- Extra attendees Details Form -->
            <div class="m-2 my-2 grid p-2 md:mx-8 md:p-5">

                <div class="my-2 grid grid-cols-1 gap-2 lg:grid-cols-2">
                    <div class="">
                        <label for="institution_name" class="mb-1 block text-sm font-normal text-gray-500">
                            Organization/Company</label>
                        <input id="institution_name" name="institution_name" autocomplete="institution_name"
                            wire:model='institution_name' type="text" placeholder="Organization/Company"
                            id="institution_name"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:focus:border-blue-500 dark:focus:ring-blue-500">
                        @error('institution_name')
                            <x-input-error :messages="$message" class="mt-2" />
                        @enderror
                    </div>
                    <div>
                        <label for="nationality"
                            class="mb-1 block text-sm font-normal text-gray-500">Nationality</label>
                        <select id="nationality" name="nationality" autocomplete="nationality" wire:model='nationality'
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                            <option selected>Choose a country</option>
                            <option value="TZ" @selected(true)>Tanzania</option>
                        </select>
                        @error('nationality')
                            <x-input-error :messages="$message" class="mt-2" />
                        @enderror
                    </div>
                </div>

                <div class="my-2 grid grid-cols-1 gap-2 lg:grid-cols-2">
                    <div>
                        <label for="registration-status"
                            class="mb-1 block text-sm font-normal text-gray-500">Registration
                            Status</label>
                        <select id="registration-status" autocomplete="registration-status"
                            wire:model="registrationStatus" wire:change="updateUserRegistrationStatus"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                            <option value="" selected>Select Status</option>
                            @foreach ($event->getAvailableFeesList() as $key => $fee)
                                <option value="{{ $key }}">{{ $fee['title'] }}</option>
                            @endforeach
                        </select>
                        @error('registrationStatus')
                            <x-input-error :messages="$message" class="mt-2" />
                        @enderror
                    </div>
                    <div class="">
                        <label for="reg-number" class="mb-1 block text-sm font-normal text-gray-500">Registration
                            Number</label>
                        <input type="text" placeholder="P1234-ABC or P1234ABC" id="reg-number" name="reg-number"
                            wire:model='reg_number'
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:focus:border-blue-500 dark:focus:ring-blue-500">
                        @error('reg_number')
                            <x-input-error :messages="$message" class="mt-2" />
                        @enderror
                    </div>
                </div>

            </div>

            <div
                class="mx-5 flex place-content-between items-end gap-10 rounded-b border-t border-gray-200 p-4 dark:border-gray-600 md:p-5">
                <p class="text-md">Total</p>

                <div class="place-items-end">
                    <p class="font-sm text-end text-gray-500">{{ $ticketCounts }} ticket(s)</p>
                    <p class="text-3xl font-semibold">{{ Number::format($totalPrice) }} </p>
                </div>


            </div>
            <div
                class="grid grid-cols-1 items-end gap-5 rounded-b border-t border-gray-200 p-4 dark:border-gray-600 md:p-5">

                <div class="inline-flex gap-2">
                    <input type="checkbox" class="my-auto rounded-sm border border-primary text-primary"
                        name="terms-conditions" id="terms-conditions">
                    <p>Agree to <a class="text-primary underline" href="">term &amp; conditions </a>
                    </p>
                </div>

                <div class="flex place-content-end gap-10">
                    <x-primary-button data-modal-hide="{{ $parentId }}"
                        class="border border-gray-500 bg-white !py-2 !text-sm !font-normal !text-gray-500">
                        Cancel
                    </x-primary-button>
                    <x-primary-button wire:loading.attr="disabled" wire:loading.class="animate-pulse" type="submit"
                        class="items-center rounded-md border border-transparent bg-primary px-4 py-2 text-sm font-normal tracking-widest text-white transition duration-150 ease-in-out hover:bg-brand focus:bg-brand focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 active:bg-brand">
                        Proceed to Pay
                    </x-primary-button>
                </div>
            </div>
        </form>
    @endif
</div>
