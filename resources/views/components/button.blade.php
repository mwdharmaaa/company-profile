@props(['variant' => 'primary', 'size' => 'md', 'type' => 'button'])

@php
    $class = match($variant) {
        'outline' => 'btn btn-outline',
        'secondary' => 'btn btn-secondary',
        default => 'btn btn-primary',
    };
    if ($size === 'sm') $class .= ' btn-sm';
@endphp

<button type="{{ $type }}" {{ $attributes->merge(['class' => $class]) }}>
    {{ $slot }}
</button>
