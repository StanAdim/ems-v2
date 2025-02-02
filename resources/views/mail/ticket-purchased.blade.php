@component('mail::message')
# 🎟️ Your Ticket for {{ $event->title }}

Hello **{{ $user->name }}**,

Thank you for purchasing your ticket for **{{ $event->title }}**! Below are your ticket details:

## 🎫 Ticket Information
**Ticket Code:** `{{ $ticket->ticket_code }}`

## 📅 Event Details
- **Event Name:** {{ $event->title }}
- **Date:** {{ $event->startsOn->format('F j, Y h:i A') }}
- **Location:** {{ $event->locationDescription ?? 'TBA' }}

{{-- @component('mail::button', ['url' => url('/tickets/' . $order->id)])
View Ticket
@endcomponent --}}

If you have any questions, feel free to reach out.

Thanks

{{ config('app.name') }}
@endcomponent
