@extends('layouts.app')

@section('content')
    @php
        $title = 'Questions & Answers';
    @endphp
    <div class="container mx-auto  bg-white shadow-inner rounded-lg mt-10 p-5 lg:px-16">
        <div class="grid grid-cols-1 lg:grid-cols-2">
            <div class="justify-start my-10">
                <h4 class="text-2xl font-medium">There are 94 questions on this event</h4>
                <div class="w-1/2">
                    <ul class="list-disc ">
                        <li class="flex my-3 justify-between">
                            <span>All questions</span>
                            <span class="text-primary">94</span>
                        </li>
                        <li class="flex my-3 justify-between">
                            <span>New questions</span>
                            <span class="text-primary">0</span>
                        </li>
                        <li class="flex my-3 justify-between">
                            <span>Answered</span>
                            <span class="text-alt-green">50</span>
                        </li>
                        <li class="flex my-3 justify-between">
                            <span>Not Answered</span>
                            <span class="text-alt-green">44</span>
                        </li>
                    </ul>
                </div>

                <hr class="bg-alt-green w-3/4 my-10">
                <h4 class="text-2xl mb-10 font-medium">
                    Share your thoughts
                </h4>

                <div class="w-3/4">
                    <textarea type="textarea" class="border border-gray-400 w-full h-44 rounded-lg" placeholder="Write your question..."></textarea>
                    <div class="flex justify-end gap-5 my-2">
                        <button class="border border-gray-400 px-10 py-2 rounded-md text-black">Cancel</button>
                        <button class="bg-primary px-10 py-2 rounded-md text-white">Submit</button>
                    </div>
                </div>


            </div>
            <div class="grid grid-cols-1 pt-10">
                @for ($i = 0; $i < 5; $i++)
                    <div class="inline-flex gap-10 py-5 border-y">
                        <div>
                            <img class="mt-1 rounded-full w-28 overflow-clip"
                                src="{{ Vite::asset('resources/images/question-janeth.svg') }}" alt="">
                        </div>
                        <div>
                            <h4 class="text-1xl font-semibold">Janeth Mgaya</h4>
                            <h4 class="text-lg font-light mb-2 text-gray-500">August 3, 2024</h4>
                            <h4 class="text-lg font-semibold">Je kusahau sahau ni Alama ya Afya mbaya ya akill??.</h4>
                            <p class="inline-flex gap-1">
                                <span class="text-lg font-normal text-gray-500">Answer:</span>
                                <span>Je kusahau sahau ni Alama ya Afya mbaya ya akill??. Je kusahau sahau ni Alama ya Afya
                                    mbaya ya akill?. Je kusahau sahau ni Alama ya Afya mbaya ya akill??.</span>
                            </p>
                        </div>
                    </div>
                @endfor


            </div>
        </div>
    </div>
@endsection
