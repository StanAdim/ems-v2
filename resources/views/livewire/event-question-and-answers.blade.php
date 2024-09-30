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

        <div>
            <hr class="my-10 w-3/4 bg-alt-green">
            <h4 class="mb-10 text-2xl font-medium">
                Share your thoughts
            </h4>

            <div class="w-3/4">
                <livewire:post-conversation @conversation-created="$refresh" ignoreReplyTo="true" :eventId="$eventId"
                    placeholder="Write your question..." />
            </div>
        </div>

    </div>
    <div class="flex flex-col pt-10">
        @foreach ($this->event->questions as $question)
            <div class="flex flex-col border-y py-5">
                <div class="inline-flex gap-4">
                    <div>
                        {{-- <img class="h-12 overflow-clip rounded-full"
                            src="{{ Vite::asset('resources/images/question-janeth.svg') }}" alt=""> --}}
                        <div
                            class="flex h-12 w-12 items-center justify-center rounded-full border border-gray-500 bg-gray-300 text-center font-semibold">
                            {{ Str::of($question->user->name)->ucFirst()[0] }}
                        </div>
                    </div>
                    <div class="w-full">
                        <div class="flex w-full justify-between">
                            <h4 class="text-1xl font-semibold">{{ $question->user->name }}</h4>
                            <button wire:click="$dispatchTo('post-conversation', 'reply-to', {id: {{ $question->id }}})"
                                data-modal-target="reply-modal" data-modal-toggle="reply-modal"
                                class="block rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                type="button">
                                Reply
                            </button>
                        </div>
                        <h4 class="mb-2 text-lg font-light text-gray-500">
                            {{ $question->getFormattedCreatedAt() }}</h4>
                        <h4 class="mb-4 text-lg font-semibold"> {!! $question->message !!}</h4>
                    </div>
                </div>

                @foreach ($question->answers as $answer)
                    <div class="ms-14 inline-flex gap-2">
                        <div>
                            <div
                                class="flex h-8 w-8 items-center justify-center rounded-full border border-gray-500 bg-gray-300 text-center font-semibold">
                                {{ Str::of($answer->user->name)->ucFirst()[0] }}
                            </div>
                        </div>
                        <div>
                            <span class="text-1xl font-semibold">{{ $answer->user->name }}</span>
                            <span class="mb-2 text-lg font-light text-gray-500">
                                {{ $answer->getFormattedCreatedAt() }}</span>
                            <p class="inline-flex gap-1">
                                <span class="text-lg font-normal text-gray-500">{!! $answer->message !!}</span>
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>

    <div id="reply-modal" tabindex="-1" aria-hidden="true"
        class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0">
        <div class="relative max-h-full w-full max-w-2xl p-4">
            <!-- Modal content -->
            <div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between rounded-t border-b p-4 dark:border-gray-600 md:p-5">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Reply
                    </h3>
                    <button type="button" wire:click='$refresh'
                        class="ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="reply-modal">
                        <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="space-y-4 p-4 md:p-5">
                    <livewire:post-conversation @conversation-created="$refresh" :eventId="$eventId" placeholder="Write your answer..." />
                </div>
            </div>
        </div>
    </div>
</div>

@script
    <script>
        $wire.on('conversation-created', (event) => {
            const $targetEl = document.getElementById('reply-modal');
            const modal = new Modal($targetEl);
            modal.hide();
        });
    </script>
@endscript
