<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Models\Service;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class GenerateSitemapCommand extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Generate static XML sitemap for SEO discovery';

    public function handle(): int
    {
        $baseUrl = config('app.url', 'http://localhost:8000');
        $urls = [
            $baseUrl . '/',
            $baseUrl . '/about',
            $baseUrl . '/services',
            $baseUrl . '/blog',
        ];

        foreach (Service::where('is_active', true)->get() as $service) {
            $urls[] = $baseUrl . '/services/' . $service->slug;
        }

        foreach (Post::published()->get() as $post) {
            $urls[] = $baseUrl . '/blog/' . $post->slug;
        }

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
        foreach ($urls as $url) {
            $xml .= "  <url><loc>{$url}</loc><changefreq>weekly</changefreq></url>\n";
        }
        $xml .= '</urlset>';

        File::put(public_path('sitemap.xml'), $xml);
        $this->info("Generated sitemap with " . count($urls) . " URLs.");

        return 0;
    }
}
