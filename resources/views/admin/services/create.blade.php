@extends('layouts.admin')

@section('title', 'Add New Service - MONOCORP')
@section('header_title', 'New Service Specification')

@section('content')
<div style="margin-bottom: 24px;">
    <a href="{{ route('admin.services.index') }}" class="btn btn-outline btn-sm">&larr; Back to Services</a>
    <h2 style="margin-top: 12px;">Create Service Specification</h2>
</div>

<div class="card" style="background: #ffffff; max-width: 860px;">
    <form action="{{ route('admin.services.store') }}" method="POST">
        @csrf

        <div class="grid-2">
            <div class="form-group">
                <label for="title" class="form-label">Service Title</label>
                <input type="text" id="title" name="title" class="form-input" required value="{{ old('title') }}" placeholder="e.g. Distributed Database Engineering">
            </div>

            <div class="form-group">
                <label for="slug" class="form-label">URL Slug</label>
                <input type="text" id="slug" name="slug" class="form-input" value="{{ old('slug') }}" placeholder="auto-generated from title">
            </div>
        </div>

        <div class="grid-2">
            <div class="form-group">
                <label for="starting_price" class="form-label">Starting Price</label>
                <input type="text" id="starting_price" name="starting_price" class="form-input" value="{{ old('starting_price') }}" placeholder="e.g. $3,500">
            </div>

            <div class="form-group">
                <label for="delivery_time" class="form-label">Delivery Timeframe</label>
                <input type="text" id="delivery_time" name="delivery_time" class="form-input" value="{{ old('delivery_time') }}" placeholder="e.g. 2 - 3 Weeks">
            </div>
        </div>

        <div class="grid-2">
            <div class="form-group">
                <label for="badge" class="form-label">Badge Label (Optional)</label>
                <input type="text" id="badge" name="badge" class="form-input" value="{{ old('badge') }}" placeholder="e.g. Core Architecture">
            </div>

            <div class="form-group">
                <label for="icon_name" class="form-label">Icon Identifier</label>
                <select id="icon_name" name="icon_name" class="form-select">
                    <option value="server" {{ old('icon_name') == 'server' ? 'selected' : '' }}>Server / Infrastructure</option>
                    <option value="cpu" {{ old('icon_name') == 'cpu' ? 'selected' : '' }}>CPU / High Performance</option>
                    <option value="layout" {{ old('icon_name') == 'layout' ? 'selected' : '' }}>Layout / Interface</option>
                    <option value="shield" {{ old('icon_name') == 'shield' ? 'selected' : '' }}>Shield / Security</option>
                    <option value="terminal" {{ old('icon_name') == 'terminal' ? 'selected' : '' }}>Terminal / DevOps</option>
                    <option value="database" {{ old('icon_name') == 'database' ? 'selected' : '' }}>Database / Storage</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="excerpt" class="form-label">Brief Excerpt (Summary for catalog cards)</label>
            <input type="text" id="excerpt" name="excerpt" class="form-input" required value="{{ old('excerpt') }}" placeholder="One sentence summary of the service scope">
        </div>

        <div class="form-group">
            <label for="description" class="form-label">Full Technical Description</label>
            <textarea id="description" name="description" class="form-textarea" required placeholder="Detailed architectural scope and methodology...">{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label for="features" class="form-label">Deliverables / Features (One per line)</label>
            <textarea id="features" name="features" class="form-textarea" style="min-height: 100px;" placeholder="Multi-region cloud topology&#10;Zero-downtime database migration&#10;OpenTelemetry distributed tracing">{{ old('features') }}</textarea>
            <small style="color: var(--text-muted); font-size: 12px;">Enter each key deliverable or feature item on a new line.</small>
        </div>

        <div style="display: flex; gap: 24px; margin-bottom: 24px; padding-top: 12px; border-top: 1px solid var(--border-light);">
            <label class="form-toggle">
                <input type="checkbox" name="is_featured" value="1" class="checkbox-custom" {{ old('is_featured') ? 'checked' : '' }}>
                <span>Feature on Homepage</span>
            </label>

            <label class="form-toggle">
                <input type="checkbox" name="is_active" value="1" class="checkbox-custom" {{ old('is_active', true) ? 'checked' : '' }}>
                <span>Active (Publicly Visible)</span>
            </label>
        </div>

        <div style="display: flex; gap: 12px;">
            <button type="submit" class="btn btn-primary">Save Service Specification</button>
            <a href="{{ route('admin.services.index') }}" class="btn btn-outline">Cancel</a>
        </div>
    </form>
</div>
@endsection
