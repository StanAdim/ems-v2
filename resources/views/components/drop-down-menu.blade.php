<div class="relative" x-data="{ open: false }" @click.away="open = false">
    <button type="button" @click="open = ! open" class="flex items-center gap-x-1 text-sm font-semibold leading-6"
        :class="open ? 'text-blue-400' : 'text-gray-900'" aria-expanded="false">
        {{ $title }}
        <i class="fa-solid fa-chevron-down" :class="open ? 'text-blue-400 rotate-180' : 'text-gray-400'"></i>
    </button>

    <div x-cloak :class="open ? 'block' : 'hidden'"
        class="absolute -left-8 top-full z-10 mt-3 py-4 w-max max-w-md overflow-hidden bg-white shadow-lg"
        x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-1"
        x-transision:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-1">
        @foreach ($items as $item)
            <div class="px-4">
                <div class="group relative flex items-center p-2 text-sm leading-6 hover:bg-gray-50">
                    <div class="flex-auto me-5">
                        <a href="{{ $item['link'] ?? '#' }}" class="block text-gray-900">
                            {{ $item['title'] ?? $item }}
                            <span class="absolute inset-0"></span>
                        </a>
                    </div>
                    <i class="fa-solid fa-chevron-right text-gray-500"></i>
                </div>
            </div>
        @endforeach

    </div>
</div>
