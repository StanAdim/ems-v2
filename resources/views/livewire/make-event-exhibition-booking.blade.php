@use('Illuminate\Support\Number')

<div class="relative px-8">
    <div wire:loading class="w-100 absolute left-1/2 top-2/4 -translate-x-1/2 -translate-y-1/2 backdrop-hue-rotate-15"
        role="status">
        <svg aria-hidden="true" class="h-12 w-12 animate-spin fill-blue-600 text-gray-200 dark:text-gray-600"
            viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                fill="currentColor" />
            <path
                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                fill="currentFill" />
        </svg>
        <span class="sr-only">Loading...</span>
    </div>

    <div
        class="grid grid-cols-1 items-center justify-between rounded-t border-b px-4 py-1 dark:border-gray-600 md:px-5">
        @if ($this->exhibitionBooking)
            <h3 class="mx-auto text-xl font-semibold text-primary">
                Order Details
            </h3>
            <p class="mx-auto my-2 text-center text-sm">Happening from
                {{ date_format($this->event->startsOn, 'd') . ' ' . 'to' . ' ' . date_format($this->event->endsOn, 'd') . ' ' . date_format($this->event->startsOn, 'M' . ', ' . date_format($this->event->startsOn, 'Y')) }}
                at {{ $this->event->locationDescription }}</p>
        @else
            <h3 class="mx-auto text-xl font-semibold text-primary">
                Layout Plan
            </h3>
            <p class="mx-auto my-2 text-center text-sm">Pick a booth of your preference</p>
        @endif
    </div>
    @if ($this->exhibitionBooking)
        <livewire:create-payment-order wire:transition.in :billable="$this->exhibitionBooking" />
    @else
        <div class="snap-y">
            <div class="w-full">
                <img src="{{ $this->event->getExhibitionLayoutPlanUrl() }}" class="mx-auto h-full w-full" alt=""
                    srcset="">
            </div>
            <form wire:submit='store' wire.transition.out>
                <div class="relative h-4/6 overflow-x-auto pb-8">
                    <table class="w-full text-center">
                        <thead class="">
                            <tr class="border-gray border-y">
                                <th scope="col" class="px-6 py-3">
                                    S/N
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Booth Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Booth Size
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Booth Price
                                </th>
                                <th scope="col" class="px-6 py-3"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($this->event->booths_available as $booth)
                                <tr class="border-b bg-white text-gray-500 dark:border-gray-700 dark:bg-gray-800">
                                    <th scope="row"
                                        class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                                        {{ $loop->iteration }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $booth->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $booth->size }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ Number::format($booth->price) }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <input type="radio" wire:model='booth_name' name="booth_name"
                                            id="{{ $booth->name }}" value="{{ $booth->name }}" />
                                    </td>
                                </tr>
                            @endforeach
                            @error($booth_name)
                                <tr>
                                    <td colspan="5">
                                        <x-input-error :messages="$message" class="mt-2" />
                                    </td>
                                </tr>
                            @enderror
                        </tbody>
                    </table>
                </div>

                <div class="flex h-2/6 place-content-between pb-8">
                    <x-primary-link-button href="{{ route('event.about', ['event' => $this->event]) }}"
                        class="border border-gray-500 bg-white !py-2 px-12 !text-sm !font-normal !text-gray-500">
                        Cancel
                    </x-primary-link-button>
                    <x-primary-button wire:loading.attr="disabled" wire:loading.class="animate-pulse" type="submit"
                        class="items-center rounded-md border border-transparent bg-primary px-12 py-2 text-sm font-normal tracking-widest text-white transition duration-150 ease-in-out hover:bg-brand focus:bg-brand focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 active:bg-brand">
                        Continue
                    </x-primary-button>
                </div>
            </form>
        </div>
    @endif
</div>
