@props(['service'])

<div class="card service-card">
    <div>
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:16px;">
            <span class="badge badge-dark">{{ $service->badge ?? 'Service' }}</span>
            <span class="mono" style="font-size:11px;color:var(--text-muted);">{{ $service->delivery_time }}</span>
        </div>
        <h3><a href="{{ route('services.show', $service->slug) }}">{{ $service->title }}</a></h3>
        <p style="font-size:13.5px;margin-top:8px;">{{ $service->excerpt }}</p>
    </div>
    <div style="margin-top:20px;padding-top:14px;border-top:1px solid var(--border-light);display:flex;justify-content:space-between;align-items:center;">
        <span class="mono" style="font-size:13px;font-weight:600;">{{ $service->starting_price }}</span>
        <a href="{{ route('services.show', $service->slug) }}" class="btn btn-outline btn-sm">Specs &rarr;</a>
    </div>
</div>
