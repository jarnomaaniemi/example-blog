@props(['active' => false])

@php
    $classes = 'block text-left pl-3 text-sm leading-6 hover:bg-blue-500 hover:text-white focus:bg-blue-500 focus:text-white';
    
    if ($active) {
        $classes = $classes . ' bg-blue-500 text-white';
    }

@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
