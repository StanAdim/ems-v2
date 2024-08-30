<div class="grid grid-cols-1 lg:grid-cols-2">
    <div class="my-10 justify-start">
        <h4 class="text-2xl font-medium">There are {{ $this->event->questions_count }} questions on this event</h4>
        <div class="w-1/2">
            <ul class="list-disc">
                <li class="my-3 flex justify-between">
                    <span>All questions</span>
                    <span class="text-primary">{{ $this->event->questions_count }}</span>
                </li>
                <li class="my-3 flex justify-between">
                    <span>New questions</span>
                    <span class="text-primary">0</span>
                </li>
                <li class="my-3 flex justify-between">
                    <span>Answered</span>
                    <span class="text-alt-green">50</span>
                </li>
                <li class="my-3 flex justify-between">
                    <span>Not Answered</span>
                    <span class="text-alt-green">44</span>
                </li>
            </ul>
        </div>

        <livewire:new-event-question :event="$this->event" />
    </div>
    <div class="grid grid-cols-1 pt-10">
        @for ($i = 0; $i < 5; $i++)
            <div class="inline-flex gap-10 border-y py-5">
                <div>
                    <img class="mt-1 w-28 overflow-clip rounded-full"
                        src="{{ Vite::asset('resources/images/question-janeth.svg') }}" alt="">
                </div>
                <div>
                    <h4 class="text-1xl font-semibold">Janeth Mgaya</h4>
                    <h4 class="mb-2 text-lg font-light text-gray-500">August 3, 2024</h4>
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
