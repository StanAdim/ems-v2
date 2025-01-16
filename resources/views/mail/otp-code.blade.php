<x-mail::message>
# Hello {{ $name }},

There has been an attempt to sign in to your account on {{ config('app.name') }}.
For ensured security, we require you to use the following One Time Password (OTP) below:
<h1 style="text-align: center;">{{ $token }}</h1>

The token will expire in {{ $expires_at }}.

If this login attempt was not you, please ignore this email.

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
