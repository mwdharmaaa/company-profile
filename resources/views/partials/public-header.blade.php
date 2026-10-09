<header class="site-header">
    <div class="container header-inner">
        <a href="{{ route('home') }}" class="site-logo">
            <span class="logo-badge">M</span>
            <span>MONOCORP</span>
        </a>

        <ul class="nav-links">
            <li><a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
            <li><a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">About</a></li>
            <li><a href="{{ route('services.index') }}" class="nav-link {{ request()->routeIs('services.*') ? 'active' : '' }}">Services</a></li>
            <li><a href="{{ route('blog.index') }}" class="nav-link {{ request()->routeIs('blog.*') ? 'active' : '' }}">Blog</a></li>
            @auth
                <li><a href="{{ route('admin.dashboard') }}" class="badge badge-dark">Admin</a></li>
            @else
                <li><a href="{{ route('admin.login') }}" class="badge">Portal</a></li>
            @endauth
        </ul>

        <div style="display: flex; align-items: center; gap: 12px;">
            <a href="{{ route('home') }}#contact" class="btn btn-primary btn-sm">Get in Touch</a>
            <button class="mobile-toggle" aria-label="Toggle Navigation" aria-expanded="false">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg>
            </button>
        </div>
    </div>
</header>
