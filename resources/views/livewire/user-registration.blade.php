<div class="bg-gray-300">
    <form wire:submit='save'>

        <div class="container mx-auto grid grid-cols-1 p-5 xl:grid-cols-6">
            <div class="col-span-1"></div>
            <div class="col-span-4 my-32 rounded-xl bg-white p-5 shadow-xl">
                <div>
                    <div
                        class="grid grid-cols-1 items-center justify-between rounded-t border-b px-4 py-1 dark:border-gray-600 md:px-5">
                        <h3 class="mx-auto text-xl font-semibold text-primary">
                            Register for {{ $this->event_title ?: '' }}
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
                            <li class="me-2" role="presentation" wire:ignore>
                                <button class="inline-block w-3/4 p-4" id="final-details"
                                    data-tabs-target="#final-detail" type="button" role="tab"
                                    aria-controls="final-detail" aria-selected="false">Final
                                    Details</button>
                            </li>
                        </ul>
                    </div>
                    <div id="default-tab-content" wire:ignore.self>
                        <div class="hidden rounded-lg bg-gray-50 px-4 dark:bg-gray-800" id="initial-detail"
                            wire:ignore.self role="tabpanel" aria-labelledby="initial-details">
                            @csrf
                            <div class="grid gap-10 py-2 md:grid-cols-2">
                                <!-- Name -->
                                <div>
                                    <x-input-label class="!text-gray-500" for="first_name" :value="__('First Name')" />
                                    <x-text-input id="first_name" name="first_name" class="mt-1 block w-full"
                                        type="text" wire:model='form.first_name' required autofocus
                                        autocomplete="first_name" />
                                    @error('form.first_name')
                                        <x-input-error :messages="$message" class="mt-2" />
                                    @enderror
                                </div>
                                <!-- Middle Name -->
                                <div>
                                    <x-input-label class="!text-gray-500" for="middle_name" :value="__('Middle Name')" />
                                    <x-text-input id="middle_name" name="middle_name" wire:model='form.middle_name'
                                        autocomplete="name" class="mt-1 block w-full" type="text" />
                                    @error('form.middle_name')
                                        <x-input-error :messages="$message" class="mt-2" />
                                    @enderror
                                </div>
                            </div>

                            <div class="grid gap-10 py-2 md:grid-cols-2">
                                <!-- Last Name -->
                                <div>
                                    <x-input-label class="!text-gray-500" for="last_name" :value="__('Last Name')" />
                                    <x-text-input id="last_name" name="last_name" wire:model='form.last_name' required
                                        autocomplete="last_name" class="mt-1 block w-full" type="text" />
                                    @error('form.last_name')
                                        <x-input-error :messages="$message" class="mt-2" />
                                    @enderror
                                </div>
                                <!-- Email Address -->
                                <div class="">
                                    <x-input-label class="!text-gray-500" for="email" :value="__('Email')" />
                                    <x-text-input id="email" class="mt-1 block w-full" name="email"
                                        wire:model='form.email' autocomplete="email" />
                                    @error('form.email')
                                        <x-input-error :messages="$message" class="mt-2" />
                                    @enderror
                                </div>
                            </div>

                            <div class="grid gap-10 md:grid-cols-2">
                                <!-- Password -->
                                <div class="mt-4">
                                    <x-input-label class="!text-gray-500" for="password" :value="__('Create Password')" />
                                    <x-text-input id="password" class="mt-1 block w-full" type="password"
                                        name="password" wire:model='form.password' autocomplete="new-password" />
                                    @error('form.password')
                                        <x-input-error :messages="$message" class="mt-2" />
                                    @enderror
                                </div>
                                <!-- Confirm Password -->
                                <div class="mt-4">
                                    <x-input-label class="!text-gray-500" for="password_confirmation"
                                        :value="__('Repeat Password')" />
                                    <x-text-input id="password_confirmation" class="mt-1 block w-full" type="password"
                                        name="password_confirmation" wire:model='form.password_confirmation' required
                                        autocomplete="new-password" />
                                    @error('form.password_confirmation')
                                        <x-input-error :messages="$message" class="mt-2" />
                                    @enderror
                                </div>
                            </div>

                            <div class="mt-4 flex items-center justify-end">
                                <button type="button"
                                    class="inline-block rounded-xl border border-gray-500 px-4 py-2">Cancel</button>
                                <button type="button"
                                    class="ms-4 inline-block rounded-xl border border-primary bg-primary px-4 py-2 font-semibold text-white"
                                    id="final-details-footer" wire:click="validateInitialDetails"
                                    onclick="return false;">Continue</button>
                            </div>

                            <div class="flex py-5">
                                <p class="mx-auto">You have an account already? <a href="{{ route('login') }}"
                                        class="text-primary underline">Login here</a>  </p>
                            </div>

                            {{-- <div class="flex items-center justify-end mt-4">
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                        href="{{ route('login') }}">
                                        {{ __('Already registered?') }}
                                    </a>
                                    <x-primary-button class="ms-4">
                                        {{ __('Register') }}
                                    </x-primary-button>
                                </div> --}}

                        </div>
                        <div class="hidden rounded-lg bg-gray-50 p-4 dark:bg-gray-800" id="final-detail"
                            wire:ignore.self role="tabpanel" aria-labelledby="final-details">
                            <div class="grid gap-10 py-2 md:grid-cols-2">
                                <!-- Name -->
                                <div>
                                    <x-input-label class="!text-gray-500" for="registration_status"
                                        :value="__('Registration Status')" />
                                    <select id="registration_status" name="registration_status"
                                        wire:model='form.registration_status'
                                        class="mt-1 block h-auto w-full rounded-md px-4 py-3 text-lg text-black placeholder-black focus:border-primary-500 focus:ring-primary-500">
                                        <option value>---</option>
                                        <option value="registered">Registered</option>
                                        <option value="not-registered">Not Registered</option>
                                    </select>
                                    @error('form.registration_status')
                                        <x-input-error :messages="$message" class="mt-2" />
                                    @enderror
                                </div>
                                <!-- Middle Name -->
                                <div>
                                    <x-input-label class="!text-gray-500" for="phone_number" :value="__('Phone Number')" />
                                    <x-text-input id="phone_number" name="phone_number"
                                        wire:model='form.phone_number' autocomplete="phone" required
                                        class="mt-1 block w-full" type="text" />
                                    @error('form.phone_number')
                                        <x-input-error :messages="$message" class="mt-2" />
                                    @enderror
                                </div>
                            </div>

                            <div class="grid gap-10 py-2 md:grid-cols-2">
                                <!-- Last Name -->
                                <div>
                                    <x-input-label class="!text-gray-500" for="institution_name" :value="__('Company/Institution')" />
                                    <x-text-input id="institution_name" name="institution_name"
                                        wire:model='form.institution_name' required class="mt-1 block w-full"
                                        type="text" />
                                    @error('form.institution_name')
                                        <x-input-error :messages="$message" class="mt-2" />
                                    @enderror
                                </div>
                                <!-- Email Address -->
                                <div>
                                    <x-input-label class="!text-gray-500" for="position" :value="__('Position/Designation')" />
                                    <x-text-input id="position" name="position" wire:model='form.position'
                                        autocomplete="position" required class="mt-1 block w-full" type="text" />
                                    @error('form.position')
                                        <x-input-error :messages="$message" class="mt-2" />
                                    @enderror
                                </div>
                            </div>

                            <div class="grid gap-10 md:grid-cols-2">
                                <!-- Password -->
                                <div>
                                    <x-input-label class="!text-gray-500" for="nationality" :value="__('Nationality')" />
                                    <x-text-input id="nationality" name="nationality" wire:model='form.nationality'
                                        autocomplete="nationality" required class="mt-1 block w-full"
                                        type="text" />
                                    @error('form.nationality')
                                        <x-input-error :messages="$message" class="mt-2" />
                                    @enderror
                                </div>
                                <!-- Confirm Password -->
                                <div>
                                    <x-input-label class="!text-gray-500" for="address" :value="__('Physical Address')" />
                                    <x-text-input id="address" name="address" wire:model='form.address'
                                        autocomplete="address" required class="mt-1 block w-full" type="text" />
                                    @error('form.address')
                                        <x-input-error :messages="$message" class="mt-2" />
                                    @enderror
                                </div>
                            </div>

                            <div class="my-2 grid gap-10 md:grid-cols-2">
                                <!-- Password -->
                                <div>
                                    <x-input-label class="!text-gray-500" for="region" :value="__('Region')" />
                                    <x-text-input id="region" name="region" wire:model='form.region'
                                        autocomplete="region" required class="mt-1 block w-full" type="text" />
                                    @error('form.region')
                                        <x-input-error :messages="$message" class="mt-2" />
                                    @enderror
                                </div>
                                <!-- Confirm Password -->
                                <div>
                                    <x-input-label class="!text-gray-500" for="district" :value="__('District')" />
                                    <x-text-input id="district" name="district" wire:model='form.district'
                                        autocomplete="district" required class="mt-1 block w-full" type="text" />
                                    @error('form.district')
                                        <x-input-error :messages="$message" class="mt-2" />
                                    @enderror
                                </div>
                            </div>

                            <div class="my-2 flex items-center justify-end">
                                <button type="button" onclick="document.getElementById('initial-details').click()"
                                    class="inline-block rounded-xl border border-gray-500 px-4 py-2">Previous</button>
                                <x-primary-button class="ms-4 rounded-xl">
                                    {{ __('Finish') }}
                                </x-primary-button>
                            </div>

                            <div class="flex py-5">
                                <p class="mx-auto">You have an account already? <a href="{{ route('login') }}"
                                        class="text-primary underline">Login here</a>  </p>
                            </div>
                        </div>
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
