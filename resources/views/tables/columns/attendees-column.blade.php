<div>
    @php
        $state = $getState();
    @endphp

    @if ($state)
        <ul class="list-disc">
            @foreach ($state as $item)
                <li>{{ $item['name'] ?? '' }} ({{ $item['phone_number'] ?? '' }} {{ $item['email'] ?? '' }})</li>
            @endforeach
        </ul>
    @else
        No attendees available.
    @endif

</div>
