@props(['type' => 'success'])

<div {{ $attributes->merge(['class' => 'alert alert-' . $type]) }} role="alert">
    <div>{{ $slot }}</div>
    <button type="button" class="alert-close" style="background:none;border:none;cursor:pointer;font-weight:700;">&times;</button>
</div>
