@extends('layouts.admin')

@section('title', 'Company Settings & Content - MONOCORP')
@section('header_title', 'Company Profile & Global Settings')

@section('content')
<div style="margin-bottom: 24px;">
    <h2>System & Profile Configuration</h2>
    <p style="font-size: 13.5px;">Manage company profile data, homepage hero text, vision, mission, and contact channels.</p>
</div>

<div class="card" style="background: #ffffff; max-width: 900px;">
    <form action="{{ route('admin.settings.update') }}" method="POST">
        @csrf

        @foreach ($settings as $group => $items)
            <div style="margin-bottom: 36px; padding-bottom: 24px; border-bottom: 1px solid var(--border-light);">
                <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 20px;">
                    <span class="badge badge-dark">{{ strtoupper($group) }}</span>
                    <h3 style="font-size: 1.15rem;">{{ ucfirst($group) }} Configuration</h3>
                </div>

                <div class="grid-2">
                    @foreach ($items as $setting)
                        <div class="form-group" style="{{ strlen($setting->value) > 80 ? 'grid-column: span 2;' : '' }}">
                            <label for="setting_{{ $setting->key }}" class="form-label">
                                {{ $setting->label ?? ucfirst(str_replace('_', ' ', $setting->key)) }}
                            </label>

                            @if (strlen($setting->value) > 100 || str_contains($setting->key, 'story') || str_contains($setting->key, 'vision') || str_contains($setting->key, 'mission') || str_contains($setting->key, 'subheading'))
                                <textarea id="setting_{{ $setting->key }}" name="settings[{{ $setting->key }}]" class="form-textarea" style="min-height: 80px;">{{ old('settings.' . $setting->key, $setting->value) }}</textarea>
                            @else
                                <input type="text" id="setting_{{ $setting->key }}" name="settings[{{ $setting->key }}]" class="form-input" value="{{ old('settings.' . $setting->key, $setting->value) }}">
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach

        <div>
            <button type="submit" class="btn btn-primary">Save All Configuration Changes</button>
        </div>
    </form>
</div>
@endsection
