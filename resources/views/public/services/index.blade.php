@extends('layouts.public')

@section('title', 'Engineering Services Catalog - MONOCORP')

@section('content')
<section class="section section-border">
    <div class="container">
        <span class="badge badge-dark">Capabilities</span>
        <h1 style="margin-top: 16px; margin-bottom: 16px;">Production Engineering Services</h1>
        <p style="font-size: 1.15rem; color: var(--text-secondary); max-width: 680px; margin-bottom: 32px;">
            Targeted architectural solutions built for scale, resilience, and strict operational constraints.
        </p>

        <!-- Fast Client/Server Filter Search -->
        <div style="max-width: 480px;">
            <form action="{{ route('services.index') }}" method="GET" style="display: flex; gap: 8px;">
                <input type="text" id="service-search" name="q" class="form-input" placeholder="Filter capabilities (e.g. cloud, api, security)..." value="{{ request('q') }}">
                @if (request('q'))
                    <a href="{{ route('services.index') }}" class="btn btn-secondary">Clear</a>
                @endif
            </form>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        @if ($services->isEmpty())
            <div style="text-align: center; padding: 60px; border: 1px dashed var(--border-light);">
                <p>No services found matching your query.</p>
                <a href="{{ route('services.index') }}" class="btn btn-outline btn-sm" style="margin-top: 16px;">View All Services</a>
            </div>
        @else
            <div class="grid-3">
                @foreach ($services as $service)
                    <div class="card service-card service-filterable-item">
                        <div>
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
                                <span class="badge badge-dark">{{ $service->badge ?? 'Service' }}</span>
                                <span class="mono" style="font-size: 11px; color: var(--text-muted);">{{ $service->delivery_time }}</span>
                            </div>

                            <h3 style="font-size: 1.25rem;">
                                <a href="{{ route('services.show', $service->slug) }}">{{ $service->title }}</a>
                            </h3>
                            <p style="font-size: 13.5px; margin-top: 8px; line-height: 1.6;">{{ $service->excerpt }}</p>

                            <ul class="feature-list">
                                @foreach ($service->formatted_features as $feature)
                                    <li class="feature-item">{{ $feature }}</li>
                                @endforeach
                            </ul>
                        </div>

                        <div style="margin-top: 24px; padding-top: 16px; border-top: 1px solid var(--border-light); display: flex; justify-content: space-between; align-items: center;">
                            <div>
                                <span class="mono" style="font-size: 10px; color: var(--text-muted); display: block;">Starting Investment</span>
                                <span class="mono" style="font-size: 14px; font-weight: 700;">{{ $service->starting_price ?? 'Custom' }}</span>
                            </div>
                            <a href="{{ route('services.show', $service->slug) }}" class="btn btn-outline btn-sm">Full Specs &rarr;</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
@endsection
