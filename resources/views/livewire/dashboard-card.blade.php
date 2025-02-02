<div class="grid grid-cols-1 bg-gray-100 p-3 md:p-6 mt-5 rounded-lg shadow-inner text-center">
    <div class="inline-flex ">
        <div class="grid grid-cols-1">
            <h2 class="text-start text-sm md:text-[14px]  xl:text-xl font-medium text-black">{{$title}}</h2>
            <div class="flex justify-between">
                <div class="text-start w-[90%] text-gray-600 text-xs md:text-sm xl:text-base">{{$description}}</div>
                <div class="align-top text-end text-blue-500 text-4xl md:text-5xl xl:text-7xl ml-auto font-bold my-auto">
                    {{ $count }}
                </div>
            </div>
        </div>

    </div>
    <div class="flex justify-end mt-auto">
        <a href="{{ $route }}" class="text-blue-500 mt-4 inline-block">View &rarr;</a>
    </div>
</div>
