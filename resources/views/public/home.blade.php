@extends('layouts.public')

@section('title', 'MONOCORP - Architectural Systems & Digital Engineering')

@section('content')
<section class="hero-section">
    <div class="container">
        <div class="hero-tag">
            <span class="badge badge-dark">Systems Architecture</span>
            <span class="badge">Monochrome Engineering</span>
        </div>
        <h1 class="hero-title">Precision Engineering for High-Velocity Digital Systems</h1>
        <p class="hero-description">
            We architect and build fault-tolerant web systems, high-throughput backend APIs, and distraction-free user interfaces with zero unnecessary dependencies.
        </p>
        <div class="hero-actions">
            <a href="{{ route('services.index') }}" class="btn btn-primary">Explore Services</a>
            <a href="{{ route('about') }}" class="btn btn-outline">Our Methodology</a>
        </div>

        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-value">{{ $stats['projects'] }}</div>
                <div class="stat-label">Projects Deployed</div>
            </div>
            <div class="stat-item">
                <div class="stat-value">{{ $stats['uptime'] }}</div>
                <div class="stat-label">Uptime SLA Standard</div>
            </div>
            <div class="stat-item">
                <div class="stat-value">{{ $stats['experience'] }}</div>
                <div class="stat-label">Production Experience</div>
            </div>
            <div class="stat-item">
                <div class="stat-value">{{ $stats['retention'] }}</div>
                <div class="stat-label">Client Retention</div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Services Section -->
<section class="section section-border">
    <div class="container">
        <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 48px;">
            <div>
                <span class="badge" style="margin-bottom: 12px;">Core Capabilities</span>
                <h2>Architectural Services</h2>
            </div>
            <a href="{{ route('services.index') }}" class="btn btn-outline btn-sm">View All Services &rarr;</a>
        </div>

        <div class="grid-3">
            @foreach ($featuredServices as $service)
                <div class="card service-card">
                    <div>
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
                            <span class="badge badge-dark">{{ $service->badge ?? 'Core' }}</span>
                            <span class="mono" style="font-size: 11px; color: var(--text-muted);">{{ $service->delivery_time }}</span>
                        </div>
                        <h3>{{ $service->title }}</h3>
                        <p style="font-size: 14px; margin-top: 10px;">{{ $service->excerpt }}</p>

                        <ul class="feature-list">
                            @foreach (array_slice($service->formatted_features, 0, 3) as $feature)
                                <li class="feature-item">{{ $feature }}</li>
                            @endforeach
                        </ul>
                    </div>

                    <div style="margin-top: 24px; padding-top: 16px; border-top: 1px solid var(--border-light); display: flex; justify-content: space-between; align-items: center;">
                        <span class="mono" style="font-size: 13px; font-weight: 600;">From {{ $service->starting_price }}</span>
                        <a href="{{ route('services.show', $service->slug) }}" class="btn btn-outline btn-sm">Specs</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Latest Insights Section -->
<section class="section section-border">
    <div class="container">
        <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 48px;">
            <div>
                <span class="badge" style="margin-bottom: 12px;">Engineering Dispatches</span>
                <h2>Technical Journal</h2>
            </div>
            <a href="{{ route('blog.index') }}" class="btn btn-outline btn-sm">Read All Articles &rarr;</a>
        </div>

        <div class="grid-3">
            @foreach ($latestPosts as $post)
                <article class="card">
                    <div class="blog-card-meta">
                        <span class="badge">{{ $post->category }}</span>
                        <span>{{ $post->reading_time }}</span>
                    </div>
                    <h3 style="font-size: 1.15rem; margin-bottom: 12px;">
                        <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                    </h3>
                    <p style="font-size: 13px; line-height: 1.6; margin-bottom: 20px;">{{ $post->excerpt }}</p>
                    <a href="{{ route('blog.show', $post->slug) }}" style="font-size: 13px; font-weight: 600; text-decoration: underline;">Read Technical Article &rarr;</a>
                </article>
            @endforeach
        </div>
    </div>
</section>

<!-- Direct Inquiry Form Section -->
<section id="contact" class="section">
    <div class="container">
        <div class="grid-2" style="align-items: start;">
            <div>
                <span class="badge" style="margin-bottom: 12px;">Direct Channel</span>
                <h2>Initiate Project Dialogue</h2>
                <p style="margin-top: 16px; max-width: 440px;">
                    Discuss your technical requirements, architectural audits, or backend scaling challenges directly with our engineering leads.
                </p>

                <div style="margin-top: 36px; display: flex; flex-direction: column; gap: 14px; font-size: 14px;">
                    <div>
                        <strong class="mono" style="display: block; font-size: 11px; color: var(--text-muted);">Direct Email</strong>
                        <span>engineering@monocorp.agency</span>
                    </div>
                    <div>
                        <strong class="mono" style="display: block; font-size: 11px; color: var(--text-muted);">Response SLA</strong>
                        <span>Under 24 business hours</span>
                    </div>
                </div>
            </div>

            <div class="card">
                @include('partials.flash')

                <form action="{{ route('inquiries.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" id="name" name="name" class="form-input" required value="{{ old('name') }}">
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">Work Email</label>
                        <input type="email" id="email" name="email" class="form-input" required value="{{ old('email') }}">
                    </div>

                    <div class="form-group">
                        <label for="service_id" class="form-label">Target Service Domain (Optional)</label>
                        <select id="service_id" name="service_id" class="form-select">
                            <option value="">-- General Technical Consultation --</option>
                            @foreach ($featuredServices as $service)
                                <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
                                    {{ $service->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="subject" class="form-label">Subject / System Focus</label>
                        <input type="text" id="subject" name="subject" class="form-input" required value="{{ old('subject') }}">
                    </div>

                    <div class="form-group">
                        <label for="message" class="form-label">Technical Overview & Scope</label>
                        <textarea id="message" name="message" class="form-textarea" required>{{ old('message') }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary" style="width: 100%;">Transmit Inquiry</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
