{{-- ([
    'variant' => 'warning' | 'danger'
    'type' => HTML button types
    'href' => string
] --}}

@props([
    'variant' => 'primary',
    'type' => 'submit',
    'href' => null
])

@php

$bg = '';

$classes = "inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ";
switch ($variant) {
    case 'warning':
        $classes .= 'bg-yellow-700';
        break;
    case 'danger':
        $classes .= 'bg-red-700';
        break;
    default:
        $classes .= 'bg-gray-900';
}

@endphp

@if( $href )
<a href="{{ $href }}">
@endif
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@if( $href )
</a>
@endif
