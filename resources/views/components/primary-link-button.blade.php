<a
    {{ $attributes->merge(['class' => 'text-lg items-center px-4 py-2 bg-primary border border-transparent rounded-md font-semibold text-white tracking-widest hover:bg-brand focus:bg-brand active:bg-brand focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</a>
