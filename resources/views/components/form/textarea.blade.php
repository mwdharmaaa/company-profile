@props(['name', 'label' => null, 'value' => ''])

<div class="form-group">
    @if($label)
        <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    @endif
    <textarea id="{{ $name }}" name="{{ $name }}" {{ $attributes->merge(['class' => 'form-textarea']) }}>{{ old($name, $value) }}</textarea>
</div>
