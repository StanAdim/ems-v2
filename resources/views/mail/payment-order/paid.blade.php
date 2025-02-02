<x-mail::message>
# Hi there,

A payment order for {{ $description }} with amount {{ $totalPrice }} has been paid @if ($controlNumber)
using control number {{ $controlNumber }}
@endif.

You will be sent your tickets soon.

<x-mail::button :url="$attachementLink">Download Receipt</x-mail::button>

### Please Note, if you have made multiple bookings a copy of this email will be sent to all email addresses you entered.

Thank you,
{{ config('app.name') }}
</x-mail::message>
