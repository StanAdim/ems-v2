@props(['model', 'label'])

<div>
    <label for="{{ $model }}" class="mb-1 block text-sm font-normal text-gray-500">
        {{ $label }}
    </label>
    <input wire:model='{{ $model }}' {!! $attributes->merge([
        'type' => 'text',
        'class' =>
            'block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:focus:border-blue-500 dark:focus:ring-blue-500',
    ]) !!}>
    @error($model)
        <x-input-error :messages="$message" class="mt-2" />
    @enderror
</div>
