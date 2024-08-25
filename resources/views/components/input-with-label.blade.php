@props(['name', 'label'])
@php
    $model = "form.$name";
@endphp
<div>
    <x-input-label class="!text-gray-500" for="{{ $name }}" :value="$label" />
    @if ($slot->isNotEmpty())
        {{ $slot }}
    @else
        <x-text-input id="name" name="name" class="mt-1 block w-full" type="text" wire:model='{{ $model }}'
            {{ $attributes }} />
    @endif
    @error($model)
        <x-input-error :messages="$message" class="mt-2" />
    @enderror
</div>
