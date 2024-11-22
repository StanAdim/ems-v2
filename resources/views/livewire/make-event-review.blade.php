    <div>
        <div
            class="grid grid-cols-1 items-center justify-between rounded-t border-b px-4 py-1 dark:border-gray-600 md:px-5">
            <h3 class="mx-auto text-xl font-semibold text-primary">
                Review {{ $this->event->title }}
            </h3>
        </div>
        <form wire:submit='store' wire.transition.out>
            <div class="m-2 my-2 grid py-2 md:py-5">
                <div class="my-2 grid grid-cols-1 gap-2 lg:grid-cols-1">
                    <div class="">
                        <label for="comment" class="mb-1 block text-sm font-normal text-gray-500">
                            Comment</label>
                        <textarea id="comment" name="comment" wire:model='comment' type="text" placeholder="Comment"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:focus:border-blue-500 dark:focus:ring-blue-500">
                        </textarea>
                        @error('comment')
                            <x-input-error :messages="$message" class="mt-2" />
                        @enderror
                    </div>
                    <div class="">
                        <label for="rating" class="mb-1 block text-sm font-normal text-gray-500">
                            Rating</label>
                        <select id="rating" name="rating" wire:model='rating'
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:focus:border-blue-500 dark:focus:ring-blue-500">
                            <option selected>Choose a rating</option>
                            <option value="5"> ⭐⭐⭐⭐⭐ 5 out of 5</option>
                            <option value="4">⭐⭐⭐⭐ 4 out of 5</option>
                            <option value="3">⭐⭐⭐ 3 out of 5</option>
                            <option value="2">⭐⭐ 2 out of 5</option>
                            <option value="1">⭐ 1 out of 5</option>
                        </select>
                        @error('rating')
                            <x-input-error :messages="$message" class="mt-2" />
                        @enderror
                    </div>
                </div>
            </div>
            <div
                class="grid grid-cols-1 items-end gap-5 rounded-b border-t border-gray-200 p-4 dark:border-gray-600 md:p-5">
                <div class="flex place-content-end gap-10">
                    <x-primary-button data-modal-hide="review-modal"
                        class="border border-gray-500 bg-white !py-2 !text-sm !font-normal !text-gray-500">
                        Cancel
                    </x-primary-button>
                    <x-primary-button wire:loading.attr="disabled" wire:loading.class="animate-pulse" type="submit"
                        class="items-center rounded-md border border-transparent bg-primary px-4 py-2 text-sm font-normal tracking-widest text-white transition duration-150 ease-in-out hover:bg-brand focus:bg-brand focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 active:bg-brand">
                        Submit Review
                    </x-primary-button>
                </div>
            </div>
        </form>
    </div>
