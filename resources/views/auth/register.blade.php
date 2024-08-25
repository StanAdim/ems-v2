@extends(isset($event) ? 'layouts.event' : 'layouts.index')

@section('content')
    <div class="bg-gray-300">
        <div class="container grid grid-cols-1 xl:grid-cols-6  mx-auto p-5">
            <div class="col-span-1"></div>
            <div class="col-span-4 rounded-xl my-32 bg-white p-5 shadow-xl">
                <div>
                    <div
                        class="grid grid-cols-1 items-center justify-between py-1 px-4 md:px-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl text-primary mx-auto font-semibold">
                            Register for {{ $event->title }}
                        </h3>
                        <p class="text-md my-3 mx-auto">
                            To reserve your seat on the ICT Commission events, create your account
                        </p>
                    </div>
                    <div class="mb-4 grid grid-cols-1 border-t border-gray-200 dark:border-gray-700">
                        <ul class="grid grid-cols-2 flex-wrap -mb-px text-sm font-medium text-center" id="default-tab"
                            data-tabs-toggle="#default-tab-content"
                            data-tabs-active-classes="border-t-4 border-primary text-primary"
                            data-tabs-inactive-classes="text-gray-500" role="tablist">
                            <li class="me-2" role="presentation">
                                <button class="w-3/4 inline-block p-4" id="initial-details"
                                    data-tabs-target="#initial-detail" type="button" role="tab"
                                    aria-controls="initial-detail" aria-selected="false">Initial Details</button>
                            </li>
                            <li class="me-2" role="presentation">
                                <button class="w-3/4 inline-block p-4 " id="final-details" data-tabs-target="#final-detail"
                                    type="button" role="tab" aria-controls="final-detail" aria-selected="false">Final
                                    Details</button>
                            </li>
                        </ul>
                    </div>
                    <div id="default-tab-content">
                        <form method="POST" action="{{ route('register') }}">
                            <div class="hidden px-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="initial-detail"
                                role="tabpanel" aria-labelledby="initial-details">

                                @csrf
                                <div class="grid md:grid-cols-2 gap-10 py-2">
                                    <!-- Name -->
                                    <div>
                                        <x-input-label class="!text-gray-500" for="name" :value="__('First Name')" />
                                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                            :value="old('name')" required autofocus autocomplete="name" />
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>
                                    <!-- Middle Name -->
                                    <div>
                                        <x-input-label class="!text-gray-500" for="middle_name" :value="__('Middle Name')" />
                                        <x-text-input id="middle_name" name="middle_name" :value="old('middle_name')" autocomplete="middle_name" class="block mt-1 w-full" type="text" />
                                        <x-input-error :messages="$errors->get('middle_name')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="grid md:grid-cols-2 gap-10 py-2">
                                    <!-- Last Name -->
                                    <div>
                                        <x-input-label class="!text-gray-500" for="last_name" :value="__('Last Name')" />
                                        <x-text-input id="last_name" name="last_name" :value="old('last_name')" required autocomplete="last_name" class="block mt-1 w-full" type="text" />
                                        <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                                    </div>
                                    <!-- Email Address -->
                                    <div class="">
                                        <x-input-label class="!text-gray-500" for="email" :value="__('Email')" />
                                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                            :value="old('email')" required autocomplete="username" />
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="grid md:grid-cols-2 gap-10">
                                    <!-- Password -->
                                    <div class="mt-4">
                                        <x-input-label class="!text-gray-500" for="password" :value="__('Create Password')" />
                                        <x-text-input id="password" class="block mt-1 w-full" type="password"
                                            name="password" required autocomplete="new-password" />
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>
                                    <!-- Confirm Password -->
                                    <div class="mt-4">
                                        <x-input-label class="!text-gray-500" for="password_confirmation"
                                            :value="__('Repeat Password')" />
                                        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                            name="password_confirmation" required autocomplete="new-password" />
                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="flex items-center justify-end mt-4">
                                    <button type="button"
                                        class="inline-block border border-gray-500 rounded-xl px-4 py-2">Cancel</button>
                                    <button type="button"
                                        class="ms-4 inline-block bg-primary text-white border border-primary rounded-xl font-semibold px-4 py-2"
                                        id="final-details-footer"
                                        onclick="document.getElementById('final-details').click();return false;">Continue</button>
                                </div>

                                <div class="flex py-5">
                                    <p class="mx-auto">You have an account already? <a href="{{ route('login') }}"
                                            class="underline text-primary">Login here</a>  </p>
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
                            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="final-detail"
                                role="tabpanel" aria-labelledby="final-details">
                                <div class="grid md:grid-cols-2 gap-10  py-2">
                                    <!-- Name -->
                                    <div>
                                        <x-input-label class="!text-gray-500" for="registration_status"
                                            :value="__('Registration Status')" />
                                        <select id="registration_status" name="registration_status" required class="block mt-1 w-full h-auto py-3 px-4 text-lg text-black rounded-md placeholder-black focus:border-primary-500 focus:ring-primary-500">
                                            <option value="registered" @selected(true)>Registered</option>
                                            <option value="not-registered">Not Registered</option>
                                        </select>
                                        <x-input-error :messages="$errors->get('registration_status')" class="mt-2" />
                                    </div>
                                    <!-- Middle Name -->
                                    <div>
                                        <x-input-label class="!text-gray-500" for="phone_number" :value="__('Phone Number')" />
                                        <x-text-input id="phone_number" name="phone_number" :value="old('phone_number')" autocomplete="phone" required class="block mt-1 w-full"
                                            type="text" />
                                        <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="grid md:grid-cols-2 gap-10 py-2">
                                    <!-- Last Name -->
                                    <div>
                                        <x-input-label class="!text-gray-500" for="institution_name" :value="__('Company/Institution')" />
                                        <x-text-input id="institution_name" name="institution_name" :value="old('institution_name')" required class="block mt-1 w-full" type="text" />
                                        <x-input-error :messages="$errors->get('institution_name')" class="mt-2" />
                                    </div>
                                    <!-- Email Address -->
                                    <div>
                                        <x-input-label class="!text-gray-500" for="position" :value="__('Position/Designation')" />
                                        <x-text-input id="position" name="position" :value="old('position')" autocomplete="position" required class="block mt-1 w-full" type="text" />
                                        <x-input-error :messages="$errors->get('position')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="grid md:grid-cols-2 gap-10">
                                    <!-- Password -->
                                    <div>
                                        <x-input-label class="!text-gray-500" for="nationality" :value="__('Nationality')" />
                                        <x-text-input id="nationality" name="nationality" :value="old('nationality')" autocomplete="nationality" required class="block mt-1 w-full" type="text" />
                                        <x-input-error :messages="$errors->get('nationality')" class="mt-2" />
                                    </div>
                                    <!-- Confirm Password -->
                                    <div>
                                        <x-input-label class="!text-gray-500" for="address" :value="__('Physical Address')" />
                                        <x-text-input id="address" name="address" :value="old('address')" autocomplete="address" required class="block mt-1 w-full" type="text" />
                                        <x-input-error :messages="$errors->get('address')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="grid  md:grid-cols-2 gap-10 my-2">
                                    <!-- Password -->
                                    <div>
                                        <x-input-label class="!text-gray-500" for="region" :value="__('Region')" />
                                        <x-text-input id="region" name="region" :value="old('region')" autocomplete="region" required  class="block mt-1 w-full" type="text" />
                                        <x-input-error :messages="$errors->get('region')" class="mt-2" />
                                    </div>
                                    <!-- Confirm Password -->
                                    <div>
                                        <x-input-label class="!text-gray-500" for="district" :value="__('District')" />
                                        <x-text-input id="district" name="district" :value="old('district')" autocomplete="district" required  class="block mt-1 w-full" type="text" />
                                        <x-input-error :messages="$errors->get('district')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="flex items-center justify-end my-2">
                                    <button type="button" onclick="document.getElementById('initial-details').click()"
                                        class="inline-block border border-gray-500 rounded-xl px-4 py-2">Previous</button>
                                    <x-primary-button class="ms-4 rounded-xl">
                                        {{ __('Finish') }}
                                    </x-primary-button>
                                </div>

                                <div class="flex py-5">
                                    <p class="mx-auto">You have an account already? <a href="{{ route('login') }}"
                                            class="underline text-primary">Login here</a>  </p>
                                </div>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-span-1"></div>


        </div>
    </div>
@endsection
{{-- <div class="rounded-xl bg-white p-5 shadow-xl">
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</div> --}}
