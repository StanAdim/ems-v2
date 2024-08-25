<div>
    <div   id="register-event-modal" tabindex="-1" aria-hidden="register-event-modal" data-modal-backdrop="static"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            {{-- <form class="" > --}}
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between  rounded-t">
                    <button type="button"
                        class="text-gray-400 bg-transparent m-1 hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="register-event-modal">
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
                    <h3 class="text-xl text-primary mx-auto font-semibold">
                        Register for {{ $event->title }}
                    </h3>
                    <p class="text-sm my-2 mx-auto text-center">Happening from
                        {{ date_format($event->startsOn, 'd') . ' ' . 'to' . ' ' . date_format($event->endsOn, 'd') . ' ' . date_format($event->startsOn, 'M' . ', ' . date_format($event->startsOn, 'Y')) }}
                        at {{ $event->locationDescription }}</p>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-1">
                    <p class="pl-6 ml-4 font-semibold">Attendees Details</p>

                    @foreach ($attendees as $index => $attendee)
                        <div id="attendee-{{ $index + 1 }}" wire:key="attendee-{{ $index + 1 }}"
                            class="p-4 md:px-10 space-y-1">
                            <p class="font-semibold">Attendee #{{ $index + 1 }} Details</p>
                            <x-attendees-input wire:model="attendees.{{ $index }}.name"
                                placeholder="Name: Karim Salkim"></x-attendees-input>
                            <x-attendees-input wire:model="attendees.{{ $index }}.phone"
                                placeholder="Phone Number: +255 714 474 336"></x-attendees-input>
                            <x-attendees-input wire:model="attendees.{{ $index }}.email"
                                placeholder="Email: karimsalmik@gmail.com"></x-attendees-input>
                            @if ($count > 1)
                                <button type="button" wire:click="removeAttendee({{ $index }})"
                                    class="text-red-600">Remove Attendee</button>
                            @endif
                        </div>
                    @endforeach

                    <div class="flex p-4 md:px-10 space-y-1 place-items-center">
                        <p class="font-semibold">Number of Tickets</p>
                        <div class="ml-auto flex items-center border rounded-lg overflow-hidden">
                            <button type="button" wire:click="removeAttendee({{ $index }})"
                                class="bg-primary text-white font-bold px-3 py-2 hover:bg-brand">-</button>
                            <span class="px-4 py-2 bg-white text-black font-semibold">{{ $count }}</span>
                            <button type="button" wire:click="addAttendee;"
                                class="bg-primary text-white font-bold px-3 py-2 hover:bg-brand">+</button>
                        </div>
                    </div>
                </div>

                <!-- Extra attendees Details -->
                <div class="pl-4 md:pl-5 mt-2 md:mx-8 py-2">
                    <p class="font-semibold text-md text-gray-500 pt-2 place-self-center">Extra Attendees Details
                    </p>
                </div>


                <!-- Extra attendees Details Form -->
                <div class="grid m-2 md:mx-8 my-2 p-2 md:p-5">

                    <div class="grid gap-2 grid-cols-1 lg:grid-cols-2 my-2">
                        <div class="">
                            <label for="institution_name" class="block mb-1 font-normal text-gray-500 text-sm">
                                Organization/Company</label>
                            <input id="institution_name" name="institution_name"
                                autocomplete="institution_name" type="text" placeholder="Organization/Company"
                                id="institution_name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-gray-900 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div>
                            <label for="nationality"
                                class="block mb-1 font-normal text-gray-500 text-sm">Nationality</label>
                            <select id="nationality" name="nationality"
                                autocomplete="nationality"
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
                            <select id="registration-status" autocomplete="registration-status" wire:model="registrationStatus"
                                wire:on-change="updatedRegistrationStatus"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="" selected>Select Status</option>
                                <option value="registered">Registered</option>
                                <option value="not-registered">Not Registered</option>
                            </select>
                        </div>
                        <div class="">
                            <label for="reg-number" class="block mb-1 font-normal text-gray-500 text-sm">Registration
                                Number</label>
                            <input type="text" placeholder="1274793-123" id="reg-number" name="reg-number"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-gray-900 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                    </div>

                </div>
                <!-- Modal footer -->
                <div
                    class="flex items-end place-content-between mx-5 gap-10 p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <p class="text-md">Total</p>

                    <div class="place-items-end">
                        <p class="text-end font-sm text-gray-500">{{ $ticketCounts }} ticket(s)</p>
                        <p class="font-semibold text-3xl">{{ $ticketCounts * $singleTicketPrice }}</p>
                    </div>


                </div>
                <div
                    class="grid grid-cols-1 items-end  gap-5 p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">

                    <div class="inline-flex gap-2">
                        <input type="checkbox" class="my-auto border border-primary text-primary rounded-sm"
                            name="terms-conditions" id="terms-conditions">
                        <p>Agree to <a class="text-primary underline" href="">term &amp; conditions </a>
                        </p>
                    </div>

                    <div class="flex place-content-end gap-10">
                        <x-primary-button data-modal-hide="register-event-modal"
                            class="!py-2 !font-normal bg-white !text-gray-500 border border-gray-500 !text-sm">
                            Cancel
                        </x-primary-button>
                        {{-- <x-primary-button data-modal-hide="register-event-modal"
                            data-modal-target="order-details-modal" data-modal-toggle="order-details-modal"
                            class="hidden !py-2 !font-normal !text-sm">
                            Continue
                        </x-primary-button> --}}
                        <a href="/auth/register" data-modal-hide="register-event-modal"
                            class="text-sm items-center px-4 py-2 bg-primary border border-transparent rounded-md font-normal text-white tracking-widest hover:bg-brand focus:bg-brand active:bg-brand focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Register
                            to Pay</a>
                    </div>
                </div>
            </div>
            {{-- </form> --}}
        </div>
    </div>

</div>
