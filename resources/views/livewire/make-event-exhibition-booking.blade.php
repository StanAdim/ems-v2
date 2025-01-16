@use('Illuminate\Support\Number')

<div class="px-8">
    <div class="grid grid-cols-1 items-center justify-between rounded-t border-b px-4 py-1 dark:border-gray-600 md:px-5">
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
