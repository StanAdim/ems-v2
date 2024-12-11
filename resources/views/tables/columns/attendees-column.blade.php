<div>
    @php
        $state = $getState();
    @endphp

    @if ($state)
        <ul class="list-disc">
            @foreach ($state as $item)
                @php
                    $hasTicketNo = property_exists($item, 'ticket_no');
                @endphp
                <li>
                    {{ $item->name }}
                    @if ($hasTicketNo)
                        <span class="font-light italic">{{ $item->ticket_no }}</span>
                    @endif
                </li>
            @endforeach
        </ul>
    @else
        No attendees available.
    @endif

</div>
