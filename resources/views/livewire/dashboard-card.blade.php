<div class="bg-gray-100 p-6 mt-5 rounded-lg shadow-inner text-center">
    <div class="inline-flex">
        <div class="text-start w-[80%]">
            <h2 class="text-xl font-medium text-black">{{$title}}</h2>
            <p class="text-gray-600">{{$description}}</p>
        </div>
        <div class="text-blue-500 text-7xl ml-auto font-bold my-auto">
            {{ $count }}
        </div>
    </div>
    <div class="flex justify-end">
        <a href="{{ $route }}" class="text-blue-500 mt-4 inline-block">View &rarr;</a>
    </div>
</div>
