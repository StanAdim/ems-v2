@use('Illuminate\Support\Number')
<div>
    @if ($payment_order)
        <div class="relative rounded-none bg-white shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between rounded-t border-b px-4 pb-5 dark:border-gray-600 md:px-5">
                <img class="mx-auto" src="{{ Vite::asset('resources/images/gepg-logo.svg') }}" alt="">
            </div>
            <!-- Modal body -->
            <div class="flex gap-5 border-gray-200 p-4">
                <div class="mx-auto grid">
                    <p class="text-md mx-auto place-self-center pt-2 font-semibold">Your control number is:</p>
                </div>
            </div>
            <div class="flex gap-5 border-gray-200 p-4">
                <div class="mx-auto grid">
                    <div class="text-3xl font-extrabold text-primary !no-underline md:text-5xl"
                        style="text-decoration: none !important;">
                        {{ $payment_order->control_no }}
                    </div>
                </div>
            </div>
            <div class="flex gap-5 border-gray-200 p-4">
                <div class="mx-auto grid">
                    <p class="text-center text-lg text-gray-400">"Payments can be made anytime before
                        {{ $payment_order->expires_on->format('F j, Y') }},
                        <br>via mobile or bank transfer."
                    </p>
                </div>
            </div>
            <div class="flex gap-5 border-gray-200 p-4">
                <div class="mx-auto grid">
                    <img class="mx-auto" src="{{ Vite::asset('resources/images/mobile-money.svg') }}" alt="">
                </div>
            </div>
            <div class="flex gap-5 border-gray-200 p-4">
                <div class="mx-auto grid">
                    <a href="{{ $payment_order->invoice_url }}" class="!py-2 !text-sm !font-normal">
                        Download Invoice
                    </a>
                </div>
            </div>
            <div class="flex gap-5 rounded-b border-gray-200 p-4 dark:border-gray-600">
                <div class="mx-auto grid">
                    <p class="mb-4 text-sm">Having any trouble?<a class="ml-1 text-primary underline" href="#">Ask
                            help</a> </p>
                </div>
            </div>
        </div>
    @else
        <form wire:submit="pay">
            <div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
                <div
                    class="mx-5 grid grid-cols-1 place-content-between items-end rounded-b border-y border-gray-200 p-4 dark:border-gray-600 md:p-5">

                    <table class="table w-full">
                        <tr>
                            <td class="font-medium">Ticket Number</td>
                            <td class="text-end">81845532</td>
                        </tr>
                        <tr>
                            <td class="font-medium">Event:</td>
                            <td class="text-end">{{ $booking->event->title }}</td>
                        </tr>
                        <tr>
                            <td class="font-medium">Ticket type:</td>
                            <td class="text-end">{{ $booking_type }}</td>
                        </tr>
                        <tr>
                            <td class="font-medium">Total</td>
                            <td class="text-end">{{ Number::format($booking->total_amount) }}</td>
                        </tr>
                    </table>
                </div>

                <!-- Payment Options -->
                <div class="mt-2 text-center">
                    <p class="text-md mx-auto place-self-center pt-2 font-semibold">Payment Options</p>
                </div>
                <div class="m-2 grid rounded-xl border border-gray-400 p-2 md:mx-10 md:p-4">
                    <div class="flex justify-between">
                        <p class="mt-2 text-sm font-semibold lg:pl-4">Mobile Money Push (Tanzanians)</p>
                        <img class="w-1/2" src="{{ Vite::asset('resources/images/mobile-money.svg') }}" alt="">
                    </div>
                    <p class="ml-5 mt-2 py-2 text-sm font-normal text-gray-500">Confirm your mobile number to pay
                        with</p>

                    <form class="mx-4">
                        <div class="flex items-center">
                            <button id="dropdown-phone-button" data-dropdown-toggle="dropdown-phone"
                                class="z-10 inline-flex flex-shrink-0 items-center rounded-s-lg border border-gray-300 bg-gray-100 px-4 py-2.5 text-center text-sm font-medium text-gray-900 hover:bg-gray-200 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-700"
                                type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" class="me-2 h-4 w-4" viewBox="0 0 32 32">
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
                                +255 <svg class="ms-2.5 h-2.5 w-2.5" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            <div id="dropdown-phone"
                                class="z-10 hidden w-52 divide-y divide-gray-100 rounded-lg bg-white shadow dark:bg-gray-700">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdown-phone-button">
                                    <li>
                                        <button type="button"
                                            class="inline-flex w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white"
                                            role="menuitem">
                                            <span class="inline-flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="me-2 h-4 w-4"
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
                                class="sr-only mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone
                                number:</label>
                            <div class="relative w-full">
                                <input type="text" id="phone-input"
                                    class="z-20 block w-full rounded-e-lg border border-s-0 border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:border-s-gray-700 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500"
                                    wire:model='phone_number' placeholder="723-456-789" required />
                            </div>
                        </div>
                    </form>

                    <div
                        class="grid grid-cols-1 items-end gap-5 rounded-b border-t border-gray-200 p-4 dark:border-gray-600 md:p-5">

                        <div class="flex place-content-between gap-10">
                            <x-primary-button
                                class="border !border-gray-500 bg-white !py-2 !text-sm !font-normal !text-gray-500">
                                Cancel
                            </x-primary-button>
                            <x-primary-button data-modal-target="gepg-modal" data-modal-toggle="gepg-modal"
                                class="!py-2 !text-sm !font-normal">
                                Pay Now ({{ Number::format($booking->total_amount) }})
                            </x-primary-button>
                        </div>
                    </div>
                </div>
                <div class="h-4 p-3"></div>
            </div>
        </form>
    @endif
</div>
