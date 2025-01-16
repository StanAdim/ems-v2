@extends(isset($event) ? 'layouts.event' : 'layouts.index')

@section('content')
    <div class="container mx-auto grid grid-cols-1 p-5 xl:grid-cols-3">
        <div></div>
        <div class="rounded-xl p-5 shadow-xl">
            <div class="text-md mb-4 text-gray-600">
                Please check your email to get the One-time Password (OTP) Code.
                <strong>{{ $email }}</strong>
            </div>

            <form method="POST" action="{{ route('login_with_otp', ['email' => $email]) }}">
                @csrf

                <input type="hidden" name="email" value="{{ $email }}">

                <!-- Password -->
                <div>
                    <x-input-label for="otp" :value="_('OTP Code')" />

                    <x-text-input id="otp" class="mt-1 block w-full" type="number" name="otp" required />

                    <x-input-error :messages="$errors->get('otp')" class="mt-2" />
                </div>

                <div class="mt-4 flex justify-end">
                    <x-primary-button>
                        {{ __('Confirm') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
@endsection
