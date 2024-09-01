<x-mail::message>
# Hi there,

You have made a booking for the {{ $description }}, and are supposed to pay {{ $totalPrice }}. Your control
number is {{ $controlNumber }}, please pay before {{ $expiresOn }}.

To download the your invoice, click the button below,
<x-mail::button :url="$attachementLink">Download Invoice</x-mail::button>

### Please Note, if you have made multiple bookings a copy of this email will be sent to all email addresses you entered.

Thank you,
{{ config('app.name') }}
</x-mail::message>
