<div class="max-w-sm rounded-lg overflow-hidden shadow-lg bg-[#F7F7F7] border border-gray-500 p-5">
    <div>
        <img class="w-full rounded-lg" src="{{Vite::asset($image)}}" alt="{{ $title }}">
    </div>
    <div class="lg:px-6 lg:py-4">
        <div class="font-medium text-xl mb-2">{{ $title }}</div>
        <p class="text-gray-700 text-sm">
            {{ $location }}
        </p>
    </div>
    <div class="lg:px-6 pt-3 pb-2">
        <a href="{{ $route }}" class="bg-primary text-white font-medium py-2 px-8 rounded">Book</a>
    </div>
</div>
