<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <div class="text-red-800 mt-5">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Full Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)"
                required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div class="grid grid-cols-2 gap-2 lg:gap-10">

            <div>
                <x-input-label for="gender" :value="__('Gender')" />
                <select name="gender" id="gender"
                    class="mt-1 block w-full h-auto py-3 px-4 text-lg text-black rounded-md placeholder-black focus:border-primary-500 focus:ring-primary-500"
                    required autofocus autocomplete="gender">
                    <option value="">--Select--</option>
                    <option value="Male" {{ old('gender', $user->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ old('gender', $user->gender) == 'Female' ? 'selected' : '' }}>Female
                    </option>
                </select>
                {{-- <x-text-input id="gender" name="gender" type="text" class="mt-1 block w-full" :value="old('gender', $user->gender)" required autofocus autocomplete="gender" /> --}}
                <x-input-error class="mt-2" :messages="$errors->get('gender')" />
            </div>

            <div>
                <!-- Nationality -->
                {{-- @dd($oldNationality); --}}
                <x-input-with-label name='nationality' label="Nationality" :value="__('Nationality')">
                    <select id="nationality" name="nationality"
                        class="mt-1 block h-auto w-full rounded-md px-4 py-3 text-lg text-black placeholder-black focus:border-primary-500 focus:ring-primary-500">
                        <option value>---</option>
                        @foreach ($nationalityChoices as $nationality)
                            <option value="{{ $nationality }}"
                                {{ old('nationality', $nationality) == $oldNationality ? 'selected' : '' }}>
                                {{ $nationality }}</option>
                        @endforeach
                    </select>
                </x-input-with-label>
            </div>

        </div>

        <div class="grid grid-cols-2 gap-2 lg:gap-10">

            <div>
                <!-- Registration Status -->
                <x-input-with-label name='registration_status'  label="Professional Registration Status">
                    <select id="registration_status" name="registration_status" wire:model='form.registration_status'
                        class="mt-1 block h-auto w-full rounded-md px-4 py-3 text-lg text-black placeholder-black focus:border-primary-500 focus:ring-primary-500">
                        @foreach ($registrationStatuses as $value => $label)
                            <option value="{{ $value }}"
                                {{ old('registration_status', $value) == $oldRegistrationStatus ? 'selected' : '' }}>
                                {{ $label }}</option>
                        @endforeach
                    </select>
                </x-input-with-label>
            </div>

            <div>
                <!-- Registration Number -->
                <x-input-with-label name='registration_number' label="Professional Registration Number"
                    :value="__('Professional Registration Number')">
                    <x-text-input id="registration_number" name="registration_number" type="text"
                        class="mt-1 block w-full py-3" :value="old('registration_number', $oldRegistrationNumber)"
                        autofocus autocomplete="registration_number" />
                </x-input-with-label>
            </div>

        </div>



        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)"
                required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div>
            {{-- Phone number --}}
            <x-input-with-label name='phone_number' label="Phone Number" :value="__('Phone Number')">
                <x-text-input id="phone_number" name="phone_number" type="text" class="mt-1 block w-full py-3"
                    :value="old('phone_number', $oldPhoneNumber)" required autofocus
                    autocomplete="phone_number" />
            </x-input-with-label>
        </div>

        <div>
            {{-- Institution name --}}
            <x-input-with-label name='institution_name' label="Institution Name" :value="__('Institution Name')">
                <x-text-input id="institution_name" name="institution_name" type="text" class="mt-1 block w-full py-3"
                    :value="old('institution_name', $oldInstutionName)" required autofocus
                    autocomplete="institution_name" />
            </x-input-with-label>
        </div>

        <div>
            {{-- Position --}}
            <x-input-with-label name='position' label="Position" :value="__($user->position)">
                <x-text-input id="position" name="position" type="text" class="mt-1 block
                    w-full py-3" :value="old('position', $oldPosition)" autofocus
                    autocomplete="position" />
            </x-input-with-label>
        </div>


        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>

        @if ($errors->any())
    <div class="text-red-800">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    </form>
</section>
