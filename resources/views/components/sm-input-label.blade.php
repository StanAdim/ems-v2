@props(['value'])

<label {{ $attributes->merge(['class' => 'mb-1 block text-sm font-normal text-gray-500']) }}>
    {{ $value ?? $slot }}
</label>
