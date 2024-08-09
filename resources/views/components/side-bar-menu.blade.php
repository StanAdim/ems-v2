<div class="-mx-3" x-data="{ open: false }">
    <button type="button"
        class="flex w-full items-center justify-between rounded-lg py-2 pl-3 pr-3.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50"
        @click="open = ! open" aria-controls="{{ Str::snake($title) }}-service-sub-menus" aria-expanded="false">
        {{ $title }}
        {{-- Expand/collapse icon, toggle classes based on menu open state.Open: "rotate-180", Closed: "" --}}
        <svg class="h-5 w-5 flex-none" :class="open ? 'rotate-180' : ''" viewBox="0 0 20 20" fill="currentColor"
            aria-hidden="true">
            <path fill-rule="evenodd"
                d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                clip-rule="evenodd" />
        </svg>
    </button>
    {{-- 'Our Service' sub-menu, show/hide based on menu state. --}}
    <div class="mt-2 space-y-2" :class="open ? 'block' : 'hidden'" id="{{ Str::snake($title) }}-service-sub-menus">
        @foreach ($items as $item)
            <a href="{{ $item['link'] }}"
                class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50">
                {{ $item['title'] }}
            </a>
        @endforeach
    </div>
</div>
