<div>
    <hr class="my-10 w-3/4 bg-alt-green">
    <h4 class="mb-10 text-2xl font-medium">
        Share your thoughts
    </h4>

    <div class="w-3/4">
        <form wire:save>
            <textarea type="textarea" class="h-44 w-full rounded-lg border border-gray-400" wire:model='message' placeholder="Write your question..."></textarea>
            <div class="my-2 flex justify-end gap-5">
                <button class="rounded-md border border-gray-400 px-10 py-2 text-black">Cancel</button>
                <button type="submit" class="rounded-md bg-primary px-10 py-2 text-white">Submit</button>
            </div>
        </form>
    </div>
</div>
