<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title' => 'Cloud Architecture & Infrastructure',
                'slug' => 'cloud-architecture',
                'tagline' => 'Fault-tolerant distributed cloud topologies designed for high availability.',
                'excerpt' => 'Design, orchestration, and provisioning of multi-region cloud backbones on AWS, GCP, or bare metal.',
                'description' => 'We engineer cloud environments that scale horizontally without human intervention. By establishing declarative infrastructure as code, automated continuous delivery, and self-healing cluster policies, your platform maintains unwavering uptime under extreme traffic spikes.',
                'features' => [
                    'Multi-region high availability & active-active failover',
                    'Terraform & OpenTofu infrastructure-as-code automation',
                    'Zero-downtime rolling upgrades and blue-green deployments',
                    'Centralized OpenTelemetry metrics and distributed tracing'
                ],
                'starting_price' => '$4,500',
                'delivery_time' => '3 - 4 Weeks',
                'badge' => 'Core Infrastructure',
                'icon_name' => 'server',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'High-Throughput API Engineering',
                'slug' => 'api-engineering',
                'tagline' => 'Sub-millisecond latency APIs hardened with strict contractual typing.',
                'excerpt' => 'Backend API services built for maximum request concurrency, minimal allocations, and instant response times.',
                'description' => 'Our backend engineering prioritizes algorithmic efficiency and memory optimization. We develop REST and gRPC endpoints that process thousands of requests per second per node, paired with tiered caching strategies and resilient circuit breakers.',
                'features' => [
                    'Sub-5ms median response time tuning',
                    'Redis cache-aside with proactive key invalidation',
                    'Rate-limiting, API key quotas, and OAuth2/JWT security',
                    'Strict OpenAPI 3.1 & JSON Schema contracts'
                ],
                'starting_price' => '$3,200',
                'delivery_time' => '2 - 3 Weeks',
                'badge' => 'High Performance',
                'icon_name' => 'cpu',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'Precision Web Systems & UI',
                'slug' => 'web-systems',
                'tagline' => 'Minimalist, Linear-grade web interfaces crafted with pure performance.',
                'excerpt' => 'Clean, distraction-free web applications engineered with semantic atomic architecture and sub-second load times.',
                'description' => 'We reject framework bloat and unnecessary dependencies. Every interface we build combines clean monochrome aesthetics, fluid micro-interactions, full keyboard navigation, and pixel-precise layout hierarchy.',
                'features' => [
                    'Native Blade and zero-framework pure CSS architecture',
                    'Sub-second First Contentful Paint (FCP) and 100/100 Lighthouse scores',
                    'Atomic component hierarchy and single responsibility files',
                    'WCAG AA accessible keyboard and screen-reader support'
                ],
                'starting_price' => '$2,800',
                'delivery_time' => '2 - 4 Weeks',
                'badge' => 'Fullstack',
                'icon_name' => 'layout',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'title' => 'Security Hardening & Code Audit',
                'slug' => 'security-audit',
                'tagline' => 'Defensive security analysis, SAST/DAST automation, and posture hardening.',
                'excerpt' => 'Comprehensive vulnerability analysis, secure architecture review, and cryptographic hardening.',
                'description' => 'We perform thorough white-box code audits, penetration simulations, and infrastructure reviews to identify vulnerabilities before attackers do. Receive actionable code refactoring solutions rather than superficial compliance checklists.',
                'features' => [
                    'Deep source code vulnerability and dependency analysis',
                    'OWASP Top 10 threat modeling and remediation patches',
                    'Zero-trust secrets management and TLS cipher hardening',
                    'Audit report with technical impact matrices'
                ],
                'starting_price' => '$2,200',
                'delivery_time' => '1 - 2 Weeks',
                'badge' => 'Enterprise Security',
                'icon_name' => 'shield',
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'title' => 'DevOps & Container Orchestration',
                'slug' => 'devops-orchestration',
                'tagline' => 'Single-command shell bundles and automated reproducible environments.',
                'excerpt' => 'Deterministic multi-stage Docker builds, healthcheck loops, and single-enter deployment pipelines.',
                'description' => 'Stop relying on manual setup documents. We deliver end-to-end executable shell instruction bundles that build, migrate, verify, and launch your systems deterministically across local, staging, and production environments.',
                'features' => [
                    'Single-enter deploy.sh and redeploy.sh automation bundles',
                    'Multi-stage distroless and minimal alpine container builds',
                    'Continuous integration pipelines with automated regression gates',
                    'Automated database backup pipelines with verification'
                ],
                'starting_price' => '$1,800',
                'delivery_time' => '1 - 2 Weeks',
                'badge' => 'Automation',
                'icon_name' => 'terminal',
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'title' => 'Database Optimization & Scaling',
                'slug' => 'database-optimization',
                'tagline' => 'Query execution plan analysis, index profiling, and zero-downtime migrations.',
                'excerpt' => 'Eliminate query bottlenecks, size connection pools, and design resilient data models.',
                'description' => 'Slow database queries degrade user experience and inflate cloud costs. We analyze query plans, eliminate N+1 query patterns, design optimal composite indexes, and configure connection pools for sustained reliability under load.',
                'features' => [
                    'EXPLAIN ANALYZE query plan deconstruction and index tuning',
                    'Elimination of N+1 ORM patterns and sub-optimal joins',
                    'Zero-downtime table migrations for high-traffic tables',
                    'SQLite, PostgreSQL, and Redis caching topologies'
                ],
                'starting_price' => '$2,000',
                'delivery_time' => '1 - 2 Weeks',
                'badge' => 'Data Engineering',
                'icon_name' => 'database',
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 6,
            ],
        ];

        foreach ($services as $data) {
            Service::updateOrCreate(['slug' => $data['slug']], $data);
        }
    }
}
