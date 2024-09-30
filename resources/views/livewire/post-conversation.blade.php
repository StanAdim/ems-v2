<div>
    <form class="qna-form" wire:submit="create">
        {{ $this->form }}

        <div class="my-2 flex justify-end gap-5">
            <button class="rounded-md border border-gray-400 px-10 py-2 text-black"
                type="reset">Cancel</button>
            <button type="submit" class="rounded-md bg-primary px-10 py-2 text-white">Submit</button>
        </div>
    </form>

    <x-filament-actions::modals />
</div>
