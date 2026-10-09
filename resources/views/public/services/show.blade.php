@extends('layouts.public')

@section('title', $service->title . ' - MONOCORP Specifications')

@section('content')
<section class="section section-border">
    <div class="container">
        <a href="{{ route('services.index') }}" class="btn btn-outline btn-sm" style="margin-bottom: 24px;">&larr; Back to Services</a>
        
        <div style="display: flex; gap: 10px; margin-bottom: 16px;">
            <span class="badge badge-dark">{{ $service->badge ?? 'Service' }}</span>
            <span class="badge">Delivery: {{ $service->delivery_time }}</span>
        </div>

        <h1 style="max-width: 800px; margin-bottom: 16px;">{{ $service->title }}</h1>
        <p style="font-size: 1.25rem; color: var(--text-secondary); max-width: 700px; line-height: 1.6;">
            {{ $service->tagline ?? $service->excerpt }}
        </p>
    </div>
</section>

<section class="section section-border">
    <div class="container">
        <div class="grid-3" style="align-items: start;">
            <!-- Left / Main Description (span 2) -->
            <div style="grid-column: span 2;">
                <h2>Architectural Scope</h2>
                <div style="margin-top: 20px; font-size: 1.05rem; line-height: 1.8; color: var(--text-secondary);">
                    <p style="margin-bottom: 24px;">{{ $service->description }}</p>
                </div>

                <div style="margin-top: 40px; padding: 32px; border: 1px solid var(--border-light); background-color: var(--bg-secondary);">
                    <h3 style="margin-bottom: 16px;">Mandatory Deliverables</h3>
                    <ul class="feature-list" style="margin: 0;">
                        @foreach ($service->formatted_features as $feature)
                            <li class="feature-item" style="font-size: 15px; margin-bottom: 10px;">{{ $feature }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Right Sidebar / Service Summary & Inquiry -->
            <div>
                <div class="card">
                    <span class="mono" style="font-size: 11px; color: var(--text-muted); display: block;">Base Investment</span>
                    <div class="stat-value" style="margin-top: 4px; margin-bottom: 16px;">{{ $service->starting_price }}</div>

                    <div style="padding-top: 16px; border-top: 1px solid var(--border-light); margin-bottom: 24px; font-size: 13.5px; display: flex; flex-direction: column; gap: 10px;">
                        <div>
                            <span class="mono" style="color: var(--text-muted); font-size: 11px; display: block;">Timeframe</span>
                            <strong>{{ $service->delivery_time }}</strong>
                        </div>
                        <div>
                            <span class="mono" style="color: var(--text-muted); font-size: 11px; display: block;">Execution Branch</span>
                            <strong>Branch devv Atomic Lifecycle</strong>
                        </div>
                    </div>

                    <a href="{{ route('home') }}#contact" class="btn btn-primary" style="width: 100%; margin-bottom: 10px;">Engage This Service</a>
                    <a href="{{ route('services.index') }}" class="btn btn-outline" style="width: 100%;">Compare Services</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Services -->
@if ($relatedServices->isNotEmpty())
<section class="section">
    <div class="container">
        <h3 style="margin-bottom: 24px;">Complementary Capabilities</h3>
        <div class="grid-3">
            @foreach ($relatedServices as $rel)
                <div class="card service-card">
                    <div>
                        <span class="badge" style="margin-bottom: 12px;">{{ $rel->badge ?? 'Related' }}</span>
                        <h4><a href="{{ route('services.show', $rel->slug) }}">{{ $rel->title }}</a></h4>
                        <p style="font-size: 13px; margin-top: 8px;">{{ $rel->excerpt }}</p>
                    </div>
                    <div style="margin-top: 16px; padding-top: 12px; border-top: 1px solid var(--border-light);">
                        <a href="{{ route('services.show', $rel->slug) }}" class="btn btn-outline btn-sm">Specs &rarr;</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection
