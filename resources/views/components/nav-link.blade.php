@props(['active'])

@php
$classes = ($active ?? false)
            ? 'text-gray-900 flex w-full bg-blue-100 rounded-sm py-1 pl-3 text-primary mb-3'
            : 'text-gray-900 flex w-full rounded-sm py-1 pl-3 mb-3';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
