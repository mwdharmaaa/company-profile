<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $posts = [
            [
                'title' => 'Zero-Overhead Web Architecture: Why Minimalism Outperforms Bloat',
                'slug' => 'zero-overhead-web-architecture',
                'category' => 'Architecture',
                'author_name' => 'MonoCorp Lead Architect',
                'reading_time' => '4 min read',
                'status' => 'published',
                'views_count' => 342,
                'published_at' => now()->subDays(5),
                'excerpt' => 'Modern web stacks frequently suffer from dependency explosion. Exploring the measurable performance dividends of native server templates and zero-framework styling.',
                'content' => "The modern web ecosystem is entangled in dependency chains. A simple corporate website often drags megabytes of client-side JavaScript, virtual DOM reconciliation overhead, and deeply nested hydration waterfalls.\n\n### The Real Cost of Dependency Bloat\n\nWhen we analyze real-world field metrics, hydration delay directly damages Time to Interactive (TTI) and First Input Delay (FID). Users on mid-tier mobile devices suffer sluggish interactions while their CPU decompresses and parses unnecessary bundles.\n\n### The Native Paradigm\n\nBy leveraging server-rendered native Blade templates paired with handwritten, utility-focused pure CSS, we achieve:\n\n1. Sub-100ms server response times with minimal CPU footprint.\n2. Zero client-side runtime overhead: no framework hydration, no layout shifts.\n3. Long-term maintainability: no breaking dependency upgrades every six months.\n\nMinimalism is not a limitation; it is an engineering superpower.",
            ],
            [
                'title' => 'Single-Command Shell Orchestration in Production Environments',
                'slug' => 'single-command-shell-orchestration',
                'category' => 'DevOps',
                'author_name' => 'Infrastructure Engineering',
                'reading_time' => '6 min read',
                'status' => 'published',
                'views_count' => 512,
                'published_at' => now()->subDays(12),
                'excerpt' => 'Manual deployment checklists are an invitation for operational failure. How deterministic shell scripts guarantee reproducible release lifecycles.',
                'content' => "Every software system must encapsulate its entire operational lifecycle into deterministic bash scripts. A developer or sysadmin should never have to consult wiki documentation to guess the sequence of artisan commands, database migration flags, or cache clearing routines.\n\n### The Deployment Contract\n\nOur standard deployment bundle defines a rigid order of operations:\n\n- Phase 1: Environment verification and fail-fast assertions (`set -euo pipefail`).\n- Phase 2: Dependency hydration inside isolated build environments.\n- Phase 3: Database health check polling and zero-downtime schema migrations.\n- Phase 4: Production optimization and warm-up of framework caches.\n- Phase 5: Atomic filesystem permission hardening.\n\nWhen deployment is condensed into a single `./deploy.sh` command, human error drops to zero.",
            ],
            [
                'title' => 'The Discipline of Atomic Engineering: Single Responsibility Files',
                'slug' => 'discipline-of-atomic-engineering',
                'category' => 'Engineering',
                'author_name' => 'Backend Core Team',
                'reading_time' => '5 min read',
                'status' => 'published',
                'views_count' => 280,
                'published_at' => now()->subDays(18),
                'excerpt' => 'Eliminating monolithic 800-line controllers in favor of single-action classes and co-located data transfer objects.',
                'content' => "Monolithic controllers are where maintainability goes to die. When a single controller class contains ten methods with hundreds of lines of mixed query logic, validation, and side-effects, testing becomes a chore.\n\n### The ~150-Line Soft Cap\n\nEnforcing a strict ~150-line soft cap per file forces engineers to decompose complex workflows into discrete, single-action invokable classes.\n\n### Co-Located Contracts\n\nData Transfer Objects (DTOs) and form requests should live adjacent to their domain handlers. This provides high cohesion and instant discoverability for any engineer reading the codebase.",
            ],
            [
                'title' => 'Sub-Millisecond API Performance with Cache-Aside Patterns',
                'slug' => 'sub-millisecond-api-performance',
                'category' => 'Backend',
                'author_name' => 'Systems Optimization',
                'reading_time' => '7 min read',
                'status' => 'published',
                'views_count' => 418,
                'published_at' => now()->subDays(25),
                'excerpt' => 'Deep dive into combining SQLite in-memory buffering, Redis cache-aside, and eager Eloquent loading to survive traffic storms.',
                'content' => "Scaling read-heavy endpoints requires understanding query execution paths. In this article, we break down how to eliminate N+1 queries, design indexed composite keys, and safely invalidate cached payloads upon mutations.\n\n### Zero-N+1 Discipline\n\nNever allow raw relationship calls inside loop iterators. By pairing explicit eager loading (`with()`) with lean field selection, database round-trips drop from O(N) to O(1).",
            ],
        ];

        foreach ($posts as $data) {
            Post::updateOrCreate(['slug' => $data['slug']], $data);
        }
    }
}
