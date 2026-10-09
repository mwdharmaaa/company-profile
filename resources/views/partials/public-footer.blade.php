@php
    use App\Models\CompanySetting;
    $companyName = CompanySetting::get('company_name', 'MONOCORP');
    $tagline = CompanySetting::get('tagline', 'Architectural Digital Engineering & Modern Systems');
    $email = CompanySetting::get('contact_email', 'engineering@monocorp.agency');
    $phone = CompanySetting::get('contact_phone', '+1 (555) 234-5678');
    $address = CompanySetting::get('office_address', '500 Howard St, San Francisco, CA');
    $github = CompanySetting::get('github_url', 'https://github.com/mwdharmaaa');
@endphp

<footer class="site-footer">
    <div class="container">
        <div class="grid-4" style="align-items: start;">
            <div style="grid-column: span 1;">
                <div class="site-logo" style="margin-bottom: 12px;">
                    <span class="logo-badge">M</span>
                    <span>{{ $companyName }}</span>
                </div>
                <p style="font-size: 13px; line-height: 1.6;">{{ $tagline }}</p>
                <div style="margin-top: 16px;">
                    <span class="badge">Production Grade</span>
                </div>
            </div>

            <div>
                <h4 style="font-size: 13px; font-family: var(--font-mono); text-transform: uppercase; margin-bottom: 16px;">Navigation</h4>
                <ul style="list-style: none; display: flex; flex-direction: column; gap: 10px; font-size: 14px;">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('about') }}">About Firm</a></li>
                    <li><a href="{{ route('services.index') }}">Services Catalog</a></li>
                    <li><a href="{{ route('blog.index') }}">Engineering Blog</a></li>
                </ul>
            </div>

            <div>
                <h4 style="font-size: 13px; font-family: var(--font-mono); text-transform: uppercase; margin-bottom: 16px;">Office & Inquiries</h4>
                <div style="font-size: 13px; line-height: 1.8; color: var(--text-secondary);">
                    <p>{{ $address }}</p>
                    <p>{{ $email }}</p>
                    <p>{{ $phone }}</p>
                </div>
            </div>

            <div>
                <h4 style="font-size: 13px; font-family: var(--font-mono); text-transform: uppercase; margin-bottom: 16px;">Source & Stack</h4>
                <p style="font-size: 13px; margin-bottom: 12px;">Engineered with Laravel 11+, Native Blade, Pure CSS, and SQLite.</p>
                <a href="{{ $github }}" target="_blank" rel="noopener noreferrer" class="btn btn-outline btn-sm">GitHub Repository</a>
            </div>
        </div>

        <div class="footer-bottom">
            <span>&copy; {{ date('Y') }} {{ $companyName }}. All rights reserved. Zero-framework monochrome architecture.</span>
            <div style="display: flex; gap: 16px;">
                <a href="{{ route('admin.login') }}" style="color: var(--text-muted); font-size: 12px;">Admin Management</a>
            </div>
        </div>
    </div>
</footer>
