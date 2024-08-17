@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'h-auto py-3 px-4 text-lg text-black rounded-md placeholder-black focus:border-primary-500 focus:ring-primary-500']) !!}>
