@use('App\Enums\ProfileType')
@use('App\Models\UserProfile')
<div class="bg-gray-300 relative">
        <div wire:loading class="bg-transparent absolute -translate-y-1/2 -translate-x-1/2 top-2/4 left-1/2" role="status">
            <svg aria-hidden="true" class="h-16 w-16 animate-spin fill-blue-600 text-gray-200 dark:text-gray-600"
                viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                    fill="currentColor" />
                <path
                    d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                    fill="currentFill" />
            </svg>
            <span class="sr-only">Loading...</span>
        </div>
    <form wire:submit='save'>
        <input type="hidden" name="type" value="{{ $type }}">
        <div class="container mx-auto grid grid-cols-1 p-5 xl:grid-cols-6">
            <div class="col-span-1"></div>
            <div class="col-span-4 my-32 rounded-xl bg-white p-5 shadow-xl">
                <div>
                    <div
                        class="grid grid-cols-1 items-center justify-between rounded-t border-b px-4 py-1 dark:border-gray-600 md:px-5">
                        <h3 class="mx-auto text-xl font-semibold text-primary">
                            {{-- Register for {{ $this->event_title ?: '' }} --}}
                            Event Management System
                        </h3>
                        <p class="text-md mx-auto my-3">
                            To reserve your seat on the ICT Commission events, create your account
                        </p>
                    </div>
                    <div class="mb-4 grid grid-cols-1 border-t border-gray-200 dark:border-gray-700">
                        <ul class="-mb-px grid grid-cols-2 flex-wrap text-center text-sm font-medium" id="default-tab"
                            data-tabs-toggle="#default-tab-content"
                            data-tabs-active-classes="border-t-4 border-primary text-primary"
                            data-tabs-inactive-classes="text-gray-500" role="tablist">
                            <li class="active me-2" role="presentation" wire:ignore>
                                <button class="inline-block w-3/4 p-4" id="initial-details"
                                    data-tabs-target="#initial-detail" type="button" role="tab"
                                    aria-controls="initial-detail" aria-selected="false">Initial Details</button>
                            </li>

                            @switch($type)
                                @case(ProfileType::User)
                                    <li class="me-2" role="presentation" wire:ignore>
                                        <button class="inline-block w-3/4 p-4" id="final-details"
                                            data-tabs-target="#final-detail" type="button" role="tab"
                                            aria-controls="final-detail" aria-selected="false">Final
                                            Details</button>
                                    </li>
                                @break

                                @case(ProfileType::Exhibitor)
                                    <li class="me-2" role="presentation" wire:ignore>
                                        <button class="inline-block w-3/4 p-4" id="company-details"
                                            data-tabs-target="#company-detail" type="button" role="tab"
                                            aria-controls="company-detail" aria-selected="false">Company Details</button>
                                    </li>
                                @break
                            @endswitch

                        </ul>
                    </div>
                    <div id="default-tab-content" wire:ignore.self>
                        <div class="hidden rounded-lg bg-gray-50 px-4 dark:bg-gray-800" id="initial-detail"
                            wire:ignore.self role="tabpanel" aria-labelledby="initial-details">
                            @csrf
                            <div class="grid gap-10 py-2 md:grid-cols-2">
                                <!-- First Name -->
                                <x-input-with-label name='first_name' label="First Name" required autofocus />
                                <!-- Middle Name -->
                                <x-input-with-label name='middle_name' label="Middle Name" />
                            </div>

                            <div class="grid gap-10 py-2 md:grid-cols-2">
                                <!-- Last Name -->
                                <x-input-with-label name='last_name' label="Last Name" required />

                                {{-- Gender --}}
                                <x-input-with-label name='gender' label="Gender">
                                    <select id="gender" name="gender"
                                        wire:model='form.gender'
                                        class="mt-1 block h-auto w-full rounded-md px-4 py-3 text-lg text-black placeholder-black focus:border-primary-500 focus:ring-primary-500">
                                        <option value>---</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </x-input-with-label>

                            </div>

                            <div class="grid gap-10 py-2 md:grid-cols-2">
                                 <!-- Email Address -->
                                 <x-input-with-label name='email' type="email" label="Email" required />
                                <!-- Password -->
                                <x-input-with-label name="password" label="Password" type="password" />
                            </div>

                            <div class="grid gap-10 md:grid-cols-2">
                                <!-- Confirm Password -->
                               <x-input-with-label name="password_confirmation" label="Repeat Password"
                                   type="password" />
                           </div>

                            <div class="mt-4 flex items-center justify-end">
                                <button type="button"
                                    class="inline-block rounded-xl border border-gray-500 px-4 py-2">Cancel</button>
                                <button type="button"
                                    class="ms-4 inline-block rounded-xl border border-primary bg-primary px-4 py-2 font-semibold text-white"
                                    id="final-details-footer" wire:click="validateInitialDetails"
                                    onclick="return false;">Continue</button>
                            </div>
                        </div>
                        <div class="hidden rounded-lg bg-gray-50 p-4 dark:bg-gray-800" id="final-detail"
                            wire:ignore.self role="tabpanel" aria-labelledby="final-details">
                            <div class="grid gap-10 py-2 md:grid-cols-3">
                                <!-- Registration Status -->
                                <x-input-with-label name='registration_status' label="Professional Registration Status">
                                    <select id="registration_status" name="registration_status"
                                        wire:model='form.registration_status'
                                        class="mt-1 block h-auto w-full rounded-md px-4 py-3 text-lg text-black placeholder-black focus:border-primary-500 focus:ring-primary-500">
                                        <option value>---</option>
                                        @foreach (UserProfile::getRegistrationStatuses() as $value => $label )
                                        <option value="{{ $value }}">{{ $label }}</option>
                                        @endforeach
                                    </select>
                                </x-input-with-label>

                                <!-- Registration Number -->
                                <x-input-with-label name="registration_number" label="Professional Registration Number" />

                                <!-- Phone Number -->
                                <x-input-with-label name="phone_number" label="Phone Number" autocomplete="phone"
                                    type="tel" />
                            </div>

                            <div class="grid gap-10 py-2 md:grid-cols-2">
                                <!-- Company/Institution -->
                                <x-input-with-label name="institution_name" label="Institution Name" />
                                <!-- Position -->
                                <x-input-with-label name="position" label="Position/Designation" />
                            </div>

                            <div class="grid gap-10 md:grid-cols-2">
                                <!-- Nationality -->
                                <x-input-with-label name='nationality' label="Nationality">
                                    <select id="nationality" name="nationality" wire:model='form.nationality'
                                        class="mt-1 block h-auto w-full rounded-md px-4 py-3 text-lg text-black placeholder-black focus:border-primary-500 focus:ring-primary-500">
                                        <option value>---</option>
                                        @foreach ($nationalityChoices as $nationality)
                                            <option value="{{ $nationality }}">{{ $nationality }}</option>
                                        @endforeach
                                    </select>
                                </x-input-with-label>

                                <!-- Physical Address -->
                                <x-input-with-label name="address" label="Physical Address" />

                            </div>

                            <div class="my-2 grid gap-10 md:grid-cols-2">
                                <!-- Region -->
                                <x-input-with-label name="region" label="Region" />

                                <!-- District -->
                                <x-input-with-label name="district" label="District" />
                            </div>

                            <div class="my-2 flex items-center justify-end">
                                <button type="button" onclick="document.getElementById('initial-details').click()"
                                    class="inline-block rounded-xl border border-gray-500 px-4 py-2">Previous</button>
                                <x-primary-button class="ms-4 rounded-xl">
                                    {{ __('Finish') }}
                                </x-primary-button>
                            </div>


                        </div>
                        @switch($type)
                            @case(ProfileType::User)
                                <div class="hidden rounded-lg bg-gray-50 p-4 dark:bg-gray-800" id="final-detail"
                                    wire:ignore.self role="tabpanel" aria-labelledby="final-details">
                                    <div class="grid gap-10 py-2 md:grid-cols-2">
                                        <!-- Registration Status -->
                                        <x-input-with-label name='registration_status' label="Registration Status">
                                            <select id="registration_status" name="registration_status"
                                                wire:model='form.registration_status'
                                                class="mt-1 block h-auto w-full rounded-md px-4 py-3 text-lg text-black placeholder-black focus:border-primary-500 focus:ring-primary-500">
                                                <option value>---</option>
                                                <option value="registered">Registered</option>
                                                <option value="not-registered">Not Registered</option>
                                            </select>
                                        </x-input-with-label>

                                        <!-- Phone Number -->
                                        <x-input-with-label name="phone_number" label="Phone Number" autocomplete="phone"
                                            type="tel" />
                                    </div>

                                    <div class="grid gap-10 py-2 md:grid-cols-2">
                                        <!-- Company/Institution -->
                                        <x-input-with-label name="institution_name" label="Institution Name" />
                                        <!-- Position -->
                                        <x-input-with-label name="position" label="Position/Designation" />
                                    </div>

                                    <div class="grid gap-10 md:grid-cols-2">
                                        <!-- Nationality -->
                                        <x-input-with-label name="nationality" label="Nationality" />

                                        <!-- Physical Address -->
                                        <x-input-with-label name="address" label="Physical Address" />

                                    </div>

                                    <div class="my-2 grid gap-10 md:grid-cols-2">
                                        <!-- Region -->
                                        <x-input-with-label name="region" label="Region" />

                                        <!-- District -->
                                        <x-input-with-label name="district" label="District" />
                                    </div>

                                    <div class="my-2 flex items-center justify-end">
                                        <button type="button" onclick="document.getElementById('initial-details').click()"
                                            class="inline-block rounded-xl border border-gray-500 px-4 py-2">Previous</button>
                                        <x-primary-button wire:loading.attr="disabled" wire:loading.class="animate-pulse" class="ms-4 rounded-xl">
                                            {{ __('Finish') }}
                                        </x-primary-button>
                                    </div>


                                </div>
                            @break

                            @case(ProfileType::Exhibitor)
                                <div class="hidden rounded-lg bg-gray-50 p-4 dark:bg-gray-800" id="company-detail"
                                    wire:ignore.self role="tabpanel" aria-labelledby="final-details">
                                    <div class="grid gap-10 py-2 md:grid-cols-2">
                                        <!-- Phone Number -->
                                        <x-input-with-label name="company_service_category"
                                            label="Company Service Category" />

                                        <!-- Registration Status -->
                                        <x-input-with-label name='registration_status' label="Registration Status">
                                            <select id="registration_status" name="registration_status"
                                                wire:model='form.registration_status'
                                                class="mt-1 block h-auto w-full rounded-md px-4 py-3 text-lg text-black placeholder-black focus:border-primary-500 focus:ring-primary-500">
                                                <option value>---</option>
                                                <option value="registered">Registered</option>
                                                <option value="not-registered">Not Registered</option>
                                            </select>
                                        </x-input-with-label>
                                    </div>

                                    <div class="grid gap-10 py-2 md:grid-cols-2">
                                        <!-- Company Registration Number -->
                                        <x-input-with-label name="company_registration_number"
                                            label="Company Registration Number" />
                                        <!-- VAT Number  -->
                                        <x-input-with-label name="vat_number" label="VAT Number" />
                                    </div>

                                    <div class="grid gap-10 md:grid-cols-2">
                                        <!-- Nationality -->
                                        <x-input-with-label name="nationality" label="Nationality" />

                                        <!-- Physical Address -->
                                        <x-input-with-label name="address" label="Physical Address" />

                                    </div>

                                    <div class="my-2 grid gap-10 md:grid-cols-2">
                                        <!-- Region -->
                                        <x-input-with-label name="region" label="Region" />

                                        <!-- District -->
                                        <x-input-with-label name="district" label="District" />
                                    </div>

                                    <div class="my-2 flex items-center justify-end">
                                        <button type="button" onclick="document.getElementById('initial-details').click()"
                                            class="inline-block rounded-xl border border-gray-500 px-4 py-2">Previous</button>
                                        <x-primary-button class="ms-4 rounded-xl">
                                            {{ __('Finish') }}
                                        </x-primary-button>
                                    </div>


                                </div>
                            @break
                        @endswitch
                    </div>
                    <div class="flex py-5">
                        <p class="mx-auto">You have an account already?
                            @if ($login_action)
                                <button @click="{!! $login_action !!}"
                                    class="text-blue-500 underline hover:text-blue-700">
                                    Login Here
                                </button>
                            @else
                                <a href="{{ route('login') }}" class="text-primary underline">Login here</a>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-span-1"></div>
        </div>
    </form>
</div>

@script
    <script>
        $wire.on('initial-details-validated', ({
            nextTab
        }) => {
            document.getElementById(nextTab).click()
        });
    </script>
@endscript
