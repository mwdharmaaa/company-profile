# MONOCORP - Enterprise Digital Architecture Profile

A modern, production-grade multipage company profile web system built with Laravel 11+, SQLite, native Blade templates, handwritten pure CSS, and vanilla JavaScript.

Designed with an uncompromising **minimalist black-and-white theme** (crisp white background, high-contrast black accents, zero gratuitous frameworks).

---

## Technical Specifications

- **Backend**: Laravel 11+ (Atomic Actions, Single Responsibility Controllers, Form Requests, Seeders).
- **Database**: SQLite (Zero configuration, in-file storage).
- **Frontend Architecture**: Native Blade templates, Pure CSS (No Tailwind / No Bootstrap), Vanilla JS (No jQuery / No Vue / No React).
- **Design Language**: Linear / Figma inspired monochrome interface, sub-pixel typography, crisp border geometry, zero emojis.
- **Orchestration**: Single-enter bash execution (`deploy.sh`, `redeploy.sh`, `runtest.sh`) + Docker containerization.

---

## Multipage Architecture

### 1. Public Facing Pages
- **Landing Page (`/`)**: Hero banner, systems philosophy, capabilities grid, engineering journal highlights, metrics counter, and direct project inquiry form.
- **About Firm (`/about`)**: Company story, mission & vision statements, 4-stage engineering lifecycle, and core architectural principles.
- **Services Catalog (`/services`)**: Filterable service listings with deliverables checklists, pricing benchmarks, and delivery timeframes.
- **Service Specifications (`/services/{slug}`)**: Dedicated specification view for each individual service with engagement options.
- **Technical Journal (`/blog`)**: Engineering dispatches with category filtering, instant search, and native pagination.
- **Article Reader (`/blog/{slug}`)**: Single dispatch reading view with estimated read times, author meta, and related publications.

### 2. Administrator Console
- **Admin Authentication (`/admin/login`)**: Session-based credentials portal with rate limiting and CSRF protection.
- **Control Dashboard (`/admin/dashboard`)**: Metric overview (total services, published dispatches, unread inquiries, read counts) and recent submissions.
- **Services Management (`/admin/services`)**: Complete CRUD suite to manage titles, slugs, pricing, icons, features, and active/featured toggles.
- **Journal Management (`/admin/posts`)**: Article publishing suite with automatic slug generation, draft/published scheduling, and view tracking.
- **Company Settings (`/admin/settings`)**: Live content management for company name, tagline, about story, vision, mission, SLA metrics, and contact channels.
- **Inquiries Inbox (`/admin/inquiries`)**: Inspection portal to review, update status (unread, read, archived), and delete client submissions.

---

## Quick Start (Single-Enter)

### Local Environment
```bash
# 1. Execute deployment bundle
./deploy.sh

# 2. Start local development server
php artisan serve
```

### Docker Container
```bash
docker compose up -d --build
```

---

## Default Access Credentials

- **Public Endpoint**: `http://localhost:8000`
- **Admin Console**: `http://localhost:8000/admin`
- **Email**: `admin@monocorp.test`
- **Password**: `password123`

---

## Automated Test Suites

```bash
./runtest.sh
# or
php artisan test
```

All 13 automated feature tests verify public page responses, admin authentication gates, and database mutation integrity.
