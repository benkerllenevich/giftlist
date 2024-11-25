@props(['active'])

@php
    $isActive = $active ?? false
@endphp

<a {{ $attributes }} @class([
    'px-2 lg:px-8 py-2 lg:py-4 text-center hover:bg-gray-50 transition duration-150 ease-in-out',
    'underline decoration-indigo-400 decoration-2' => $isActive
])>
    {{ $slot }}
</a>
