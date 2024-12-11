<x-mail::message>
# Hi there,

A payment order for {{ $description }} with amount {{ $totalPrice }} has been paid using control number {{ $controlNumber }}.

You can attend to the event when it begins.

<x-mail::button :url="$attachementLink">Download Receipt</x-mail::button>

### Please Note, if you have made multiple bookings a copy of this email will be sent to all email addresses you entered.

Thank you,
{{ config('app.name') }}
</x-mail::message>
