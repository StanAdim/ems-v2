<div class="hidden lg:flex lg:gap-x-5 xl:gap-x-20 text-white">
    @foreach ($items as $item)
        @php
            $underline = '';
            if (Request::url() === $item['url']) {
                $underline = 'border-b-2';
            }
        @endphp
        <a href="{{ $item['url'] }}" class="text-lg font-regular leading-6 {{ $underline }}">{{ $item['title'] }}</a>
    @endforeach
</div>
