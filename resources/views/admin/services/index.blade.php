@extends('layouts.admin')

@section('title', 'Manage Services - MONOCORP')
@section('header_title', 'Services Management')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
    <div>
        <h2>Engineering Services</h2>
        <p style="font-size: 13.5px;">Manage service capabilities, pricing, and technical deliverables.</p>
    </div>
    <a href="{{ route('admin.services.create') }}" class="btn btn-primary">+ Add New Service</a>
</div>

<div class="admin-table-wrapper">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Order</th>
                <th>Service Name</th>
                <th>Badge</th>
                <th>Starting Price</th>
                <th>Timeframe</th>
                <th>Status</th>
                <th>Featured</th>
                <th style="text-align: right;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($services as $service)
                <tr>
                    <td class="mono">{{ $service->sort_order }}</td>
                    <td>
                        <strong>{{ $service->title }}</strong>
                        <div class="mono" style="font-size: 11px; color: var(--text-muted);">/services/{{ $service->slug }}</div>
                    </td>
                    <td><span class="badge">{{ $service->badge ?? '-' }}</span></td>
                    <td class="mono">{{ $service->starting_price ?? 'N/A' }}</td>
                    <td class="mono" style="font-size: 12px;">{{ $service->delivery_time ?? '-' }}</td>
                    <td>
                        @if ($service->is_active)
                            <span class="badge badge-dark">Active</span>
                        @else
                            <span class="badge">Inactive</span>
                        @endif
                    </td>
                    <td>
                        @if ($service->is_featured)
                            <span class="badge">Yes</span>
                        @else
                            <span style="color: var(--text-muted); font-size: 12px;">No</span>
                        @endif
                    </td>
                    <td style="text-align: right;">
                        <div class="action-buttons" style="justify-content: flex-end;">
                            <a href="{{ route('services.show', $service->slug) }}" target="_blank" class="btn btn-outline btn-sm">Preview</a>
                            <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-secondary btn-sm">Edit</a>
                            
                            <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="delete-confirm-form" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline btn-sm" style="color: #b91c1c;">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" style="text-align: center; color: var(--text-muted); padding: 32px;">No services created yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div style="margin-top: 24px;">
    {{ $services->links() }}
</div>
@endsection
