@props([
    'active' => false,
    'link',
    'route',
    'name',
])
@php
    $classes = $active ? 'bg-[#DEF6FF] !text-brand w-full' : '!text-[#8B8B8B]';
@endphp
<li {{ $attributes->merge(['class' => $classes]) }} :active={{ request()->routeIs($route) }}>
    <a href="{{ route($route) }}" class="flex items-center p-2 rounded-lg hover:text-white hover:bg-gray-10 group">
        <div class="w-5 h-5 transition duration-75  group-hover:text-white dark:group-hover:text-white">
            {{ $slot }}
        </div>
        <span class="ms-3">{{ $name }}</span>
    </a>
</li>
