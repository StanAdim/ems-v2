@props(['id' => null, 'label' => 'null'])

<div class="">
    <label for="{{ $id }}" class="mb-1 block text-sm font-normal text-gray-500">
        {{ $label }}
    </label>
    <input disabled id="{{ $id }}" {!! $attributes->merge([
        'name' => $id,
        'type' => 'text',
        'class' =>
            'block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:focus:border-blue-500 dark:focus:ring-blue-500',
    ]) !!}>
</div>
