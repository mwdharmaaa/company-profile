@props(['dark' => false])

<span {{ $attributes->merge(['class' => $dark ? 'badge badge-dark' : 'badge']) }}>
    {{ $slot }}
</span>
