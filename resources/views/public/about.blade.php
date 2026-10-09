@extends('layouts.public')

@section('title', 'About Our Engineering Practice - MONOCORP')

@section('content')
<section class="section section-border">
    <div class="container">
        <span class="badge badge-dark">Firm Profile</span>
        <h1 style="margin-top: 16px; margin-bottom: 24px; max-width: 800px;">
            Engineering Systems with Structural Clarity and Zero Noise
        </h1>
        <p style="font-size: 1.2rem; max-width: 740px; color: var(--text-secondary); line-height: 1.7;">
            {{ $about['story'] }}
        </p>
    </div>
</section>

<!-- Vision & Mission -->
<section class="section section-border" style="background-color: var(--bg-secondary);">
    <div class="container">
        <div class="grid-2">
            <div class="card" style="background: #ffffff;">
                <span class="badge" style="margin-bottom: 12px;">Guiding Standard</span>
                <h3>Vision</h3>
                <p style="margin-top: 12px; font-size: 15px; line-height: 1.7;">
                    {{ $about['vision'] }}
                </p>
            </div>
            <div class="card" style="background: #ffffff;">
                <span class="badge" style="margin-bottom: 12px;">Operational Mandate</span>
                <h3>Mission</h3>
                <p style="margin-top: 12px; font-size: 15px; line-height: 1.7;">
                    {{ $about['mission'] }}
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Service Methodology -->
<section class="section section-border">
    <div class="container">
        <span class="badge" style="margin-bottom: 12px;">Process Lifecycle</span>
        <h2 style="margin-bottom: 40px;">How We Deliver Production Software</h2>

        <div class="grid-4">
            <div class="card">
                <span class="mono" style="font-size: 12px; color: var(--text-muted); display: block; margin-bottom: 12px;">Stage 01</span>
                <h4>Discovery & Spec</h4>
                <p style="font-size: 13px; margin-top: 8px;">
                    Rigorous architectural specification. We establish hard boundaries, constraints, data schemas, and latency targets.
                </p>
            </div>
            <div class="card">
                <span class="mono" style="font-size: 12px; color: var(--text-muted); display: block; margin-bottom: 12px;">Stage 02</span>
                <h4>Semantic Design</h4>
                <p style="font-size: 13px; margin-top: 8px;">
                    Single-responsibility module boundaries, folder-first hierarchies, and co-located contracts.
                </p>
            </div>
            <div class="card">
                <span class="mono" style="font-size: 12px; color: var(--text-muted); display: block; margin-bottom: 12px;">Stage 03</span>
                <h4>Atomic Engineering</h4>
                <p style="font-size: 13px; margin-top: 8px;">
                    Iterative micro-commit cycles on branch devv. Laser-focused code without speculative indirection.
                </p>
            </div>
            <div class="card">
                <span class="mono" style="font-size: 12px; color: var(--text-muted); display: block; margin-bottom: 12px;">Stage 04</span>
                <h4>Shell-First Deploy</h4>
                <p style="font-size: 13px; margin-top: 8px;">
                    Containerized delivery managed via single-enter bash bundles, migration health checks, and zero downtime.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Core Principles -->
<section class="section">
    <div class="container">
        <div style="margin-bottom: 40px;">
            <span class="badge" style="margin-bottom: 12px;">Foundational Ethics</span>
            <h2>Engineering Principles</h2>
        </div>

        <div class="grid-2">
            @foreach ($principles as $principle)
                <div style="padding: 24px 0; border-top: 1px solid var(--border-light);">
                    <span class="mono" style="color: var(--text-muted); font-size: 12px;">{{ $principle['number'] }}</span>
                    <h3 style="margin-top: 6px; font-size: 1.15rem;">{{ $principle['title'] }}</h3>
                    <p style="margin-top: 8px; font-size: 14px;">{{ $principle['description'] }}</p>
                </div>
            @endforeach
        </div>

        <div style="margin-top: 60px; text-align: center; padding: 48px; border: 1px solid var(--border-light); background-color: var(--bg-secondary);">
            <h3>Ready to discuss your system architecture?</h3>
            <p style="margin-top: 8px; margin-bottom: 24px;">Explore our service catalog or request an architectural consultation.</p>
            <div style="display: inline-flex; gap: 14px;">
                <a href="{{ route('services.index') }}" class="btn btn-primary">Browse Services</a>
                <a href="{{ route('home') }}#contact" class="btn btn-outline">Submit Inquiry</a>
            </div>
        </div>
    </div>
</section>
@endsection
