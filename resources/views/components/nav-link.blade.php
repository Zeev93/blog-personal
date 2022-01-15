@props(['active'])

@php
$classes = ($active ?? false)
            ? 'text-lg font-bold w-full m-auto px-1 pt-1 border-b-2 border-white text-sm font-medium leading-5 focus:outline-none focus:border-gray-400 transition duration-150 ease-in-out'
            : 'w-full m-auto px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
