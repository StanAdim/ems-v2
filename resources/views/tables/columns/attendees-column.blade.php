<div>
    @php
        $state = $getState();
    @endphp

    @if (is_array($state))
        @foreach ($state as $item)
        <ul class="list-disc">
            <li>{{ $item['name'] ?? 'No Name' }}</li>
            <li>{{ $item['phone_number'] ?? 'No Phone' }}</li>
            <li>{{ $item['email'] ?? 'No Email' }}</li>
        </ul>

        @endforeach
    @else
        No attendees available.
    @endif

</div>
